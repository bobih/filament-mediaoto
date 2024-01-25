@props(['post', 'related'])


<div class="grid grid-cols-1 sm:grid-cols-4 bg-gray-100 dark:bg-gray-900 px-4 md:px-8">
    <div class="col-span-3">
        <main class="pt-20 antialiased">


            <div class="mt-10 flex justify-between px-4 mx-auto max-w-screen-xl ">

                <article
                    class="mx-auto w-full max-w-2xl dark:format-invert">
                    <header class="mb-4 lg:mb-6 not-format">
                        <div class="px-4 w-full h-auto pb-1/4">
                            <img class="h-auto w-full object-fit drop-shadow-xl rounded-lg" src="{{ $post->getThumbnailImage() }}"
                                alt="{{ $post->slug }}">

                        </div>
                        <div class="mt-5 flex justify-between items-center mb-5 text-gray-500">
                            <span class="text-sm">{{ Str::upper($post->source)}} | {{$post->published_at->diffForHumans()}}</span>
                        </div>
                        <h1
                            class="py-4 text-3xl font-extrabold leading-tight text-gray-900 lg:mb-6 lg:text-4xl dark:text-white">
                            {{ $post->title }}</h1>
                    </header>
                    <div class="dark:text-gray-400 md:mb-10">

                        {!! $post->content !!}
                    </div>
                    @if ($category = $post->categories->first())
                    @foreach ($post->categories as $category)
                        <x-news.news-badge wire:navigate href="{{ route('news.index', ['category' => $category->slug]) }}"
                            :category='$category' bgColor="{{ $category->bg_color }}" txtColor="{{ $category->text_color }}">
                            {{ $category->title }}
                        </x-news.news-badge>
                    @endforeach
                @endif
                    </section>
                </article>
            </div>
        </main>
        <?php /*
        <!-- Author -->
        <address class="pt-10 md:pb-20 mx-auto w-full max-w-2xl">
            <div class="inline-flex items-center mr-3 text-sm text-gray-900 dark:text-white">
                <img class="mr-4 w-16 h-16 rounded-full" src="https://www.mediaoto.id/images/{{$post->author->image}}" alt="{{$post->author->nama}}">
                <div>
                    <a href="#" rel="author" class="text-xl font-bold text-gray-900 dark:text-white">{{$post->author->nama}}</a>
                    <p class="text-base text-gray-500 dark:text-gray-400">Programmer, educator & Content Creative Mediaoto</p>
                    <p class="text-base text-gray-500 dark:text-gray-400"><time pubdate datetime="{{ $post->published_at }}" title="{{ $post->published_at }}">{{ $post->published_at }}</time></p>
                </div>
            </div>
        </address>

        */ ?>
    </div>

    <!-- right -->
    <div class="col-span-1 ">
        <main class="sm:pt-20 pb-10 bg-gray-100 dark:bg-gray-900 antialiased">
            <div class="mt-10  max-w-screen-xl ">
                <h2 class="mb-8 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                    Related News
                </h2>

                <div class="grid gap-8 lg:grid-cols-1">

                    @foreach ($related as $post )
                        <x-news.news-card :post="$post" />
                    @endforeach
                </div>
            </div>
        </main>
    </div>
</div>
