<x-app-layout
    title="{{__('home.title')}}"
    description="{{__('home.desc')}}"
    :itemlist="$posts">
    @section('header')
      <?php /*  @include('layouts.widgets.header') */ ?>
      <livewire:top-nav />

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
