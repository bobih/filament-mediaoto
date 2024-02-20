<?php

namespace App\Livewire;

use App\Models\NewsPost;
use Livewire\Component;
use Livewire\Attributes\On;

class ImageCarousel extends Component
{
    public $images = '';

    #[On('showImageModal')]
    public function showImageModal($postid){

        $newsdata = NewsPost::where('id',$postid)->with('media')->get();
        dd($newsdata);
        $this->images = $newsdata->media[0]->file_name();



        $this->dispatch('open-image-modal');
    }

    public function render()
    {
        return view('livewire.image-carousel',[
            'images' => $this->images
        ]);
    }
}
