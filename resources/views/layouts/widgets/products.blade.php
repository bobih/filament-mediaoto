<div id="products" class="-mt-20 mb-20 "></div>

@if ($agent->isMobile() == false)
<!-- Desktop -->
    <section class="bg-gray-100 dark:bg-gray-900 ">
        <div class="py-8 px-4 mx-auto max-w-screen-xl sm:py-16 lg:px-6">
            <div class="max-w-screen-md mb-8 lg:mb-16">
                <h2 data-te-animation-init data-te-animation-start="onScroll" data-te-animation-on-scroll="repeat"
                    data-te-animation-show-on-load="false" data-te-animation-reset="true"
                    data-te-animation="[fade-in_1s_ease-in-out]"
                    class="mb-4 text-4xl tracking-tight font-bold text-gray-900 dark:text-white">
                    {{ __('home.products.infotag') }}</h2>
                <p class="text-gray-500 sm:text-xl dark:text-gray-400">{{ __('home.products.titletag') }}</p>
            </div>
            <div class="space-y-8 md:grid md:grid-cols-2 lg:grid-cols-4 md:gap-12 md:space-y-0">
                <!-- Products -->
                <div class="scale-50 opacity-0 intersect:scale-100 intersect:opacity-100 transition duration-700">
                    <div class="flex justify-left items-center mb-4 w-75 h-75  lg:h-75 lg:w-75 ">
                        <svg class="h-20 w-20 " height="150px" width="150px" viewBox="0 0 150 150"
                            xmlns="http://www.w3.org/2000/svg"
                            style="shape-rendering:geometricPrecision;text-rendering:geometricPrecision;image-rendering:optimizeQuality;fill-rule:evenodd;clip-rule:evenodd">
                            <path style="opacity:.941" fill="#4c5b67"
                                d="M88.5 48.5c-.904-.709-1.237-1.709-1-3h-4a635.673 635.673 0 0 1 21-21.5c9.664-2 13.831 1.833 12.5 11.5-3.771 6.783-9.438 10.783-17 12a41.908 41.908 0 0 1-7-2 20.938 20.938 0 0 0-4.5 3Zm19-19c3.18-.324 4.347 1.01 3.5 4a34.706 34.706 0 0 1-7.5 6.5c-2 .667-4 .667-6 0a147.32 147.32 0 0 0 10-10.5Z" />
                            <path style="opacity:.972" fill="#fee481"
                                d="M83.5 45.5h4c-.237 1.291.096 2.291 1 3v1h-2a4.932 4.932 0 0 0-.5-3 371.245 371.245 0 0 1-16.5 16 44.358 44.358 0 0 1-2-1l-5 4c-6.88-1.802-10.88.865-12 8-.033 2.602.967 4.602 3 6 .578 4.435-1.09 5.768-5 4 .61-3.461-.556-6.128-3.5-8-2.638 2.794-3.138 5.961-1.5 9.5l-5 5c.88.708 1.547 1.542 2 2.5-3 2.333-5.667 5-8 8a305.757 305.757 0 0 1-15-14.5l40-40c8.66-.5 17.327-.666 26-.5Z" />
                            <path style="opacity:.996" fill="#fec452"
                                d="M86.5 49.5c.166 8.673 0 17.34-.5 26a428.51 428.51 0 0 0-29.5 31c-3.954 2.12-7.121 5.12-9.5 9a111.565 111.565 0 0 0-13-12l-1.5-3c2.333-3 5-5.667 8-8h1c.06.543.393.876 1 1l5-4c7.361 2.322 11.361-.345 12-8 .137-2.34-.53-4.34-2-6-1.768-3.91-.435-5.578 4-5 1.035 1.705 1.035 3.372 0 5 2.483 5.036 4.65 5.036 6.5 0 .687-2.067.52-4.067-.5-6a25.522 25.522 0 0 1 4-4.5c-.544-.717-1.21-1.217-2-1.5v-1a371.245 371.245 0 0 0 16.5-16c.483.948.65 1.948.5 3Z" />
                            <path style="opacity:.998" fill="#ff6922"
                                d="M86.5 49.5h2c4.72 5.077 9.22 10.41 13.5 16a853.336 853.336 0 0 1-5.5 58 502.815 502.815 0 0 1-40.5-5l-1.5-1a253.112 253.112 0 0 0 2-11 428.51 428.51 0 0 1 29.5-31c.5-8.66.666-17.327.5-26Z" />
                            <path style="opacity:1" fill="#fe7f4c"
                                d="M69.5 62.5v1l-8 7c-4.435-.578-5.768 1.09-4 5-1.667 1-3 2.333-4 4-2.033-1.398-3.033-3.398-3-6 1.12-7.135 5.12-9.802 12-8l5-4c.683.363 1.35.696 2 1Z" />
                            <path style="opacity:1" fill="#ff4f59"
                                d="M69.5 63.5c.79.283 1.456.783 2 1.5a25.522 25.522 0 0 0-4 4.5c1.02 1.933 1.187 3.933.5 6-1.85 5.036-4.017 5.036-6.5 0 1.035-1.628 1.035-3.295 0-5l8-7Z" />
                            <path style="opacity:1" fill="#fe7f4d"
                                d="M48.5 83.5a44.889 44.889 0 0 0-7 9h-1c-.453-.958-1.12-1.792-2-2.5l5-5c-1.638-3.539-1.138-6.706 1.5-9.5 2.944 1.872 4.11 4.539 3.5 8Z" />
                            <path style="opacity:1" fill="#ff4a5a"
                                d="M57.5 75.5c1.47 1.66 2.137 3.66 2 6-.639 7.655-4.639 10.322-12 8l-5 4c-.607-.124-.94-.457-1-1a44.889 44.889 0 0 1 7-9c3.91 1.768 5.578.435 5-4 1-1.667 2.333-3 4-4Z" />
                        </svg>

                    </div>
                    <h3 class="mb-2 text-xl font-bold dark:text-white">{{ __('home.products.product1tag') }}</h3>
                    <p class="text-gray-500 dark:text-gray-400">{{ __('home.products.product1desc') }}</p>
                </div>
                <!-- Products -->
                <div class="scale-50 opacity-0 intersect:scale-100 intersect:opacity-100 transition duration-700 delay-200">
                    <div class="flex justify-left items-center mb-4 w-75 h-75  lg:h-75 lg:w-75 ">
                        <svg class="h-20 w-20" height="150px" width="150px" viewBox="0 0 150 150"
                            xmlns="http://www.w3.org/2000/svg"
                            style="shape-rendering:geometricPrecision;text-rendering:geometricPrecision;image-rendering:optimizeQuality;fill-rule:evenodd;clip-rule:evenodd">
                            <path style="opacity:.94" fill="#cfeee2"
                                d="M90.5 42.5c14.913 5.766 23.08 16.766 24.5 33 1.248 11.587-1.919 21.754-9.5 30.5a26.523 26.523 0 0 0-6 3.5c.353-2.135-.48-3.468-2.5-4-1.75.248-2.582 1.248-2.5 3a44.147 44.147 0 0 1-2-1c-.667 4.482-1.334 8.816-2 13v-78Z" />
                            <path style="opacity:1" fill="#fa6cad"
                                d="M101.5 56.5c4.271 1.803 4.605 3.803 1 6-3.5-1.62-3.832-3.62-1-6Z" />
                            <path style="opacity:1" fill="#5ff0b9"
                                d="M30.5 62.5c5.514 2.06 5.847 4.394 1 7a6.541 6.541 0 0 1-3-3c1.13-1.122 1.797-2.456 2-4Z" />
                            <path style="opacity:1" fill="#4540c7"
                                d="M90.5 42.5v78c-1.677-.683-2.343-2.017-2-4v-69c.396-2.544-.271-4.711-2-6.5-14-.667-28-.667-42 0-1.729 1.789-2.396 3.956-2 6.5v30l-2 43a3121 3121 0 0 1 .5-79 10.521 10.521 0 0 0 2.5-3 304.89 304.89 0 0 1 42-.5c2.486.656 4.153 2.156 5 4.5Z" />
                            <path style="opacity:1" fill="#9badfc"
                                d="M88.5 57.5v13h-5a72.444 72.444 0 0 1 .5-12c1.356-.88 2.856-1.214 4.5-1Z" />
                            <path style="opacity:1" fill="#2f59de"
                                d="M42.5 47.5h46v10c-1.644-.214-3.144.12-4.5 1a72.444 72.444 0 0 0-.5 12h5v6a265.007 265.007 0 0 0-46 0v-29Z" />
                            <path style="opacity:1" fill="#2af6b8"
                                d="M67.5 57.5h13v13a84.938 84.938 0 0 1-13-.5c-1.303-4.166-1.303-8.333 0-12.5Z" />
                            <path style="opacity:1" fill="#e1fff5"
                                d="M72.5 66.5c1.788-.285 3.455.048 5 1-1.921 1.141-3.921 1.308-6 .5.556-.383.89-.883 1-1.5Z" />
                            <path style="opacity:1" fill="#f681bc"
                                d="M51.5 57.5a72.444 72.444 0 0 1 12 .5c1.333 4 1.333 8 0 12-4.32.499-8.654.666-13 .5a46.797 46.797 0 0 1 1-13Z" />
                            <path style="opacity:1" fill="#ffecf4"
                                d="M55.5 66.5c2.25-.319 4.25.181 6 1.5l-3 .5c-1.53-.14-2.53-.806-3-2Z" />
                            <path style="opacity:1" fill="#f4f6fd"
                                d="M54.5 51.5a121.87 121.87 0 0 1 22 1l-11 1c-4.065-.011-7.732-.678-11-2Z" />
                            <path style="opacity:1" fill="#6583fd"
                                d="M88.5 47.5h-46c-.396-2.544.271-4.711 2-6.5 14-.667 28-.667 42 0 1.729 1.789 2.396 3.956 2 6.5Z" />
                            <path style="opacity:1" fill="#afbffe"
                                d="M61.5 42.5c2.747-.313 5.413.02 8 1l-4 1c-1.833-.085-3.166-.752-4-2Z" />
                            <path style="opacity:1" fill="#fd8bbd"
                                d="M28.5 72.5c5.854 1.796 6.187 4.13 1 7a15.044 15.044 0 0 1-3-3.5c.93-1.077 1.596-2.244 2-3.5Z" />
                            <path style="opacity:1" fill="#fafbfe"
                                d="M88.5 76.5v40h-46v-40a265.007 265.007 0 0 1 46 0Z" />
                            <path style="opacity:1" fill="#2efeb9" d="M46.5 82.5h6v6c-5 1-7-1-6-6Z" />
                            <path style="opacity:1" fill="#50e2ac"
                                d="M56.5 82.5a18.436 18.436 0 0 1 6 .5c-2.38 2.142-4.38 1.975-6-.5Z" />
                            <path style="opacity:1" fill="#bdc7fe"
                                d="M56.5 86.5c8.673-.166 17.34 0 26 .5-4.326 1.14-8.826 1.64-13.5 1.5-4.557-.008-8.724-.675-12.5-2Z" />
                            <path style="opacity:1" fill="#ff88bd" d="M46.5 94.5h6v6h-6v-6Z" />
                            <path style="opacity:1" fill="#ff7bb7"
                                d="M56.5 94.5a18.436 18.436 0 0 1 6 .5c-2.38 2.142-4.38 1.975-6-.5Z" />
                            <path style="opacity:1" fill="#b7c3fe"
                                d="M56.5 98.5c8.692-.331 17.359.002 26 1l-13 1c-4.722-.008-9.055-.674-13-2Z" />
                            <path style="opacity:1" fill="#a5b4fd" d="M46.5 106.5h6v6h-6v-6Z" />
                            <path style="opacity:1" fill="#8a9ffe"
                                d="M56.5 106.5a9.86 9.86 0 0 1 6 1l-3 1c-1.53-.14-2.53-.807-3-2Z" />
                            <path style="opacity:.992" fill="#7e96fc"
                                d="M99.5 109.5c-2.256 2.805-3.923 2.472-5-1-.082-1.752.75-2.752 2.5-3 2.02.532 2.853 1.865 2.5 4Z" />
                            <path style="opacity:1" fill="#afbbfd"
                                d="M56.5 110.5c8.692-.331 17.359.002 26 1l-13 1c-4.722-.008-9.055-.675-13-2Z" />
                            <path style="opacity:.255" fill="#bac3e6"
                                d="M43.5 38.5a10.521 10.521 0 0 1-2.5 3 3121 3121 0 0 0-.5 79 1682.251 1682.251 0 0 0-3-81.5 18.436 18.436 0 0 1 6-.5Z" />
                            <path style="opacity:1" fill="#62f1be"
                                d="M98.5 113.5c5.799 1.281 6.299 3.614 1.5 7a19.897 19.897 0 0 1-3.5-4c1.112-.765 1.779-1.765 2-3Z" />
                            <path style="opacity:1" fill="#687ef5"
                                d="M42.5 77.5v39h46c-.343 1.983.323 3.317 2 4 .13 2.867-1.203 4.533-4 5-13.735-.675-27.569-1.341-41.5-2a2.427 2.427 0 0 0-.5 2c-2.797-.467-4.13-2.133-4-5l2-43Z" />
                            <path style="opacity:1" fill="#423cc2"
                                d="M86.5 125.5c-14 1.333-28 1.333-42 0a2.427 2.427 0 0 1 .5-2c13.931.659 27.765 1.325 41.5 2Z" />
                        </svg>
                    </div>
                    <h3 class="mb-2 text-xl font-bold dark:text-white">{{ __('home.products.product2tag') }}</h3>
                    <p class="text-gray-500 dark:text-gray-400">{{ __('home.products.product2desc') }}</p>
                </div>
                <!-- Products -->
                <div class="scale-50 opacity-0 intersect:scale-100 intersect:opacity-100 transition duration-700 delay-400">
                    <div class="flex justify-left items-center mb-4 w-75 h-75  lg:h-75 lg:w-75 ">
                        <svg class="h-20 w-20" height="150px" width="150px" viewBox="0 0 150 150"
                            xmlns="http://www.w3.org/2000/svg"
                            style="shape-rendering:geometricPrecision;text-rendering:geometricPrecision;image-rendering:optimizeQuality;fill-rule:evenodd;clip-rule:evenodd">
                            <path style="opacity:.993" fill="#ebeef0"
                                d="M109.5 44.5c-.667 8.51-1.333 17.176-2 26a453.004 453.004 0 0 1-36 18 453.039 453.039 0 0 1-36-18 169.875 169.875 0 0 1-1-26c-.166-5.676 0-11.343.5-17 1.563-3.228 4.063-5.395 7.5-6.5a841.208 841.208 0 0 1 58 0c3.437 1.105 5.937 3.272 7.5 6.5.212 5.748.712 11.414 1.5 17Z" />
                            <path style="opacity:1" fill="#feb309"
                                d="M90.5 68.5v-36c1.11-3.529 2.942-3.862 5.5-1 .667 13 .667 26 0 39-2.81 1.68-4.644 1.013-5.5-2Z" />
                            <path style="opacity:1" fill="#fec00c"
                                d="M90.5 32.5v36c-5.66-1.33-11.327-2.664-17-4-1.802-.958-3.802-1.625-6-2a31.705 31.705 0 0 0-6-2 19.242 19.242 0 0 0-6-1 206.168 206.168 0 0 0-8.5-2c-.801-4.919-.635-9.752.5-14.5 1.877-.576 3.71-.41 5.5.5a785.048 785.048 0 0 1 37.5-11Z" />
                            <path style="opacity:.995" fill="#2997f3"
                                d="M31.5 45.5c1.323 3.438 1.99 7.271 2 11.5l-1 11.5a108.869 108.869 0 0 1-11-5c-2.344-9.323.99-15.323 10-18Z" />
                            <path style="opacity:1" fill="#2b97f3"
                                d="M111.5 45.5c8.996 2.644 12.329 8.644 10 18-4.041 1.69-8.041 3.357-12 5-.632-8.073.035-15.74 2-23Z" />
                            <path style="opacity:.999" fill="#65b5f5"
                                d="M31.5 45.5c.709-.904 1.709-1.237 3-1a169.875 169.875 0 0 0 1 26 453.039 453.039 0 0 0 36 18 453.004 453.004 0 0 0 36-18c.667-8.824 1.333-17.49 2-26 .992-.172 1.658.162 2 1-1.965 7.26-2.632 14.927-2 23 3.959-1.643 7.959-3.31 12-5 .167 16.004 0 32.004-.5 48-1.227 2.226-3.061 3.726-5.5 4.5-29.333.667-58.667.667-88 0a17.843 17.843 0 0 1-5.5-4.5c-.5-15.996-.667-31.996-.5-48a108.869 108.869 0 0 0 11 5l1-11.5c-.01-4.229-.677-8.062-2-11.5Z" />
                            <path style="opacity:1" fill="#eee9dd"
                                d="M61.5 60.5a31.705 31.705 0 0 1 6 2c-3.595 4.357-5.595 3.69-6-2Z" />
                            <path style="opacity:1" fill="#fe9b13"
                                d="M55.5 59.5c2.065.017 4.065.35 6 1 .405 5.69 2.405 6.357 6 2 2.198.375 4.198 1.042 6 2-3.973 7.545-9.473 8.878-16.5 4-2.292-2.804-2.792-5.804-1.5-9Z" />
                        </svg>
                    </div>
                    <h3 class="mb-2 text-xl font-bold dark:text-white">{{ __('home.products.product3tag') }}</h3>
                    <p class="text-gray-500 dark:text-gray-400">{{ __('home.products.product3desc') }}</p>
                </div>
                <!-- Products -->
                <div class="scale-50 opacity-0 intersect:scale-100 intersect:opacity-100 transition duration-700 delay-600">

                    <div class="flex justify-left items-center mb-4 w-75 h-75  lg:h-75 lg:w-75 ">

                        <svg class="h-20 w-20" height="150px" width="150px" viewBox="0 0 150 150"
                            xmlns="http://www.w3.org/2000/svg"
                            style="shape-rendering:geometricPrecision;text-rendering:geometricPrecision;image-rendering:optimizeQuality;fill-rule:evenodd;clip-rule:evenodd">
                            <path style="opacity:.921" fill="#afe2a6"
                                d="M73.5 32.5h-4c-2.638-.741-3.971-2.575-4-5.5 1.042-5.023 4.042-6.69 9-5 3.335 2.679 3.835 5.845 1.5 9.5-.67.752-1.504 1.086-2.5 1Z" />
                            <path style="opacity:.992" fill="#ffde81"
                                d="M42.5 40.5c-1 .333-1.667 1-2 2-13.825 4.009-18.991-.991-15.5-15 3.743-3.76 8.243-4.926 13.5-3.5 6.167 4.344 7.5 9.844 4 16.5Z" />
                            <path style="opacity:.984" fill="#a2d8f9"
                                d="M102.5 42.5c-.333-1-1-1.667-2-2-2.834-5.012-2.5-9.845 1-14.5 9.874-5.39 15.874-2.724 18 8-2.098 9.716-7.765 12.55-17 8.5Z" />
                            <path style="opacity:.541" fill="#9ea9b2"
                                d="M69.5 32.5h4v8c1.291-.237 2.291.096 3 1h-4c-.667-10.667-1.333-10.667-2 0h-4c.709-.904 1.709-1.237 3-1v-8Z" />
                            <path style="opacity:1" fill="#3a495c" d="M72.5 41.5h-2c.667-10.667 1.333-10.667 2 0Z" />
                            <path style="opacity:.997" fill="#719fed"
                                d="M66.5 41.5h10c6.075.706 11.408 3.039 16 7 0 1.333.667 2 2 2 3.961 4.592 6.294 9.925 7 16v10c-.706 6.075-3.039 11.408-7 16-1.333 0-2 .667-2 2-4.592 3.961-9.925 6.294-16 7h-10c-6.075-.706-11.408-3.039-16-7 0-1.333-.667-2-2-2-3.961-4.592-6.294-9.925-7-16v-10c.706-6.075 3.039-11.408 7-16 1.333 0 2-.667 2-2 4.592-3.961 9.925-6.294 16-7Z" />
                            <path style="opacity:1" fill="#505d6c"
                                d="M100.5 40.5c1 .333 1.667 1 2 2-2.333 3-5 5.667-8 8-1.333 0-2-.667-2-2 2.333-3 5-5.667 8-8Z" />
                            <path style="opacity:1" fill="#525f6d"
                                d="M42.5 40.5c3 2.333 5.667 5 8 8 0 1.333-.667 2-2 2-3-2.333-5.667-5-8-8 .333-1 1-1.667 2-2Z" />
                            <path style="opacity:1" fill="#d95d76"
                                d="M86.5 62.5v13a40.936 40.936 0 0 1-.5 9c-1.726 1.076-3.56 1.243-5.5.5-.752-.67-1.086-1.504-1-2.5v-27c-.086-.996.248-1.83 1-2.5 1.667-.667 3.333-.667 5 0 .95 3.057 1.284 6.223 1 9.5Z" />
                            <path style="opacity:1" fill="#e2e6f3"
                                d="M79.5 55.5v27h-1c.262-1.478-.071-2.811-1-4a103.787 103.787 0 0 0-15-6v-10a196.035 196.035 0 0 1 17-7Z" />
                            <path style="opacity:1" fill="#d85871"
                                d="M62.5 62.5v13h-7c-.617-.11-1.117-.444-1.5-1a30.499 30.499 0 0 1 0-11c2.72-.944 5.553-1.277 8.5-1Z" />
                            <path style="opacity:1" fill="#f9d97a"
                                d="M86.5 62.5c5.864 1.754 7.364 5.421 4.5 11a9.173 9.173 0 0 1-4.5 2v-13Z" />
                            <path style="opacity:.934" fill="#b1e3a7"
                                d="M110.5 73.5v-4c3.005-4.83 6.505-5.164 10.5-1 .923 7.746-2.243 10.246-9.5 7.5-.752-.67-1.086-1.504-1-2.5Z" />
                            <path style="opacity:1" fill="#e8a764"
                                d="M32.5 69.5v4c-.741 2.638-2.575 3.971-5.5 4-5.023-1.042-6.69-4.042-5-9 2.679-3.335 5.845-3.835 9.5-1.5.752.67 1.086 1.504 1 2.5Z" />
                            <path style="opacity:.534" fill="#a0a9b5"
                                d="M41.5 66.5v4h-9v-1h8c-.237-1.291.096-2.291 1-3Z" />
                            <path style="opacity:1" fill="#3c4a5c" d="M32.5 70.5h9v2h-9v-2Z" />
                            <path style="opacity:1" fill="#39485a" d="M101.5 70.5c10.667.667 10.667 1.333 0 2v-2Z" />
                            <path style="opacity:.439" fill="#adb4bf"
                                d="M32.5 73.5v-1h9v4c-.904-.709-1.237-1.709-1-3h-8Z" />
                            <path style="opacity:1" fill="#b7c9ea"
                                d="M62.5 72.5a103.787 103.787 0 0 1 15 6c.929 1.189 1.262 2.522 1 4l-16-7v-3Z" />
                            <path style="opacity:.443" fill="#9fa8b1"
                                d="M101.5 66.5c.904.709 1.237 1.709 1 3h8v4h-8c.237 1.291-.096 2.291-1 3v-4c10.667-.667 10.667-1.333 0-2v-4Z" />
                            <path style="opacity:1" fill="#3b4b5f"
                                d="M55.5 75.5h7a72.444 72.444 0 0 1-.5 12c-2 2.667-4 2.667-6 0a72.444 72.444 0 0 1-.5-12Z" />
                            <path style="opacity:1" fill="#525e6d"
                                d="M94.5 92.5c3 2.333 5.667 5 8 8-.333 1-1 1.667-2 2-3-2.333-5.667-5-8-8 0-1.333.667-2 2-2Z" />
                            <path style="opacity:1" fill="#535e6d"
                                d="M48.5 92.5c1.333 0 2 .667 2 2-2.333 3-5 5.667-8 8-1-.333-1.667-1-2-2 2.333-3 5-5.667 8-8Z" />
                            <path style="opacity:.995" fill="#db6076"
                                d="M40.5 100.5c.333 1 1 1.667 2 2 4.009 13.825-.991 18.991-15 15.5-4.678-5.106-5.178-10.606-1.5-16.5 4.655-3.5 9.488-3.834 14.5-1Z" />
                            <path style="opacity:.993" fill="#fede81"
                                d="M100.5 102.5c1-.333 1.667-1 2-2 13.767-4.067 18.934.933 15.5 15-5.106 4.678-10.606 5.178-16.5 1.5-3.5-4.655-3.834-9.488-1-14.5Z" />
                            <path style="opacity:.54" fill="#9da7b3"
                                d="M66.5 101.5h4v9h-1v-8c-1.291.237-2.291-.096-3-1Z" />
                            <path style="opacity:.431" fill="#a8aeb8"
                                d="M72.5 101.5h4c-.709.904-1.709 1.237-3 1v8h-1v-9Z" />
                            <path style="opacity:1" fill="#414b59" d="M70.5 101.5h2v9h-2v-9Z" />
                            <path style="opacity:1" fill="#e9a867"
                                d="M69.5 110.5h4c2.638.742 3.971 2.575 4 5.5-1.042 5.023-4.042 6.69-9 5-3.335-2.679-3.835-5.845-1.5-9.5.67-.752 1.504-1.086 2.5-1Z" />
                        </svg>
                    </div>
                    <h3 class="mb-2 text-xl font-bold dark:text-white">{{ __('home.products.product4tag') }}</h3>
                    <p class="text-gray-500 dark:text-gray-400">{{ __('home.products.product4desc') }}</p>
                </div>

            </div>
        </div>
    </section>
