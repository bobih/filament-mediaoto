@props(['category', 'bgColor','txtColor'])
<button {{ $attributes }} >
    <span class="bg-[{{$bgColor}}]  text-[{{$txtColor}}]  text-xs font-medium inline-flex items-center px-4 py-1 rounded ">
       {{$slot}}
    </span>
</button>
