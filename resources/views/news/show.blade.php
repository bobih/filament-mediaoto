<x-app-layout>
    @section('header')
        @include('layouts.widgets.header')
    @endsection
    @section('homesection')

    <x-news.news-detail :post="$post" />


    @endsection
    <x-custom-modal >
        @slot('body')
        @livewire('contact-us')
        @endslot
    </x-custom-modal>

</x-app-layout>
