<x-app-layout title="Home">
    @section('header')
        @include('layouts.widgets.header')
    @endsection
    @section('homesection')
        @include('layouts.widgets.banner')
        @include('layouts.widgets.about')
        @include('layouts.widgets.services')
        @include('layouts.widgets.products')
        @include('layouts.widgets.news')
        @include('layouts.widgets.price')
    @endsection

    <x-custom-modal>
        @slot('body')
            @livewire('contact-us')
        @endslot
    </x-custom-modal>

</x-app-layout>
