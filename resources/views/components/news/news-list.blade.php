@props(['posts','categories','agent'])
<video class="fixed w-full" autoplay loop muted>
    <source src="/videos/news.webm" type="video/webm">
    Your browser does not support the video tag.
  </video>
<div>
    <div class="z-10 mr-auto place-self-center lg:col-span-7">

        <h1 data-te-animation-init
        data-te-animation-start="onScroll"
        data-te-animation-on-scroll="repeat"
        data-te-animation-show-on-load="false"
        data-te-animation-reset="true"
        data-te-animation="[fade-in_1s_ease-in-out]"
        class=" max-w-2xl mb-4 text-4xl font-bold tracking-tight leading-none md:text-5xl xl:text-5xl dark:text-white">
            {!! trans('home.banner.infotag') !!}
        </h1>
        <p  class="max-w-2xl mb-6 font-light text-gray-500 lg:mb-8 md:text-lg lg:text-xl dark:text-gray-200">{!! trans('home.banner.content1') !!}</p>
    <div class="hidden md:flex justify-between items-center">
        <div>
            <button title="getstarted" x-data={} x-on:click="$dispatch('open-modal')"
                class="inline-flex items-center justify-center px-5 py-3 text-base font-medium text-center text-gray-900 border border-gray-400 rounded-lg hover:bg-white focus:ring-4 focus:ring-gray-100 dark:text-white dark:border-gray-500 dark:hover:bg-gray-700 dark:focus:ring-gray-800">
                {{__('home.banner.button1')}}
                <svg class="w-5 h-5 ml-2 -mr-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
            </button>
        </div>
        <div class="w-24 text-black dark:text-white ">
            <svg class="w-24 h-24" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 200 201"><path d="M0 21.3v21.3h42.4V0H0v21.3Zm36.3 0v15.2H6V6h30.2v15.2Z"/><path d="M12.2 21.3v9h18v-18h-18v9ZM48.5 3v3.1h18.3v12.3h-6.1v-6.1h-6.1v6h6v12h-6v6.2h-6.1v12.2h6v6.1h-12v-6h-6.1v6h6V61h-6v6h6v6.2h-6V79h6v6.2h-6v6h-6v-6h-6v12.2H12.3v12.3H6v12.2H0v30.3h12.2v-6h6v6h6.2v-6h-6.1V140h30.2v18.4h12.2v-6.1h-6.1V140h12.2v12.3h11.9v6h-12v6.2h-12v6.1h-6.1v12h6v-12h6.2v6.1h6v5.9h-6v6.1H48.5V201h18.3v-6.2h-6.1v-6h12.1V201h36.3v-6.2h-6v-6h6v-6.2h6.1V201h6.1v-12.3h5.8v-6h12.2v6h-6v6.2h6v6H176v-6h24v-18.2h-6v-6h-6.2v-12.3h6.1V146h-6v-6H200v-6.2h-6v-6.1h-6.2V140h-6v6.1h6v6.2h-6v12.2h-5.9v-18.4h-18.3v-6h6.1v-6.2h-12.2v12.2h-6v12.3h-6.1v-6.1h-6.1v12.2h6v12.3h-12.1v-6.1h-5.9v6h-18.2v6H97v-6h-6.1v-6h-6.1v6h-18v-6h6v-6.2h12v-6h6v6H97v6.2h6v-6.2h-6v-6h18.2v6h12v-6h-12v-6.2h6.1v-6.1h5.9V140h6v6h6.1v-6h6.1v-12.3h6.1V122h12.2v5.8h6.1v6.1h12v-6h-12v-6h6v-6h-6v-6.2h6v-6.1h6v-6.1h6v12.2h6v6.1h-12.1v6.2H200V91.3h-6.1v6.2h-6.1v-6.2h-6v6.2h-6v-6.2h-12.1v6.2h-6v-6.2h-6.2v6.2h-6v-6.2h-6.2v-6h6.1v-12h12.2V79h-6v6.1h6v-6h6.1v6h6.1v-18h6v6h12V79H200v-5.9h-12.2v-6H200V61h-6.1v-6h6v-6.1h-6v6h-12.2V61h6.1v6.1h-12V55h-12.1v-6.1h-6v6h6V61h6v6.1h-12.1V61h-6v6.1h-6.2V55h-6V36.5h6v6.1h6.1V30.4h-12.2v6h-6V55H127V30.3h6.1v-12h6.1v6.2h12.2v-6.1h-6v-6.2h-12.3V0h-6v12.3h-5.9V6h-6V0H109v12.3h12.2v6h-6v6.2H109v-6.1h-6V6h-6v6.1h-6.1v-6h-6.1V0h-6.1v6.1h-5.8V0H48.5v3Zm30.2 15.4v6h6v-12H91v6h6v24.3h-6v-6.1h-6.1v6h-6.1v-6h-5.9v18.3h5.9v-6h6v6h6.1v-6H97v6h-6V61H73v6h11.8v6.2h-6V79h6v12.3h-12v6.1H60.6v6.1h6.1v6.2h6.1v-6.2h5.9v-6h12.1v-6.2H103v-6.1h6.1v6.1h12.2v6.1h-6v6.1H103v12.3h6.1v-6.1h6.1v6h-6v6.2H103v-6.1h-6v-12.3h6v-6H90.8v12.2h-18v6h5.9v12h-5.9v6.2h5.9v6.1h-5.9v-6.1h-6v-6.1h6v-12h-6v6.1H54.5V140h-6.1v-12.2h-6.1v6h-18v-6h-6.1V140h-6.1v6.1h-6V134h6v-6.1h-6V122h24v5.9h12.3V122h-6.1v-6.1h-12v-6.1h5.9v-6.2h12.2v-6h-6.1v-6.2h6v-6.1h12.3V79H42.4v-5.9h12.2V67h6v-6h-6v-6.1h6V42.6h-6v-6.1h6v-6.1h6.2v6h6v-6h5.9v-5.9h-5.8V12.2h5.8v6.2Zm48.4 3v3h-5.8v-6h5.9v3Zm-5.8 18.1v9.2h-6V36.5h-6.1v12.2H103V36.5h6v-6.2h12.2v9.2Zm-6 18.4v3h6v-6h5.9v6h6v6.2h12.2v6.1h-6v12h-24.2V79h-12.1v-5.9H97V79h-6.1v-5.9h6V67h6.2v6.1h6V54.8h6.1v3ZM48.4 64v3h-6.1v-6h6v3Zm90.8 30.4v3h6.1v12.3h6.1v-6.1h6.1v6h6.1v6.2h-12.2v6.1h-12.2V140h-6v-6h-12v12h-6v6.2H103V146h12.2v-6H103v-6.2h-6v-6.1h-6.1V140h6v6.2h-6v6h-6.1v-36.4h6v6.1H97v5.9h6v6h18.3V122h5.8v-6.1h-5.8v-6.1h5.8V91.3h12.2v3Zm-121 18.3v3.1h-6.1v-6.1h6v3Zm151.5 48.8v9.2h-18.3v-18.4h18.3v9.2Zm18 15.1v6h-18v6.2h6v6h-6v-6h-6v6h-24.5v-6h18.3v-6.2h-18.3v-5.8h24.4v5.8h6.1v-5.8h12v-6.1h6v6Zm-97 9v3.2H97v6h-6.1v-6h-6.1v6h-6.1v-6h-5.8v-6.2h18v3Z"/><path d="M60.7 39.5v3h6v-6h-6v3Zm0 18.5v3h6v-6.2h-6V58Zm-6.1 18.1v3h6v6h-6v6.2h-6.1v18.4H36.3v6h6v6.2h6.2v-12.2h6V91.3h6.2v-6.1h6v-12H54.6v3Zm18.2 6v3h5.9v-6h-5.9v3Zm-12.1 30.7v3h6v-6.1h-6v3ZM121.3 70v9h5.9V61h-5.9v9Zm11.9 30.5v3h6.1v-6h-6v3Zm-6 12.3v3h18.2v-6.1h-18.3v3Zm30.4 48.7v3h6.1v-6h-6v3Zm0-140.2v21.3H200V0h-42.4v21.3Zm36.3 0v15.2h-30.2V6H194v15.2Z"/><path d="M169.8 21.3v9h18v-18h-18v9ZM0 58v9h6v6.1H0v12h6v6.1h6.2v-6.1h6V79h12V61h-5.8v-6.2h5.8v-6h-12V61h6.2v12.2h-6.1v5.9H6v-5.9h6v-6H6V54.8h6v-6.2H0V58Zm0 42.5v3h6v-6H0v3Zm30.2 48.7v3h12.2v-6H30.2v3ZM0 179.7V201h42.4v-42.6H0v21.3Zm36.3 0v15.2H6v-30.4h30.2v15.2Z"/><path d="M12.2 179.7v9h18v-18h-18v9Z"/></svg>
        </div>

    </div>
    @if ($agent->isMobile())
    <div class="flex w-full justify-between ">
        <div class="block md:hidden">
            <button title="getstarted" x-data={} x-on:click="$dispatch('open-modal')"
                class="inline-flex items-center justify-center px-5 py-3 text-base font-medium text-center text-gray-900 border border-gray-400 rounded-lg hover:bg-white focus:ring-4 focus:ring-gray-100 dark:text-white dark:border-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-800">
                {{__('home.banner.button1')}}
                <svg class="w-5 h-5 ml-2 -mr-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
            </button>
        </div>

    </div>
    @endif

</div>
</div>
<section class="pt-20  mx-auto md:px-5 flex flex-grow bg-gray-100 dark:bg-gray-900">

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

