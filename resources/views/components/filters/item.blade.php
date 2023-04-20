@props(['route', 'label'])
<li>
    <a href="{{route($route)}}" class="flex flex-row justify-center items-center p-1 ml-2 text-xs md:text-lg font-thin text-white cursor-pointer focus:outline-none focus:underline focus:text-white hover:text-white hover:underline mb-2">
        {{$slot}}
        {{$label}}
    </a>
</li>
