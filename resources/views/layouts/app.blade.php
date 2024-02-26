@props(['post','title', 'description', 'metaproduct' ,'itemlist'])
<!DOCTYPE html>
<html class="scroll-smooth" lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <?php /*
    <script type="text/javascript">"dark"!==localStorage.getItem("color-theme")&&("color-theme"in localStorage||!window.matchMedia("(prefers-color-scheme: dark)").matches)?document.documentElement.classList.remove("dark"):document.documentElement.classList.add("dark");</script>

    <script>
        if(!('color-theme' in localStorage)){
            localStorage.setItem('color-theme', 'dark');
        }
    // On page load or when changing themes, best to add inline in `head` to avoid FOUC
    if (localStorage.getItem('color-theme') === 'dark' || (!('color-theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
        document.documentElement.classList.add('dark');
    } else {
        document.documentElement.classList.remove('dark')
    }
    </script>
    */?>
    <script>"color-theme"in localStorage||localStorage.setItem("color-theme","dark"),"dark"!==localStorage.getItem("color-theme")&&("color-theme"in localStorage||!window.matchMedia("(prefers-color-scheme: dark)").matches)?document.documentElement.classList.remove("dark"):document.documentElement.classList.add("dark");</script>

    <meta charset="utf-8">
    <meta name="HandheldFriendly" content="true"/>
    <meta name="application-name" content="{{ config('app.name') }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @if (isset($post))
