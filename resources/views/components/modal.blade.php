@props([
'id'=>'modal'
])

<div
id="{{ $id }}"
class="fixed inset-0 z-50 hidden items-center justify-center bg-black/50 p-4">

<div
class="w-full max-w-lg rounded-2xl bg-surface shadow-xl">

<div
class="border-b border-outline-variant p-5">

<h2
class="text-xl font-semibold">

{{ $title }}

</h2>

</div>

<div
class="p-6">

{{ $slot }}

</div>

<div
class="flex justify-end gap-3 border-t border-outline-variant p-5">

{{ $footer }}

</div>

</div>

</div>