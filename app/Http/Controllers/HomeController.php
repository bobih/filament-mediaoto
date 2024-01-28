<?php

namespace App\Http\Controllers;
use App\Models\NewsPost;

use Jenssegers\Agent\Agent;
use Illuminate\Http\Request;
use Spatie\Analytics\Period;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Http;
use Spatie\Analytics\Facades\Analytics;
use Spatie\GoogleTagManager\GoogleTagManagerFacade as GoogleTagManager;



class HomeController extends Controller
{



    /**
     * Handle the incoming request.
     */
    public function index(Request $request)
    {


       // $response = Http::get('https://newsdata.io/api/1/news?country=id&category=technology,entertainment,education&size=5&apikey=pub_3644856b52db506d7f3ab3c51f9e2b20bde51')['results'];
        //dd($response);

        // Check if Mobile

        $agent = new Agent();



        if($agent->isMobile()){
            $response = NewsPost::featured()->published()->with('categories')->orderBy('published_at','desc')->take(5)->get();
        } else {
            $response = NewsPost::featured()->published()->with('categories')->orderBy('published_at','desc')->take(5)->get();
        }

        //$response = NewsPost::wherein('id',[4,21,39,51,70,73])->with('categories')->orderBy('published_at','desc')->take(5)->get();
        //dd($response);
        //$response = [];

        //Log::info('Loading Home.');

        GoogleTagManager::set('pageType', 'home');

        return view('home',[
            "posts" => $response
        ]);
    }

    public function policy(Request $request)
    {
        GoogleTagManager::set('pageType', 'policy');
        return view('policy');

    }
}
