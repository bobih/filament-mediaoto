<?php

namespace App\Livewire;
use Spatie\Tags\Tag;
use Livewire\Component;
use App\Models\NewsPost;
use Illuminate\Support\Str;
use Jenssegers\Agent\Agent;

use Livewire\Attributes\On;
use App\Models\NewsCategory;
use Livewire\WithPagination;
use Livewire\Attributes\Computed;
use Illuminate\Http\Client\Request;
use RalphJSmit\Livewire\Urls\Facades\Url;

class NewsList extends Component
{
    use WithPagination;
    public $search = '';

    //protected $queryString = ['search'];

    public $category = '';



    public $tag = '';

    public $perPage = 3;

    public $totalData = 0;

    #[Computed()]
    public function posts(){

        $agent = new Agent();


        $response = NewsPost::where(function ($query) {
                        $query->where('title', 'LIKE', "%".$this->search."%")
                                ->orWhere('description', 'LIKE', "%".$this->search."%");
                    })
                    ->with('categories','media','tags','author')
                    ->published()
                    ->orderBy('published_at','desc')
                    ->when(NewsCategory::where('slug',$this->category)->first(), function($query){
                        $query->withCategory($this->category);
                    })
                    ->when(NewsPost::withAllTags([$this->tag])->first(), function($query){
                        $query->withAllTags([$this->tag]);
                    });

                    $response = Tag::containing('iims')->get();// NewsPost::withAllTags(['google'],'categories')->get();

                    dd($response);

        $this->totalData = count($response->get());

        if($agent->isMobile()){
            $response = $response->paginate($this->perPage);
            // NewsPost::where('featured',1)->with('categories')->orderBy('published_at','desc')->take(1)->get();



        } else {
            $response = $response->paginate($this->perPage);

            //$response = NewsPost::where('featured',1)->with('categories')->orderBy('published_at','desc')->take(5)->get();
        }



       return $response;
    }

    #[Computed()]
    public function latest(){
        return  NewsPost::inRandomOrder()->published()->with('categories')->orderBy('published_at','desc')->take(2)->get();
    }

    //#[On('search')]
    public function updateSearch($search){
       // dd('Get');
        //$this->reset('search','category','tag');
        //$this->search = $search;
        //$this->redirect
        $this->redirect('/news/search/'.$search,true);
    }

    #[On('category')]
    public function updateCategory($category){
        $this->reset('search','category','tag');
        $this->category = $category;
    }

    public function loadMore(){
        $this->perPage += 3;
    }

    public function render()
    {
        return view('livewire.news-list');
    }

    public function boot()
    {
        //dd(Url::current());

        if(Url::currentRoute() == 'news.category'){
            $this->reset('search','tag');
           $arrUrl = explode ("/", Url::current());
           $category = $arrUrl [(count ($arrUrl) - 1)];
           $this->category = $category;

        } else if(Url::currentRoute() == 'news.search'){
            $this->reset('category','tag');
           $arrUrl = explode ("/", Url::current());
           $search = $arrUrl [(count ($arrUrl) - 1)];
           $search = Str::of($search)->replace('-', ' ');
           $this->search = $search;
           //dd('OK');

        } else if(Url::currentRoute() == 'news.tag'){
            $this->reset('search','category');
           $arrUrl = explode ("/", Url::current());
           $tag = $arrUrl [(count ($arrUrl) - 1)];
           $this->tag = $tag;

        }
}
}
