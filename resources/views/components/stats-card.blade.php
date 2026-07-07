@props([
'title',
'value',
'description',
'icon'
])

<x-card>

<div class="flex justify-between">

<div>

<p class="text-sm text-[#6B7280]">

{{ $title }}

</p>

<h2 class="mt-2 text-3xl font-semibold">

{{ $value }}

</h2>

</div>

<div class="flex h-10 w-10 items-center justify-center rounded-lg bg-[#FFF0EE] text-[#BA0013]">

<span class="material-symbols-outlined">

{{ $icon }}

</span>

</div>

</div>

<p class="mt-4 text-sm text-[#6B7280]">

{{ $description }}

</p>

</x-card>