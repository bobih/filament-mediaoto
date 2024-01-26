<?php

namespace App\Http\Controllers;

use App\Models\NewsPost;
use Illuminate\Support\Str;

use App\Models\NewsCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;
use Spatie\GoogleTagManager\GoogleTagManagerFacade as GoogleTagManager;

class NewsPostController extends Controller
{
    public function index(){

        GoogleTagManager::set('pageType', 'news');

        $response = NewsPost::inRandomOrder()->with('categories')->orderBy('published_at','desc')->take(5)->get();
        $latest = NewsPost::orderBy('published_at','desc')->with('categories')->take(3)->get();
        $categories = NewsCategory::whereHas('posts', function($query){
            $query->published();
        })->take(10)->get();
        return view('news.index',[
            "posts" => $response,
            "latest" => $latest,
            "categories" => $categories
        ]);
    }

    public function show(NewsPost $news){

        GoogleTagManager::set('pageType', 'news-detail');
        $related = NewsPost::inRandomOrder()->take(3)->get();
        return view('news.show',[
            "post" => $news,
            "related" => $related
        ]);
    }


    public function getNews(Request $request){

        $response = Http::get('https://newsdata.io/api/1/news?country=id&category=technology,entertainment,education&apikey=pub_3644856b52db506d7f3ab3c51f9e2b20bde51');

        if($response->status() != 200){
            echo "<pre>";
            print_r($response->json()['results']);
            echo "</pre>";
        } else {
           // $arrData = $this->getJsonData()['results'];
           $arrData = $response->json()['results'];
           $this->saveData($arrData);
        }



    }

    private function saveData($arrData){

        for($i=0; $i< count($arrData); $i++){
          $newPost =   NewsPost::insertOrIgnore([
            'article_id' => $arrData[$i]['article_id'],
            'userid' => '36',
            'source' => $arrData[$i]['source_id'],
            'image'=> $arrData[$i]['image_url'],
            'title' => $arrData[$i]['title'],
            'slug' => Str::slug($arrData[$i]['title']),
            'description' => $arrData[$i]['description'],
            'content' => $arrData[$i]['content'],
            'published_at' => date("Y-m-d H:i:s",strtotime($arrData[$i]['pubDate'])),
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at'=> date("Y-m-d H:i:s"),
          ]);

        }
    }


    private function getJsonData(){
        $json = Storage::disk('local')->get('news.json');
        $json = json_decode($json, true);
        return $json;
    }



}
