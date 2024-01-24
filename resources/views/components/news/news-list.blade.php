@props(['posts','categories'])
<section class="pt-20  mx-auto md:px-5 flex flex-grow bg-gray-100 dark:bg-gray-900">
    <div class="w-full max-w-screen-xl grid grid-cols-4 gap-4">
        <div class="pt-16 md:pt-4 md:col-span-3 col-span-4">
            <div id="posts" class="mb-4 px-3 lg:px-7 ms:py-6">
                <div class="sm:block pt-6 -mt-4 py-4 px-4 bg-gray-100 dark:bg-gray-900 top-20 start-0 z-30 w-full fixed md:hidden">
                    <livewire:search-box />
                </div>
                <div class="grid grid-cols-1 gap-4 md:mb-10">
                    <livewire:news-list />
                </div>
            </div>
        </div>
        <div id="side-bar"
            class="hidden md:block col-span-4 md:col-span-1 px-3 h-screen sticky md:pt-4 md:top-20">
            <div class="hidden md:block">
                <livewire:search-box />
            </div>

            <div id="recommended-topics-box">
                <h2 class="mb-8 mt-4 text-xl font-bold tracking-tight text-gray-900 dark:text-white">
                    Recommended Topics :
                </h2>
                <div class="flex flex-wrap justify-start gap-4">
                    @foreach ($categories as $category)
                        <x-news.news-badge
                            wire:navigate
                            href="{{route('news.index',['category'=>$category->slug])}}"
                            :category='$category'
                            bgColor="{{$category->bg_color}}"
                            txtColor="{{$category->text_color}}" >
                            {{$category->title}}
                        </x-news.news-badge>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
