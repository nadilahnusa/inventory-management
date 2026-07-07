@props([
'show'=>null,
'edit'=>null,
'delete'=>null,
])

<div class="flex items-center justify-center gap-2">

@if($show)

<a
href="{{ $show }}"
class="rounded-lg border border-[#E5E7EB] p-2 hover:bg-sky-50 hover:text-sky-600 transition">

<span class="material-symbols-outlined">

visibility

</span>

</a>

@endif

@if($edit)

<a
href="{{ $edit }}"
class="rounded-lg border border-[#E5E7EB] p-2 hover:bg-amber-50 hover:text-amber-600 transition">

<span class="material-symbols-outlined">

edit

</span>

</a>

@endif

@if($delete)

<button
    type="button"
    onclick="openDeleteModal('{{ $delete }}')"
    class="text-red-600 hover:text-red-700">

    <span class="material-symbols-outlined">

        delete

    </span>

</button>

@endif

</div>