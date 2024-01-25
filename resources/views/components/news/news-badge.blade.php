@props(['category', 'bgColor','txtColor'])
<button {{ $attributes }} >
    <?php /*
    <span class="bg-[{{$bgColor}}]  text-[{{$txtColor}}]  text-xs font-medium inline-flex items-center px-4 py-1 rounded ">
     */ ?>
    <span style="background-color: {{$bgColor}}; color: {{$txtColor}};" class="text-gray-900 border border-1 border-gray-400 focus:outline-none hover:bg-white focus:ring-4 focus:ring-gray-200 rounded-lg text-sm  px-2 py-2  dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700">
        {{$slot}}
    </span>
</button>


