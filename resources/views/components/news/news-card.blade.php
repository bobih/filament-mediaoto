@props(['post'])
<article class="p-6 bg-white rounded-lg border border-gray-300 shadow-md dark:bg-gray-800 dark:border-gray-700">
    <div class=" px-4 pb-4">
        <a wire:navigate href="{{ route('news.show', $post->slug) }}"
            >
            <img loading="lazy" class="md:hover:-translate-y-1 md:hover:scale-110 duration-300 top-0 left-0 right-0 bottom-0 h-full w-full object-fit rounded-lg"
                src="{{ $post->getWebpthumb()}}" alt="{{ $post->slug }}" title="{{ $post->title }}">
        </a>
    </div>
    <div class="flex justify-between items-center mb-5 text-gray-500">
        <span class="text-sm">{{ Str::upper($post->source) }}</span>
        <span class="text-sm">{{ $post->published_at->diffForHumans() }}</span>
    </div>
    <h2 class="mb-2 text-xl font-bold tracking-tight text-gray-900 dark:text-white">
        <a wire:navigate href="{{ route('news.show', $post->slug) }}"
            class="md:hover:text-[#FF9119] md:hover:transition duration-700 ease-in-out">{{ $post->title }}</a>
    </h2>
    <p class="mb-5 text-justify dark:text-gray-400">{{ $post->description }}</p>
    <div class="flex justify-between items-center">

        @if ($post->author->id != 36)
         <a wire:navigate href="{{ route('news.author', Str::slug($post->author->nama)) }}">
            <div class="flex items-center space-x-4">

                    <img class="w-7 h-7 rounded-full" src="{{env('IMAGE_URL','https://www.mediaoto.id')}}/images/{{$post->author->image}}" alt="{{$post->author->nama}}" />
                    <span class="font-medium dark:text-white">
                        {{$post->author->nama}}
                    </span>

            </div>
        </a>
        @endif



        <?php /********* 'Read More' get Flag by Google !! **********/ ?>

        <a wire:navigate href="{{ route('news.show', $post->slug) }}"
            class="inline-flex items-center font-medium text-primary-600 dark:text-primary-500 hover:underline">
            Full Article
            <svg class="ml-2 w-4 h-4" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd"
                    d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z"
                    clip-rule="evenodd"></path>
            </svg>
        </a>
    </div>
</article>
