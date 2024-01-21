<?php /*
<x-guest-layout>
    <div class="pt-4 bg-gray-100 dark:bg-gray-900">
        <div class="min-h-screen flex flex-col items-center pt-6 sm:pt-0">
            <div>
                <x-authentication-card-logo />
            </div>

            <div class="w-full sm:max-w-2xl mt-6 p-6 bg-white dark:bg-gray-800 shadow-md overflow-hidden sm:rounded-lg prose dark:prose-invert">
                {!! $policy !!}
            </div>
        </div>
    </div>
</x-guest-layout>
*/ ?>

<x-app-layout>
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

