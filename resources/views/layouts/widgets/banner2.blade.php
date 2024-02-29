<div id="banner" class="-mt-20 mb-20 md:mb-20"></div>
<section class="h-[760px] pt-20 pb-10 bg-gray-100 dark:bg-gray-900 md:pb-12 z-10">
    @if ($agent->isMobile())
    <div class="flex w-full justify-between ">
        <div id="bm" class="-mt-20 w-full h-[626px] justify-between fill-black bg:fill-white "
            datasrc = "{{env('IMAGE_URL','https://www.mediaoto.id')}}/images/anime/mobile-6.json"
            title1='"Close the Deal"'
            title2="gak pake ribet!"
            title3="{!! trans('home.banner.content1') !!}"
            >
        </div>
        <div class="absolute right-0 bottom-0  mb-60 text-right">
            <a title="android" target="_blank" rel="noopener noreferrer"
            href="https://play.google.com/store/apps/details?id=id.mediaoto.apps"
             class="inline-flex items-center justify-center px-5 py-3 text-base font-medium text-center text-gray-900 border border-gray-400 rounded-lg hover:bg-white focus:ring-4 focus:ring-gray-100 dark:text-white dark:border-gray-700 dark:hover:bg-gray-700 dark:focus:ring-gray-800">
             <svg aria-hidden="true" class="w-8 h-8" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                 <path d="m12.954 11.616 2.957-2.957L6.36 3.291c-.633-.342-1.226-.39-1.746-.016l8.34 8.341zm3.461 3.462 3.074-1.729c.6-.336.929-.812.929-1.34 0-.527-.329-1.004-.928-1.34l-2.783-1.563-3.133 3.132 2.841 2.84zM4.1 4.002c-.064.197-.1.417-.1.658v14.705c0 .381.084.709.236.97l8.097-8.098L4.1 4.002zm8.854 8.855L4.902 20.91c.154.059.32.09.495.09.312 0 .637-.092.968-.276l9.255-5.197-2.666-2.67z">
                 </path>
             </svg>
             <span class="text-left text-xs ml-2">Download on<br />Google Play</span>
         </a>
        </div>
    </div>
    @endif
</section>
