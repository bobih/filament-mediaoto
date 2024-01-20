<?php

namespace App\Livewire;

use Livewire\Attributes\Validate;

use App\Models\Contact;
use Livewire\Component;
use App\Mail\WelcomeMail;
use Livewire\Attributes\On;
use Livewire\Attributes\Rule;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;
use LivewireUI\Modal\ModalComponent;
use Filament\Notifications\Notification;

class ContactUs extends ModalComponent
{

    #[Validate('required|min:3')]
    public $name = '';

    #[Validate('required|email')]
    public $email = '';

    //#[Rule('required')]
    public $note = '';

    public $eventName = '';

    public $modalid = '';

    public $captcha = 0;

    /*
    protected $rules = [
        'name' => 'required|min:6',
        'email' => 'required|email',
    ];
    */

    /**
     * Supported: 'sm', 'md', 'lg', 'xl', '2xl', '3xl', '4xl', '5xl', '6xl', '7xl'
     */
    public static function modalMaxWidth(): string
    {
        return '7xl';
    }

    public function updatedCaptcha($token)
    {

        $response = Http::post('https://www.google.com/recaptcha/api/siteverify?secret=' . env('RECAPTCHA_SITE_SECRET') . '&response=' . $token);
        $this->captcha = $response->json()['score'];

        if ($this->captcha > .3) {
            $this->saveContact();
        } else {
            $this->dispatch('succesSave');
            Notification::make()
                ->title('Failed, please try again later')
                ->warning()
                ->send();
        }
    }


    public function saveContact()
    {
        $this->validate();

        Contact::create([
            'name' => $this->name,
            'email' => $this->email,
            'notes' => $this->note,
        ]);


        $this->reset(['name', 'email', 'note']);


        // Sent Email
        /*
        try{
            Mail::to('bobby.khrisna@gmail.com')->send(new WelcomeMail("Jon"));
            Notification::make()
            ->title('Saved successfully')
            ->success()
            ->iconColor('success')
            ->send();

        }catch(\Exception $e){

            Notification::make()
            ->title('Email Failed')
            ->warning()
            ->send();
        }

        */

        Notification::make()
            ->title('Saved successfully')
            ->success()
            ->iconColor('success')
            ->send();

        $this->eventName = 'Hello World!!';
        $this->dispatch('succesSave');
        $this->dispatch('close-modal');
    }

    public function changeUserId($modalid)
    {
        $this->modalid = $modalid;
    }

    public function render()
    {
        return view('livewire.contact-us');
    }
}
