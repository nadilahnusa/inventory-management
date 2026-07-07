@props([
    'title',
    'subtitle' => null,
])

<div class="flex flex-col gap-4 sm:flex-row sm:items-end sm:justify-between">

    <div>
        <h1 class="text-2xl font-semibold tracking-[-0.01em] text-[#111827]">
            {{ $title }}
        </h1>

        @if($subtitle)
            <p class="mt-2 text-sm text-[#6B7280]">
                {{ $subtitle }}
            </p>
        @endif
    </div>

    @isset($actions)
        <div class="flex items-center gap-3">
            {{ $actions }}
        </div>
    @endisset

</div>