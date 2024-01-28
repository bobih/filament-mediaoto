@props(['post','title', 'description'])
<!DOCTYPE html>
<html class="scroll-smooth" lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <script>
        // On page load or when changing themes, best to add inline in `head` to avoid FOUC
        if (localStorage.getItem('color-theme') === 'dark' || (!('color-theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
            document.documentElement.classList.add('dark');
        } else {
            document.documentElement.classList.remove('dark')
        }
    </script>

    <meta charset="utf-8">
    <meta name="application-name" content="{{ config('app.name') }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">


    @if (isset($post))
<meta property="og:type" content="article" />
    <meta property="og:site_name" content="Mediaoto" />
    <meta property="og:title" content="{{$post->title}}" />
    <meta property="og:image" content="{{ $post->getThumbnailImage() }}" />
    <meta property="og:description" content="{{$post->description}}" />
    <meta property="og:url" content="{{ route('news.show', $post->slug) }}" />
    <meta property="og:image:type" content="{{$post->getImageInfo()->mime_type}}" />
    <meta property="og:image:width" content="{{$post->getImageInfo()->width}}" />
    <meta property="og:image:height" content="{{$post->getImageInfo()->height}}" />
    <?php /* Twitter */ ?>
    <meta name="twitter:card" content="summary_large_image">
    <meta property="twitter:domain" content="mediaoto.id">
    <meta property="twitter:url" content="{{ route('news.show', $post->slug) }}">
    <meta name="twitter:title" content="{{$post->title}}">
    <meta name="twitter:description" content="{{$post->description}}">
    <meta name="twitter:image" content="{{ $post->getThumbnailImage() }}">

    @endif


    <title>{{ isset($title) ? $title . ' - ' : '' }} {{ config('app.name', '') }}</title>
    <link rel="canonical" href="{{ url()->current() }}" />
    <meta name="description"
        content="{{ isset($description) ? $description : 'Indeks berita terkini dan terbaru hari ini dari peristiwa, kecelakaan, kriminal, hukum, berita unik, Politik, dan liputan khusus di Indonesia dan Internasional' }}"
        itemprop="description" />
    <meta name="robots" content="index, follow" />
    <meta name="googlebot" content="index, follow" />
    <meta name="googlebot-news" content="index, follow" />
    <meta
        content="{{ isset($description) ? $description : 'Indeks berita terkini dan terbaru hari ini dari peristiwa, kecelakaan, kriminal, hukum, berita unik, Politik, dan liputan khusus di Indonesia dan Internasional' }}"
        itemprop="headline" />
    <meta name="keywords"
        content="{{ isset($description) ? $description : 'Indeks berita terkini dan terbaru hari ini dari peristiwa, kecelakaan, kriminal, hukum, berita unik, Politik, dan liputan khusus di Indonesia dan Internasional' }}"
        itemprop="keywords" />


    <link type="image/x-icon" rel="shortcut icon" href="https://www.mediaoto.id/favicon.ico?v=2024012509223">

    <!-- Google tag (gtag.js B3ac5) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-Q7LP278P3T"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'G-Q7LP278P3T');
    </script>

    @include('googletagmanager::head')

    <?php /*
    <!-- Fonts -->

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    */
    ?>

    <?php /*
    <!-- Flowibte -->
    // Required for Modal
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.css" rel="stylesheet" />
     */
    ?>



    <?php /*
     <!-- Google tag (gtag.js) -->
    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-Q7LP278P3T"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'G-Q7LP278P3T');
    </script>
    */
    ?>



    <?php /*
    <!-- Google tag (gtag.js) -->
    @assets
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-310Q1596DC"></script>
    @endassets
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'G-310Q1596DC');
    </script>
    */
    ?>



    <?php /*
    <!-- Google Tag Manager -->
    <script>
        (function(w, d, s, l, i) {
            w[l] = w[l] || [];
            w[l].push({
                'gtm.start': new Date().getTime(),
                event: 'gtm.js'
            });
            var f = d.getElementsByTagName(s)[0],
                j = d.createElement(s),
                dl = l != 'dataLayer' ? '&l=' + l : '';
            j.async = true;
            j.src =
                'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
            f.parentNode.insertBefore(j, f);
        })(window, document, 'script', 'dataLayer', 'GTM-KPMBPSR6');
    </script>
    <!-- End Google Tag Manager -->
    */
    ?>

    <meta name="google-adsense-account" content="ca-pub-1433601050494794">

    <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-1433601050494794"
        crossorigin="anonymous"></script>


    @filamentStyles
    @vite(['resources/css/app.css', 'resources/js/app.js'])

   <?php /* <script src="https://cdn.tailwindcss.com"></script> */ ?>

    <script src="https://www.google.com/recaptcha/api.js?render={{ env('RECAPTCHA_SITE_KEY') }}"></script>


    <!-- Styles -->
    @livewireStyles


</head>

<body class="font-sans antialiased dark:bg-gray-700">
    @include('googletagmanager::body')
    <?php /*
    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-KPMBPSR6" height="0" width="0"
            style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->

    */
    ?>

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
