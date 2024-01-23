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
    */
    ?>

    <!-- Flowibte -->
    <?php /* // Required for Modal
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.css" rel="stylesheet" />
     */
    ?>
    <!-- Scripts -->

    @filamentStyles
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <!-- Google tag (gtag.js) -->
    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-Q7LP278P3T"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'G-Q7LP278P3T');
    </script>


    <script src="https://cdn.tailwindcss.com"></script>

   <script src="https://www.google.com/recaptcha/api.js?render={{ env('RECAPTCHA_SITE_KEY') }}"></script>


    <!-- Styles -->
    @livewireStyles


</head>

<body class="font-sans antialiased dark:bg-gray-700">
    <x-banner />

    @yield('header')
    @yield('homesection')
    <main class="container mx-auto px-5 flex flex-grow">
        {{ $slot }}
    </main>

    <?php /* @include('layouts.widgets.cookies') */ ?>

    @include('layouts.widgets.footer')


    @stack('modals')
    @stack('scripts')

    @livewire('notifications')
    @filamentScripts
    @livewireScripts



</body>

</html>
