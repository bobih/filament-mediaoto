<x-app-layout :post='$post' :title='$post->title' :description='$post->description'>
    @section('header')
        @include('layouts.widgets.header')
    @endsection
    @section('homesection')
    <x-news.news-detail :post="$post" :related="$related" />
    @endsection
    <x-custom-modal >
        @slot('body')
        @livewire('contact-us')
        @endslot
    </x-custom-modal>

</x-app-layout>
