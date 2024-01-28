<x-app-layout title="Kebijakan Privasi" description="Privacy - We have a vision to become a pioneer agency providing large numbers of leads in Indonesia, which can providing the best solutions for business people">
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

