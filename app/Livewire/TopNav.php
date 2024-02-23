<?php

namespace App\Livewire;

use Livewire\Component;

use Jenssegers\Agent\Agent;
use Livewire\Attributes\Computed;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Session;
use RalphJSmit\Livewire\Urls\Facades\Url;


class TopNav extends Component
{
    #[Computed]
    public $currpage = 'home';

    public $scroll = '';

    public $nav = 'home';

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

    }

    public function boot(){

        $agent =  new Agent();

        //dd($agent->isMobile());
        $this->isMobile = false;// $agent->isMobile();

        if(Url::currentRoute() == 'news.index'){
            $this->nav = 'news';
        }

    }

    public function getPage($page, $path){
      // dd($this->currentUrl);
        if($path){
            Session::set('nav', $path);
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

    public function pageName($page){
        $this->nav = $page;
    }
}
