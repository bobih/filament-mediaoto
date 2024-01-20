<x-app-layout>
    @section('homesection')
        @include('layouts.widgets.banner')
        @include('layouts.widgets.about')
        @include('layouts.widgets.services')
        @include('layouts.widgets.products')
        <?php /*     @include('layouts.widgets.teams')
        @livewire('news', ['posts' => $posts]) */ ?>
        @include('layouts.widgets.news')
        @include('layouts.widgets.price')
        <?php /* @include('layouts.widgets.contacts')
        @livewire('contact-us') */?>
    @endsection

</x-app-layout>
