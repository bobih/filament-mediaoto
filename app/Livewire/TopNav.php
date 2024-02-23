<?php

namespace App\Livewire;

use Livewire\Component;

use Jenssegers\Agent\Agent;
use Livewire\Attributes\Computed;
use Illuminate\Support\Facades\Request;


class TopNav extends Component
{
    #[Computed]
    public $currpage = 'home';

    public $scroll = '';

    public $isMobile = false;
    public function render()
    {
        return view('livewire.top-nav');
    }

    public function setNav($page){
        $this->currpage = $page;
    }

    public $currentUrl;

    public function mount()
    {
        $this->currentUrl = url()->current();

        $agent =  new Agent();

        //dd($agent->isMobile());
        $this->isMobile = $agent->isMobile();
    }

    public function getPage($page, $path){
      // dd($this->currentUrl);
        if($path){
            session()->flash('scroll', $path);
            $this->redirect('/',true);
        } else if($page){
            $this->redirect($page,true);
        }
    }

    public function updatedCurrpage($nav)
    {
        $this->currpage = $nav;
    }
}
