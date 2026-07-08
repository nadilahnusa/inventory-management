<header class="sticky top-0 z-30 border-b border-outline-variant/50 bg-surface-container-lowest px-xl py-lg shadow-sm">
    <div class="flex items-center justify-between">

        <div class="flex items-center gap-3">

            {{-- Hamburger Mobile --}}
            <button
                @click="sidebarOpen = true"
                class="flex h-10 w-10 items-center justify-center rounded-lg hover:bg-surface-container-low lg:hidden">

                <span class="material-symbols-outlined">
                    menu
                </span>

            </button>

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

        </div>

        <div class="flex items-center gap-2">

            <button
                class="group relative flex h-10 w-10 items-center justify-center rounded-lg text-on-surface-variant transition-colors hover:bg-surface-container-low">

                <span class="material-symbols-outlined transition-colors group-hover:text-primary">
                    notifications
                </span>

                <span class="absolute right-2 top-2 h-2 w-2 rounded-full bg-primary"></span>

            </button>

            <button
                class="group flex h-10 w-10 items-center justify-center rounded-lg text-on-surface-variant transition-colors hover:bg-surface-container-low">

                <span class="material-symbols-outlined transition-colors group-hover:text-primary">
                    help
                </span>

            </button>

        </div>

    </div>
</header>