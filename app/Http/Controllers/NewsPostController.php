<?php

namespace App\Http\Controllers;

use App\Models\NewsPost;
use Illuminate\Support\Str;
use App\Models\NewsCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Jenssegers\Agent\Agent;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\MetaController;
use Spatie\GoogleTagManager\GoogleTagManagerFacade as GoogleTagManager;

class NewsPostController extends Controller
{

    public function index()
    {



        $request = request();
        if ($request->has('search')) {
            //dd($request->input('search'));
            return to_route('news.search', ['search' => $request->input('search')]);
        } else if ($request->has('category')) {
            return to_route('news.category', ['category' => $request->input('category')]);
        } else if ($request->has('tag')) {
            return to_route('news.tag', ['tag' => $request->input('tag')]);
        }


        GoogleTagManager::set('pageType', 'news');
        $agent = new Agent();

        if (env('APP_ENV', 'local') == 'production') {
            $newsResponse = Cache::remember('newsResponse', Carbon::now()->addHours(1), function () {
                return NewsPost::inRandomOrder()->with('categories', 'media', 'tags', 'author')->orderBy('published_at', 'desc')->take(5)->get();
            });

            $newsLatest = Cache::remember('newsLatest', Carbon::now()->addMinutes(30), function () {
                return NewsPost::orderBy('published_at', 'desc')->with('categories', 'media', 'tags', 'author')->take(3)->get();
            });

            $newscategories = Cache::remember('newscategories', Carbon::now()->addHours(1), function () {
                return NewsCategory::whereHas('posts', function ($query) {
                    $query->published();
                })->take(10)->get();
            });
        } else {
            $newsResponse =  NewsPost::inRandomOrder()->with('categories', 'media', 'tags', 'author')->orderBy('published_at', 'desc')->take(5)->get();
            $newsLatest = NewsPost::orderBy('published_at', 'desc')->with('categories', 'media', 'tags', 'author')->take(3)->get();
            $newscategories = NewsCategory::whereHas('posts', function ($query) {
                $query->published();
            })->take(10)->get();
        }


        return view('news.index', [
            "posts" => $newsResponse,
            "latest" => $newsLatest,
            "categories" => $newscategories,
            "agent" => $agent
        ]);
    }


    public function testxml()
    {







        // echo '<script type="application/ld+json">';
        //echo  json_encode($meta['product']);
        //echo '</script>';
        //  echo '<script type="application/ld+json">';
        //   echo  json_encode($meta['listItems']);
        //  echo '</script>';


    }




    public function show(NewsPost $news)
    {

        GoogleTagManager::set('pageType', 'news-detail');
        $agent = new Agent();

        if (env('APP_ENV', 'local') == 'production') {
            $newsRelated = Cache::remember('newsRelated', Carbon::now()->addMinutes(30), function () use ($news) {
                return NewsPost::whereNotIn('id', [$news->id])->inRandomOrder()->with('categories', 'media', 'tags', 'author')->take(3)->get();
            });

            $newsRelated =  NewsPost::whereNotIn('id', [$news->id])->inRandomOrder()->with('categories', 'media', 'tags', 'author')->take(3)->get();

            $newsid = Cache::remember('news-' . $news->id, Carbon::now()->addMinutes(30), function () use ($news) {
                return $news;
            });


            $metaProduct = [];
            if ($news->car_model) {
                $controller = new MetaController();
                $metaProduct = $controller->getMetaProduct($news->car_model, $news);
            }
        } else {
            $newsRelated =  NewsPost::whereNotIn('id', [$news->id])->inRandomOrder()->with('categories', 'media', 'tags', 'author')->take(3)->get();

            $newsRelated =  NewsPost::whereNotIn('id', [$news->id])->inRandomOrder()->with('categories', 'media', 'tags', 'author')->take(3)->get();

            $metaProduct = [];
            if ($news->car_model) {
                $controller = new MetaController();
                $metaProduct = $controller->getMetaProduct($news->car_model, $news);
            }

            $slider = [];
            $imagelist = array(
                'image' =>$news->media[0]->getUrl()
            );
            $slider[0] = (object) $imagelist;
            $slider[1] = (object) $imagelist;
            $slider[2] = (object) $imagelist;
            //$slider[0]->image = ;;


            $newsid =  $news;
        }


        return view('news.show', [
            "post" => $news,
            "related" => $newsRelated,
            'metaproduct' => $metaProduct,
            'agent' => $agent,
            'slider' => $slider
        ]);
    }


    public function category($category)
    {
        GoogleTagManager::set('pageType', 'news-category');
        $agent = new Agent();

        //dd($category);
        if (env('APP_ENV', 'local') == 'production') {
            $newsResponse = Cache::remember('newsCategoryResponse', Carbon::now()->addDay(), function () use ($category) {
                return NewsPost::when(NewsCategory::where('slug', $category)->first(), function ($query) use ($category) {
                    $query->withCategory($category);
                })->with('media', 'tags', 'author')->orderBy('published_at', 'desc')->take(5)->get();
            });

            $newsLatest = Cache::remember('newsLatest', Carbon::now()->addMinutes(30), function () {
                return NewsPost::orderBy('published_at', 'desc')->with('categories', 'media', 'tags', 'author')->take(3)->get();
            });

            $newscategories = Cache::remember('newscategories', Carbon::now()->addHours(1), function () {
                return NewsCategory::whereHas('posts', function ($query) {
                    $query->published();
                })->take(10)->get();
            });
        } else {
            $newsResponse =  NewsPost::when(NewsCategory::where('slug', $category)->first(), function ($query) use ($category) {
                $query->withCategory($category);
            })->with('media', 'tags', 'author')->orderBy('published_at', 'desc')->take(5)->get();

            $newsLatest = NewsPost::orderBy('published_at', 'desc')->with('categories', 'media', 'tags', 'author')->take(3)->get();
            $newscategories = NewsCategory::whereHas('posts', function ($query) {
                $query->published();
            })->take(10)->get();
        }

        return view('news.index', [
            "posts" => $newsResponse,
            "latest" => $newsLatest,
            "categories" => $newscategories,
            "agent" => $agent
        ]);
    }



