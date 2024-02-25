<section class="bg-gray-100 dark:bg-gray-900">
    <div class="py-8 px-4 mx-auto max-w-screen-xl lg:py-16 lg:px-6">
        <div class="mx-auto max-w-screen-md text-center mb-8 lg:mb-12">
            <h2 data-te-animation-init
            data-te-animation-start="onScroll"
            data-te-animation-on-scroll="repeat"
            data-te-animation-show-on-load="false"
            data-te-animation-reset="true"
            data-te-animation="[fade-in_1s_ease-in-out]" class="mb-4 text-4xl tracking-tight font-bold text-gray-900 dark:text-white">
                {{ __('home.services.infotag') }}</h2>
            <p class="mb-5 font-light text-gray-500 sm:text-xl dark:text-gray-400">{{ __('home.services.titletag') }}</p>
        </div>
        <div class="hidden md:grid md:grid-cols-2 md:gap-3">
            <figure class="mb-10 md:mb-0 relative shadow-xl  scale-50 opacity-0 intersect:scale-100 intersect:opacity-100 intersect-once transition duration-700">
                <img loading="lazy" class="w-full brightness-75 duration-300 hover:filter-none ease-in-out rounded-lg shadow-xl"
                    src="{{env('IMAGE_URL','https://www.mediaoto.id')}}/images/services_1.webp" alt="Performance Optimization"
                    title="Performance Optimization">
                <div
                    class="invisible md:visible absolute flex items-center justify-center top-0 w-16 left-10 h-16 bg-[#FF9119] rounded-b-lg">
                    <span class=" text-white text-xl ">01</span>
                </div>
                <figcaption class="bottom-5 absolute px-8 text-lg text-white ">
                    <h2 class="text-2xl text-[#FF9119]">{{ __('home.services.service1tag') }}</h2>
                    <p class="text-base pr-20">{{ __('home.services.service1desc') }}</p>
                </figcaption>
            </figure>

            <figure class="mb-10 md:mb-0 relative shadow-xl scale-50 opacity-0 intersect:scale-100 intersect:opacity-100 intersect-once transition duration-700 delay-200">
                <img loading="lazy" class="w-full brightness-75 duration-300 hover:filter-none ease-in-out rounded-lg shadow-xl"
                    src="{{env('IMAGE_URL','https://www.mediaoto.id')}}/images/services_2.webp" alt="Media Buying Agency"
                    title="Media Buying Agency">
                <div
                    class="invisible md:visible absolute flex items-center justify-center top-0 w-16 left-10 h-16 bg-[#FF9119] rounded-b-lg">
                    <span class=" text-white text-xl ">02</span>
                </div>
                <figcaption class="bottom-5 absolute px-8 text-lg text-white">
                    <h2 class="brightness-100 text-2xl text-[#FF9119]">{{ __('home.services.service2tag') }}</h2>
                    <p class="text-base pr-20">{{ __('home.services.service2desc') }}</p>
                </figcaption>
            </figure>

            <figure class="mb-10 md:mb-0 relative shadow-xl scale-50 opacity-0 intersect:scale-100 intersect:opacity-100 intersect-once transition duration-700">
                <img loading="lazy" class="w-full brightness-75 duration-300 hover:filter-none ease-in-out rounded-lg shadow-xl"
                    src="{{env('IMAGE_URL','https://www.mediaoto.id')}}/images/services_3.webp" alt="Placement" title="Placement">
                <div
                    class="invisible md:visible absolute flex items-center justify-center top-0 w-16 left-10 h-16 bg-[#FF9119] rounded-b-lg">
                    <span class=" text-white text-xl ">03</span>
                </div>
                <figcaption class="bottom-5 absolute px-8 text-lg text-white">
                    <h2 class="brightness-100 text-2xl text-[#FF9119]">{{ __('home.services.service3tag') }}</h2>
                    <p class="text-base pr-20">{{ __('home.services.service3desc') }}</p>
                </figcaption>
            </figure>

            <figure class="mb-10 md:mb-0 relative shadow-xl scale-50 opacity-0 intersect:scale-100 intersect:opacity-100 intersect-once transition duration-700 delay-200">
                <img loading="lazy" class="w-full brightness-75 duration-300 hover:filter-none ease-in-out rounded-lg shadow-xl"
                    src="{{env('IMAGE_URL','https://www.mediaoto.id')}}/images/services_4.webp" alt="Rich Media Banner Placement"
                    title="Rich Media Banner Placement">
                <div
                    class="invisible md:visible absolute flex items-center justify-center top-0 w-16 left-10 h-16 bg-[#FF9119] rounded-b-lg">
                    <span class=" text-white text-xl ">04</span>
                </div>
                <figcaption class="bottom-5   absolute px-8 text-lg text-white">
                    <h2 class="brightness-100 text-2xl text-[#FF9119]">{{ __('home.services.service4tag') }}</h2>
                    <p class="text-base pr-20">{{ __('home.services.service4desc') }}</p>
                </figcaption>
            </figure>

        </div>

        <?php /***** Mobile ****/?>


        <?php /*

        <div class="md:hidden md:grid md:grid-cols-2 md:gap-1">
            <figure class="relative mb-10 md:mb-0 dark:bg-gray-800 rounded-lg shadow-xl">
                <img class="w-full rounded-lg shadow-xl brightness-80" src="https://www.mediaoto.id/images/services_1.webp"
                    alt="Performance Optimization" title="Performance Optimization">
                <figcaption class="px-4 my-4 text-lg pb-4">
                    <h2 class="absolute bottom-28 mb-2 brightness-100 text-2xl text-[#FF9119]">{{__('home.services.service1tag')}}</h2>
                    <p class="0in-h-[88px] text-gray-500 sm:text-xl dark:text-gray-400 text-base pr-10">{{__('home.services.service1desc')}}</p>
                </figcaption>
            </figure>


            <figure class="relative mb-10 md:mb-0 dark:bg-gray-800 rounded-lg shadow-xl">
                <img class="w-full rounded-lg shadow-xl brightness-80" src="https://www.mediaoto.id/images/services_2.webp"
                    alt="Media Buying Agency" title="Media Buying Agency">
                    <figcaption class="px-4 my-4 text-lg pb-4">
                    <h2 class="absolute bottom-28 mb-2 brightness-100 text-2xl text-[#FF9119]">{{__('home.services.service2tag')}}</h2>
                    <p class="0in-h-[88px] text-gray-500 sm:text-xl dark:text-gray-400 text-base pr-10">{{__('home.services.service2desc')}}</p>
                </figcaption>
            </figure>

            <figure class="relative mb-10 md:mb-0 dark:bg-gray-800 rounded-lg shadow-xl">
                <img class="w-full rounded-lg shadow-xl brightness-80" src="https://www.mediaoto.id/images/services_3.webp"
                    alt="Placement" title="Placement">
                    <figcaption class="px-4 my-4 text-lg pb-4">
                    <h2 class="absolute bottom-28 mb-2 brightness-100 text-2xl text-[#FF9119]">{{__('home.services.service3tag')}}</h2>
                    <p class="0in-h-[88px] text-gray-500 sm:text-xl dark:text-gray-400 text-base pr-10">{{__('home.services.service3desc')}}</p>
                </figcaption>
            </figure>

            <figure class="relative mb-10 md:mb-0 dark:bg-gray-800 rounded-lg shadow-xl">
                <img class="w-full rounded-lg shadow-xl brightness-80" src="https://www.mediaoto.id/images/services_4.webp"
                    alt="Rich Media Banner Placement" title="Rich Media Banner Placement">
                    <figcaption class="px-4 my-4 text-lg pb-4">
                    <h2 class="absolute bottom-28 mb-2 brightness-100 text-2xl text-[#FF9119]">{{__('home.services.service4tag')}}</h2>
                    <p class="0in-h-[88px] text-gray-500 sm:text-xl dark:text-gray-400 text-base pr-10">{{__('home.services.service4desc')}}</p>
                </figcaption>
            </figure>
        </div>

        */
        ?>




        <?php /*

        <div id="indicators-carousel" class="md:hidden relative h-[350px] w-full" data-carousel="slide">
            <!-- Carousel wrapper -->
            <div class="relative h-[350px] overflow-hidden rounded-lg md:h-96">
                <!-- Item 1 -->
                <div class="hidden duration-700 ease-in-out" data-carousel-item="active">
                    <figure class="relative mb-10 md:mb-0 dark:bg-gray-800 rounded-lg shadow-xl">
                        <img class="w-full rounded-lg shadow-xl brightness-80"
                            src="https://www.mediaoto.id/images/services_1_mobile.webp" alt="Performance Optimization"
                            title="Performance Optimization">
                        <figcaption class="px-4 my-4 text-lg pb-4">
                            <h2 class="absolute bottom-28 mb-2 brightness-100 text-2xl text-[#FF9119]">
                                {{ __('home.services.service1tag') }}</h2>
                            <p class="0in-h-[88px] text-gray-500 sm:text-xl dark:text-gray-400 text-base pr-10">
                                {{ __('home.services.service1desc') }}</p>
                        </figcaption>
                    </figure>
                </div>

                <div class="hidden duration-700 ease-in-out" data-carousel-item>

                    <figure class="relative mb-10 md:mb-0 dark:bg-gray-800 rounded-lg shadow-xl">
                        <img class="w-full rounded-lg shadow-xl brightness-80"
                            src="https://www.mediaoto.id/images/services_2_mobile.webp" alt="Media Buying Agency"
                            title="Media Buying Agency">
                        <figcaption class="px-4 my-4 text-lg pb-4">
                            <h2 class="absolute bottom-28 mb-2 brightness-100 text-2xl text-[#FF9119]">
                                {{ __('home.services.service2tag') }}</h2>
                            <p class="0in-h-[88px] text-gray-500 sm:text-xl dark:text-gray-400 text-base pr-10">
                                {{ __('home.services.service2desc') }}</p>
                        </figcaption>
                    </figure>
                </div>
                <div class="hidden duration-700 ease-in-out" data-carousel-item>

                    <figure class="relative mb-10 md:mb-0 dark:bg-gray-800 rounded-lg shadow-xl">
                        <img class="w-full rounded-lg shadow-xl brightness-80"
                            src="https://www.mediaoto.id/images/services_3_mobile.webp" alt="Placement" title="Placement">
                        <figcaption class="px-4 my-4 text-lg pb-4">
                            <h2 class="absolute bottom-28 mb-2 brightness-100 text-2xl text-[#FF9119]">
                                {{ __('home.services.service3tag') }}</h2>
                            <p class="0in-h-[88px] text-gray-500 sm:text-xl dark:text-gray-400 text-base pr-10">
                                {{ __('home.services.service3desc') }}</p>
                        </figcaption>
                    </figure>
                </div>
                <div class="hidden duration-700 ease-in-out" data-carousel-item>

                    <figure class="relative mb-10 md:mb-0 dark:bg-gray-800 rounded-lg shadow-xl">
                        <img class="w-full rounded-lg shadow-xl brightness-80"
                            src="https://www.mediaoto.id/images/services_4_mobile.webp" alt="Rich Media Banner Placement"
                            title="Rich Media Banner Placement">
                        <figcaption class="px-4 my-4 text-lg pb-4">
                            <h2 class="absolute bottom-28 mb-2 brightness-100 text-2xl text-[#FF9119]">
                                {{ __('home.services.service4tag') }}</h2>
                            <p class="0in-h-[88px] text-gray-500 sm:text-xl dark:text-gray-400 text-base pr-10">
                                {{ __('home.services.service4desc') }}</p>
                        </figcaption>
                    </figure>
                </div>


            </div>


            <!-- Slider indicators -->
            <div class="absolute z-30 flex gap-4  -translate-x-1/2 space-x-3 rtl:space-x-reverse bottom-5 left-1/2">
                <button type="button" class="w-3 h-3 rounded-full bg-black!" aria-current="true" aria-label="Slide 1"
                    data-carousel-slide-to="0"></button>
                <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 2"
                    data-carousel-slide-to="1"></button>
                <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 3"
                    data-carousel-slide-to="2"></button>
                <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 4"
                    data-carousel-slide-to="3"></button>
            </div>
            <!-- Slider controls -->
            <?php /*
            <button type="button"
                class="absolute top-0 start-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
                data-carousel-prev>
                <span
                    class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                    <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M5 1 1 5l4 4" />
                    </svg>
                    <span class="sr-only">Previous</span>
                </span>
            </button>
            <button type="button"
                class="absolute top-0 end-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
                data-carousel-next>
                <span
                    class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                    <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 9 4-4-4-4" />
                    </svg>
                    <span class="sr-only">Next</span>
                </span>
            </button>

        </div>

         */ ?>

        <!-- TW Elements is free under AGPL, with commercial license required for specific uses. See more details: https://tw-elements.com/license/ and contact us for queries at tailwind@mdbootstrap.com -->
        <div
        id="carouselIndicators"
        class="relative md:hidden"
        data-te-carousel-init
        data-te-ride="carousel">
        <!--Carousel indicators-->
        <div
        class="absolute bottom-0 left-0 right-0 z-[2] mx-[15%] flex list-none justify-center p-0"
        data-te-carousel-indicators>
        <button
            type="button"
            data-te-target="#carouselIndicators"
            data-te-slide-to="0"
            data-te-carousel-active
            class="mx-[3px] box-content h-[3px] w-[30px] flex-initial cursor-pointer border-0 border-y-[10px] border-solid border-transparent bg-black dark:bg-white bg-clip-padding p-0 -indent-[999px] opacity-30 transition-opacity duration-[600ms] ease-[cubic-bezier(0.25,0.1,0.25,1.0)] motion-reduce:transition-none"
            aria-current="true"
            aria-label="Slide 1"></button>
        <button
            type="button"
            data-te-target="#carouselIndicators"
            data-te-slide-to="1"
            class="mx-[3px] box-content h-[3px] w-[30px] flex-initial cursor-pointer border-0 border-y-[10px] border-solid border-transparent bg-black dark:bg-white bg-clip-padding p-0 -indent-[999px] opacity-30 transition-opacity duration-[600ms] ease-[cubic-bezier(0.25,0.1,0.25,1.0)] motion-reduce:transition-none"
            aria-label="Slide 2"></button>
        <button
            type="button"
            data-te-target="#carouselIndicators"
            data-te-slide-to="2"
            class="mx-[3px] box-content h-[3px] w-[30px] flex-initial cursor-pointer border-0 border-y-[10px] border-solid border-transparent bg-black dark:bg-white bg-clip-padding p-0 -indent-[999px] opacity-30 transition-opacity duration-[600ms] ease-[cubic-bezier(0.25,0.1,0.25,1.0)] motion-reduce:transition-none"
            aria-label="Slide 3"></button>
        <button
            type="button"
            data-te-target="#carouselIndicators"
            data-te-slide-to="3"
            class="mx-[3px] box-content h-[3px] w-[30px] flex-initial cursor-pointer border-0 border-y-[10px] border-solid border-transparent bg-black dark:bg-white bg-clip-padding p-0 -indent-[999px] opacity-30 transition-opacity duration-[600ms] ease-[cubic-bezier(0.25,0.1,0.25,1.0)] motion-reduce:transition-none"
            aria-label="Slide 4"></button>
        </div>


        <!--Carousel items-->
        <div
        class="relative w-full overflow-hidden after:clear-both after:block after:content-['']">
        <!--First item-->
        <div
            class="relative float-left -mr-[100%] w-full transition-transform duration-[600ms] ease-in-out motion-reduce:transition-none"
            data-te-carousel-item
            data-te-carousel-active>
            <figure class="relative mb-10 md:mb-0 dark:bg-gray-800 rounded-lg shadow-xl">
                <img loading="lazy" class="w-full rounded-lg shadow-xl brightness-80"
                    src="{{env('IMAGE_URL','https://www.mediaoto.id')}}/images/services_1_mobile.webp" alt="Performance Optimization"
                    title="Performance Optimization">
                <figcaption class="px-4 my-4 text-lg pb-4">
                    <h2 class="absolute bottom-28 mb-2 brightness-100 text-2xl text-[#FF9119]">
                        {{ __('home.services.service1tag') }}</h2>
                    <p class="min-h-[80px] text-gray-500 sm:text-xl dark:text-gray-400 text-base pr-10">
                        {{ __('home.services.service1desc') }}</p>
                </figcaption>
            </figure>
        </div>
        <!--Second item-->
        <div
            class="relative float-left -mr-[100%] hidden w-full transition-transform duration-[600ms] ease-in-out motion-reduce:transition-none"
            data-te-carousel-item>
            <figure class="relative mb-10 md:mb-0 dark:bg-gray-800 rounded-lg shadow-xl">
                <img loading="lazy" class="w-full rounded-lg shadow-xl brightness-80"
                    src="{{env('IMAGE_URL','https://www.mediaoto.id')}}/images/services_2_mobile.webp" alt="Media Buying Agency"
                    title="Media Buying Agency">
                <figcaption class="px-4 my-4 text-lg pb-4">
                    <h2 class="absolute bottom-28 mb-2 brightness-100 text-2xl text-[#FF9119]">
                        {{ __('home.services.service2tag') }}</h2>
                    <p class="min-h-[80px] text-gray-500 sm:text-xl dark:text-gray-400 text-base pr-10">
                        {{ __('home.services.service2desc') }}</p>
                </figcaption>
            </figure>
        </div>
        <!--Third item-->
        <div
            class="relative float-left -mr-[100%] hidden w-full transition-transform duration-[600ms] ease-in-out motion-reduce:transition-none"
            data-te-carousel-item>

            <figure class="relative mb-10 md:mb-0 dark:bg-gray-800 rounded-lg shadow-xl">
                <img loading="lazy" class="w-full rounded-lg shadow-xl brightness-80"
                    src="{{env('IMAGE_URL','https://www.mediaoto.id')}}/images/services_3_mobile.webp" alt="Placement" title="Placement">
                <figcaption class="px-4 my-4 text-lg pb-4">
                    <h2 class="absolute bottom-28 mb-2 brightness-100 text-2xl text-[#FF9119]">
                        {{ __('home.services.service3tag') }}</h2>
                    <p class="min-h-[80px] text-gray-500 sm:text-xl dark:text-gray-400 text-base pr-10">
                        {{ __('home.services.service3desc') }}</p>
                </figcaption>
            </figure>

        </div>
        <!--Fourth item-->
        <div
        class="relative float-left -mr-[100%] hidden w-full transition-transform duration-[600ms] ease-in-out motion-reduce:transition-none"
        data-te-carousel-item>


        <figure class="relative mb-10 md:mb-0 dark:bg-gray-800 rounded-lg shadow-xl">
            <img loading="lazy" class="w-full rounded-lg shadow-xl brightness-80"
                src="{{env('IMAGE_URL','https://www.mediaoto.id')}}/images/services_4_mobile.webp" alt="Rich Media Banner Placement"
                title="Rich Media Banner Placement">
            <figcaption class="px-4 my-4 text-lg pb-4">
                <h2 class="absolute bottom-28 mb-2 brightness-100 text-2xl text-[#FF9119]">
                    {{ __('home.services.service4tag') }}</h2>
                <p class="min-h-[80px] text-gray-500 sm:text-xl dark:text-gray-400 text-base pr-10">
                    {{ __('home.services.service4desc') }}</p>
            </figcaption>
        </figure>

    </div>


        </div>

        <?php /*
        <!--Carousel controls - prev item-->

        <button
        class="absolute bottom-0 left-0 top-0 z-[1] flex w-[15%] items-center justify-center border-0 bg-none p-0 text-center text-white opacity-50 transition-opacity duration-150 ease-[cubic-bezier(0.25,0.1,0.25,1.0)] hover:text-white hover:no-underline hover:opacity-90 hover:outline-none focus:text-white focus:no-underline focus:opacity-90 focus:outline-none motion-reduce:transition-none"
        type="button"
        data-te-target="#carouselIndicators"
        data-te-slide="prev">
        <span class="inline-block h-8 w-8">
            <svg
            xmlns="http://www.w3.org/2000/svg"
            fill="none"
            viewBox="0 0 24 24"
            stroke-width="1.5"
            stroke="currentColor"
            class="h-6 w-6">
            <path
                stroke-linecap="round"
                stroke-linejoin="round"
                d="M15.75 19.5L8.25 12l7.5-7.5" />
            </svg>
        </span>
        <span
            class="!absolute !-m-px !h-px !w-px !overflow-hidden !whitespace-nowrap !border-0 !p-0 ![clip:rect(0,0,0,0)]"
            >Previous</span
        >
        </button>
        <!--Carousel controls - next item-->
        <button
        class="absolute bottom-0 right-0 top-0 z-[1] flex w-[15%] items-center justify-center border-0 bg-none p-0 text-center text-white opacity-50 transition-opacity duration-150 ease-[cubic-bezier(0.25,0.1,0.25,1.0)] hover:text-white hover:no-underline hover:opacity-90 hover:outline-none focus:text-white focus:no-underline focus:opacity-90 focus:outline-none motion-reduce:transition-none"
        type="button"
        data-te-target="#carouselIndicators"
        data-te-slide="next">
        <span class="inline-block h-8 w-8">
            <svg
            xmlns="http://www.w3.org/2000/svg"
            fill="none"
            viewBox="0 0 24 24"
            stroke-width="1.5"
            stroke="currentColor"
            class="h-6 w-6">
            <path
                stroke-linecap="round"
                stroke-linejoin="round"
                d="M8.25 4.5l7.5 7.5-7.5 7.5" />
            </svg>
        </span>
        <span
            class="!absolute !-m-px !h-px !w-px !overflow-hidden !whitespace-nowrap !border-0 !p-0 ![clip:rect(0,0,0,0)]"
            >Next</span
        >
        </button>

        */ ?>
        </div>



    </div>
</section>
