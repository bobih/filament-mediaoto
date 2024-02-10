<x-app-layout
title="{{__('privacy.title')}}"
description="{{__('privacy.descriptiosn')}}"
:itemlist="$itemlist">
    @section('header')
    <?php /*  @include('layouts.widgets.header') */ ?>
    <livewire:top-nav />
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

