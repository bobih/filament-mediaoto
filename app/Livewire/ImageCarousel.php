<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\NewsPost;
use Livewire\Attributes\On;
use RalphJSmit\Livewire\Urls\Facades\Url;

class ImageCarousel extends Component
{
    public $images = '';

    #[On('showImageModal')]
    public function showImageModal($postid){
        $this->dispatch('open-image-modal');
    }

    public function render()
    {
        return view('livewire.image-carousel',[
            'images' => $this->images
        ]);
    }

    public function boot()
    {
        $arrUrl = explode ("/", Url::current());
        $slug = $arrUrl [(count ($arrUrl) - 1)];
        $newsdata = NewsPost::where('slug',$slug)->with('media')->first();
        $this->images = $newsdata->media[0]->getUrl('desktop');

    }
}
