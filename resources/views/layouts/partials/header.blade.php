<header class="sticky top-0 z-30 border-b border-outline-variant/50 bg-surface-container-lowest px-xl py-lg shadow-sm">
    <div class="flex items-center justify-between">

        {{-- Profile --}}
        <a
            href="{{ route('profile.show') }}"
            class="group flex items-center gap-md rounded-lg px-md py-sm transition-colors hover:bg-surface-container-low">

            <img
                src="https://ui-avatars.com/api/?name={{ urlencode(auth()->user()->name ?? 'User') }}&background=random"
                alt="Profile"
                class="h-10 w-10 rounded-full object-cover">

            <div class="text-left">

                <p class="font-body-sm text-body-sm font-medium text-on-surface transition-colors group-hover:text-primary">

                    {{ auth()->user()->name }}

                </p>

                <p class="text-xs text-on-surface-variant">

                    {{ auth()->user()->getRoleNames()->first() }}

                </p>

            </div>

        </a>

        {{-- Right Actions --}}
        <div class="flex items-center gap-2">

            {{-- Notification --}}
            <button
                class="group relative flex h-10 w-10 items-center justify-center rounded-lg text-on-surface-variant transition-colors hover:bg-surface-container-low">

                <span class="material-symbols-outlined transition-colors group-hover:text-primary">
                    notifications
                </span>

                <span class="absolute right-2 top-2 h-2 w-2 rounded-full bg-primary"></span>
            </button>

            {{-- Help --}}
            <button
                class="group flex h-10 w-10 items-center justify-center rounded-lg text-on-surface-variant transition-colors hover:bg-surface-container-low">

                <span class="material-symbols-outlined transition-colors group-hover:text-primary">
                    help
                </span>
            </button>

        </div>

    </div>
</header>