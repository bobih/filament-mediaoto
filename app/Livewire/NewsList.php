<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\NewsPost;
use Livewire\Attributes\Computed;
use Livewire\WithPagination;

class NewsList extends Component
{
    use WithPagination;

    #[Computed()]
    public function posts(){
        $response = NewsPost::orderBy('published_at','desc')->paginate(5);
        return $response;
    }
    public function render()
    {
        return view('livewire.news-list');
    }
}
