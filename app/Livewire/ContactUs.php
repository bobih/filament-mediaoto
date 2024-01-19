<?php

namespace App\Livewire;

use App\Models\Contact;
use Livewire\Component;
use Livewire\Attributes\On;
use Livewire\Attributes\Rule;
use LivewireUI\Modal\ModalComponent;
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

    public $modalid = '';

    public function saveContact(){
        //dump('Hello World');
        $this->validate();

        Contact::create([
            'name' => $this->name,
            'email' => $this->email,
            'notes' => $this->note,
        ]);

        $this->reset(['name','email','note']);

        $this->eventName = 'Hello World!!';


        Notification::make()
            ->title('Saved successfully')
            ->success()
            ->iconColor('success')
            ->send();


       $this->dispatch('succesSave');
    }

    public function changeUserId($modalid){
        $this->modalid = $modalid;
    }

    public function render()
    {
        return view('livewire.contact-us');
    }

}
