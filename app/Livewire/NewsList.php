<?php

namespace App\Livewire;
use Livewire\Component;
use App\Models\NewsPost;
use Jenssegers\Agent\Agent;
use Livewire\Attributes\On;
use App\Models\NewsCategory;
use Livewire\Attributes\Url;
use Livewire\WithPagination;
use Livewire\Attributes\Computed;

class NewsList extends Component
{
    use WithPagination;
    #[Url]
    public $search='';

    #[Url]
    public $category = '';


    #[Url]
    public $tag = '';

    public $perPage = 3;

    #[Computed()]
    public function posts(){

        $agent = new Agent();

        $response = NewsPost::where('title', 'like', "%{$this->search}%")
                    ->with('categories','media','tags','author')
                    ->published()
                    ->orderBy('published_at','desc')
                    ->when(NewsCategory::where('slug',$this->category)->first(), function($query){
                        $query->withCategory($this->category);
                    })
                    ->when(NewsPost::withAllTags([$this->tag])->first(), function($query){
                        $query->withAllTags([$this->tag]);
                    });
                    //$response = NewsPost::withAllTags(['google'],'categories')->get();

                    //dd($response);



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

    #[On('search')]
    public function updateSearch($search){
        $this->reset('search','category','tag');
        $this->search = $search;
    }


    public function loadMore()
    {
        $this->perPage += 3;
    }

    public function render()
    {
        return view('livewire.news-list');
    }
}
