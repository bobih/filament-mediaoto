<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\Computed;

class TopNav extends Component
{
    #[Computed]
    public $currpage = 'home';
    public function render()
    {
        return view('livewire.top-nav');
    }

    public function setNav($page){
        $this->currpage = $page;
    }

    public function updatedCurrpage($nav)
    {
        $this->currpage = $nav;
    }
}