    public function search(string $search)
    {
        GoogleTagManager::set('pageType', 'news-search');
        $agent = new Agent();

        $search = Str::of($search)->replace('-', ' ');


        if (env('APP_ENV', 'local') == 'production') {
            $newsResponse = Cache::remember('newsSearchResponse', Carbon::now()->addDay(), function () use ($search) {
                return NewsPost::where('title', 'LIKE', "%".$search."%")
                    ->with('categories', 'media', 'tags', 'author')
                    ->published()
                    ->orderBy('published_at', 'desc')->with('media', 'tags', 'author')->orderBy('published_at', 'desc')->take(5)->get();
            });

            $newsLatest = Cache::remember('newsLatest', Carbon::now()->addMinutes(30), function () {
                return NewsPost::orderBy('published_at', 'desc')->with('categories', 'media', 'tags', 'author')->take(3)->get();
            });

            $newscategories = Cache::remember('newscategories', Carbon::now()->addHours(1), function () {
                return NewsCategory::whereHas('posts', function ($query) {
                    $query->published();
                })->take(10)->get();
            });
        } else {
            $newsResponse =  NewsPost::where('title', 'LIKE', "%".$search."%")
                ->with('categories', 'media', 'tags', 'author')
                ->published()
                ->orderBy('published_at', 'desc')->with('media', 'tags', 'author')->orderBy('published_at', 'desc')->take(5)->get();

            $newsLatest = NewsPost::orderBy('published_at', 'desc')->with('categories', 'media', 'tags', 'author')->take(3)->get();
            $newscategories = NewsCategory::whereHas('posts', function ($query) {
                $query->published();
            })->take(10)->get();
        }


        return view('news.index', [
            "posts" => $newsResponse,
            "latest" => $newsLatest,
            "categories" => $newscategories,
            "agent" => $agent
        ]);
    }


    public function tag(string $tag)
    {
        GoogleTagManager::set('pageType', 'news-tag');
        $agent = new Agent();

        if (env('APP_ENV', 'local') == 'production') {
            $newsResponse = Cache::remember('newsTagResponse', Carbon::now()->addDay(), function () use ($tag) {
                return NewsPost::with('categories', 'media', 'tags', 'author')
                    ->published()
                    ->when(NewsPost::withAllTags([$tag])->first(), function ($query) use ($tag) {
                        $query->withAllTags([$tag]);
                    })
                    ->orderBy('published_at', 'desc')->with('media', 'tags', 'author')->orderBy('published_at', 'desc')->take(5)->get();
            });
            $newsLatest = Cache::remember('newsLatest', Carbon::now()->addMinutes(30), function () {
                return NewsPost::orderBy('published_at', 'desc')->with('categories', 'media', 'tags', 'author')->take(3)->get();
            });

            $newscategories = Cache::remember('newscategories', Carbon::now()->addHours(1), function () {
                return NewsCategory::whereHas('posts', function ($query) {
                    $query->published();
                })->take(10)->get();
            });
        } else {
            $newsResponse =  NewsPost::with('categories', 'media', 'tags', 'author')
                ->published()
                ->when(NewsPost::withAllTags([$tag])->first(), function ($query) use ($tag) {
                    $query->withAllTags([$tag]);
                })
                ->orderBy('published_at', 'desc')->with('media', 'tags', 'author')->orderBy('published_at', 'desc')->take(5)->get();
            $newsLatest = NewsPost::orderBy('published_at', 'desc')->with('categories', 'media', 'tags', 'author')->take(3)->get();
            $newscategories = NewsCategory::whereHas('posts', function ($query) {
                $query->published();
            })->take(10)->get();
        }


        return view('news.index', [
            "posts" => $newsResponse,
            "latest" => $newsLatest,
            "categories" => $newscategories,
            "agent" => $agent
        ]);
    }


    public function getNews(Request $request)
    {

        $response = Http::get('https://newsdata.io/api/1/news?country=id&category=technology,entertainment,education&apikey=pub_3644856b52db506d7f3ab3c51f9e2b20bde51');

        if ($response->status() != 200) {
            echo "<pre>";
            print_r($response->json()['results']);
            echo "</pre>";
        } else {
            // $arrData = $this->getJsonData()['results'];
            $arrData = $response->json()['results'];
            $this->saveData($arrData);
        }
    }

    private function saveData($arrData)
    {

        for ($i = 0; $i < count($arrData); $i++) {
            $newPost =   NewsPost::insertOrIgnore([
                'article_id' => $arrData[$i]['article_id'],
                'userid' => '36',
                'source' => $arrData[$i]['source_id'],
                'image' => $arrData[$i]['image_url'],
                'title' => $arrData[$i]['title'],
                'slug' => Str::slug($arrData[$i]['title']),
                'description' => $arrData[$i]['description'],
                'content' => $arrData[$i]['content'],
                'published_at' => date("Y-m-d H:i:s", strtotime($arrData[$i]['pubDate'])),
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ]);
        }
    }


    private function getJsonData()
    {
        $json = Storage::disk('local')->get('news.json');
        $json = json_decode($json, true);
        return $json;
    }
}
