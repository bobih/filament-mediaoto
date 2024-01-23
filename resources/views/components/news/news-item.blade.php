@props(['post'])
<article
    class="p-6 md:flex md:items-center bg-white rounded-lg border border-gray-200 shadow-md dark:bg-gray-800 dark:border-gray-700">
    <div class="relative px-4 w-80 h-48 pb-1/4" style="min-width: 320px; ">
        <a wire:navigate href="{{ route('news.show', $post->slug)}}">
            <img class="absolute top-0 left-0 right-0 bottom-0 h-full w-full object-fit rounded-lg"
                src="{{$post->getThumbnailImage()}}" alt="{{$post->slug}}">
        </a>
    </div>
    <div class="md:px-4 lg:px-8 w-full">
        <div class="mt-5 flex justify-between items-center mb-5 text-gray-500">
            <span class="text-sm">{{$post->source}} |
                {{$post->published_at}}</span>
                <span class="text-sm">{{$post->getReadingTime()}} min read</span>
        </div>

        <h2 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-gray-300">
            <a wire:navigate href="{{ route('news.show', $post->slug)}}">{{$post->title}}</a></h2>
        <p class="mb-5 font-light text-gray-500 dark:text-gray-400">{{$post->description}}</p>

    </div>
    <div class="px-5 text-center hidden lg:block">
        <a wire:navigate href="{{ route('news.show', $post->slug)}}"
            class=" px-4 py-4 text-[#FF9119] border border-[#FF9119] hover:bg-[#FF9119] hover:text-white focus:ring-1 focus:outline-none focus:ring-[#FF9119] font-medium rounded-full text-sm p-2.5 text-center inline-flex items-center dark:border-[#FF9119] dark:text-[#FF9119] dark:hover:text-white  dark:hover:bg-[#FF9119]">
            <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                viewBox="0 0 14 10">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M1 5h12m0 0L9 1m4 4L9 9" />
            </svg>
            <span class="sr-only">Icon description</span>
        </a>
    </div>
</article>
