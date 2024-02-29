<div id="banner" class="-mt-20 mb-20 md:mb-20"></div>
<section class="pt-20 pb-10 bg-gray-100 dark:bg-gray-900 md:pb-12 z-10">
    @if ($agent->isMobile())
    <div class="flex w-full justify-between ">
        <div id="bm" class="w-full h-[626px] justify-between " txt-data="{!! __('home.aboutus.infotag') !!}">
        </div>
    </div>
    @endif

    @if (!$agent->isMobile())
    <div class="hidden dark:block wrapper">
        <div class="gradient gradient-1"></div>
        <div class="gradient gradient-2"></div>
        <div class="gradient gradient-3"></div>
      </div>


      <marquee class="hidden dark:block text-sm  absolute opacity-10" scrolldelay="100">
        <div class="flex overflow-hidden w-[2000px] flex-nowrap items-center gap-x-11 opacity-20 blur-sm">
            <svg class="h-60 w-60" xmlns="http://www.w3.org/2000/svg" role="img" viewBox="0 0 24 24" fill="currentColor"><title>Honda</title><path d="M23.902 6.87c-.33-3.218-2.47-3.895-4.354-4.204-.946-.16-2.63-.3-3.716-.34-.946-.06-3.168-.09-3.835-.09-.657 0-2.89.03-3.835.09-1.076.04-2.77.18-3.716.34C2.563 2.985.42 3.66.092 6.87c-.08.877-.1 2.023-.09 3.248.03 2.031.2 3.406.3 4.363.07.657.338 2.62.687 3.636.478 1.395.916 1.803 1.424 2.222.937.757 2.471.996 2.79 1.056 1.733.31 5.24.368 6.784.368 1.544 0 5.05-.05 6.784-.368.329-.06 1.863-.29 2.79-1.056.508-.419.946-.827 1.424-2.222.35-1.016.628-2.979.698-3.636.1-.957.279-2.332.299-4.363.04-1.225.01-2.371-.08-3.248m-1.176 5.4c-.19 2.57-.418 4.104-.747 5.22-.29.976-.637 1.623-1.165 2.092-.867.787-2.063.956-2.76 1.056-1.514.23-4.055.3-6.057.3-2.002 0-4.543-.08-6.057-.3-.697-.1-1.893-.269-2.76-1.056-.518-.469-.876-1.126-1.155-2.093-.329-1.105-.558-2.65-.747-5.22-.11-1.543-.09-4.054.08-5.4.258-2.011 1.255-3.018 3.387-3.396.996-.18 2.34-.31 3.606-.37 1.016-.07 2.7-.1 3.636-.09.936-.01 2.62.03 3.636.09 1.275.06 2.61.19 3.606.37 2.142.378 3.139 1.395 3.388 3.397.199 1.345.229 3.856.11 5.4m-5.202-8.39c-.548 2.462-.767 3.588-1.216 5.37-.428 1.715-.767 3.298-1.335 4.065-.587.777-1.365.947-1.893 1.006-.279.03-.478.04-1.066.05-.596 0-.796-.02-1.075-.05-.528-.06-1.315-.229-1.892-1.006-.578-.767-.907-2.35-1.335-4.064-.47-1.773-.678-2.91-1.236-5.37 0 0-.548.02-.797.04-.329.02-.588.05-.867.09.343 5.372.692 11.079 1.126 16.13a21.983 21.983 0 002.39.169c.33-1.266.748-3.02 1.207-3.767.378-.608.966-.677 1.295-.717.518-.07.956-.08 1.165-.08.2-.01.637 0 1.165.08.33.05.917.11 1.295.717.47.747.877 2.5 1.206 3.766 0 0 .358-.01 1.165-.05.41-.018.82-.058 1.226-.12.458-5.39.785-10.728 1.126-16.128-.28-.04-.538-.07-.867-.09-.23-.02-.787-.04-.787-.04z"/></svg>

            <svg class="h-60 w-60" xmlns="http://www.w3.org/2000/svg" role="img" viewBox="0 0 24 24" fill="currentColor"><title>Toyota</title><path d="M12 3.848C5.223 3.848 0 7.298 0 12c0 4.702 5.224 8.152 12 8.152S24 16.702 24 12c0-4.702-5.223-8.152-12-8.152zm7.334 3.839c0 1.08-1.725 1.913-4.488 2.246-.26-2.58-1.005-4.279-1.963-4.913 2.948.184 6.45 1.227 6.45 2.667zM12 16.401c-.96 0-1.746-1.5-1.808-4.389.577.047 1.18.072 1.808.072.628 0 1.23-.025 1.807-.072-.061 2.89-.847 4.389-1.807 4.389zm0-6.308c-.59 0-1.155-.019-1.69-.054.261-1.728.92-3.15 1.69-3.15.77 0 1.428 1.422 1.689 3.15-.535.034-1.099.054-1.689.054zm-.882-5.075c-.956.633-1.706 2.333-1.964 4.915C6.391 9.6 4.665 8.767 4.665 7.687c0-1.44 3.504-2.49 6.453-2.669zM2.037 11.68a5.265 5.265 0 011.048-3.164c.27 1.547 2.522 2.881 5.972 3.37V12c0 3.772.879 6.203 2.087 6.97-5.107-.321-9.107-3.48-9.107-7.29zm10.823 7.29c1.207-.767 2.087-3.198 2.087-6.97v-.115c3.447-.488 5.704-1.826 5.972-3.37a5.26 5.26 0 011.049 3.165c-.004 3.81-4.008 6.969-9.109 7.29z"/></svg>

            <svg class="h-60 w-60" xmlns="http://www.w3.org/2000/svg" role="img" viewBox="0 0 24 24" fill="currentColor"><title>Mitsubishi</title><path d="M8 22.38H0l4-6.92h8zm8 0h8l-4-6.92h-8zm0-13.84l-4-6.92-4 6.92 4 6.92Z"/></svg>

            <svg class="h-60 w-60" xmlns="http://www.w3.org/2000/svg" role="img" viewBox="0 0 24 24" fill="currentColor"><title>Suzuki</title><path d="M17.369 19.995C13.51 22.39 12 24 12 24L.105 15.705s5.003-3.715 9.186-.87l5.61 3.882.683-.453L.106 7.321s2.226-.65 6.524-3.315C10.49 1.609 12 0 12 0l11.895 8.296s-5.003 3.715-9.187.87L9.1 5.281l-.683.454L23.893 16.68s-2.224.649-6.524 3.315Z"/></svg>

            <svg class="h-60 w-60" xmlns="http://www.w3.org/2000/svg" role="img" viewBox="0 0 24 24" fill="currentColor"><title>Mazda</title><path d="M11.999 12.876c-.036 0-.105-.046-.222-.26a7.531 7.531 0 00-1.975-2.353A8.255 8.255 0 007.7 9.065a17.945 17.945 0 00-.345-.136c-1.012-.4-2.061-.813-3.035-1.377A8.982 8.982 0 014 7.362c.194-.34.42-.665.67-.962a6.055 6.055 0 011.253-1.131 7.126 7.126 0 011.618-.806c1.218-.434 2.677-.647 4.458-.649 1.783.002 3.241.215 4.459.65a7.097 7.097 0 011.619.805c.471.319.892.699 1.253 1.13.25.298.475.623.67.963-.103.064-.212.129-.32.192-.976.564-2.023.977-3.037 1.376l-.345.136a8.26 8.26 0 00-2.1 1.198 7.519 7.519 0 00-1.975 2.354c-.117.213-.187.259-.224.259m0 7.072c-1.544-.002-2.798-.129-3.83-.387-1.013-.252-1.855-.64-2.576-1.188a5.792 5.792 0 01-1.392-1.537 7.607 7.607 0 01-.81-1.768 10.298 10.298 0 01-.467-2.983c0-.674.047-1.313.135-1.901 1.106.596 2.153.895 3.08 1.16l.215.06c1.29.371 2.314.857 3.135 1.488.475.368.89.793 1.23 1.264.369.508.663 1.088.877 1.725.096.289.2.468.403.468.207 0 .308-.18.405-.468a6.124 6.124 0 012.107-2.988c.82-.632 1.845-1.118 3.135-1.489l.216-.06c.926-.265 1.973-.564 3.078-1.16.09.589.136 1.227.136 1.9 0 .458-.046 1.664-.465 2.984a7.626 7.626 0 01-.809 1.768 5.789 5.789 0 01-1.396 1.537c-.723.548-1.565.936-2.574 1.188-1.035.258-2.288.385-3.833.387m9.692-14.556c-1.909-2.05-4.99-2.99-9.692-2.995-4.7.005-7.781.944-9.69 2.994C.89 6.913 0 9.018 0 11.874c0 1.579.39 5.6 3.564 7.676 1.9 1.242 4.354 2.046 8.435 2.052 4.083-.006 6.536-.81 8.437-2.052C23.609 17.474 24 13.452 24 11.874c0-2.848-.897-4.968-2.31-6.483Z"/></svg>

            <svg class="h-60 w-60" xmlns="http://www.w3.org/2000/svg" role="img" viewBox="0 0 24 24" fill="currentColor"><title>Hyundai</title><path d="M12 18.1622c-6.6275 0-12-2.7586-12-6.163 0-3.4028 5.3725-6.1614 12-6.1614 6.6278 0 12 2.7586 12 6.1614 0 3.4044-5.3722 6.163-12 6.163zM7.6023 7.17C3.701 7.9784.973 9.8302.973 11.9844c0 1.1929.8382 2.2932 2.248 3.1757.1174.0724.1941.0862.251.0826.1019-.006.1593-.0698.201-.146.028-.0485.0631-.1225.0972-.1968.4601-1.0834 2.0776-4.8333 4.2023-7.3758a1.1775 1.1775 0 0 0 .1048-.1461c.046-.084.0356-.1513.0006-.192-.0593-.0647-.2247-.065-.4756-.016zM9.742 8.8995c-1.1728 2.8492 1.0473 2.4961 1.6478 2.3637 1.0203-.2258 1.9944-.6128 2.7746-.925 2.2216-.8887 3.4012-1.7804 3.7925-2.123a1.9839 1.9839 0 0 0 .1076-.0988c.0557-.058.0976-.1192.0976-.2002 0-.0936-.081-.1687-.2374-.2231-.012-.0049-.0517-.021-.0641-.025-1.698-.5415-3.724-.8563-5.9016-.8563-.0168 0-.0586-.0022-.1169 0-.2608.0078-.5509.0664-.787.1888-.7777.4049-1.1163 1.4235-1.313 1.899zm10.5851.0037c-.0268.0487-.0612.1224-.0962.1974-.4599 1.0826-2.0774 4.831-4.2018 7.3733-.0515.063-.0796.1031-.1042.1467-.0492.0846-.0388.1535 0 .1935.0572.0641.2235.0654.474.0157 3.8998-.81 6.628-2.6606 6.628-4.8149 0-1.1925-.836-2.2928-2.2472-3.1745-.1161-.073-.1934-.0871-.25-.083-.1028.0067-.16.0699-.2026.1458zM14.258 15.099c1.173-2.849-1.0483-2.494-1.6467-2.3622-1.0218.225-1.996.613-2.7757.924-2.2226.8883-3.4017 1.782-3.7944 2.1234-.0468.0428-.0833.0742-.1066.0995-.0564.0573-.0967.1178-.0967.2007 0 .0923.08.1688.2362.2229.012.0048.0511.0213.0657.0255 1.696.54 3.722.8557 5.9.8557.0177 0 .0592.0016.1178 0 .2609-.0081.5522-.0677.7871-.1888.7781-.4052 1.1169-1.4234 1.3133-1.9007z"/></svg>


            <svg class="h-60 w-60" xmlns="http://www.w3.org/2000/svg" role="img" viewBox="0 0 24 24" fill="currentColor"><title>Wuling</title><path d="M14.17 13.94 12 10.05c-.06-.1-.2-.1-.26 0l-2.17 3.89c-.03.04-.03.1 0 .14l2.17 3.89c.06.1.2.1.26 0l2.17-3.89c.02-.05.02-.1 0-.14zM9.46 13.82 5.62 6.95c-.32-.56-.91-.9-1.55-.9H.54c-.09 0-.14.09-.1.17l1.99 3.57c.02.04.07.07.12.07H6.3c.05 0 .1.03.13.07l.11.18c.02.03 0 .07-.04.07H2.72c-.03 0-.06.04-.04.07l1.67 3c.26.46.74.75 1.27.75h3.74c.09 0 .14-.1.1-.18zM14.28 13.82l3.84-6.87c.31-.56.9-.91 1.54-.91h3.53c.09 0 .14.09.1.17L21.3 9.78c-.03.05-.07.07-.12.07h-3.75c-.05 0-.1.03-.13.07l-.11.18c-.02.03 0 .07.04.07h3.78c.03 0 .06.04.04.07l-1.67 3c-.25.47-.73.76-1.26.76h-3.74c-.08 0-.14-.1-.1-.18z"/></svg>


            <?php /*
            <svg class="h-60 w-60" xmlns="http://www.w3.org/2000/svg" role="img" viewBox="0 0 24 24" fill="currentColor"><title>BMW</title><path d="M12 0C5.373 0 0 5.373 0 12s5.373 12 12 12 12-5.373 12-12S18.627 0 12 0zm0 .78C18.196.78 23.219 5.803 23.219 12c0 6.196-5.022 11.219-11.219 11.219C5.803 23.219.781 18.196.781 12S5.804.78 12 .78zm-.678.63c-.33.014-.66.042-.992.078l-.107 2.944a9.95 9.95 0 0 1 .71-.094l.07-1.988-.013-.137.043.13.664 1.489h.606l.664-1.488.04-.131-.01.137.07 1.988c.232.022.473.054.71.094l-.109-2.944a14.746 14.746 0 0 0-.992-.078l-.653 1.625-.023.12-.023-.12-.655-1.625zm6.696 1.824l-1.543 2.428c.195.15.452.371.617.522l1.453-.754.092-.069-.069.094-.752 1.453c.163.175.398.458.53.63l2.43-1.544a16.135 16.135 0 0 0-.46-.568L18.777 6.44l-.105.092.078-.115.68-1.356-.48-.48-1.356.68-.115.078.091-.106 1.018-1.539c-.18-.152-.351-.291-.57-.46zM5.5 3.785c-.36.037-.638.283-1.393 1.125a18.97 18.97 0 0 0-.757.914l2.074 1.967c.687-.76.966-1.042 1.508-1.613.383-.405.6-.87.216-1.317-.208-.242-.558-.295-.85-.175l-.028.01.01-.026a.7.7 0 0 0-.243-.734.724.724 0 0 0-.537-.15zm.006.615c.136-.037.277.06.308.2.032.14-.056.272-.154.382-.22.25-1.031 1.098-1.031 1.098l-.402-.383c.417-.51.861-.974 1.062-1.158a.55.55 0 0 1 .217-.139zM12 4.883a7.114 7.114 0 0 0-7.08 6.388v.002a7.122 7.122 0 0 0 8.516 7.697 7.112 7.112 0 0 0 5.68-6.97A7.122 7.122 0 0 0 12 4.885v-.002zm-5.537.242c.047 0 .096.013.14.043.088.059.128.16.106.26-.026.119-.125.231-.205.318l-1.045 1.12-.42-.4s.787-.832 1.045-1.099c.102-.106.168-.17.238-.205a.331.331 0 0 1 .14-.037zM12 5.818A6.175 6.175 0 0 1 18.182 12H12v6.182A6.175 6.175 0 0 1 5.818 12H12V5.818Z"/></svg>

            <svg class="h-60 w-60" xmlns="http://www.w3.org/2000/svg" role="img" viewBox="0 0 24 24" fill="currentColor"><title>Mercedes</title><path d="M12 0c6.623 0 12 5.377 12 12s-5.377 12-12 12S0 18.623 0 12 5.377 0 12 0zM3.245 17.539A10.357 10.357 0 0012 22.36c3.681 0 6.917-1.924 8.755-4.821L12 14.203zm10.663-6.641l7.267 5.915A10.306 10.306 0 0022.36 12c0-5.577-4.417-10.131-9.94-10.352zm-2.328-9.25C6.057 1.869 1.64 6.423 1.64 12c0 1.737.428 3.374 1.185 4.813l7.267-5.915z"/></svg>

            */ ?>

            <svg class="h-60 w-60" xmlns="http://www.w3.org/2000/svg" role="img" viewBox="0 0 24 24" fill="currentColor"><title>Nissan</title><path d="M20.576 14.955l-.01.028c-1.247 3.643-4.685 6.086-8.561 6.086-3.876 0-7.32-2.448-8.562-6.09l-.01-.029H.71v.329l1.133.133c.7.08.847.39 1.038.78l.048.096c1.638 3.495 5.204 5.752 9.08 5.752 3.877 0 7.443-2.257 9.081-5.747l.048-.095c.19-.39.338-.7 1.038-.781l1.134-.134v-.328zM3.443 9.012c1.247-3.643 4.686-6.09 8.562-6.09 3.876 0 7.319 2.447 8.562 6.09l.01.028h2.728v-.328l-1.134-.133c-.7-.081-.847-.39-1.038-.781l-.047-.096C19.448 4.217 15.88 1.96 12.005 1.96c-3.881 0-7.443 2.257-9.081 5.752l-.048.095c-.19.39-.338.7-1.038.781l-1.133.133v.329h2.724zm13.862 1.586l-1.743 2.795h.752l.31-.5h2.033l.31.5h.747l-1.743-2.795zm1.033 1.766h-1.395l.7-1.124zm2.81-1.066l2.071 2.095H24v-2.795h-.614v2.085l-2.062-2.085h-.795v2.795h.619zM0 13.393h.619v-2.095l2.076 2.095h.781v-2.795h-.619v2.085L.795 10.598H0zm4.843-2.795h.619v2.795h-.62zm4.486 2.204c-.02.005-.096.005-.124.005H6.743v.572h2.5c.019 0 .167 0 .195-.005.51-.048.743-.472.743-.843 0-.381-.243-.79-.705-.833-.09-.01-.166-.01-.2-.01H7.643a.83.83 0 0 1-.181-.014c-.129-.034-.176-.148-.176-.243 0-.086.047-.2.18-.238a.68.68 0 0 1 .172-.014h2.357v-.562H7.6c-.1 0-.176.004-.238.014a.792.792 0 0 0-.695.805c0 .343.214.743.685.81.086.009.205.009.258.009H9.2c.029 0 .1 0 .114.005.181.023.243.157.243.276a.262.262 0 0 1-.228.266zm4.657 0c-.02.005-.096.005-.129.005H11.4v.572h2.5c.019 0 .167 0 .195-.005.51-.048.743-.472.743-.843 0-.381-.243-.79-.705-.833-.09-.01-.166-.01-.2-.01H12.3a.83.83 0 0 1-.181-.014c-.129-.034-.176-.148-.176-.243 0-.086.047-.2.18-.238a.68.68 0 0 1 .172-.014h2.357v-.562h-2.395c-.1 0-.176.004-.238.014a.792.792 0 0 0-.695.805c0 .343.214.743.686.81.085.009.204.009.257.009h1.59c.029 0 .1 0 .114.005.181.023.243.157.243.276a.267.267 0 0 1-.228.266Z"/></svg>

        </div>
      </marquee>
      @endif

    <div class="grid max-w-screen-xl px-4 py-8 mx-auto lg:gap-8 xl:gap-0 lg:py-16 lg:grid-cols-12">
        <div class="z-10 mr-auto place-self-center lg:col-span-7">

                <h1 data-te-animation-init
                data-te-animation-start="onScroll"
                data-te-animation-on-scroll="repeat"
                data-te-animation-show-on-load="false"
                data-te-animation-reset="true"
                data-te-animation="[fade-in_1s_ease-in-out]"
                class=" max-w-2xl mb-4 text-4xl font-bold tracking-tight leading-none md:text-5xl xl:text-5xl dark:text-white">
                    {!! trans('home.banner.infotag') !!}
                </h1>
                <p  class="max-w-2xl mb-6 font-light text-gray-500 lg:mb-8 md:text-lg lg:text-xl dark:text-gray-200">{!! trans('home.banner.content1') !!}</p>
            <div class="hidden md:flex justify-between items-center">
                <div>
                    <button title="getstarted" x-data={} x-on:click="$dispatch('open-modal')"
                        class="inline-flex items-center justify-center px-5 py-3 text-base font-medium text-center text-gray-900 border border-gray-400 rounded-lg hover:bg-white focus:ring-4 focus:ring-gray-100 dark:text-white dark:border-gray-500 dark:hover:bg-gray-700 dark:focus:ring-gray-800">
                        {{__('home.banner.button1')}}
                        <svg class="w-5 h-5 ml-2 -mr-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                    </button>
                </div>
                <div class="w-24 text-black dark:text-white ">
                    <svg class="w-24 h-24" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 200 201"><path d="M0 21.3v21.3h42.4V0H0v21.3Zm36.3 0v15.2H6V6h30.2v15.2Z"/><path d="M12.2 21.3v9h18v-18h-18v9ZM48.5 3v3.1h18.3v12.3h-6.1v-6.1h-6.1v6h6v12h-6v6.2h-6.1v12.2h6v6.1h-12v-6h-6.1v6h6V61h-6v6h6v6.2h-6V79h6v6.2h-6v6h-6v-6h-6v12.2H12.3v12.3H6v12.2H0v30.3h12.2v-6h6v6h6.2v-6h-6.1V140h30.2v18.4h12.2v-6.1h-6.1V140h12.2v12.3h11.9v6h-12v6.2h-12v6.1h-6.1v12h6v-12h6.2v6.1h6v5.9h-6v6.1H48.5V201h18.3v-6.2h-6.1v-6h12.1V201h36.3v-6.2h-6v-6h6v-6.2h6.1V201h6.1v-12.3h5.8v-6h12.2v6h-6v6.2h6v6H176v-6h24v-18.2h-6v-6h-6.2v-12.3h6.1V146h-6v-6H200v-6.2h-6v-6.1h-6.2V140h-6v6.1h6v6.2h-6v12.2h-5.9v-18.4h-18.3v-6h6.1v-6.2h-12.2v12.2h-6v12.3h-6.1v-6.1h-6.1v12.2h6v12.3h-12.1v-6.1h-5.9v6h-18.2v6H97v-6h-6.1v-6h-6.1v6h-18v-6h6v-6.2h12v-6h6v6H97v6.2h6v-6.2h-6v-6h18.2v6h12v-6h-12v-6.2h6.1v-6.1h5.9V140h6v6h6.1v-6h6.1v-12.3h6.1V122h12.2v5.8h6.1v6.1h12v-6h-12v-6h6v-6h-6v-6.2h6v-6.1h6v-6.1h6v12.2h6v6.1h-12.1v6.2H200V91.3h-6.1v6.2h-6.1v-6.2h-6v6.2h-6v-6.2h-12.1v6.2h-6v-6.2h-6.2v6.2h-6v-6.2h-6.2v-6h6.1v-12h12.2V79h-6v6.1h6v-6h6.1v6h6.1v-18h6v6h12V79H200v-5.9h-12.2v-6H200V61h-6.1v-6h6v-6.1h-6v6h-12.2V61h6.1v6.1h-12V55h-12.1v-6.1h-6v6h6V61h6v6.1h-12.1V61h-6v6.1h-6.2V55h-6V36.5h6v6.1h6.1V30.4h-12.2v6h-6V55H127V30.3h6.1v-12h6.1v6.2h12.2v-6.1h-6v-6.2h-12.3V0h-6v12.3h-5.9V6h-6V0H109v12.3h12.2v6h-6v6.2H109v-6.1h-6V6h-6v6.1h-6.1v-6h-6.1V0h-6.1v6.1h-5.8V0H48.5v3Zm30.2 15.4v6h6v-12H91v6h6v24.3h-6v-6.1h-6.1v6h-6.1v-6h-5.9v18.3h5.9v-6h6v6h6.1v-6H97v6h-6V61H73v6h11.8v6.2h-6V79h6v12.3h-12v6.1H60.6v6.1h6.1v6.2h6.1v-6.2h5.9v-6h12.1v-6.2H103v-6.1h6.1v6.1h12.2v6.1h-6v6.1H103v12.3h6.1v-6.1h6.1v6h-6v6.2H103v-6.1h-6v-12.3h6v-6H90.8v12.2h-18v6h5.9v12h-5.9v6.2h5.9v6.1h-5.9v-6.1h-6v-6.1h6v-12h-6v6.1H54.5V140h-6.1v-12.2h-6.1v6h-18v-6h-6.1V140h-6.1v6.1h-6V134h6v-6.1h-6V122h24v5.9h12.3V122h-6.1v-6.1h-12v-6.1h5.9v-6.2h12.2v-6h-6.1v-6.2h6v-6.1h12.3V79H42.4v-5.9h12.2V67h6v-6h-6v-6.1h6V42.6h-6v-6.1h6v-6.1h6.2v6h6v-6h5.9v-5.9h-5.8V12.2h5.8v6.2Zm48.4 3v3h-5.8v-6h5.9v3Zm-5.8 18.1v9.2h-6V36.5h-6.1v12.2H103V36.5h6v-6.2h12.2v9.2Zm-6 18.4v3h6v-6h5.9v6h6v6.2h12.2v6.1h-6v12h-24.2V79h-12.1v-5.9H97V79h-6.1v-5.9h6V67h6.2v6.1h6V54.8h6.1v3ZM48.4 64v3h-6.1v-6h6v3Zm90.8 30.4v3h6.1v12.3h6.1v-6.1h6.1v6h6.1v6.2h-12.2v6.1h-12.2V140h-6v-6h-12v12h-6v6.2H103V146h12.2v-6H103v-6.2h-6v-6.1h-6.1V140h6v6.2h-6v6h-6.1v-36.4h6v6.1H97v5.9h6v6h18.3V122h5.8v-6.1h-5.8v-6.1h5.8V91.3h12.2v3Zm-121 18.3v3.1h-6.1v-6.1h6v3Zm151.5 48.8v9.2h-18.3v-18.4h18.3v9.2Zm18 15.1v6h-18v6.2h6v6h-6v-6h-6v6h-24.5v-6h18.3v-6.2h-18.3v-5.8h24.4v5.8h6.1v-5.8h12v-6.1h6v6Zm-97 9v3.2H97v6h-6.1v-6h-6.1v6h-6.1v-6h-5.8v-6.2h18v3Z"/><path d="M60.7 39.5v3h6v-6h-6v3Zm0 18.5v3h6v-6.2h-6V58Zm-6.1 18.1v3h6v6h-6v6.2h-6.1v18.4H36.3v6h6v6.2h6.2v-12.2h6V91.3h6.2v-6.1h6v-12H54.6v3Zm18.2 6v3h5.9v-6h-5.9v3Zm-12.1 30.7v3h6v-6.1h-6v3ZM121.3 70v9h5.9V61h-5.9v9Zm11.9 30.5v3h6.1v-6h-6v3Zm-6 12.3v3h18.2v-6.1h-18.3v3Zm30.4 48.7v3h6.1v-6h-6v3Zm0-140.2v21.3H200V0h-42.4v21.3Zm36.3 0v15.2h-30.2V6H194v15.2Z"/><path d="M169.8 21.3v9h18v-18h-18v9ZM0 58v9h6v6.1H0v12h6v6.1h6.2v-6.1h6V79h12V61h-5.8v-6.2h5.8v-6h-12V61h6.2v12.2h-6.1v5.9H6v-5.9h6v-6H6V54.8h6v-6.2H0V58Zm0 42.5v3h6v-6H0v3Zm30.2 48.7v3h12.2v-6H30.2v3ZM0 179.7V201h42.4v-42.6H0v21.3Zm36.3 0v15.2H6v-30.4h30.2v15.2Z"/><path d="M12.2 179.7v9h18v-18h-18v9Z"/></svg>
                </div>

            </div>
            @if ($agent->isMobile())
            <div class="flex w-full justify-between ">
                <div id="bm" class="w-full h-full justify-between " txt-data="{{__('home.aboutus.infotag')}}">
                </div>
