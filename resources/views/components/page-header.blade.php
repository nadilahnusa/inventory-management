@props([
'title',
'subtitle'=>null
])

<div
class="mb-8 flex flex-col gap-4 md:flex-row md:items-center md:justify-between">

<div>

<h1
class="text-4xl font-bold tracking-tight">

{{ $title }}

</h1>

@if($subtitle)

<p
class="mt-2 text-secondary">

{{ $subtitle }}

</p>

@endif

</div>

<div>

{{ $slot }}

</div>

</div>