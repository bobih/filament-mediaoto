<x-app-layout
    title="{{__('news.title')}}"
    description="{{__('news.description')}}"
    :itemlist="$posts">
    @section('header')
    <?php /*  @include('layouts.widgets.header') */ ?>
    <livewire:top-nav />
    @endsection
    @section('homesection')
    <div id="news" class="-mt-20 mb-20"></div>
       <x-news.news-list :posts="$posts" :categories="$categories" :agent="$agent" :banner="$banner" />
    @endsection
    <x-custom-modal >
        @slot('body')
        @livewire('contact-us')
        @endslot
    </x-custom-modal>

</x-app-layout>
