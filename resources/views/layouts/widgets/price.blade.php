<div id="price" class="-mt-20 mb-20"></div>
<section class="bg-gray-100 dark:bg-gray-900">
    <div class="py-8 px-4 mx-auto max-w-screen-xl lg:py-16 lg:px-6">
        <div class="mx-auto max-w-screen-md text-center mb-8 lg:mb-12">
            <h2 data-te-animation-init
            data-te-animation-start="onScroll"
            data-te-animation-on-scroll="repeat"
            data-te-animation-show-on-load="false"
            data-te-animation-reset="true"
            data-te-animation="[fade-in_1s_ease-in-out]" class="mb-4 text-4xl tracking-tight font-bold text-gray-900 dark:text-white">{{__('home.price.infotag')}}</h2>
            <p class="mb-5 font-light text-gray-500 sm:text-xl dark:text-gray-400">{{__('home.price.titletag')}}</p>
        </div>
        <div class="space-y-8 lg:grid lg:grid-cols-3 sm:gap-6 xl:gap-10 lg:space-y-0">
            <div
                class="md:hover:-translate-y-1 md:hover:scale-110 duration-300 flex flex-col p-6 mx-auto max-w-lg text-center text-gray-900 bg-white rounded-lg border border-gray-300 shadow-lg dark:border-gray-600 xl:p-8 dark:bg-gray-800 dark:text-white">
                <h3 class="mb-4 text-2xl font-semibold">{{__('home.price.price1tag')}}</h3>
                <p class="font-light text-gray-500 sm:text-lg dark:text-gray-400">{{__('home.price.price1desc')}}</p>
                <div class="flex justify-center items-baseline my-8">
                    <span class="mr-2 text-3xl font-bold">Rp. 350.000</span>

                </div>
                <!-- List -->
                <ul role="list" class="mb-8 space-y-4 text-left">
                    <li class="flex items-center space-x-3 ">
                        <!-- Icon -->
                        <svg class="flex-shrink-0 w-5 h-5 text-green-500 dark:text-green-400" fill="currentColor"
                            viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                clip-rule="evenodd"></path>
                        </svg>
                        <span>50 Leads Membership</span>
                    </li>
                    <li class="flex items-center space-x-3">
                        <!-- Icon -->
                        <svg class="flex-shrink-0 w-5 h-5 text-green-500 dark:text-green-400" fill="currentColor"
                            viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                clip-rule="evenodd"></path>
                        </svg>
                        <span>Premium support: <span class="font-semibold">3 Month</span></span>
                    </li>
                </ul>
                <button title="silver" x-data x-on:click="$dispatch('open-modal')"
                    class="inline-flex items-center justify-center px-5 py-3 text-base font-medium text-center text-gray-900 border border-gray-400 rounded-lg hover:bg-white focus:ring-4 focus:ring-gray-100 dark:text-white dark:border-gray-700 dark:hover:bg-gray-700 dark:focus:ring-gray-800">
                    {{__('home.nav.getStarted')}}
                </button>
            </div>
            <!-- Pricing Card -->
            <div
                class="md:hover:-translate-y-1 md:hover:scale-110 duration-300 flex flex-col p-6 mx-auto max-w-lg text-center text-gray-900 bg-white rounded-lg border border-gray-300 shadow-lg dark:border-gray-600 xl:p-8 dark:bg-gray-800 dark:text-white">
                <h3 class="mb-4 text-2xl font-semibold">{{__('home.price.price2tag')}}</h3>
                <p class="font-light text-gray-500 sm:text-lg dark:text-gray-400">{{__('home.price.price2desc')}}</p>

                <div class="flex justify-center items-baseline my-8">
                    <span class="mr-2 text-3xl font-bold">Rp. 500.000</span>

                </div>
                <!-- List -->
                <ul role="list" class="mb-8 space-y-4 text-left">
                    <li class="flex items-center space-x-3">
                        <svg class="flex-shrink-0 w-5 h-5 text-green-500 dark:text-green-400" fill="currentColor"
                            viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                clip-rule="evenodd"></path>
                        </svg>
                        <span>70 Leads Membership</span>
                    </li>
                    <li class="flex items-center space-x-3">
                        <svg class="flex-shrink-0 w-5 h-5 text-green-500 dark:text-green-400" fill="currentColor"
                            viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                clip-rule="evenodd"></path>
                        </svg>
                        <span>Premium support: <span class="font-semibold">3 Month</span></span>
                    </li>
                </ul>
                <button  title="gold" x-data x-on:click="$dispatch('open-modal')"
                    class="inline-flex items-center justify-center px-5 py-3 text-base font-medium text-center text-gray-900 border border-gray-400 rounded-lg hover:bg-white focus:ring-4 focus:ring-gray-100 dark:text-white dark:border-gray-700 dark:hover:bg-gray-700 dark:focus:ring-gray-800">
                    {{__('home.nav.getStarted')}}
                </button>
            </div>
            <div
                class="md:hover:-translate-y-1 md:hover:scale-110 duration-300 flex flex-col p-6 mx-auto max-w-lg text-center text-gray-900 bg-white rounded-lg border border-gray-300 shadow-lg dark:border-gray-600 xl:p-8 dark:bg-gray-800 dark:text-white">
                <h3 class="mb-4 text-2xl font-semibold">{{__('home.price.price3tag')}}</h3>
                <p class="font-light text-gray-500 sm:text-lg dark:text-gray-400">{{__('home.price.price3desc')}}</p>

                <div class="flex justify-center items-baseline my-8">
                    <span class="mr-2 text-3xl font-bold">Rp. 1.000.000</span>
                </div>
                <ul role="list" class="mb-8 space-y-4 text-left">
                    <li class="flex items-center space-x-3">
                        <svg class="flex-shrink-0 w-5 h-5 text-green-500 dark:text-green-400" fill="currentColor"
                            viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                clip-rule="evenodd"></path>
                        </svg>
                        <span>100 Leads Membership</span>
                    </li>
                    <li class="flex items-center space-x-3">
                        <svg class="flex-shrink-0 w-5 h-5 text-green-500 dark:text-green-400" fill="currentColor"
                            viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                clip-rule="evenodd"></path>
                        </svg>
                        <span>Premium support: <span class="font-semibold">6 Month</span></span>
                    </li>
                </ul>

                    <button title="diamond" title="submit" x-data={} x-on:click="$dispatch('open-modal')"
                        class="inline-flex items-center justify-center px-5 py-3 text-base font-medium text-center text-gray-900 border border-gray-400 rounded-lg hover:bg-white focus:ring-4 focus:ring-gray-100 dark:text-white dark:border-gray-700 dark:hover:bg-gray-700 dark:focus:ring-gray-800">
                        {{__('home.nav.getStarted')}}
                    </button>

            </div>
        </div>
    </div>
</section>
