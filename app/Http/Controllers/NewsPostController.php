<?php

namespace App\Http\Controllers;

use App\Models\NewsPost;
use Illuminate\Support\Str;

use App\Models\NewsCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;
use Spatie\GoogleTagManager\GoogleTagManagerFacade as GoogleTagManager;

class NewsPostController extends Controller
{
    public function index(){

        GoogleTagManager::set('pageType', 'news');

        $newsResponse = Cache::remember('newsResponse', Carbon::now()->addHours(1), function () {
            return NewsPost::inRandomOrder()->with('categories')->orderBy('published_at','desc')->take(5)->get();
        });

        $newsLatest = Cache::remember('newsLatest', Carbon::now()->addMinutes(30), function () {
            return NewsPost::orderBy('published_at','desc')->with('categories')->take(3)->get();
        });

        $newscategories = Cache::remember('newscategories', Carbon::now()->addHours(1), function () {
            return NewsCategory::whereHas('posts', function($query){
                $query->published();
            })->take(10)->get();
        });


        return view('news.index',[
            "posts" => $newsResponse,
            "latest" => $newsLatest,
            "categories" => $newscategories
        ]);
    }

    public function show(NewsPost $news){

        GoogleTagManager::set('pageType', 'news-detail');

        $newsRelated = Cache::remember('newsRelated', Carbon::now()->addMinutes(30), function () {
            return NewsPost::inRandomOrder()->take(3)->get();
        });

        $newsid = Cache::remember('news-'.$news->id, Carbon::now()->addMinutes(30), function () use ($news) {
            return $news;
        });


        return view('news.show',[
            "post" => $newsid,
            "related" => $newsRelated
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
