<?php

namespace App\Livewire;

use Livewire\Attributes\Rule;
use Livewire\Component;
use LivewireUI\Modal\ModalComponent;

class ContactUs extends ModalComponent
{

    #[Rule('required|min:3|max:50')]
    public $name ='';

    #[Rule('required')]
    public $email ='';

    //#[Rule('required')]
    public $note ='';

    public function saveContact(){
        //dump('Hello World');
        $this->validate();
        $this->reset(['name','email','note']);
    }
    public function render()
    {
        return view('livewire.contact-us');
    }
}
