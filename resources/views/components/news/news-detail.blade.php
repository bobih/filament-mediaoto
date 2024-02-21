@props(['post', 'related','agent','slider'])
<div class="grid grid-cols-1 sm:grid-cols-4 bg-gray-100 dark:bg-gray-900 px-4 md:px-8">

    <div class="col-span-3">
        <main class="pt-20 antialiased">
                    @if ($agent->isMobile())
            <div id="mobilesearch" class="ease-in-out duration-500 pt-6 -mt-4 py-4 px-4 bg-gray-100 dark:bg-gray-900 top-20 start-0 z-30 w-full fixed">
                <livewire:search-box />
            </div>
            @endif

            <div class="mt-20 md:mt-10 flex justify-between px-4 mx-auto max-w-screen-xl ">

                <article class="mx-auto pb-10 w-full max-w-2xl dark:format-invert">
                    @if ($post->author->id != 36)
                    <!-- Author -->
                    <address class="pb-10 md:pb-10 ">
                        <div class="inline-flex items-center mr-3 text-sm text-gray-900 dark:text-white">
                            <img class="mr-4 w-16 h-16 rounded-full" src="https://www.mediaoto.id/images/{{$post->author->image}}" alt="{{$post->author->nama}}">
                            <div>
                                <a href="#" rel="author" class="text-xl font-bold text-gray-900 dark:text-white">{{$post->author->nama}}</a>
                                <p class="text-base text-gray-900 dark:text-gray-400">Content Creative Mediaoto</p>
                                <?php /*
                                <p class="text-base text-gray-500 dark:text-gray-400"><time pubdate datetime="{{ $post->published_at }}" title="{{ $post->published_at }}">{{ $post->published_at }}</time></p>
                                */ ?>
                            </div>
                        </div>
                    </address>
                    @endif

                    <header class="mb-4 lg:mb-6 not-format">
                        <div x-data={} x-on:click="$dispatch('open-image-modal')"  class="w-full h-auto pb-1/4">
                            <img  class="h-auto w-full object-fit drop-shadow-xl rounded-lg "
                                src="{{ $post->getWebp()}}" alt="{{ $post->slug }}">
                        </div>
                        <div class="mt-5 flex justify-between items-center mb-5 text-gray-500">
                            <span class="text-sm">{{ Str::upper($post->source) }} |
                                {{ $post->published_at->diffForHumans() }}</span>
                        </div>
                        <h1
                            class="py-4 text-3xl font-extrabold leading-tight text-gray-900 lg:mb-6 lg:text-4xl dark:text-white">
                            {{ $post->title }}</h1>
                    </header>
                    <div class="dark:text-gray-400 text-justify mb-10 md:mb-10">

                        {!! $post->getFullContent() !!}
                    </div>
                    @if ($category = $post->categories->first())
                    <div class="flex flex-wrap gap-2">
                        @foreach ($post->categories as $category)
                            <x-news.news-badge wire:navigate title="{{$category->slug}}"  alt="{{$category->slug}}" href="{{ route('news.category', ['category' => $category->slug]) }}"
                                :category='$category' bgColor="{{ $category->bg_color }}"
                                txtColor="{{ $category->text_color }}"
                                class="md:hover:-translate-y-1 md:hover:scale-110 duration-300">
                                {{ $category->title }}
                            </x-news.news-badge>
                        @endforeach
                    </div>
                    @endif
                    <div class="pt-8 flex flex-wrap">
                        @foreach ($post->tags as $tag)
                            <x-news.news-tag wire:navigate title="{{$tag->slug}}"  alt="{{$tag->slug}}" wire:navigate href="{{ route('news.tag', ['tag' => $tag->slug]) }}"
                                name="{{ $tag->name }}" slug="{{ $tag->slug }}"
                                class="hover:-translate-y-1 hover:scale-110 duration-300">
                            </x-news.news-tag>
                        @endforeach
                    </div>
                    </section>
                </article>
            </div>
        </main>
    </div>
    <!-- right -->
    <div class="md:col-span-1 md:sticky md:top-0 md:h-[2000px]">
        <main class="sm:pt-20 pb-10 bg-gray-100 dark:bg-gray-900 antialiased">
            <div class="mt-10  max-w-screen-xl ">
                @if (!$agent->isMobile())
                <div class="hidden md:block mb-4">
                    <livewire:search-box />
                </div>

                @endif

                <h2 class="mb-8 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                    {{__('news.related_news')}}
                </h2>
                <div class="grid gap-8 lg:grid-cols-1">
                    @foreach ($related as $post)
                        <x-news.news-card :post="$post" />
                    @endforeach
                </div>
                <?php /*
                <div id="mobileads" class="md:hidden">
                    <div id="mobilegads" class="pt-10">
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
                </div>
                */
                ?>
            </div>
        </main>
    </div>
    <?php /*    @livewire('image-carousel') */ ?>

    <x-custom-carousel>
        @slot('body')
        @endslot
    </x-custom-carousel>

</div>