<meta property="og:type" content="article" />
    <meta property="og:site_name" content="Mediaoto" />
    <meta property="og:title" content="{{$post->getExcerptTitle()}} | Mediaoto.id" />
    <meta property="og:image" content="{{ $post->getWebpthumb() }}" />
    <meta property="og:description" content="{{$post->getExcerpt()}}" />
    <meta property="og:url" content="{{ route('news.show', $post->slug) }}" />
    <meta property="og:image:type" content="{{$post->getImageInfo()->mime_type}}" />
    <meta property="og:image:width" content="{{$post->getImageInfo()->width}}" />
    <meta property="og:image:height" content="{{$post->getImageInfo()->height}}" />
    <?php /* Twitter */ ?>
    <meta name="twitter:card" content="summary_large_image">
    <meta property="twitter:domain" content="mediaoto.id">
    <meta property="twitter:url" content="{{ route('news.show', $post->slug) }}">
    <meta name="twitter:title" content="{{$post->getExcerptTitle()}} | Mediaoto.id">
    <meta name="twitter:description" content="{{$post->getExcerpt()}}">
    <meta name="twitter:image" content="{{ $post->getWebpthumb() }}">
    <title>{{$post->getExcerptTitle()}} | Mediaoto.id</title>
    @else
    <meta property="og:site_name" content="Mediaoto" />
    <meta property="og:title" content="{{ $title }}" />
    <meta property="og:image" content="https://www.mediaoto.id/images/home_openGraph.png" />
    <meta property="og:description" content="{{ $description}}" />
    <meta property="og:url" content="https://www.mediaoto.id{{ (request()->path() == '/')? '': "/". request()->path() }}" />
    <meta property="og:image:type" content="image/png" />
    <meta property="og:image:width" content="1200" />
    <meta property="og:image:height" content="630" />
    <?php /* Twitter */ ?>
    <meta name="twitter:card" content="summary_large_image">
    <meta property="twitter:domain" content="mediaoto.id">
    <meta property="twitter:url" content="https://www.mediaoto.id{{ (request()->path() == '/')? '': "/". request()->path() }}">
    <meta name="twitter:title" content="{{ $title }} ">
    <meta name="twitter:description" content="{{ $description  }}">
    <meta name="twitter:image" content="https://www.mediaoto.id/images/home_openGraph.png">
    <title>{{ $title }}</title>
    @endif

    <link rel="canonical" href="https://www.mediaoto.id{{ (request()->path() == '/')? '': "/". request()->path() }}" />
    <meta name="description"
        content="{{ $description }}"
        itemprop="description" />
    <meta name="robots" content="index, follow" />
    <meta name="googlebot" content="index, follow" />
    <meta name="googlebot-news" content="index, follow" />
    <meta
        content="{{ $description }}"
        itemprop="headline" />
    <meta name="keywords"
        content="{{ $description }}"
        itemprop="keywords" />
    <link type="image/x-icon" rel="shortcut icon" href="https://www.mediaoto.id/favicon.ico?v=2024012509223">

    <?php /****** Schema Org ***** */?>
    @if (isset($post))

    <script type="application/ld+json">
        {
          "@context": "https://schema.org",
          "@type": "Organization",
          "image": "https://www.mediaoto.id/images/home_openGraph.png",
          "url": "https://www.mediaoto.id/",
          "sameAs": [
            "https://www.facebook.com/mediaoto.id/",
            "https://www.twitter.com/mediaoto/",
            "https://www.instagram.com/mediaoto.id/"
          ],
          "logo": "https://www.mediaoto.id/images/black_logo.png",
          "name": "Mediaoto",
          "description": "{{__('home.desc')}}",
          "email": "support@mediaoto.id.com",
          "telephone": "+62813-1137-2266",
          "address": {
            "@type": "PostalAddress",
            "streetAddress": "Jakarta Selatan",
            "addressRegion" : "DKI Jakarta",
            "addressLocality": "Jakarta",
            "addressCountry": "ID",
            "postalCode": "12910"
          }
        }
        </script>

        <?php
            if(isset($itemlist)){
                $itemListElement = array();
                $x=1;
                foreach ($itemlist as $list) {
                    $itemListElement[] = array
                            (
                            "@type" =>"ListItem",
                            "position" => $x,
                            "url" => "https://www.mediaoto.id/". $list->slug
                            );
                $x++;
                }

                $listItems = array(
                    "@context" => "http://schema.org",
                    "@type" => "ItemList",
                    "itemListElement" => array($itemListElement)
                );


            echo '<script type="application/ld+json">';
            echo  json_encode($listItems);
            echo '</script>';

            }

        ?>

        @if ( isset($metaproduct) && count($metaproduct) != 0 )

        <script type="application/ld+json">
            @php
                echo  json_encode($metaproduct['product']);
            @endphp
        </script>
        <script type="application/ld+json">
            @php
                echo  json_encode($metaproduct['listItems']);
            @endphp
        </script>


        @endif


    <?php /*
    <script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@type": "WebPage",
        "headline": "{{$post->title}}",
        "url": "{{ route('news.show', $post->slug) }}",
        "datePublished": "{{ Carbon\Carbon::parse($post->published_at)->toIso8601String() }}",
        "image": "{{ $post->getWebpthumb() }}",
        "thumbnailUrl": "{{ $post->getWebpthumb() }}"
    }
    </script>
    */ ?>

    <script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@type": "NewsArticle",
        "mainEntityOfPage": {
            "@type": "WebPage",
            "@id": "{{ route('news.show', $post->slug) }}"
        },
        "headline": "{{$post->title}}",
        "image": {
            "@type": "ImageObject",
            "url": "{{ $post->getWebpthumb() }}"
        },
        "datePublished": "{{ Carbon\Carbon::parse($post->published_at)->toIso8601String() }}",
        "dateModified": "{{ Carbon\Carbon::parse($post->updated_at)->toIso8601String() }}",
        "author": {
            "@type": "Person",
            "name": "{{$post->author->nama}}",
            "url": "https://www.mediaoto.id"
        },
        "publisher": {
            "@type": "Organization",
            "name": "Mediaoto",
            "logo": {
                "@type": "ImageObject",
                "url": "https://www.mediaoto.id/images/black_logo.png"
            }
        },
        "description": "{{$post->description}}"
    }
    </script>
        @else
        <script type="application/ld+json">
            {
              "@context": "https://schema.org",
              "@type": "Organization",
              "image": "https://www.mediaoto.id/images/home_openGraph.png",
              "url": "https://www.mediaoto.id/",
              "sameAs": [
                "https://www.facebook.com/mediaoto.id/",
                "https://www.twitter.com/mediaoto/",
                "https://www.instagram.com/mediaoto.id/"
              ],
              "logo": "https://www.mediaoto.id/images/black_logo.png",
              "name": "Mediaoto",
              "description": "{{__('home.desc')}}",
              "email": "support@mediaoto.id.com",
              "telephone": "+62813-1137-2266",
              "address": {
                "@type": "PostalAddress",
                "streetAddress": "Jakarta Selatan",
                "addressLocality": "Jakarta",
                "addressRegion" : "DKI Jakarta",
                "addressCountry": "ID",
                "postalCode": "12910"
              }
            }
            </script>
        @endif

        <script type="application/ld+json">
            {
                "@context": "http:\/\/schema.org",
                "@type": "SiteNavigationElement",
                "name": "Mediaoto",
                "potentialAction": [
                    { "@type": "action", "name": "Home", "url": "https:\/\/www.mediaoto.id" },
                    { "@type": "action", "name": "News", "url": "https:\/\/www.mediaoto.id\/news" },
                    { "@type": "action", "name": "Policy", "url": "https:\/\/www.mediaoto.id\/policy" }
                ]
            }
        </script>

        <?php
        /*
            if(count($itemlist) > 0 && $itemlist != null){
                $itemListElement = array();
                $x=1;
                foreach ($itemlist as $list) {
                    $itemListElement[] = array
                            (
                            "@type" =>"ListItem",
                            "position" => $x,
                            "url" => "https://www.mediaoto.id/". $list->slug
                            );
                $x++;
                }

                $listItems = array(
                    "@context" => "http://schema.org",
                    "@type" => "ItemList",
                    "itemListElement" => array($itemListElement)
                );


            echo '<script type="application/ld+json">';
            echo  json_encode($listItems);
            echo '</script>';
        }

        */
        ?>


    @if (env('APP_ENV','local') == "production")
        <!-- Google tag (gtag.js B3ac5) -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=G-Q7LP278P3T"></script>
        <script type="text/javascript">function gtag(){dataLayer.push(arguments)}window.dataLayer=window.dataLayer||[],gtag("js",new Date),gtag("config","G-Q7LP278P3T");</script>
        @include('googletagmanager::head')
    @endif
    <?php /*
    <!-- Fonts -->

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    */
    ?>

    <?php /*
    @if (env('APP_ENV','local') == "production")
    <meta name="google-adsense-account" content="ca-pub-1433601050494794">
    <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-1433601050494794"
        crossorigin="anonymous"></script>
    @endif
    */ ?>

    <?php /* <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tw-elements/dist/css/tw-elements.min.css" /> */ ?>

    <?php /* @filamentStyles */ ?>
     <script src="https://cdn.tailwindcss.com"></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <?php /* <script src="https://www.google.com/recaptcha/api.js?render={{ env('RECAPTCHA_SITE_KEY') }}" async></script> */ ?>
    <?php /*** <!-- Styles --> **/ ?>
    @livewireStyles
</head>

<body class="font-sans antialiased dark:bg-gray-700" x-data>
    @if (env('APP_ENV','local') == "production")
    @include('googletagmanager::body')
    @endif
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
    <?php /* @filamentScripts */ ?>
    <script>
        window.filamentData = []    </script>
    @livewireScripts



</body>
</html>
