@if ($this->isMobile == false)
    <header id="home">
        <nav class="bg-white  border-gray-300 dark:bg-gray-800  drop-shadow-lg fixed  top-0 start-0 w-full z-40">
            <div class="max-w-screen-xl flex flex-wrap items-center justify-between md:mx-auto p-4">
                @if (Request::segment(1) == '')
                    <a title="headerlogo" href="/#home" rel="noopener" target="_self"
                        class="flex items-center gap-3 text-gray-500 dark:text-gray-400  hover:text-gray-900 dark:hover:text-white">
                        <!-- <img src="/images/white_logo.png" class="mr-3 h-6 sm:h-9" alt="Flowbite Logo" /> -->
                        <x-application-logo :size="10" />
                        <span class="self-center text-xl font-semibold whitespace-nowrap">Mediaoto</span>
                    </a>
                @else
                    <a wire:navigate title="headerlogo" href="/" rel="noopener" target="_self"
                        class="flex items-center gap-3 text-gray-500 dark:text-gray-400  hover:text-gray-900 dark:hover:text-white">
                        <!-- <img src="/images/white_logo.png" class="mr-3 h-6 sm:h-9" alt="Flowbite Logo" /> -->
                        <x-application-logo :size="10" />
                        <span class="self-center text-xl font-semibold whitespace-nowrap">Mediaoto</span>
                    </a>
                @endif

                <div class="flex items-center gap-2 md:order-2">


                    <button title="{{ Config::get('languages')[App::getLocale()]['display'] }}"
                        id="dropdownDefaultButton" data-dropdown-toggle="dropdown"
                        class="px-2 py-2.5 text-center inline-flex items-center text-gray-500 dark:text-gray-400 hover:bg-white dark:hover:bg-gray-700 text-sm"
                        type="button">
                        <span
                            class="flag-icon flag-icon-{{ Config::get('languages')[App::getLocale()]['flag-icon'] }} px-2 md:px-4"></span>
                        <div class="hidden">
                            {{ Config::get('languages')[App::getLocale()]['display'] }}
                        </div>
                    </button>

                    <!-- Dropdown menu -->
                    <div id="dropdown"
                        class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700 ">
                        <ul class="py-2 text-sm text-gray-700 dark:text-gray-200"
                            aria-labelledby="dropdownDefaultButton">
                            @foreach (Config::get('languages') as $lang => $language)
                                @if ($lang != App::getLocale())
                                    <li>
                                        <a wire:navigate title="{{ $language['display'] }}"
                                            class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white"
                                            href="{{ route('lang.switch', $lang) }}">
                                            <span class="flag-icon flag-icon-{{ $language['flag-icon'] }} px-4"></span>
                                            {{ $language['display'] }}
                                        </a>
                                    </li>
                                @endif
                            @endforeach
                    </div>

                    <div class="justify-center">
                        <?php /***************** Theme Toggle *************** */ ?>
                        <button id="theme-toggle" title="Toggle Theme" aria-label="btn-theme-toggle" type="button"
                            class="w-8 h-8 relative text-gray-500 dark:text-gray-400 hover:bg-white dark:hover:bg-gray-700 text-sm">
                            <svg id="theme-toggle-dark-icon"
                                class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-5 h-5 hidden"
                                fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z"></path>
                            </svg>
                            <svg id="theme-toggle-light-icon"
                                class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-5 h-5 hidden"
                                fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 000 2h1z"
                                    fill-rule="evenodd" clip-rule="evenodd"></path>
                            </svg>
                        </button>
                    </div>
                    <?php /*
                <button id="btnlink" data-collapse-toggle="navbar-search" type="button"
                    class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-white focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
                    aria-controls="navbar-search" aria-expanded="false">
                    <span class="sr-only">Open main menu</span>
                    <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 17 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M1 1h15M1 7h15M1 13h15" />
                    </svg>
                </button>
                */
                    ?>
                    <button id="btnlink2" type="button"
                        class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-white focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
                        aria-expanded="false">
                        <span class="sr-only">Open main menu</span>
                        <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 17 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M1 1h15M1 7h15M1 13h15" />
                        </svg>
                    </button>
                </div>

                <div class="items-center justify-between hidden z-50 w-full md:flex md:w-auto md:order-1"
                    id="navbar-search">
                    <ul
                        class="flex flex-col p-4 md:p-0 mt-4 font-medium border border-gray-400 rounded-lg  md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0  dark:bg-gray-800">
                        <li>
                            @if (Request::segment(1) == '')
                                <a title="home" href="/#home" rel="noopener" target="_self"
                                    class="navlink block py-2 px-3 text-gray-900 rounded hover:bg-white md:hover:bg-transparent md:hover:text-[#FF9119] md:p-0 dark:text-white md:dark:hover:text-[#FF9119] dark:hover:bg-gray-700 dark:focus:text-[#FF9119] dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">
                                    {{ __('home.nav.home') }}
                                </a>
                            @else
                                <button wire:click.prevent="getPage('/','home')"
                                    class="navlink block py-2 px-3 text-gray-900 rounded hover:bg-white md:hover:bg-transparent md:hover:text-[#FF9119] md:p-0 dark:text-white md:dark:hover:text-[#FF9119] dark:hover:bg-gray-700 dark:focus:text-[#FF9119] dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">
                                    {{ __('home.nav.home') }}
                                </button>
                            @endif
                        </li>
                        <li>
                            @if (Request::segment(1) == '')
                                <a title="about-us" href="/#aboutus" rel="noopener" target="_self"
                                    class="navlink block py-2 px-3 text-gray-900 rounded hover:bg-white md:hover:bg-transparent md:hover:text-[#FF9119] md:p-0 dark:text-white md:dark:hover:text-[#FF9119] dark:hover:bg-gray-700 dark:focus:text-[#FF9119] dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">
                                    {{ __('home.nav.about') }}
                                </a>
                            @else
                                <button wire:click.prevent="getPage('/','aboutus')"
                                    class="navlink block py-2 px-3 text-gray-900 rounded hover:bg-white md:hover:bg-transparent md:hover:text-[#FF9119] md:p-0 dark:text-white md:dark:hover:text-[#FF9119] dark:hover:bg-gray-700 dark:focus:text-[#FF9119] dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">
                                    {{ __('home.nav.about') }}

                                </button>
                            @endif
                        </li>
                        <li>
                            @if (Request::segment(1) == '')
                                <a title="products" href="/#products"  rel="noopener" target="_self"
                                    class="block py-2 px-3 text-gray-900 rounded hover:bg-white md:hover:bg-transparent md:hover:text-[#FF9119] md:p-0 dark:text-white md:dark:hover:text-[#FF9119] dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">
                                    {{ __('home.nav.products') }}
                                </a>
                            @else
                                <button wire:click.prevent="getPage('/','products')"
                                    class="navlink block py-2 px-3 text-gray-900 rounded hover:bg-white md:hover:bg-transparent md:hover:text-[#FF9119] md:p-0 dark:text-white md:dark:hover:text-[#FF9119] dark:hover:bg-gray-700 dark:focus:text-[#FF9119] dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">
                                    {{ __('home.nav.products') }}
                                </button>
                            @endif
                        </li>
                        <li>
                            <a wire:navigate title="news" href="/news" rel="noopener" target="_self"
                                class="block py-2 px-3 text-gray-900 rounded hover:bg-white md:hover:bg-transparent md:hover:text-[#FF9119] md:p-0 dark:text-white md:dark:hover:text-[#FF9119] dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">
                                {{ __('home.nav.news') }}
                            </a>

                            <?php /*
                        <button wire:click.prevent="getPage('news','')"
                            class="navlink block py-2 px-3 text-gray-900 rounded hover:bg-white md:hover:bg-transparent md:hover:text-[#FF9119] md:p-0 dark:text-white md:dark:hover:text-[#FF9119] dark:hover:bg-gray-700 dark:focus:text-[#FF9119] dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">
                            {{ __('home.nav.news') }}
                        </button>
                        */
                            ?>
                        </li>
                        <li>
                            @if (Request::segment(1) == '')
                                <a title="price" href="/#price" rel="noopener" target="_self"
                                    class="block py-2 px-3 text-gray-900 rounded hover:bg-white md:hover:bg-transparent md:hover:text-[#FF9119] md:p-0 dark:text-white md:dark:hover:text-[#FF9119] dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">
                                    {{ __('home.nav.price') }}
                                </a>
                            @else
                                <button wire:click.prevent="getPage('/','price')"
                                    class="navlink block py-2 px-3 text-gray-900 rounded hover:bg-white md:hover:bg-transparent md:hover:text-[#FF9119] md:p-0 dark:text-white md:dark:hover:text-[#FF9119] dark:hover:bg-gray-700 dark:focus:text-[#FF9119] dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">
                                    {{ __('home.nav.price') }}
                                </button>
                            @endif
                        <li>
                            <button title="contact-us" x-data
                                x-on:click="$dispatch('open-modal');document.getElementById('btnlink2').click();"
                                class="block py-2 px-3 text-gray-900 rounded hover:bg-white md:hover:bg-transparent md:hover:text-[#FF9119] md:p-0 dark:text-white md:dark:hover:text-[#FF9119] dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">
                                {{ __('home.nav.contact') }}
                            </button>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
