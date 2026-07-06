@props([
    'type' => 'button',
    'variant' => 'primary',
    'icon' => null,
    'href' => null,
])

@php
$variants = [
    'primary' => 'bg-primary text-on-primary hover:opacity-90',
    'secondary' => 'bg-surface border border-outline-variant text-on-surface hover:bg-surface-container',
    'danger' => 'bg-red-600 text-white hover:bg-red-700',
    'success' => 'bg-green-600 text-white hover:bg-green-700',
];

$classes = $variants[$variant] ?? $variants['primary'];
@endphp

@if($href)
<a href="{{ $href }}"
    {{ $attributes->merge([
        'class' => "inline-flex items-center gap-2 rounded-lg px-4 py-2 font-medium transition duration-200 $classes"
    ]) }}>

    @if($icon)
        <span class="material-symbols-outlined text-[20px]">{{ $icon }}</span>
    @endif

    {{ $slot }}

</a>
@else

<button
    type="{{ $type }}"
    {{ $attributes->merge([
        'class' => "inline-flex items-center gap-2 rounded-lg px-4 py-2 font-medium transition duration-200 $classes"
    ]) }}>

    @if($icon)
        <span class="material-symbols-outlined text-[20px]">{{ $icon }}</span>
    @endif

    {{ $slot }}

</button>

@endif