<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Http\Request;

use Illuminate\Support\Str;
use Livewire\Attributes\Session;
use Livewire\Attributes\Validate;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;
use Filament\Notifications\Notification;
use RalphJSmit\Livewire\Urls\Facades\Url;

class SearchBox extends Component
{
    public $search = '';
    public $captcha = 0;

    protected $queryString = ['search'];

    public function updatedCaptcha($token)
    {



        if( session()->get('captcha')){
            $this->captcha = session()->get('captcha');
        } else {
            $response = Http::post('https://www.google.com/recaptcha/api/siteverify?secret=' . env('RECAPTCHA_SITE_SECRET') . '&response=' . $token);

        $this->captcha = $response->json()['score'];
        if($this->captcha > .3){
             //Session::set('captcha')=$this->captcha;
             session(['captcha' => $this->captcha]);
        }

        }

        if ($this->captcha > .3) {
            $this->updateSearch();
        } else {
            $this->dispatch('succesSave');
            Notification::make()
                ->title('Requiest Failed, please try again later')
                ->warning()
                ->persistent()
                ->send();
        }

    }

    public function updatedSearch($search){
        //$this->search = $search;

       // $this->dispatch('search',search: $this->search);
    }

    public function updateSearch(){

        // Check if current page is detail

        /*
        if(Url::currentRoute() == 'news.show'){
            // redrect to news
            $this->redirect('/news?search='.$this->search,true);
        } else {
        //$this->search = $search;
        if(strlen($this->search) < 3 || strlen($this->search) > 50 || $this->search == '' ){
            $this->search = '';
            $this->reset('search');
            $this->dispatch('search',search: $this->search);
        } else {
            $this->dispatch('search',search: $this->search);
        }
        */
        if($this->search == ""){
            $this->redirect('/news',true);

        } else {

            dd('Hellooo');
            $this->redirect('/news/search/'.Str::slug($this->search),true);
        }

    }

    public function render()
    {
        return view('livewire.search-box');
    }

    public function boot()
    {
        //dd(Url::current());
         if(Url::currentRoute() == 'news.search'){
           $arrUrl = explode ("/", Url::current());
           $search = $arrUrl [(count ($arrUrl) - 1)];
           $this->search = Str::of($search)->replace('-', ' ');
        }
    }
}