@else
    <!-- mobile -->
    <header id="home">
        <nav class="bg-white  border-gray-300 dark:bg-gray-800  drop-shadow-lg fixed  top-0 start-0 w-full z-40">
            <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-2 p-1">
                @if (Request::segment(1) == '')
                    <a title="headerlogo" href="/#home" rel="noopener" target="_self"
                        class="flex items-center gap-3 text-gray-500 dark:text-gray-400  hover:text-gray-900 dark:hover:text-white">
                        <!-- <img src="/images/white_logo.png" class="mr-3 h-6 sm:h-9" alt="Flowbite Logo" /> -->
                        <x-application-logo :size="6" />
                        <span class="self-center text-lg font-semibold whitespace-nowrap">Mediaoto</span>
                    </a>
                @else
                    <a wire:navigate title="headerlogo" href="/" rel="noopener" target="_self"
                        class="flex items-center gap-3 text-gray-500 dark:text-gray-400  hover:text-gray-900 dark:hover:text-white">
                        <!-- <img src="/images/white_logo.png" class="mr-3 h-6 sm:h-9" alt="Flowbite Logo" /> -->
                        <x-application-logo :size="6" />
                        <span class="self-center text-lg font-semibold whitespace-nowrap">Mediaoto</span>
                    </a>
                @endif

                <div class="flex items-center gap-2 md:order-2">

                    <button title="{{ Config::get('languages')[App::getLocale()]['display'] }}"
                        id="dropdownDefaultButton" data-dropdown-toggle="dropdown"
                        class="px-2 py-2.5 text-center inline-flex items-center text-gray-500 dark:text-gray-400 hover:bg-white dark:hover:bg-gray-700 text-sm"
                        type="button">
                        <span
                            class="flag-icon flag-icon-{{ Config::get('languages')[App::getLocale()]['flag-icon'] }} px-2 md:px-4"></span>
                        <div class="hidden">
                            {{ Config::get('languages')[App::getLocale()]['display'] }}
                        </div>
                    </button>

                    <!-- Dropdown menu -->
                    <div id="dropdown"
                        class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700 ">
                        <ul class="py-2 text-sm text-gray-700 dark:text-gray-200"
                            aria-labelledby="dropdownDefaultButton">
                            @foreach (Config::get('languages') as $lang => $language)
                                @if ($lang != App::getLocale())
                                    <li>
                                        <a wire:navigate title="{{ $language['display'] }}"
                                            class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white"
                                            href="{{ route('lang.switch', $lang) }}">
                                            <span
                                                class="flag-icon flag-icon-{{ $language['flag-icon'] }} px-4"></span>
                                            {{ $language['display'] }}
                                        </a>
                                    </li>
                                @endif
                            @endforeach
                    </div>

                    <div class="justify-center">
                        <?php /***************** Theme Toggle *************** */ ?>
                        <button id="theme-toggle" title="Toggle Theme" aria-label="btn-theme-toggle" type="button"
                            class="w-8 h-8 relative text-gray-500 dark:text-gray-400 hover:bg-white dark:hover:bg-gray-700 text-sm">
                            <svg id="theme-toggle-dark-icon"
                                class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-5 h-5 hidden"
                                fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z"></path>
                            </svg>
                            <svg id="theme-toggle-light-icon"
                                class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-5 h-5 hidden"
                                fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 000 2h1z"
                                    fill-rule="evenodd" clip-rule="evenodd"></path>
                            </svg>
                        </button>
                    </div>
                    <?php /*
                <button id="btnlink" data-collapse-toggle="navbar-search" type="button"
                    class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-white focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
                    aria-controls="navbar-search" aria-expanded="false">
                    <span class="sr-only">Open main menu</span>
                    <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 17 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M1 1h15M1 7h15M1 13h15" />
                    </svg>
                </button>
                */
                    ?>



                </div>
                <div id="mobilenav" class="flex">
                    <div class="flex pt-1 mb-2  overflow-x-scroll w-[380px] space-x-8 flex-nowrap text-nowrap">

                        @if (Request::segment(1) == '')
                            <a title="home" href="/#home" rel="noopener" target="_self"
                                class="flex-shrink-0 dark:text-gray-400">
                                {{ __('home.nav.home') }}
                            </a>
                        @else
                            <button wire:click.prevent="getPage('/','home')" class="navlink flex-shrink-0 dark:text-gray-400">
                                {{ __('home.nav.home') }}
                            </button>
                        @endif

                        @if (Request::segment(1) == '')
                            <a title="about-us" href="/#aboutus" rel="noopener" target="_self"
                                class="flex-shrink-0 dark:text-gray-400">
                                {{ __('home.nav.about') }}
                            </a>
                        @else
                            <button wire:click.prevent="getPage('/','aboutus')"
                                class="navlink flex-shrink-0 dark:text-gray-400 ">
                                {{ __('home.nav.about') }}

                            </button>
                        @endif

                        @if (Request::segment(1) == '')
                            <a title="products" href="/#products" rel="noopener" target="_self"
                                class="flex-shrink-0 dark:text-gray-400">
                                {{ __('home.nav.products') }}
                            </a>
                        @else
                            <button wire:click.prevent="getPage('/','products')"
                                class="navlink flex-shrink-0 dark:text-gray-400">
                                {{ __('home.nav.products') }}
                            </button>
                        @endif

                        <a wire:navigate title="news" href="/news" rel="noopener" target="_self"
                            class="flex-shrink-0 dark:text-gray-400">
                            {{ __('home.nav.news') }}
                        </a>

                        <?php /*
        <button wire:click.prevent="getPage('news','')"
            class="navlink block py-2 px-3 text-gray-900 rounded hover:bg-white md:hover:bg-transparent md:hover:text-[#FF9119] md:p-0 dark:text-white md:dark:hover:text-[#FF9119] dark:hover:bg-gray-700 dark:focus:text-[#FF9119] dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">
            {{ __('home.nav.news') }}
        </button>
        */
                        ?>

                        @if (Request::segment(1) == '')
                            <a title="price" href="/#price" rel="noopener" target="_self"
                                class="flex-shrink-0 dark:text-gray-400">
                                {{ __('home.nav.price') }}
                            </a>
                        @else
                            <button wire:click.prevent="getPage('/','price')"
                                class="navlink flex-shrink-0 dark:text-gray-400">
                                {{ __('home.nav.price') }}
                            </button>
                        @endif

                        <button title="contact-us" x-data
                            x-on:click="$dispatch('open-modal');"
                            class="flex-shrink-0 dark:text-gray-400">
                            {{ __('home.nav.contact') }}
                        </button>
                    </div>
                </div>
            </div>
        </nav>
    </header>
@endif
