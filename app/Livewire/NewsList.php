<?php

namespace App\Livewire;

use App\Models\NewsCategory;
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

    #[Url]
    public $category = '';

    #[Computed()]
    public function posts(){
        $response = NewsPost::where('title', 'like', "%{$this->search}%")
                    ->with('categories')
                    ->orderBy('published_at','desc')
                    ->when(NewsCategory::where('slug',$this->category)->first(), function($query){
                        $query->withCategory($this->category);
                    })
                    ->paginate(5);

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
