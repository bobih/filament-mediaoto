@props(['category', 'bgColor','txtColor'])

<a  {{ $attributes }} >
                            <span style="background-color: {{$bgColor}}; color: {{$txtColor}};" class="text-gray-900 border border-1 border-gray-400 focus:outline-none hover:bg-white focus:ring-4 focus:ring-gray-200 rounded-lg text-sm  px-2 py-2  dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700">
                                {{$slot}}
                            </span>
                        </a>


