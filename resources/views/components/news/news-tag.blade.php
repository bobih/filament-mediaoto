@props(['name', 'slug',])
<a {{ $attributes }} >
    <?php /*  change
    <span class="bg-[{{$bgColor}}]  text-[{{$txtColor}}]  text-xs font-medium inline-flex items-center px-4 py-1 rounded ">
     */ ?>
    <span  class="text-gray-900 px-2  text-sm  hover:underline dark:text-gray-400">
        #{{$name}}
    </span>
</a>
