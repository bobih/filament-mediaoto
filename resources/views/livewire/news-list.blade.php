
<?php /*
<section class="pt-20 bg-white dark:bg-gray-900">
    <div class="pt-4 md:pt-8 px-4 mx-auto max-w-screen-xl">
        <div class="grid grid-cols-1 sm:grid-cols-4 gap-4 bg-white dark:bg-gray-900">
            <div class="grid grid-cols-1 gap-4 col-span-3 pb-20">
                <div class="sm:block md:hidden pb-4">
                    @livewire('search-box')
                </div>
                @foreach ($this->posts as $post)
                    <x-news.news-item :post="$post" />
                @endforeach
                <div class="my-3">
                    {{ $this->posts->onEachSide(1)->links() }}
                </div>
            </div>
            <!-- right -->
            <div class="col-span-1 ">
                <main class="pb-10 bg-white dark:bg-gray-900 antialiased">
                    <div class="max-w-screen-xl ">
                        <div class="hidden md:block">
                            @livewire('search-box')
                        </div>
                        <h2 class="mb-8 mt-10 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                            Latest News
                        </h2>
                        <div class="grid grid-cols-1 gap-4">
                            @foreach ($this->latest as $post)
                                <article
                                    class="p-4 bg-white rounded-lg border border-gray-200 shadow-md dark:bg-gray-800 dark:border-gray-700">
                                    <div class=" px-4 pb-4">
                                        <a wire:navigate href="{{ route('news.show', $post->slug) }}">
                                            <img class=" top-0 left-0 right-0 bottom-0 h-full w-full object-fit rounded-lg"
                                                src="{{ $post->image }}" alt="{{ $post->slug }}">
                                        </a>
                                    </div>

                                    <h2 class="mb-2 tracking-tight text-gray-900 dark:text-white""><a wire:navigate
                                            href="{{ route('news.show', $post->slug) }}">{{ $post->title }}</a></h2>

                                </article>
                            @endforeach
                        </div>

                    </div>
                </main>
            </div>
        </div>
    </div>
</section>
*/ ?>



<section class="pt-20  mx-auto md:px-5 flex flex-grow bg-white dark:bg-gray-900">
    <div class="w-full max-w-screen-xl grid grid-cols-4 gap-4">
        <div class="pt-16 md:pt-4 md:col-span-3 col-span-4">
            <div id="posts" class=" px-3 lg:px-7 ms:py-6">
                <div class="sm:block -mt-4 py-4 px-4 bg-white dark:bg-gray-900 top-20 start-0 z-30 w-full fixed md:hidden">
                    <?php /*                 <div class="sm:block py-4  bg-white dark:bg-gray-900 top-20 start-0 z-50 sticky md:hidden">
                        */ ?>


                    @livewire('search-box')

                </div>

                <div class="grid grid-cols-1 gap-4 md:mb-10">
                    @foreach ($this->posts as $post)
                    <x-news.news-item :post="$post" />
                    @endforeach
                    <div class="p-10 my-3">
                        {{ $this->posts->onEachSide(1)->links() }}
                    </div>
                </div>
            </div>
        </div>
        <div id="side-bar"
            class="hidden md:block col-span-4 md:col-span-1 px-3 h-screen sticky md:pt-4 md:top-20">
            <div class="hidden md:block">
                @livewire('search-box')
            </div>

            <div id="recommended-topics-box">
                <h2 class="mb-8 mt-4 text-xl font-bold tracking-tight text-gray-900 dark:text-white">
                    Latest News
                </h2>
                <div class="grid grid-cols-1 gap-4">

                    @foreach ($this->latest as $post)
                    <article
                        class="p-4p-4 bg-white dark:bg-gray-900 ">
                        <?php /*
                        <div class="px-4 pb-4">
                            <a wire:navigate href="{{ route('news.show', $post->slug) }}">
                                <img class=" top-0 left-0 right-0 bottom-0 h-full w-full object-fit rounded-lg"
                                    src="{{ $post->image }}" alt="{{ $post->slug }}">
                            </a>
                        </div>
                        */ ?>

                        <h2 class="mb-2 tracking-tight text-gray-900 dark:text-white""><a wire:navigate
                                href="{{ route('news.show', $post->slug) }}">{{ $post->title }}</a></h2>
                                <p class="mb-5 font-light text-gray-500 dark:text-gray-400">{{$post->description}}</p>
                    </article>
                @endforeach

                </div>
            </div>
        </div>
    </div>
</section>
