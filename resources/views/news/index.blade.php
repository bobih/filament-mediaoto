<x-app-layout>
    @section('header')
        @include('layouts.widgets.header')
    @endsection
    @section('homesection')
    <div id="news" class="-mt-20 mb-20"></div>
       <x-news.news-list :posts="$posts" :categories="$categories" />
    @endsection
    <x-custom-modal >
        @slot('body')
        @livewire('contact-us')
        @endslot
    </x-custom-modal>

</x-app-layout>
