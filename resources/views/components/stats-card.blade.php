@props([
    'title',
    'value',
    'icon',
    'color'=>'primary',
    'subtitle'=>null
])

<div
class="rounded-2xl border border-outline-variant bg-surface p-6 shadow-sm">

<div class="flex justify-between">

<div>

<p class="text-sm text-secondary">

{{ $title }}

</p>

<h2 class="mt-2 text-4xl font-bold">

{{ $value }}

</h2>

@if($subtitle)

<p class="mt-2 text-sm text-secondary">

{{ $subtitle }}

</p>

@endif

</div>

<div
class="flex h-14 w-14 items-center justify-center rounded-xl bg-primary/10">

<span
class="material-symbols-outlined text-primary text-3xl">

{{ $icon }}

</span>

</div>

</div>

</div>