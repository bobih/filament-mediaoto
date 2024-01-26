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

    #[Computed()]
    public function posts(){

        $agent = new Agent();


        $response = NewsPost::where('title', 'like', "%{$this->search}%")
                    ->with('categories')
                    ->orderBy('published_at','desc')
                    ->when(NewsCategory::where('slug',$this->category)->first(), function($query){
                        $query->withCategory($this->category);
                    });



        if($agent->isMobile()){
            $response = $response->paginate(3);
            // NewsPost::where('featured',1)->with('categories')->orderBy('published_at','desc')->take(1)->get();



        } else {
            $response = $response->paginate(5);

            //$response = NewsPost::where('featured',1)->with('categories')->orderBy('published_at','desc')->take(5)->get();
        }



       return $response;
    }

    #[Computed()]
    public function latest(){
        return  NewsPost::inRandomOrder()->with('categories')->orderBy('published_at','desc')->take(2)->get();
    }

    #[On('search')]
    public function updateSearch($search){
        $this->search = $search;
    }

    public function render()
    {
        return view('livewire.news-list');
    }
}