<?php /*
                <div class="block">
                    <button title="getstarted" x-data={} x-on:click="$dispatch('open-modal')"
                        class="inline-flex items-center justify-center px-5 py-3 text-base font-medium text-center text-gray-900 border border-gray-400 rounded-lg hover:bg-white focus:ring-4 focus:ring-gray-100 dark:text-white dark:border-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-800">
                        {{__('home.banner.button1')}}
                        <svg class="w-5 h-5 ml-2 -mr-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                    </button>
                </div>
*/ ?>
            </div>
            @endif

        </div>


        @if ($agent->isMobile())
        <div id="animate"
        data-te-animation-init
        data-te-animation-reset="true"
        data-te-animation-start="manually"
        data-te-animation="[fly-in-left_0.5s]"
        data-te-animation-show-on-load="false"
         class="h-[284px] z-10 md:hidden mt-10 lg:mt-0 lg:col-span-5 lg:flex">
            <img id="bannerImg" class="opacity-0"  width="380" height="284" data-src="{{env('IMAGE_URL','https://www.mediaoto.id')}}/images/phone-mockup-mobile.webp" alt="mediaoto-apps" title="mediaoto-apps">
        </div>


        <div class="-mt-16 text-right">
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

        @else
        <div id="animate"
        data-te-animation-init
        data-te-animation-reset="true"
        data-te-animation-start="manually"
        data-te-animation="[fly-in-left_0.5s]"
        data-te-animation-show-on-load="false"
         class="z-10 mt-10 lg:mt-0 lg:col-span-5 lg:flex">
            <img id="bannerImg" class="opacity-0" width="520" height="389" data-src="{{env('IMAGE_URL','https://www.mediaoto.id')}}/images/phone-mockup-desktop.webp" alt="mediaoto-apps" title="mediaoto-apps">
        </div>


        @endif
    </div>
    <script>



    </script>


</section>
