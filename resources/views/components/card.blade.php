@props([
    'padding' => 'p-6',
])

<div {{ $attributes->merge([
    'class' => "rounded-xl border border-[#E5E7EB] bg-white {$padding} shadow-sm"
]) }}>
    {{ $slot }}
</div>