<?php

namespace App\Livewire;

use Livewire\Component;

class SearchBox extends Component
{

    public $search = '';

    public function updatedSearch($search){
        //$this->search = $search;
        $this->dispatch('search',search: $this->search);
    }

    public function updateSearch(){
        //$this->search = $search;
        $this->dispatch('search',search: $this->search);
    }

    public function render()
    {
        return view('livewire.search-box');
    }
}
