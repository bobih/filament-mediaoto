<section class="bg-gray-100 dark:bg-gray-900">
    <div class="py-8 px-4 mx-auto max-w-screen-xl lg:py-16 lg:px-6">
        <div class="mx-auto max-w-screen-md text-center mb-8 lg:mb-12">
            <h2 data-te-animation-init data-te-animation-start="onScroll" data-te-animation-on-scroll="repeat"
                data-te-animation-show-on-load="false" data-te-animation-reset="true"
                data-te-animation="[fade-in_1s_ease-in-out]"
                class="mb-4 text-4xl tracking-tight font-bold text-gray-900 dark:text-white">
                {{ __('home.services.infotag') }}</h2>
            <p class="mb-5 font-light text-gray-500 sm:text-xl dark:text-gray-400">{{ __('home.services.titletag') }}</p>
        </div>

        @if ($agent->isMobile() == false)
            <div class="hidden md:grid md:grid-cols-2 md:gap-3">
                <figure
                    class="mb-10 md:mb-0 relative shadow-xl  scale-50 opacity-0 intersect:scale-100 intersect:opacity-100 intersect-once transition duration-700">
                    <img loading="lazy" width="610" height="305"
                        class="w-full brightness-75 duration-300 hover:filter-none ease-in-out rounded-lg shadow-xl"
                        src="{{ env('IMAGE_URL', 'https://www.mediaoto.id') }}/images/services_1.webp"
                        alt="Performance Optimization" title="Performance Optimization">
                    <div
                        class="invisible md:visible absolute flex items-center justify-center top-0 w-16 left-10 h-16 bg-[#FF9119] rounded-b-lg">
                        <span class=" text-white text-xl ">01</span>
                    </div>
                    <figcaption class="bottom-5 absolute px-8 text-lg text-white ">
                        <h2 class="text-2xl text-[#FF9119]">{{ __('home.services.service1tag') }}</h2>
                        <p class="text-base pr-20">{{ __('home.services.service1desc') }}</p>
                    </figcaption>
                </figure>

                <figure
                    class="mb-10 md:mb-0 relative shadow-xl scale-50 opacity-0 intersect:scale-100 intersect:opacity-100 intersect-once transition duration-700 delay-200">
                    <img loading="lazy"  width="610" height="305"
                        class="w-full brightness-75 duration-300 hover:filter-none ease-in-out rounded-lg shadow-xl"
                        src="{{ env('IMAGE_URL', 'https://www.mediaoto.id') }}/images/services_2.webp"
                        alt="Media Buying Agency" title="Media Buying Agency">
                    <div
                        class="invisible md:visible absolute flex items-center justify-center top-0 w-16 left-10 h-16 bg-[#FF9119] rounded-b-lg">
                        <span class=" text-white text-xl ">02</span>
                    </div>
                    <figcaption class="bottom-5 absolute px-8 text-lg text-white">
                        <h2 class="brightness-100 text-2xl text-[#FF9119]">{{ __('home.services.service2tag') }}</h2>
                        <p class="text-base pr-20">{{ __('home.services.service2desc') }}</p>
                    </figcaption>
                </figure>

                <figure
                    class="mb-10 md:mb-0 relative shadow-xl scale-50 opacity-0 intersect:scale-100 intersect:opacity-100 intersect-once transition duration-700">
                    <img loading="lazy"  width="610" height="305"
                        class="w-full brightness-75 duration-300 hover:filter-none ease-in-out rounded-lg shadow-xl"
                        src="{{ env('IMAGE_URL', 'https://www.mediaoto.id') }}/images/services_3.webp" alt="Placement"
                        title="Placement">
                    <div
                        class="invisible md:visible absolute flex items-center justify-center top-0 w-16 left-10 h-16 bg-[#FF9119] rounded-b-lg">
                        <span class=" text-white text-xl ">03</span>
                    </div>
                    <figcaption class="bottom-5 absolute px-8 text-lg text-white">
                        <h2 class="brightness-100 text-2xl text-[#FF9119]">{{ __('home.services.service3tag') }}</h2>
                        <p class="text-base pr-20">{{ __('home.services.service3desc') }}</p>
                    </figcaption>
                </figure>

                <figure
                    class="mb-10 md:mb-0 relative shadow-xl scale-50 opacity-0 intersect:scale-100 intersect:opacity-100 intersect-once transition duration-700 delay-200">
                    <img loading="lazy"  width="610" height="305"
                        class="w-full brightness-75 duration-300 hover:filter-none ease-in-out rounded-lg shadow-xl"
                        src="{{ env('IMAGE_URL', 'https://www.mediaoto.id') }}/images/services_4.webp"
                        alt="Rich Media Banner Placement" title="Rich Media Banner Placement">
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
        @else
            <?php /***** Mobile ****/?>
            <!-- TW Elements is free under AGPL, with commercial license required for specific uses. See more details: https://tw-elements.com/license/ and contact us for queries at tailwind@mdbootstrap.com -->
            <div id="carouselIndicators" class="relative md:hidden" data-te-carousel-init data-te-ride="carousel">
                <!--Carousel indicators-->
                <div class="absolute bottom-0 left-0 right-0 z-[2] mx-[15%] flex list-none justify-center p-0"
                    data-te-carousel-indicators>
                    <button type="button" data-te-target="#carouselIndicators" data-te-slide-to="0"
                        data-te-carousel-active
                        class="mx-[3px] box-content h-[3px] w-[30px] flex-initial cursor-pointer border-0 border-y-[10px] border-solid border-transparent bg-black dark:bg-white bg-clip-padding p-0 -indent-[999px] opacity-30 transition-opacity duration-[600ms] ease-[cubic-bezier(0.25,0.1,0.25,1.0)] motion-reduce:transition-none"
                        aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-te-target="#carouselIndicators" data-te-slide-to="1"
                        class="mx-[3px] box-content h-[3px] w-[30px] flex-initial cursor-pointer border-0 border-y-[10px] border-solid border-transparent bg-black dark:bg-white bg-clip-padding p-0 -indent-[999px] opacity-30 transition-opacity duration-[600ms] ease-[cubic-bezier(0.25,0.1,0.25,1.0)] motion-reduce:transition-none"
                        aria-label="Slide 2"></button>
                    <button type="button" data-te-target="#carouselIndicators" data-te-slide-to="2"
                        class="mx-[3px] box-content h-[3px] w-[30px] flex-initial cursor-pointer border-0 border-y-[10px] border-solid border-transparent bg-black dark:bg-white bg-clip-padding p-0 -indent-[999px] opacity-30 transition-opacity duration-[600ms] ease-[cubic-bezier(0.25,0.1,0.25,1.0)] motion-reduce:transition-none"
                        aria-label="Slide 3"></button>
                    <button type="button" data-te-target="#carouselIndicators" data-te-slide-to="3"
                        class="mx-[3px] box-content h-[3px] w-[30px] flex-initial cursor-pointer border-0 border-y-[10px] border-solid border-transparent bg-black dark:bg-white bg-clip-padding p-0 -indent-[999px] opacity-30 transition-opacity duration-[600ms] ease-[cubic-bezier(0.25,0.1,0.25,1.0)] motion-reduce:transition-none"
                        aria-label="Slide 4"></button>
                </div>


                <!--Carousel items-->
                <div class="relative w-full overflow-hidden after:clear-both after:block after:content-['']">
                    <!--First item-->
                    <div class="relative float-left -mr-[100%] w-full transition-transform duration-[600ms] ease-in-out motion-reduce:transition-none"
                        data-te-carousel-item data-te-carousel-active>
                        <figure class="relative mb-10 md:mb-0 dark:bg-gray-800 rounded-lg shadow-xl">
                            <img loading="lazy" class="w-full rounded-lg shadow-xl brightness-80"
                                src="{{ env('IMAGE_URL', 'https://www.mediaoto.id') }}/images/services_1_mobile.webp"
                                alt="Performance Optimization" title="Performance Optimization">
                            <figcaption class="px-4 my-4 text-lg pb-4">
                                <h2 class="absolute bottom-28 mb-2 brightness-100 text-2xl text-[#FF9119]">
                                    {{ __('home.services.service1tag') }}</h2>
                                <p class="min-h-[80px] text-gray-500 sm:text-xl dark:text-gray-400 text-base pr-10">
                                    {{ __('home.services.service1desc') }}</p>
                            </figcaption>
                        </figure>
                    </div>
                    <!--Second item-->
                    <div class="relative float-left -mr-[100%] hidden w-full transition-transform duration-[600ms] ease-in-out motion-reduce:transition-none"
                        data-te-carousel-item>
                        <figure class="relative mb-10 md:mb-0 dark:bg-gray-800 rounded-lg shadow-xl">
                            <img loading="lazy" class="w-full rounded-lg shadow-xl brightness-80"
                                src="{{ env('IMAGE_URL', 'https://www.mediaoto.id') }}/images/services_2_mobile.webp"
                                alt="Media Buying Agency" title="Media Buying Agency">
                            <figcaption class="px-4 my-4 text-lg pb-4">
                                <h2 class="absolute bottom-28 mb-2 brightness-100 text-2xl text-[#FF9119]">
                                    {{ __('home.services.service2tag') }}</h2>
                                <p class="min-h-[80px] text-gray-500 sm:text-xl dark:text-gray-400 text-base pr-10">
                                    {{ __('home.services.service2desc') }}</p>
                            </figcaption>
                        </figure>
                    </div>
                    <!--Third item-->
                    <div class="relative float-left -mr-[100%] hidden w-full transition-transform duration-[600ms] ease-in-out motion-reduce:transition-none"
                        data-te-carousel-item>
                        <figure class="relative mb-10 md:mb-0 dark:bg-gray-800 rounded-lg shadow-xl">
                            <img loading="lazy" class="w-full rounded-lg shadow-xl brightness-80"
                                src="{{ env('IMAGE_URL', 'https://www.mediaoto.id') }}/images/services_3_mobile.webp"
                                alt="Placement" title="Placement">
                            <figcaption class="px-4 my-4 text-lg pb-4">
                                <h2 class="absolute bottom-28 mb-2 brightness-100 text-2xl text-[#FF9119]">
                                    {{ __('home.services.service3tag') }}</h2>
                                <p class="min-h-[80px] text-gray-500 sm:text-xl dark:text-gray-400 text-base pr-10">
                                    {{ __('home.services.service3desc') }}</p>
                            </figcaption>
                        </figure>

                    </div>
                    <!--Fourth item-->
                    <div class="relative float-left -mr-[100%] hidden w-full transition-transform duration-[600ms] ease-in-out motion-reduce:transition-none"
                        data-te-carousel-item>
                        <figure class="relative mb-10 md:mb-0 dark:bg-gray-800 rounded-lg shadow-xl">
                            <img loading="lazy" class="w-full rounded-lg shadow-xl brightness-80"
                                src="{{ env('IMAGE_URL', 'https://www.mediaoto.id') }}/images/services_4_mobile.webp"
                                alt="Rich Media Banner Placement" title="Rich Media Banner Placement">
                            <figcaption class="px-4 my-4 text-lg pb-4">
                                <h2 class="absolute bottom-28 mb-2 brightness-100 text-2xl text-[#FF9119]">
                                    {{ __('home.services.service4tag') }}</h2>
                                <p class="min-h-[80px] text-gray-500 sm:text-xl dark:text-gray-400 text-base pr-10">
                                    {{ __('home.services.service4desc') }}</p>
                            </figcaption>
                        </figure>

                    </div>
                </div>
            </div>
        @endif
    </div>
</section>
