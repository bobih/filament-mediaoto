<section class="bg-white dark:bg-gray-900">
    <div class="py-8 px-4 mx-auto max-w-screen-xl lg:py-16 lg:px-6">

        <div class="mt-12 mx-auto p-5 bg-gray-200 dark:bg-white/20 rounded-lg justify-center flex w-80 text-center  shadow-lg mb-10">
            <button type="button" class="w-40 py-2.5 px-5 me-2 mb-2 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700  shadow-lg" >News</button>
            <button type="button" class="w-40 py-2.5 px-5 me-2 mb-2 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Tips & Tricks</button>
        </div>

        <!-- News Section -->
        <div class="my-3">
            {{$this->posts->onEachSide(1)->links()}}
        </div>
        <div class="grid gap-1 lg:grid-cols-1">

            @foreach ($this->posts as $post )
                <x-news.news-item :post="$post" />
            @endforeach

        </div>
        <div class="my-3">
            {{$this->posts->onEachSide(1)->links()}}
        </div>
    </div>
</section>
