@props(['post', 'categories'])
<?php /* Ignore */ ?>


<article wire:ignore
    class="mt-20 md:mt-0 p-6 md:flex md:items-center bg-white rounded-lg border border-gray-300 shadow-md dark:bg-gray-800 dark:border-gray-700 ">
    <div class="-mt-20 md:mt-0  md:px-4 pb-4 md:w-full" >
        <a wire:navigate title="{{ $post->title }}" alt="{{$post->title}}" href="{{ route('news.show', $post->slug) }}"
            class="md:hover:text-[#FF9119]">
            <img  loading="lazy" class="md:hover:-translate-y-1 md:hover:scale-110 top-0 left-0 right-0 bottom-0 h-full w-full object-fit border dark:border-gray-700 shadow-xl rounded-lg scale-50 opacity-0 intersect:scale-100 intersect:opacity-100 intersect-once transition duration-700"
                src="{{ $post->getWebpthumb()}}" alt="{{ $post->slug }}">
        </a>
    </div>
    <div class="md:px-4 lg:px-8 w-full">
        <div class="mt-5 flex justify-between items-center mb-5 text-gray-500">
            <span class="text-sm">{{ Str::upper($post->source) }} |
                {{ $post->published_at->diffForHumans() }}</span>
            <span class="text-sm">{{ round($post->getReadingTime(),1) }} min read</span>
        </div>

        <h2 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-gray-300">
            <a wire:navigate title="{{ $post->title }}"  href="{{ route('news.show', $post->slug) }}"
                class="md:hover:text-[#FF9119]">{{ $post->title }}</a>
        </h2>
        <p class="mb-5 mt-4 md:mb-10 text-justify dark:text-gray-400">{{ $post->description }}</p>
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


    </div>
    <?php /*
    <!-- Arrows -->
    <div class="px-5 text-center hidden lg:block">
        <a  href="{{ route('news.show', $post->slug) }}"
            class=" px-4 py-4 text-[#FF9119] border border-[#FF9119] hover:bg-[#FF9119] hover:text-white focus:ring-1 focus:outline-none focus:ring-[#FF9119] font-medium rounded-full text-sm p-2.5 text-center inline-flex items-center dark:border-[#FF9119] dark:text-[#FF9119] dark:hover:text-white  dark:hover:bg-[#FF9119]">
            <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                viewBox="0 0 14 10">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M1 5h12m0 0L9 1m4 4L9 9" />
            </svg>
            <span class="sr-only">Icon description</span>
        </a>
    </div>
    */ ?>
</article>
