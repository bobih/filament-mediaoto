@props(['title'])
<!DOCTYPE html>
<html class="scroll-smooth" lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="application-name" content="{{ config('app.name') }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ isset($title)? $title . ' - ' : ''  }} {{ config('app.name', '') }}</title>

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

<script type="module">
    // Import the functions you need from the SDKs you need
    import { initializeApp } from "https://www.gstatic.com/firebasejs/10.7.2/firebase-app.js";
    import { getAnalytics } from "https://www.gstatic.com/firebasejs/10.7.2/firebase-analytics.js";
    // TODO: Add SDKs for Firebase products that you want to use
    // https://firebase.google.com/docs/web/setup#available-libraries

    // Your web app's Firebase configuration
    // For Firebase JS SDK v7.20.0 and later, measurementId is optional
    const firebaseConfig = {
      apiKey: "AIzaSyCjO4yYxDMZzKorD0dq4zZlNTmDMBzLgz8",
      authDomain: "mediaoto-b3ac5.firebaseapp.com",
      projectId: "mediaoto-b3ac5",
      storageBucket: "mediaoto-b3ac5.appspot.com",
      messagingSenderId: "676189219899",
      appId: "1:676189219899:web:0deaa956dfaafb4eb0001e",
      measurementId: "G-Q7LP278P3T"
    };

    // Initialize Firebase
    const app = initializeApp(firebaseConfig);
    const analytics = getAnalytics(app);
  </script>

<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-KPMBPSR6');</script>
<!-- End Google Tag Manager -->

<meta name="google-adsense-account" content="ca-pub-1433601050494794">

    <?php /* <script src="https://cdn.tailwindcss.com"></script> */ ?>

   <script src="https://www.google.com/recaptcha/api.js?render={{ env('RECAPTCHA_SITE_KEY') }}"></script>


    <!-- Styles -->
    @livewireStyles


</head>

<body class="font-sans antialiased dark:bg-gray-700">
    <!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-KPMBPSR6"
    height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->
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
