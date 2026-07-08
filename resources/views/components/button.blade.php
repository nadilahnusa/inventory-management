@props([
    'variant' => 'primary',
    'icon' => null,
])

@php
$style = match ($variant) {
    'primary' => 'bg-[#E31E24] text-white hover:bg-[#C91820]',
    'secondary' => 'border border-[#E5E7EB] bg-white text-[#374151] hover:bg-[#F9FAFB]',
    'danger' => 'bg-red-600 text-white hover:bg-red-700',
    default => 'bg-[#E31E24] text-white',
};

$classes = $style . ' inline-flex items-center gap-2 rounded-lg px-4 py-2.5 text-sm font-medium transition';
@endphp

@if ($attributes->has('href'))

    <a {{ $attributes->merge(['class' => $classes]) }}>

@else

    <button {{ $attributes->merge(['class' => $classes]) }}>

@endif

@if($icon)
    <span class="material-symbols-outlined text-[20px]">
        {{ $icon }}
    </span>
@endif

{{ $slot }}

@if ($attributes->has('href'))

    </a>

@else

    </button>

@endif