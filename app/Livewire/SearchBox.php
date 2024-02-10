<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Http\Request;

use Livewire\Attributes\Session;
use Livewire\Attributes\Validate;
use Illuminate\Support\Facades\Http;
use Filament\Notifications\Notification;

class SearchBox extends Component
{
    public $search = '';
    public $captcha = 0;

    protected $rules = [
        'search' => 'required|min:6|max:20'
    ];

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
        //dd($this);

        dd($this->captcha);

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

        $this->dispatch('search',search: $this->search);
    }

    public function updateSearch(){

        //$this->search = $search;
        if(strlen($this->search) < 3 || strlen($this->search) > 50 || $this->search == '' ){
            $this->search = '';
            $this->reset('search');
            $this->dispatch('search',search: $this->search);
        } else {
            $this->dispatch('search',search: $this->search);
        }

    }

    public function render()
    {
        return view('livewire.search-box');
    }
}
