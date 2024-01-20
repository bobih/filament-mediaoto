<!DOCTYPE html>
<html class="scroll-smooth" lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="application-name" content="{{ config('app.name') }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <?php /*
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    */ ?>

    <!-- Flowibte -->
    <?php /* // Required for Modal
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.css" rel="stylesheet" />
     */ ?>
    <!-- Scripts -->
    <?php /* @vite(['resources/css/app.css', 'resources/js/app.js']) */ ?>
    @filamentStyles
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')

    <!-- <script src="https://cdn.tailwindcss.com"></script> -->

    <!-- Styles -->
    @livewireStyles
</head>

<body class="font-sans antialiased dark:bg-gray-700">
    <x-banner />

    @include('layouts.widgets.header')

    @yield('homesection')
    <main class="container mx-auto px-5 flex flex-grow">
        {{ $slot }}
    </main>
    @include('layouts.widgets.cookies')
    @include('layouts.widgets.footer')


    @stack('modals')

    @livewire('notifications')
    @filamentScripts

    <x-custom-modal >
        @slot('body')
           @livewire('contact-us')
        @endslot
    </x-custom-modal>

    @livewireScripts

</body>

</html>
