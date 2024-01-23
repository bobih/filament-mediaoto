<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\NewsPost;
use Livewire\Attributes\Url;
use Livewire\WithPagination;
use Livewire\Attributes\Computed;
use Livewire\Attributes\On;

class NewsList extends Component
{
    use WithPagination;
    #[Url]
    public $search='';

    #[Computed()]
    public function posts(){
        if(isset($this->search)){
            $response = NewsPost::where('title', 'like', "%$this->search%")->orderBy('published_at','desc')->paginate(5);

         } else {
            $response = NewsPost::orderBy('published_at','desc')->paginate(5);

         }

       return $response;
    }

    #[Computed()]
    public function latest(){
        return  NewsPost::inRandomOrder()->orderBy('published_at','desc')->take(2)->get();
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
