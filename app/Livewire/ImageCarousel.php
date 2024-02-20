<?php

namespace App\Livewire;

use Livewire\Component;

class ImageCarousel extends Component
{

    public function showImageModal(){
        $this->dispatch('open-image-modal');
    }

    public function render()
    {
        return view('livewire.image-carousel');
    }
}
