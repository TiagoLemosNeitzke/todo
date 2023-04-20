@props(['color'])
<span {{ $attributes->merge(['class' => 'mr-2 w-2 h-2 rounded-full bg-'.$color]) }}></span>
