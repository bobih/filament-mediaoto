@props(['posts','categories','agent'])

@if ($agent->isMobile() == false)
<div class="fixed w-full h-[460px] top-0 ">
    <video class="w-full " autoplay="" loop="" muted="" plays-inline defaultPlaybackRate="0.2">
        <source src="/videos/news3.webm" type="video/webm">
        Your browser does not support the video tag.
    </video>

</div>
<div class="bg-black/10 relative h-[460px] w-full">
    <div class="fixed h-full w-full text-center">
        <div class="pl-12 mt-[200px] text-start">

            <h1 class=" max-w-2xl mb-4 text-4xl font-bold tracking-tight leading-none md:text-5xl xl:text-5xl dark:text-white">
            Berita Otomotif <br>dan Properti
            </h1>
            <p class="max-w-2xl font-light text-gray-500 lg:mb-8 md:text-lg lg:text-xl dark:text-gray-200">
                Dapatkan Tren Terbaru disini</p>
    </div>

    </div>
</div>
@endif
<?php /*
<section class="md:relative pt-20 md:pt-8  mx-auto md:px-5 flex flex-grow bg-gray-100 dark:bg-gray-900">
<section class="pt-16 md:pt-20 mx-auto md:px-5 flex flex-grow bg-gray-100 dark:bg-gray-900">
*/ ?>
<section class="md:relative pt-20 md:pt-8  mx-auto md:px-5 flex flex-grow bg-gray-100 dark:bg-gray-900">


    <div class="w-full max-w-screen-xl grid grid-cols-4 gap-4">
        <div class="pt-16 md:pt-4 md:col-span-3 col-span-4">
            <div id="posts" class="mb-4 px-3 lg:px-7 ms:py-6">

                @if ($agent->isMobile())
                <div id="mobilesearch" class="ease-in-out duration-500 pt-6 -mt-4 py-4 px-4 bg-gray-100 dark:bg-gray-900 top-20 start-0 z-30 w-full fixed">
                    <livewire:search-box />
                </div>
                @endif
                <div class="grid grid-cols-1 gap-4 md:mb-10">
                    <livewire:news-list />
                </div>
                <?php /*
                <div id="gads-display" class="pt-10 hidden md:block" style="width:100%">
                    <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-1433601050494794"
                        crossorigin="anonymous"></script>
                    <!-- Ads Display -->
                    <ins class="adsbygoogle"
                        style="display:inline-block;width:728px;height:90px"
                        data-ad-client="ca-pub-1433601050494794"
                        data-ad-slot="5053332732"></ins>
                    <script>
                        (adsbygoogle = window.adsbygoogle || []).push({});
                    </script>
                </div>
                */ ?>
            </div>
        </div>
        <div id="side-bar"
            class="hidden md:block col-span-4 md:col-span-1 px-3 h-screen sticky md:pt-4 md:top-20">
            @if (!$agent->isMobile())
            <div class="hidden md:block">
                <livewire:search-box />
            </div>

            @endif

            <div id="recommended-topics-box">
                <h1 class="mb-8 mt-4 text-xl font-bold tracking-tight text-gray-900 dark:text-white">
                    {{__('news.recommended')}} :
                </h1>
                <div class="flex flex-wrap gap-4 gap-y-8 mb-8">
                    @foreach ($categories as $category)
                    <x-news.news-badge wire:navigate title="{{$category->slug}}"  alt="{{$category->slug}}" href="{{ route('news.category', ['category' => $category->slug]) }}"
                        :category='$category' bgColor="{{ $category->bg_color }}"
                        txtColor="{{ $category->text_color }}"
                        class="md:hover:-translate-y-1 md:hover:scale-110 duration-300">
                        {{ $category->title }}
                    </x-news.news-badge>
                    @endforeach
                </div>

                <?php /*
                <div id="gads" class="pt-10 hidden md:block" style="width:100%">
                    <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-1433601050494794"
                        crossorigin="anonymous"></script>
                    <ins class="adsbygoogle"
                        style="display:block; text-align:center;"
                        data-ad-layout="in-article"
                        data-ad-format="fluid"
                        data-ad-client="ca-pub-1433601050494794"
                        data-ad-slot="1216361206"></ins>
                    <script>
                        (adsbygoogle = window.adsbygoogle || []).push({});
                    </script>
                </div>

                */ ?>
            </div>
        </div>
    </div>
</section>

