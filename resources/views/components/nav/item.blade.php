@props(['route','label' => null, 'icon'])
<li class="p-2">
    <a href="{{route($route)}}" class="flex flex-row justify-center items-center rounded-md text-xs text-white py-1 w-20 font-semibold bg-emerald-500 hover:bg-emerald-600">
        {{ $icon }}
        {{ $label }}
    </a>
</li>
