<?php

namespace App\Livewire;

use App\Http\Controllers\FcmController;
use App\Models\Contact;
use Livewire\Component;

use App\Mail\WelcomeMail;
use Livewire\Attributes\On;
use Livewire\Attributes\Rule;
use Livewire\Attributes\Validate;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\Mail;
use LivewireUI\Modal\ModalComponent;
use Filament\Support\Enums\Alignment;
use Filament\Notifications\Notification;
use Filament\Support\Enums\VerticalAlignment;
use Filament\Notifications\Livewire\Notifications;
use Spatie\GoogleTagManager\GoogleTagManagerFacade as GoogleTagManager;

class ContactUs extends ModalComponent
{

    #[Validate('required|min:3')]
    public $name = '';

    #[Validate('required|email')]
    public $email = '';

    //#[Rule('required')]
    public $note = '';

    public $isChecked = false;


    public $phone = '';

    public $eventName = '';

    public $modalid = '';
    public $pagename = '';

    public $captcha = 0;

    public $token = '';

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


        //$response = Http::post('https://www.google.com/recaptcha/api/siteverify?secret=' . env('RECAPTCHA_SITE_SECRET') . '&response=' . $token);

        //$this->captcha = $response->json()['score'];


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
            $this->saveContact();
        } else {
            $this->dispatch('succesSave');
            Notification::make()
                ->title('Failed, please try again later')
                ->warning()
                ->persistent()
                ->send();
        }
    }


    public function saveContact()
    {

        $this->validate();

        Contact::create([
            'name' => $this->name,
            'email' => $this->email,
            'phone' => $this->phone,
            'notes' => $this->note,
        ]);

        GoogleTagManager::flash('formContact', 'success');

        $this->reset(['name', 'email','phone', 'note']);
        $this->isChecked = false;

        // Sent Notif
        $data = array(
            'name' => $this->name,
            'email' => $this->email,
            'phone' => $this->phone,
            'notes' => $this->note,
        );
        $fcm = new FcmController();

        try{
           $sentFCM =  $fcm->sentContactUs($data);
        } catch (\Exception $e){
        }

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

        We appreciate you contacting us/ [Your Company]. One of our colleagues will get back in touch with you soon!Have a great day!
        */
        //Notifications::alignment(Alignment::Center);
        //Notifications::verticalAlignment(VerticalAlignment::Center);
        Notification::make()
            ->title(Lang::get('notif.contact_title'))
            ->success()
            ->body(Lang::get('notif.contact_success'))
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

    public function setPage(){
        dd($this);
    }




}
