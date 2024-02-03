<x-app-layout title="Kebijakan Privasi | Mediaoto" description="Mediaoto adalah agensi layanan lengkap independen dan terintegrasi khususnya untuk pasar otomotif dan properti">
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

