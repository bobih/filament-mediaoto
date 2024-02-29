<div id="banner" class="-mt-20 mb-20 md:mb-20"></div>
<section class="pt-20 pb-10 bg-gray-100 dark:bg-gray-900 md:pb-12 z-10">
    @if ($agent->isMobile())
    <div class="flex w-full justify-between ">
        <div id="bm" class="w-full h-[626px] justify-between fill-black bg:fill-white "
            datasrc = "{{env('IMAGE_URL','https://www.mediaoto.id')}}/images/anime/mobile-6.json"
            title1='"Close the Deal"'
            title2="gak pake ribet!"
            title3="{!! trans('home.banner.content1') !!}"
            >
        </div>
    </div>
    @endif
</section>
