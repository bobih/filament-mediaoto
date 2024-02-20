<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\On;

class ImageCarousel extends Component
{
    #[On('showImageModal')]
    public function showImageModal(){
        $this->dispatch('open-image-modal');
    }

    public function render()
    {
        return view('livewire.image-carousel');
    }
}
