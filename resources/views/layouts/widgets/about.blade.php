<div id="aboutus" class="-mt-32  md:pt-28 mb-20 md:mb-5"></div>
<section

 class="  dark:bg-gray-700 intersect:bg-[#172554] transition-colors ease-out duration-1000">
    <div class=" w-full absolute ">
        <div
            class="invisible lg:visible w-3/5 mx-auto relative -m-12 p-5 h-32 bg-gray-400/70 dark:bg-gray-100/40 rounded-lg justify-center grid grid-cols-2 gap-4 text-center  shadow-lg ">
                <div
                    class="flex h-full  bg-gray-100 hover:bg-white dark:hover:bg-gray-800   items-center rounded-lg dark:bg-gray-700 dark:text-gray-300">
                    <div class="px-5 text-center ">
                        <button type="button"
                            class="text-[#FF9119]  font-medium rounded-full text-sm  text-center inline-flex items-center dark:border-[#FF9119] dark:text-[#FF9119] ">
                            <svg class="w-14 h-14 fill-current" width="19px" height="19px" viewBox="-1 0 19 19"
                                xmlns="http://www.w3.org/2000/svg" class="cf-icon-svg">
                                <path
                                    d="M16.417 9.583A7.917 7.917 0 1 1 8.5 1.666a7.917 7.917 0 0 1 7.917 7.917zm-3.948-1.455-.758-1.955a.816.816 0 0 0-.726-.498H6.054a.816.816 0 0 0-.727.498L4.57 8.128a1.43 1.43 0 0 0-1.052 1.375v2.046a.318.318 0 0 0 .317.317h.496v1.147a.238.238 0 0 0 .238.237h.892a.238.238 0 0 0 .237-.237v-1.147h5.644v1.147a.238.238 0 0 0 .237.237h.892a.238.238 0 0 0 .238-.237v-1.147h.496a.318.318 0 0 0 .317-.317V9.503a1.43 1.43 0 0 0-1.052-1.375zm-7.445.582a.792.792 0 1 0 .792.792.792.792 0 0 0-.792-.792zm5.96-2.402a.192.192 0 0 1 .137.094l.65 1.676H5.267l.65-1.676a.192.192 0 0 1 .136-.094h4.93zm1.04 2.402a.792.792 0 1 0 .792.792.792.792 0 0 0-.791-.792z" />
                            </svg>
                            <span class="sr-only">Icon description</span>
                        </button>
                    </div>
                    <div class="text-start">
                        <h2 class="text-lg">{{__('home.aboutus.info1tag')}}</h2>
                        <p class="dark:text-gray-400 text-sm">{{__('home.aboutus.info1desc')}}</p>
                    </div>
                </div>
                <div
                    class="flex  h-full bg-gray-100 hover:bg-white dark:hover:bg-gray-800   items-center rounded-lg dark:bg-gray-700 dark:text-gray-300">
                    <div class="px-5 text-center ">
                        <button type="button"
                            class="text-[#FF9119]  font-medium rounded-full text-sm  text-center inline-flex items-center dark:border-[#FF9119] dark:text-[#FF9119] ">
                            <svg class="w-14 h-14 fill-current" width="19px" height="19px" viewBox="-1 0 19 19"
                                xmlns="http://www.w3.org/2000/svg" class="cf-icon-svg">
                                <path
                                    d="M16.417 9.583A7.917 7.917 0 1 1 8.5 1.666a7.917 7.917 0 0 1 7.917 7.917zm-2.792-1.198a.396.396 0 0 0-.149-.54L8.661 5.104a.396.396 0 0 0-.393 0l-2.31 1.324v-.895a.318.318 0 0 0-.317-.317h-.968a.318.318 0 0 0-.317.317v1.813l-.872.5a.396.396 0 1 0 .393.686l4.589-2.629 4.619 2.63a.395.395 0 0 0 .54-.148zm-1.02.786L8.467 6.815l-4.11 2.356v4.465a.318.318 0 0 0 .316.317h7.615a.318.318 0 0 0 .317-.317zm-6.647.607h1.647v1.668H5.958zm5.045 1.668H9.356V9.778h1.647z" />
                            </svg>
                            <span class="sr-only">Icon description</span>
                        </button>
                    </div>
                    <div class="text-start">
                        <h2 class="text-lg">{{__('home.aboutus.info2tag')}}</h2>
                        <p class="dark:text-gray-400 text-sm">{{__('home.aboutus.info2desc')}}</p>
                    </div>
                </div>
        </div>
    </div>

    <div
    class="pt-18 gap-16 items-center py-8 px-4 mx-auto max-w-screen-xl lg:grid lg:grid-cols-3 lg:py-16 lg:px-6 ">

        <div class="font-light text-gray-200 sm:text-lg dark:text-gray-400">
            <?php /*
            <p class="mb-4">{{__('home.aboutus.aboutus')}}</p>

            <h2 data-te-animation-init
                data-te-animation-start="onScroll"
                data-te-animation-on-scroll="repeat"
                data-te-animation-show-on-load="false"
                data-te-animation-reset="true"
                data-te-animation="[fade-in_1s_ease-in-out]"  class="mb-4 text-3xl tracking-tight font-bold text-gray-200 dark:text-white">
            {{__('home.aboutus.infotag')}}
            </h2>
            */ ?>

            <div data-te-animation-init
            data-te-animation-start="onScroll"
            data-te-animation-on-scroll="none"
            data-te-animation-show-on-load="false"
            data-te-animation-reset="true"
            data-te-animation="[drop-in_0.5s]"
            class="h-[300px]">
                <x-lottie
                    class="w-[300px] justify-between "
                    path="{{env('IMAGE_URL','https://www.mediaoto.id')}}/images/anime/about.json"
                    animType="svg"
                    loop="true"
                    autoplay="true">
                </x-lottie>
            </div>

            <div class="pt-16 flex items-center text-gray-500 ">



                <a target="_blank" title="instagram" rel="noopener noreferrer" href="https://www.instagram.com/mediaoto.id" class="hover:text-gray-300">
                    <svg class="w-10 h-10 fill-current" width="24px" height="24px" id="Layer_1"
                        xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                        viewBox="-143 145 512 512" xml:space="preserve">
                        <g>
                            <path d="M113,446c24.8,0,45.1-20.2,45.1-45.1c0-9.8-3.2-18.9-8.5-26.3c-8.2-11.3-21.5-18.8-36.5-18.8s-28.3,7.4-36.5,18.8
                                c-5.3,7.4-8.5,16.5-8.5,26.3C68,425.8,88.2,446,113,446z" />
                            <polygon points="211.4,345.9 211.4,308.1 211.4,302.5 205.8,302.5 168,302.6 168.2,346 	" />
                            <path d="M329,145h-432c-22.1,0-40,17.9-40,40v432c0,22.1,17.9,40,40,40h432c22.1,0,40-17.9,40-40V185C369,162.9,351.1,145,329,145z
                                M241,374.7v104.8c0,27.3-22.2,49.5-49.5,49.5h-157C7.2,529-15,506.8-15,479.5V374.7v-52.3c0-27.3,22.2-49.5,49.5-49.5h157
                                c27.3,0,49.5,22.2,49.5,49.5V374.7z" />
                            <path d="M183,401c0,38.6-31.4,70-70,70c-38.6,0-70-31.4-70-70c0-9.3,1.9-18.2,5.2-26.3H10v104.8C10,493,21,504,34.5,504h157
                                c13.5,0,24.5-11,24.5-24.5V374.7h-38.2C181.2,382.8,183,391.7,183,401z" />
                        </g>
                    </svg>
                </a>
                <a target="_blank" title="youtube" rel="noopener noreferrer" href="https://www.youtube.com/channel/UCkfb6D6xVY6cKMlgHKQ7xZQ"  class="hover:text-gray-300">
                    <svg class="mx-10 w-10 h-10 fill-current" width="24px" height="24px" id="Layer_1"
                        xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                        viewBox="-143 145 512 512" xml:space="preserve">
                        <g>
                            <polygon points="78.9,450.3 162.7,401.1 78.9,351.9 	" />
                            <path d="M329,145h-432c-22.1,0-40,17.9-40,40v432c0,22.1,17.9,40,40,40h432c22.1,0,40-17.9,40-40V185C369,162.9,351.1,145,329,145z
                            M241,446.8L241,446.8c0,44.1-44.1,44.1-44.1,44.1H29.1c-44.1,0-44.1-44.1-44.1-44.1v-91.5c0-44.1,44.1-44.1,44.1-44.1h167.8
                            c44.1,0,44.1,44.1,44.1,44.1V446.8z" />
                        </g>
                    </svg>
                </a>
                <?php /*
                <a target="_blank" title="tiktok" rel="noopener noreferrer" href="https://www.tiktok.com/@mediaoto.id" class="hover:text-gray-300">
                    <svg class="w-12 h-12 fill-current" width="24px" height="24px" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M21,2H3A1,1,0,0,0,2,3V21a1,1,0,0,0,1,1H21a1,1,0,0,0,1-1V3A1,1,0,0,0,21,2Zm-3.281,8.725h0c-.109.011-.219.016-.328.017A3.571,3.571,0,0,1,14.4,9.129v5.493a4.061,4.061,0,1,1-4.06-4.06c.085,0,.167.008.251.013v2a2.067,2.067,0,1,0-.251,4.119A2.123,2.123,0,0,0,12.5,14.649l.02-9.331h1.914A3.564,3.564,0,0,0,17.719,8.5Z" />
                    </svg>
                </a>
                */ ?>

                <a target="_blank" title="facebook" rel="noopener noreferrer" href="https://www.facebook.com/profile.php?id=61556552852537" class="hover:text-gray-300">

                    <svg class="w-12 h-12" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                        <path d="M17 1H3c-1.1 0-2 .9-2 2v14c0 1.101.9 2 2 2h7v-7H8V9.525h2v-2.05c0-2.164 1.212-3.684 3.766-3.684l1.803.002v2.605h-1.197c-.994 0-1.372.746-1.372 1.438v1.69h2.568L15 12h-2v7h4c1.1 0 2-.899 2-2V3c0-1.1-.9-2-2-2z"></path>
                    </svg>
                </a>




                <?php /*
                <a class="hover:text-gray-300">
                    <svg class="w-12 h-12 fill-current" width="24px" height="24px" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M22 5.9c-.7.3-1.5.5-2.4.6a4 4 0 0 0 1.8-2.2c-.8.5-1.6.8-2.6 1a4.1 4.1 0 0 0-6.7 1.2 4 4 0 0 0-.2 2.5 11.7 11.7 0 0 1-8.5-4.3 4 4 0 0 0 1.3 5.4c-.7 0-1.3-.2-1.9-.5a4 4 0 0 0 3.3 4 4.2 4.2 0 0 1-1.9.1 4.1 4.1 0 0 0 3.9 2.8c-1.8 1.3-4 2-6.1 1.7a11.7 11.7 0 0 0 10.7 1A11.5 11.5 0 0 0 20 8.5V8a10 10 0 0 0 2-2.1Z" clip-rule="evenodd"/>
                  </svg>
                </a>

                <a class="hover:text-gray-300">
                    <svg class="w-12 h-12 fill-current" width="24px" height="24px" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M21.7 8c0-.7-.4-1.3-.8-2-.5-.5-1.2-.8-2-.8C16.2 5 12 5 12 5s-4.2 0-7 .2c-.7 0-1.4.3-2 .9-.3.6-.6 1.2-.7 2l-.2 3.1v1.5c0 1.1 0 2.2.2 3.3 0 .7.4 1.3.8 2 .6.5 1.4.8 2.2.8l6.7.2s4.2 0 7-.2c.7 0 1.4-.3 2-.9.3-.5.6-1.2.7-2l.2-3.1v-1.6c0-1 0-2.1-.2-3.2ZM10 14.6V9l5.4 2.8-5.4 2.8Z" clip-rule="evenodd"/>
                    </svg>
                </a>

                <a class="hover:text-gray-300">
                    <svg class="w-12 h-12 fill-current" width="24px" height="24px" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M22 5.9c-.7.3-1.5.5-2.4.6a4 4 0 0 0 1.8-2.2c-.8.5-1.6.8-2.6 1a4.1 4.1 0 0 0-6.7 1.2 4 4 0 0 0-.2 2.5 11.7 11.7 0 0 1-8.5-4.3 4 4 0 0 0 1.3 5.4c-.7 0-1.3-.2-1.9-.5a4 4 0 0 0 3.3 4 4.2 4.2 0 0 1-1.9.1 4.1 4.1 0 0 0 3.9 2.8c-1.8 1.3-4 2-6.1 1.7a11.7 11.7 0 0 0 10.7 1A11.5 11.5 0 0 0 20 8.5V8a10 10 0 0 0 2-2.1Z" clip-rule="evenodd"/>
                  </svg>
                </a>

                <a class="hover:text-gray-300">
                    <svg class="w-12 h-12 fill-current" width="24px" height="24px" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M21,2H3A1,1,0,0,0,2,3V21a1,1,0,0,0,1,1H21a1,1,0,0,0,1-1V3A1,1,0,0,0,21,2Zm-3.281,8.725h0c-.109.011-.219.016-.328.017A3.571,3.571,0,0,1,14.4,9.129v5.493a4.061,4.061,0,1,1-4.06-4.06c.085,0,.167.008.251.013v2a2.067,2.067,0,1,0-.251,4.119A2.123,2.123,0,0,0,12.5,14.649l.02-9.331h1.914A3.564,3.564,0,0,0,17.719,8.5Z" />
                    </svg>
                </a>
                */ ?>

            </div>
        </div>
        <h2 class="mb-4 text-3xl tracking-tight font-bold text-gray-200 dark:text-white">
            {{__('home.aboutus.aboutus')}}
        </h2>
        <div class="mt-10 font-light text-gray-200 sm:text-lg dark:text-gray-300 lg:col-span-2">
            <p class="mb-4 text-justify opacity-0 intersect:opacity-100 transition-opacity duration-1000 delay-300 intersect-once">{{__('home.aboutus.content1')}}</p>
            <p class="mb-4 text-justify opacity-0 intersect:opacity-100 transition-opacity duration-1000 delay-300 intersect-once">{{__('home.aboutus.content2')}}</p>
            <p class="mb-4 text-justify opacity-0 intersect:opacity-100 transition-opacity duration-1000 delay-300 intersect-once">{{__('home.aboutus.content3')}}</p>


            <?php /*
            <button type="button"
                class="mt-8 text-white bg-[#FF9119] hover:bg-[#FF9119]/80 focus:ring-4 focus:outline-none focus:ring-[#FF9119]/50 font-medium rounded-full text-sm px-5 py-2.5 text-center inline-flex items-center dark:hover:bg-[#FF9119]/80 dark:focus:ring-[#FF9119]/40 me-2 mb-2">
                View Detail
                <svg class="w-5 h-5 ml-2 -mr-1" fill="currentColor" viewBox="0 0 20 20"
                    xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z"
                        clip-rule="evenodd"></path>
                </svg>
            </button>
            */ ?>
        </div>
    </div>
</section>
