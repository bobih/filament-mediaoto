<?php

namespace App\Livewire;
use Livewire\Component;
use App\Models\NewsPost;
use Illuminate\Support\Str;
use Jenssegers\Agent\Agent;
use Livewire\Attributes\On;

use App\Models\NewsCategory;
use Livewire\WithPagination;
use Illuminate\Support\Carbon;
use Livewire\Attributes\Computed;
use Illuminate\Http\Client\Request;
use Illuminate\Support\Facades\Cache;
use RalphJSmit\Livewire\Urls\Facades\Url;

class NewsList extends Component
{
    use WithPagination;
    public $search = '';

    //protected $queryString = ['search'];

    public $category = '';



    public $tag = '';

    public $perPage = 3;


    #[Computed()]
    public function posts(){

        $agent = new Agent();
        // Implement cache

            $response = NewsPost::where('title', 'LIKE', "%".$this->search."%")
            ->with('categories','media','tags','author')
            ->published()
            ->orderBy('published_at','desc')
            ->when(NewsCategory::where('slug',$this->category)->first(), function($query){
                $query->withCategory($this->category);
            })
            ->when(NewsPost::withAllTags([$this->tag])->first(), function($query){
                $query->withAllTags([$this->tag]);
            });
            $response = $response->paginate($this->perPage);
       return $response;
    }

    #[Computed()]
    public function latest(){
        return  NewsPost::inRandomOrder()->published()->with('categories')->orderBy('published_at','desc')->take(2)->get();
    }

    #[On('search')]
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



    public function loadMore()
    {
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
            $this->reset('search','category','tag');
           $arrUrl = explode ("/", Url::current());
           $category = $arrUrl [(count ($arrUrl) - 1)];
           $this->category = $category;

        } else if(Url::currentRoute() == 'news.search'){
            $this->reset('search','category','tag');
           $arrUrl = explode ("/", Url::current());
           $search = $arrUrl [(count ($arrUrl) - 1)];
           $search = Str::of($search)->replace('-', ' ');
           $this->search = $search;

        } else if(Url::currentRoute() == 'news.tag'){
            $this->reset('search','category','tag');
           $arrUrl = explode ("/", Url::current());
           $tag = $arrUrl [(count ($arrUrl) - 1)];
           $this->tag = $tag;

        }
}
}
