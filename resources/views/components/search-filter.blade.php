@props([
    'action' => '',
    'placeholder' => 'Search...',
    'value' => request('search'),
])

<form method="GET" action="{{ $action }}">

    <div class="rounded-xl border border-[#E5E7EB] bg-white p-5">

        <div class="flex flex-col gap-4 lg:flex-row lg:items-center lg:justify-between">

            {{-- Search --}}
            <div class="flex flex-1 items-center gap-3">

                <div class="relative w-full max-w-md">

                    <span
                        class="material-symbols-outlined absolute left-4 top-7 flex h-5 w-5 -translate-y-1/2 items-center justify-center text-[#9CA3AF] leading-none">
                        search
                    </span>

                    <input
                        type="text"
                        name="search"
                        value="{{ $value }}"
                        placeholder="{{ $placeholder }}"
                        autocomplete="off"

                        class="h-11 w-full rounded-xl border border-[#E5E7EB] bg-[#FAFAFA]
                        pl-12 pr-4 text-sm transition
                        placeholder:text-[#9CA3AF]
                        focus:border-[#E31E24]
                        focus:bg-white
                        focus:ring-4
                        focus:ring-[#E31E24]/10
                        focus:outline-none">

                </div>

                {{-- Filter tambahan --}}
                {{ $slot }}

            </div>

            {{-- Button --}}
            <div class="flex items-center gap-3">

                <x-button
                    type="submit"
                    variant="secondary"
                    icon="search">

                    Search

                </x-button>

                @if(request()->filled('search'))
                    <x-button
                        href="{{ url()->current() }}"
                        variant="secondary"
                        icon="refresh">

                        Reset

                    </x-button>
                @endif

            </div>

        </div>

    </div>

</form>