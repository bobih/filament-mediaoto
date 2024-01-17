<div id="news" class="-mt-20 mb-20"></div>
<section class="bg-white dark:bg-gray-900">
    <div class="py-8 px-4 mx-auto max-w-screen-xl lg:py-16 lg:px-6">

        <div class="mx-auto max-w-screen-md text-center mb-8 lg:mb-12">
            <h2 class="mb-4 text-4xl tracking-tight font-bold text-gray-900 dark:text-white">Information</h2>
            <p class="mb-5 font-light text-gray-500 sm:text-xl dark:text-gray-400">Get insight about News and Tips & Tricks.</p>
        </div>

        <div class="mx-auto p-5 bg-gray-200 dark:bg-white/20 rounded-lg justify-center flex w-80 text-center  shadow-lg mb-10">
            <button type="button" class="w-40 py-2.5 px-5 me-2 mb-2 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700  shadow-lg" >News</button>
            <button type="button" class="w-40 py-2.5 px-5 me-2 mb-2 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Tips & Tricks</button>
        </div>

        <!-- News Section -->

        <div class="grid gap-1 lg:grid-cols-1">
            @for ($i=0; $i < 5; $i++)

            <article
            class="p-6 md:flex md:items-center bg-white rounded-lg border border-gray-200 shadow-md dark:bg-gray-800 dark:border-gray-700">
            <div class="relative px-4 w-80 h-48 pb-1/4" style="
            min-width: 320px; " >
                <a href="#">
                    <img class="absolute top-0 left-0 right-0 bottom-0 h-full w-full object-fit rounded-lg" src="{{$posts[$i]['image']}}" alt="Michael Avatar">
                </a>
            </div>
            <div class="md:px-4 lg:px-8 w-full">
                <div class="mt-5 flex justify-between items-center mb-5 text-gray-500">
                    <span class="text-sm">{{ Str::upper($posts[$i]['source'])}} | {{$posts[$i]['published_at']    }}</span>
                </div>

                <h2 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-gray-300"><a
                        href="#">{{$posts[$i]['title']}}</a></h2>
                <p class="mb-5 font-light text-gray-500 dark:text-gray-400">{{$posts[$i]['description']}}</p>

            </div>
            <div class="px-5 text-center hidden lg:block">
                <button type="button"
                    class=" px-4 py-4 text-[#FF9119] border border-[#FF9119] hover:bg-[#FF9119] hover:text-white focus:ring-1 focus:outline-none focus:ring-[#FF9119] font-medium rounded-full text-sm p-2.5 text-center inline-flex items-center dark:border-[#FF9119] dark:text-[#FF9119] dark:hover:text-white  dark:hover:bg-[#FF9119]">
                    <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 14 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M1 5h12m0 0L9 1m4 4L9 9" />
                    </svg>
                    <span class="sr-only">Icon description</span>
                </button>
            </div>



        </article>
        @endfor

        </div>
    </div>
</section>
