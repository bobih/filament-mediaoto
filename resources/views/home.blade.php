<x-app-layout
    title="{{__('home.title')}}"
    description="{{__('home.desc')}}"
    :itemlist="$posts">
    @section('header')
      <?php /*  @include('layouts.widgets.header') */ ?>
      <livewire:top-nav />

    @endsection
    @section('homesection')
        @if ($agent->isMobile())
        @include('layouts.widgets.banner2')
        @else
        @include('layouts.widgets.banner')
        @endif
        @include('layouts.widgets.about2')
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
