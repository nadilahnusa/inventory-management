<div class="flex flex-col gap-4 lg:flex-row lg:items-center lg:justify-between">

    <div class="relative w-full lg:max-w-sm">

        <span class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-secondary">

            search

        </span>

        <input
            type="text"
            placeholder="Search..."
            class="w-full rounded-lg border border-outline-variant bg-surface py-2 pl-11 pr-4 focus:border-primary focus:outline-none">

    </div>

    <div class="flex items-center gap-3">

        {{ $slot }}

        <x-button
            variant="secondary"
            icon="refresh">

            Reset

        </x-button>

    </div>

</div>