@props([
    'edit' => '#',
    'delete' => '#',
    'show' => null,
])

<div class="flex items-center justify-center gap-2">

    {{-- View --}}
    @if($show)
        <a href="{{ $show }}"
           class="flex h-9 w-9 items-center justify-center rounded-lg border border-outline-variant text-secondary transition hover:border-primary hover:bg-primary/10 hover:text-primary">

            <span class="material-symbols-outlined text-[20px]">
                visibility
            </span>

        </a>
    @endif

    {{-- Edit --}}
    <a href="{{ $edit }}"
       class="flex h-9 w-9 items-center justify-center rounded-lg border border-outline-variant text-secondary transition hover:border-blue-500 hover:bg-blue-50 hover:text-blue-600">

        <span class="material-symbols-outlined text-[20px]">
            edit
        </span>

    </a>

    {{-- Delete --}}
    <button
        type="button"
        onclick="openDeleteModal('{{ $delete }}')"
        class="flex h-9 w-9 items-center justify-center rounded-lg border border-outline-variant text-secondary transition hover:border-red-500 hover:bg-red-50 hover:text-red-600">

        <span class="material-symbols-outlined text-[20px]">
            delete
        </span>

    </button>

</div>