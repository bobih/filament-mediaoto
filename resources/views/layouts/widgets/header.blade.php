<header>
    <nav class="bg-white  border-gray-300 dark:bg-gray-800  drop-shadow-lg fixed  top-0 start-0 w-full z-40">
        <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
            <a title="home" href="{{ route('home') }}" class="flex items-center flex items-center gap-3 text-gray-500 dark:text-gray-400  hover:text-gray-900 dark:hover:text-white">
                <!-- <img src="/images/white_logo.png" class="mr-3 h-6 sm:h-9" alt="Flowbite Logo" /> -->
                <x-application-logo />
                <span
                    class="self-center text-xl font-semibold whitespace-nowrap">Mediaoto</span>
            </a>
            <div class="flex md:order-2">
                <?php /*
                <button type="button" data-collapse-toggle="navbar-search" aria-controls="navbar-search"
                    aria-expanded="false"
                    class="md:hidden text-gray-500 dark:text-gray-400 hover:bg-white dark:hover:bg-gray-700 focus:outline-none focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 rounded-lg text-sm p-2.5 me-1">
                    <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 20 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                    </svg>
                    <span class="sr-only">Search</span>
                </button>

                <div class="relative hidden md:block">
                    <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                        <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                        </svg>
                        <span class="sr-only">Search icon</span>
                    </div>
                    <input type="text" id="search-navbar"
                        class="hidden md:block w-full p-2 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Search...">
                </div>
                */
                ?>
                <div class="md:px-5 flex-1w-12 md:w-20">

                        <button id="theme-toggle" type="button"
                            class="text-gray-500 dark:text-gray-400 hover:bg-white dark:hover:bg-gray-700 focus:outline-none focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 rounded-lg text-sm p-2.5">
                            <svg id="theme-toggle-dark-icon" class="w-5 h-5 hidden" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z"></path>
                            </svg>
                            <svg id="theme-toggle-light-icon" class="w-5 h-5 hidden" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
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
                <?php /*
                <div class="relative mt-3 md:hidden">
                    <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                        <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                        </svg>
                    </div>
                    <input type="text" id="search-navbar-mobile"
                        class="md:hidden block w-full p-2 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Search...">
                </div>
                */
                ?>
                <ul
                    class="flex flex-col p-4 md:p-0 mt-4 font-medium border border-gray-400 rounded-lg  md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0  dark:bg-gray-800">
                    <li>
                        <a  title="home" href="/#" rel="noopener" target="_self"
                            class="navlink block py-2 px-3 text-gray-900 rounded hover:bg-white md:hover:bg-transparent md:hover:text-[#FF9119] md:p-0 dark:text-white md:dark:hover:text-[#FF9119] dark:hover:bg-gray-700 dark:focus:text-[#FF9119] dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">
                            Home
                        </a>
                    </li>
                    <li>
                        <a title="aboutus" href="/#aboutus" rel="noopener" target="_self"
                            class="navlink block py-2 px-3 text-gray-900 rounded hover:bg-white md:hover:bg-transparent md:hover:text-[#FF9119] md:p-0 dark:text-white md:dark:hover:text-[#FF9119] dark:hover:bg-gray-700 dark:focus:text-[#FF9119] dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">
                            About Us
                        </a>
                    </li>
                    <li>
                        <a title="products" href="/#products" rel="noopener" target="_self"
                            class="block py-2 px-3 text-gray-900 rounded hover:bg-white md:hover:bg-transparent md:hover:text-[#FF9119] md:p-0 dark:text-white md:dark:hover:text-[#FF9119] dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">
                            Products
                        </a>
                    </li>
                    <li>
                        <a title="news" href="/news" rel="noopener" target="_self"
                            class="block py-2 px-3 text-gray-900 rounded hover:bg-white md:hover:bg-transparent md:hover:text-[#FF9119] md:p-0 dark:text-white md:dark:hover:text-[#FF9119] dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">
                            News
                        </a>
                    </li>
                    <li>
                        <a title="price" href="/#price" rel="noopener" target="_self"
                            class="block py-2 px-3 text-gray-900 rounded hover:bg-white md:hover:bg-transparent md:hover:text-[#FF9119] md:p-0 dark:text-white md:dark:hover:text-[#FF9119] dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">
                            Pricing
                        </a>
                    <li>
                        <a title="contactus" href="javascript:void(0)" rel="noopener" target="_self" x-data
                            x-on:click="$dispatch('open-modal')"
                            class="block py-2 px-3 text-gray-900 rounded hover:bg-white md:hover:bg-transparent md:hover:text-[#FF9119] md:p-0 dark:text-white md:dark:hover:text-[#FF9119] dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">Contact
                            Us</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>