@else
<!-- Mobile -->
    <section class="bg-gray-100 dark:bg-gray-900 ">
        <div class="py-8 px-4 mx-auto max-w-screen-xl sm:py-16 lg:px-6">
            <div class="max-w-screen-md mb-8 lg:mb-16">
                <h2 data-te-animation-init data-te-animation-start="onScroll" data-te-animation-on-scroll="repeat"
                    data-te-animation-show-on-load="false" data-te-animation-reset="true"
                    data-te-animation="[fade-in_1s_ease-in-out]"
                    class="mb-4 text-4xl tracking-tight font-bold text-gray-900 dark:text-white">
                    {{ __('home.products.infotag') }}</h2>
                <p class="text-gray-500 sm:text-xl dark:text-gray-400">{{ __('home.products.titletag') }}</p>
            </div>
            <div class="space-y-8 md:grid md:grid-cols-2 lg:grid-cols-4 md:gap-12 md:space-y-0">
                <!-- Products -->
                <div class="flex">
                    <div class="mx-4">
                        <svg class="h-20 w-20 " height="150px" width="150px" viewBox="0 0 150 150"
                            xmlns="http://www.w3.org/2000/svg"
                            style="shape-rendering:geometricPrecision;text-rendering:geometricPrecision;image-rendering:optimizeQuality;fill-rule:evenodd;clip-rule:evenodd">
                            <path style="opacity:.941" fill="#4c5b67"
                                d="M88.5 48.5c-.904-.709-1.237-1.709-1-3h-4a635.673 635.673 0 0 1 21-21.5c9.664-2 13.831 1.833 12.5 11.5-3.771 6.783-9.438 10.783-17 12a41.908 41.908 0 0 1-7-2 20.938 20.938 0 0 0-4.5 3Zm19-19c3.18-.324 4.347 1.01 3.5 4a34.706 34.706 0 0 1-7.5 6.5c-2 .667-4 .667-6 0a147.32 147.32 0 0 0 10-10.5Z" />
                            <path style="opacity:.972" fill="#fee481"
                                d="M83.5 45.5h4c-.237 1.291.096 2.291 1 3v1h-2a4.932 4.932 0 0 0-.5-3 371.245 371.245 0 0 1-16.5 16 44.358 44.358 0 0 1-2-1l-5 4c-6.88-1.802-10.88.865-12 8-.033 2.602.967 4.602 3 6 .578 4.435-1.09 5.768-5 4 .61-3.461-.556-6.128-3.5-8-2.638 2.794-3.138 5.961-1.5 9.5l-5 5c.88.708 1.547 1.542 2 2.5-3 2.333-5.667 5-8 8a305.757 305.757 0 0 1-15-14.5l40-40c8.66-.5 17.327-.666 26-.5Z" />
                            <path style="opacity:.996" fill="#fec452"
                                d="M86.5 49.5c.166 8.673 0 17.34-.5 26a428.51 428.51 0 0 0-29.5 31c-3.954 2.12-7.121 5.12-9.5 9a111.565 111.565 0 0 0-13-12l-1.5-3c2.333-3 5-5.667 8-8h1c.06.543.393.876 1 1l5-4c7.361 2.322 11.361-.345 12-8 .137-2.34-.53-4.34-2-6-1.768-3.91-.435-5.578 4-5 1.035 1.705 1.035 3.372 0 5 2.483 5.036 4.65 5.036 6.5 0 .687-2.067.52-4.067-.5-6a25.522 25.522 0 0 1 4-4.5c-.544-.717-1.21-1.217-2-1.5v-1a371.245 371.245 0 0 0 16.5-16c.483.948.65 1.948.5 3Z" />
                            <path style="opacity:.998" fill="#ff6922"
                                d="M86.5 49.5h2c4.72 5.077 9.22 10.41 13.5 16a853.336 853.336 0 0 1-5.5 58 502.815 502.815 0 0 1-40.5-5l-1.5-1a253.112 253.112 0 0 0 2-11 428.51 428.51 0 0 1 29.5-31c.5-8.66.666-17.327.5-26Z" />
                            <path style="opacity:1" fill="#fe7f4c"
                                d="M69.5 62.5v1l-8 7c-4.435-.578-5.768 1.09-4 5-1.667 1-3 2.333-4 4-2.033-1.398-3.033-3.398-3-6 1.12-7.135 5.12-9.802 12-8l5-4c.683.363 1.35.696 2 1Z" />
                            <path style="opacity:1" fill="#ff4f59"
                                d="M69.5 63.5c.79.283 1.456.783 2 1.5a25.522 25.522 0 0 0-4 4.5c1.02 1.933 1.187 3.933.5 6-1.85 5.036-4.017 5.036-6.5 0 1.035-1.628 1.035-3.295 0-5l8-7Z" />
                            <path style="opacity:1" fill="#fe7f4d"
                                d="M48.5 83.5a44.889 44.889 0 0 0-7 9h-1c-.453-.958-1.12-1.792-2-2.5l5-5c-1.638-3.539-1.138-6.706 1.5-9.5 2.944 1.872 4.11 4.539 3.5 8Z" />
                            <path style="opacity:1" fill="#ff4a5a"
                                d="M57.5 75.5c1.47 1.66 2.137 3.66 2 6-.639 7.655-4.639 10.322-12 8l-5 4c-.607-.124-.94-.457-1-1a44.889 44.889 0 0 1 7-9c3.91 1.768 5.578.435 5-4 1-1.667 2.333-3 4-4Z" />
                        </svg>
                    </div>
                    <div class="">

                        <h3 class="mb-2 text-xl font-bold dark:text-white">{{ __('home.products.product1tag') }}</h3>
                        <p class="text-gray-500 dark:text-gray-400">{{ __('home.products.product1desc') }}</p>
                    </div>
                </div>
                <!-- Products -->
                <div class="flex">
                    <div class="mx-4">
                        <svg class="h-20 w-20" height="150px" width="150px" viewBox="0 0 150 150"
                            xmlns="http://www.w3.org/2000/svg"
                            style="shape-rendering:geometricPrecision;text-rendering:geometricPrecision;image-rendering:optimizeQuality;fill-rule:evenodd;clip-rule:evenodd">
                            <path style="opacity:.94" fill="#cfeee2"
                                d="M90.5 42.5c14.913 5.766 23.08 16.766 24.5 33 1.248 11.587-1.919 21.754-9.5 30.5a26.523 26.523 0 0 0-6 3.5c.353-2.135-.48-3.468-2.5-4-1.75.248-2.582 1.248-2.5 3a44.147 44.147 0 0 1-2-1c-.667 4.482-1.334 8.816-2 13v-78Z" />
                            <path style="opacity:1" fill="#fa6cad"
                                d="M101.5 56.5c4.271 1.803 4.605 3.803 1 6-3.5-1.62-3.832-3.62-1-6Z" />
                            <path style="opacity:1" fill="#5ff0b9"
                                d="M30.5 62.5c5.514 2.06 5.847 4.394 1 7a6.541 6.541 0 0 1-3-3c1.13-1.122 1.797-2.456 2-4Z" />
                            <path style="opacity:1" fill="#4540c7"
                                d="M90.5 42.5v78c-1.677-.683-2.343-2.017-2-4v-69c.396-2.544-.271-4.711-2-6.5-14-.667-28-.667-42 0-1.729 1.789-2.396 3.956-2 6.5v30l-2 43a3121 3121 0 0 1 .5-79 10.521 10.521 0 0 0 2.5-3 304.89 304.89 0 0 1 42-.5c2.486.656 4.153 2.156 5 4.5Z" />
                            <path style="opacity:1" fill="#9badfc"
                                d="M88.5 57.5v13h-5a72.444 72.444 0 0 1 .5-12c1.356-.88 2.856-1.214 4.5-1Z" />
                            <path style="opacity:1" fill="#2f59de"
                                d="M42.5 47.5h46v10c-1.644-.214-3.144.12-4.5 1a72.444 72.444 0 0 0-.5 12h5v6a265.007 265.007 0 0 0-46 0v-29Z" />
                            <path style="opacity:1" fill="#2af6b8"
                                d="M67.5 57.5h13v13a84.938 84.938 0 0 1-13-.5c-1.303-4.166-1.303-8.333 0-12.5Z" />
                            <path style="opacity:1" fill="#e1fff5"
                                d="M72.5 66.5c1.788-.285 3.455.048 5 1-1.921 1.141-3.921 1.308-6 .5.556-.383.89-.883 1-1.5Z" />
                            <path style="opacity:1" fill="#f681bc"
                                d="M51.5 57.5a72.444 72.444 0 0 1 12 .5c1.333 4 1.333 8 0 12-4.32.499-8.654.666-13 .5a46.797 46.797 0 0 1 1-13Z" />
                            <path style="opacity:1" fill="#ffecf4"
                                d="M55.5 66.5c2.25-.319 4.25.181 6 1.5l-3 .5c-1.53-.14-2.53-.806-3-2Z" />
                            <path style="opacity:1" fill="#f4f6fd"
                                d="M54.5 51.5a121.87 121.87 0 0 1 22 1l-11 1c-4.065-.011-7.732-.678-11-2Z" />
                            <path style="opacity:1" fill="#6583fd"
                                d="M88.5 47.5h-46c-.396-2.544.271-4.711 2-6.5 14-.667 28-.667 42 0 1.729 1.789 2.396 3.956 2 6.5Z" />
                            <path style="opacity:1" fill="#afbffe"
                                d="M61.5 42.5c2.747-.313 5.413.02 8 1l-4 1c-1.833-.085-3.166-.752-4-2Z" />
                            <path style="opacity:1" fill="#fd8bbd"
                                d="M28.5 72.5c5.854 1.796 6.187 4.13 1 7a15.044 15.044 0 0 1-3-3.5c.93-1.077 1.596-2.244 2-3.5Z" />
                            <path style="opacity:1" fill="#fafbfe"
                                d="M88.5 76.5v40h-46v-40a265.007 265.007 0 0 1 46 0Z" />
                            <path style="opacity:1" fill="#2efeb9" d="M46.5 82.5h6v6c-5 1-7-1-6-6Z" />
                            <path style="opacity:1" fill="#50e2ac"
                                d="M56.5 82.5a18.436 18.436 0 0 1 6 .5c-2.38 2.142-4.38 1.975-6-.5Z" />
                            <path style="opacity:1" fill="#bdc7fe"
                                d="M56.5 86.5c8.673-.166 17.34 0 26 .5-4.326 1.14-8.826 1.64-13.5 1.5-4.557-.008-8.724-.675-12.5-2Z" />
                            <path style="opacity:1" fill="#ff88bd" d="M46.5 94.5h6v6h-6v-6Z" />
                            <path style="opacity:1" fill="#ff7bb7"
                                d="M56.5 94.5a18.436 18.436 0 0 1 6 .5c-2.38 2.142-4.38 1.975-6-.5Z" />
                            <path style="opacity:1" fill="#b7c3fe"
                                d="M56.5 98.5c8.692-.331 17.359.002 26 1l-13 1c-4.722-.008-9.055-.674-13-2Z" />
                            <path style="opacity:1" fill="#a5b4fd" d="M46.5 106.5h6v6h-6v-6Z" />
                            <path style="opacity:1" fill="#8a9ffe"
                                d="M56.5 106.5a9.86 9.86 0 0 1 6 1l-3 1c-1.53-.14-2.53-.807-3-2Z" />
                            <path style="opacity:.992" fill="#7e96fc"
                                d="M99.5 109.5c-2.256 2.805-3.923 2.472-5-1-.082-1.752.75-2.752 2.5-3 2.02.532 2.853 1.865 2.5 4Z" />
                            <path style="opacity:1" fill="#afbbfd"
                                d="M56.5 110.5c8.692-.331 17.359.002 26 1l-13 1c-4.722-.008-9.055-.675-13-2Z" />
                            <path style="opacity:.255" fill="#bac3e6"
                                d="M43.5 38.5a10.521 10.521 0 0 1-2.5 3 3121 3121 0 0 0-.5 79 1682.251 1682.251 0 0 0-3-81.5 18.436 18.436 0 0 1 6-.5Z" />
                            <path style="opacity:1" fill="#62f1be"
                                d="M98.5 113.5c5.799 1.281 6.299 3.614 1.5 7a19.897 19.897 0 0 1-3.5-4c1.112-.765 1.779-1.765 2-3Z" />
                            <path style="opacity:1" fill="#687ef5"
                                d="M42.5 77.5v39h46c-.343 1.983.323 3.317 2 4 .13 2.867-1.203 4.533-4 5-13.735-.675-27.569-1.341-41.5-2a2.427 2.427 0 0 0-.5 2c-2.797-.467-4.13-2.133-4-5l2-43Z" />
                            <path style="opacity:1" fill="#423cc2"
                                d="M86.5 125.5c-14 1.333-28 1.333-42 0a2.427 2.427 0 0 1 .5-2c13.931.659 27.765 1.325 41.5 2Z" />
                        </svg>
                    </div>
                    <div class="">
                        <h3 class="mb-2 text-xl font-bold dark:text-white">{{ __('home.products.product2tag') }}</h3>
                        <p class="text-gray-500 dark:text-gray-400">{{ __('home.products.product2desc') }}</p>
                    </div>
                </div>
                <!-- Products -->
                <div class="flex">
                    <div class="mx-4">
                        <svg class="h-20 w-20" height="150px" width="150px" viewBox="0 0 150 150"
                            xmlns="http://www.w3.org/2000/svg"
                            style="shape-rendering:geometricPrecision;text-rendering:geometricPrecision;image-rendering:optimizeQuality;fill-rule:evenodd;clip-rule:evenodd">
                            <path style="opacity:.993" fill="#ebeef0"
                                d="M109.5 44.5c-.667 8.51-1.333 17.176-2 26a453.004 453.004 0 0 1-36 18 453.039 453.039 0 0 1-36-18 169.875 169.875 0 0 1-1-26c-.166-5.676 0-11.343.5-17 1.563-3.228 4.063-5.395 7.5-6.5a841.208 841.208 0 0 1 58 0c3.437 1.105 5.937 3.272 7.5 6.5.212 5.748.712 11.414 1.5 17Z" />
                            <path style="opacity:1" fill="#feb309"
                                d="M90.5 68.5v-36c1.11-3.529 2.942-3.862 5.5-1 .667 13 .667 26 0 39-2.81 1.68-4.644 1.013-5.5-2Z" />
                            <path style="opacity:1" fill="#fec00c"
                                d="M90.5 32.5v36c-5.66-1.33-11.327-2.664-17-4-1.802-.958-3.802-1.625-6-2a31.705 31.705 0 0 0-6-2 19.242 19.242 0 0 0-6-1 206.168 206.168 0 0 0-8.5-2c-.801-4.919-.635-9.752.5-14.5 1.877-.576 3.71-.41 5.5.5a785.048 785.048 0 0 1 37.5-11Z" />
                            <path style="opacity:.995" fill="#2997f3"
                                d="M31.5 45.5c1.323 3.438 1.99 7.271 2 11.5l-1 11.5a108.869 108.869 0 0 1-11-5c-2.344-9.323.99-15.323 10-18Z" />
                            <path style="opacity:1" fill="#2b97f3"
                                d="M111.5 45.5c8.996 2.644 12.329 8.644 10 18-4.041 1.69-8.041 3.357-12 5-.632-8.073.035-15.74 2-23Z" />
                            <path style="opacity:.999" fill="#65b5f5"
                                d="M31.5 45.5c.709-.904 1.709-1.237 3-1a169.875 169.875 0 0 0 1 26 453.039 453.039 0 0 0 36 18 453.004 453.004 0 0 0 36-18c.667-8.824 1.333-17.49 2-26 .992-.172 1.658.162 2 1-1.965 7.26-2.632 14.927-2 23 3.959-1.643 7.959-3.31 12-5 .167 16.004 0 32.004-.5 48-1.227 2.226-3.061 3.726-5.5 4.5-29.333.667-58.667.667-88 0a17.843 17.843 0 0 1-5.5-4.5c-.5-15.996-.667-31.996-.5-48a108.869 108.869 0 0 0 11 5l1-11.5c-.01-4.229-.677-8.062-2-11.5Z" />
                            <path style="opacity:1" fill="#eee9dd"
                                d="M61.5 60.5a31.705 31.705 0 0 1 6 2c-3.595 4.357-5.595 3.69-6-2Z" />
                            <path style="opacity:1" fill="#fe9b13"
                                d="M55.5 59.5c2.065.017 4.065.35 6 1 .405 5.69 2.405 6.357 6 2 2.198.375 4.198 1.042 6 2-3.973 7.545-9.473 8.878-16.5 4-2.292-2.804-2.792-5.804-1.5-9Z" />
                        </svg>
                    </div>
                    <div class="">
                        <h3 class="mb-2 text-xl font-bold dark:text-white">{{ __('home.products.product3tag') }}</h3>
                        <p class="text-gray-500 dark:text-gray-400">{{ __('home.products.product3desc') }}</p>
                    </div>
                </div>
                <!-- Products -->
                <div class="flex">
                    <div class="mx-4">
                        <svg class="h-20 w-20" height="150px" width="150px" viewBox="0 0 150 150"
                            xmlns="http://www.w3.org/2000/svg"
                            style="shape-rendering:geometricPrecision;text-rendering:geometricPrecision;image-rendering:optimizeQuality;fill-rule:evenodd;clip-rule:evenodd">
                            <path style="opacity:.921" fill="#afe2a6"
                                d="M73.5 32.5h-4c-2.638-.741-3.971-2.575-4-5.5 1.042-5.023 4.042-6.69 9-5 3.335 2.679 3.835 5.845 1.5 9.5-.67.752-1.504 1.086-2.5 1Z" />
                            <path style="opacity:.992" fill="#ffde81"
                                d="M42.5 40.5c-1 .333-1.667 1-2 2-13.825 4.009-18.991-.991-15.5-15 3.743-3.76 8.243-4.926 13.5-3.5 6.167 4.344 7.5 9.844 4 16.5Z" />
                            <path style="opacity:.984" fill="#a2d8f9"
                                d="M102.5 42.5c-.333-1-1-1.667-2-2-2.834-5.012-2.5-9.845 1-14.5 9.874-5.39 15.874-2.724 18 8-2.098 9.716-7.765 12.55-17 8.5Z" />
                            <path style="opacity:.541" fill="#9ea9b2"
                                d="M69.5 32.5h4v8c1.291-.237 2.291.096 3 1h-4c-.667-10.667-1.333-10.667-2 0h-4c.709-.904 1.709-1.237 3-1v-8Z" />
                            <path style="opacity:1" fill="#3a495c" d="M72.5 41.5h-2c.667-10.667 1.333-10.667 2 0Z" />
                            <path style="opacity:.997" fill="#719fed"
                                d="M66.5 41.5h10c6.075.706 11.408 3.039 16 7 0 1.333.667 2 2 2 3.961 4.592 6.294 9.925 7 16v10c-.706 6.075-3.039 11.408-7 16-1.333 0-2 .667-2 2-4.592 3.961-9.925 6.294-16 7h-10c-6.075-.706-11.408-3.039-16-7 0-1.333-.667-2-2-2-3.961-4.592-6.294-9.925-7-16v-10c.706-6.075 3.039-11.408 7-16 1.333 0 2-.667 2-2 4.592-3.961 9.925-6.294 16-7Z" />
                            <path style="opacity:1" fill="#505d6c"
                                d="M100.5 40.5c1 .333 1.667 1 2 2-2.333 3-5 5.667-8 8-1.333 0-2-.667-2-2 2.333-3 5-5.667 8-8Z" />
                            <path style="opacity:1" fill="#525f6d"
                                d="M42.5 40.5c3 2.333 5.667 5 8 8 0 1.333-.667 2-2 2-3-2.333-5.667-5-8-8 .333-1 1-1.667 2-2Z" />
                            <path style="opacity:1" fill="#d95d76"
                                d="M86.5 62.5v13a40.936 40.936 0 0 1-.5 9c-1.726 1.076-3.56 1.243-5.5.5-.752-.67-1.086-1.504-1-2.5v-27c-.086-.996.248-1.83 1-2.5 1.667-.667 3.333-.667 5 0 .95 3.057 1.284 6.223 1 9.5Z" />
                            <path style="opacity:1" fill="#e2e6f3"
                                d="M79.5 55.5v27h-1c.262-1.478-.071-2.811-1-4a103.787 103.787 0 0 0-15-6v-10a196.035 196.035 0 0 1 17-7Z" />
                            <path style="opacity:1" fill="#d85871"
                                d="M62.5 62.5v13h-7c-.617-.11-1.117-.444-1.5-1a30.499 30.499 0 0 1 0-11c2.72-.944 5.553-1.277 8.5-1Z" />
                            <path style="opacity:1" fill="#f9d97a"
                                d="M86.5 62.5c5.864 1.754 7.364 5.421 4.5 11a9.173 9.173 0 0 1-4.5 2v-13Z" />
                            <path style="opacity:.934" fill="#b1e3a7"
                                d="M110.5 73.5v-4c3.005-4.83 6.505-5.164 10.5-1 .923 7.746-2.243 10.246-9.5 7.5-.752-.67-1.086-1.504-1-2.5Z" />
                            <path style="opacity:1" fill="#e8a764"
                                d="M32.5 69.5v4c-.741 2.638-2.575 3.971-5.5 4-5.023-1.042-6.69-4.042-5-9 2.679-3.335 5.845-3.835 9.5-1.5.752.67 1.086 1.504 1 2.5Z" />
                            <path style="opacity:.534" fill="#a0a9b5"
                                d="M41.5 66.5v4h-9v-1h8c-.237-1.291.096-2.291 1-3Z" />
                            <path style="opacity:1" fill="#3c4a5c" d="M32.5 70.5h9v2h-9v-2Z" />
                            <path style="opacity:1" fill="#39485a" d="M101.5 70.5c10.667.667 10.667 1.333 0 2v-2Z" />
                            <path style="opacity:.439" fill="#adb4bf"
                                d="M32.5 73.5v-1h9v4c-.904-.709-1.237-1.709-1-3h-8Z" />
                            <path style="opacity:1" fill="#b7c9ea"
                                d="M62.5 72.5a103.787 103.787 0 0 1 15 6c.929 1.189 1.262 2.522 1 4l-16-7v-3Z" />
                            <path style="opacity:.443" fill="#9fa8b1"
                                d="M101.5 66.5c.904.709 1.237 1.709 1 3h8v4h-8c.237 1.291-.096 2.291-1 3v-4c10.667-.667 10.667-1.333 0-2v-4Z" />
                            <path style="opacity:1" fill="#3b4b5f"
                                d="M55.5 75.5h7a72.444 72.444 0 0 1-.5 12c-2 2.667-4 2.667-6 0a72.444 72.444 0 0 1-.5-12Z" />
                            <path style="opacity:1" fill="#525e6d"
                                d="M94.5 92.5c3 2.333 5.667 5 8 8-.333 1-1 1.667-2 2-3-2.333-5.667-5-8-8 0-1.333.667-2 2-2Z" />
                            <path style="opacity:1" fill="#535e6d"
                                d="M48.5 92.5c1.333 0 2 .667 2 2-2.333 3-5 5.667-8 8-1-.333-1.667-1-2-2 2.333-3 5-5.667 8-8Z" />
                            <path style="opacity:.995" fill="#db6076"
                                d="M40.5 100.5c.333 1 1 1.667 2 2 4.009 13.825-.991 18.991-15 15.5-4.678-5.106-5.178-10.606-1.5-16.5 4.655-3.5 9.488-3.834 14.5-1Z" />
                            <path style="opacity:.993" fill="#fede81"
                                d="M100.5 102.5c1-.333 1.667-1 2-2 13.767-4.067 18.934.933 15.5 15-5.106 4.678-10.606 5.178-16.5 1.5-3.5-4.655-3.834-9.488-1-14.5Z" />
                            <path style="opacity:.54" fill="#9da7b3"
                                d="M66.5 101.5h4v9h-1v-8c-1.291.237-2.291-.096-3-1Z" />
                            <path style="opacity:.431" fill="#a8aeb8"
                                d="M72.5 101.5h4c-.709.904-1.709 1.237-3 1v8h-1v-9Z" />
                            <path style="opacity:1" fill="#414b59" d="M70.5 101.5h2v9h-2v-9Z" />
                            <path style="opacity:1" fill="#e9a867"
                                d="M69.5 110.5h4c2.638.742 3.971 2.575 4 5.5-1.042 5.023-4.042 6.69-9 5-3.335-2.679-3.835-5.845-1.5-9.5.67-.752 1.504-1.086 2.5-1Z" />
                        </svg>
                    </div>
                    <div class="">
                        <h3 class="mb-2 text-xl font-bold dark:text-white">{{ __('home.products.product4tag') }}</h3>
                        <p class="text-gray-500 dark:text-gray-400">{{ __('home.products.product4desc') }}</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endif
