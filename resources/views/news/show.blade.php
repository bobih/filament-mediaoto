<x-app-layout :post='$post'
    :title='$post->title'
    :description='$post->getExcerpt()'
    :metaproduct='$metaproduct'>
    @section('header')
    <?php /*  @include('layouts.widgets.header') */ ?>
    <livewire:top-nav />
    @endsection
    @section('homesection')
    <x-news.news-detail :post="$post" :related="$related" :agent="$agent" :slider="$slider" />
    @endsection
    <x-custom-modal >
        @slot('body')
        @livewire('contact-us')
        @endslot
    </x-custom-modal>


</x-app-layout>
