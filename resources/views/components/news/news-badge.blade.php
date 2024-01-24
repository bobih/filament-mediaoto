@props(['category', 'bgColor'])
<button {{ $attributes }} >
    <span class="bg-[{{$bgColor}}]  text-gray-200  text-xs font-medium inline-flex items-center px-4 py-1 rounded ">
       {{$slot}}
    </span>
</button>
