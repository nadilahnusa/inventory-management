@props([
    'title'=>null,
    'subtitle'=>null,
])

<div
    {{ $attributes->merge([
        'class'=>'rounded-2xl border border-outline-variant bg-surface p-6 shadow-sm'
    ]) }}>

@if($title)

<div class="mb-6">

<h2
class="text-xl font-semibold">

{{ $title }}

</h2>

@if($subtitle)

<p
class="mt-1 text-sm text-secondary">

{{ $subtitle }}

</p>

@endif

</div>

@endif

{{ $slot }}

</div>

@endprops