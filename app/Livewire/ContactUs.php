<?php

namespace App\Livewire;

use Livewire\Attributes\Rule;
use Livewire\Component;
use LivewireUI\Modal\ModalComponent;
use Livewire\Attributes\On;
use Filament\Notifications\Notification;

class ContactUs extends Component
{

    #[Rule('required|min:3|max:50')]
    public $name ='';

    #[Rule('required')]
    public $email ='';

    //#[Rule('required')]
    public $note ='';

    public $eventName = '';

    public function saveContact(){
        //dump('Hello World');
        $this->validate();
        $this->reset(['name','email','note']);

        $this->eventName = 'Hello World!!';


        Notification::make()
            ->title('Saved successfully')
            ->info()
            ->send();
        $this->dispatch('succesSave');
    }



    public function render()
    {
        return view('livewire.contact-us');
    }
}
