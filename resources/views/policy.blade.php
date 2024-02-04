<x-app-layout title="{{__('privacy.title')}}" description="{{__('privacy.description')}}">
    @section('header')
        @include('layouts.widgets.header')
    @endsection
    @section('homesection')
        @include('layouts.widgets.policy')
    @endsection
    <x-custom-modal>
        @slot('body')
            @livewire('contact-us')
        @endslot
    </x-custom-modal>
</x-app-layout>

