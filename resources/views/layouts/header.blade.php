<header class="border-b border-outline-variant/50 bg-surface-container-lowest px-xl py-lg">
    <div class="flex items-center justify-between gap-md">
        <div>
            <p class="font-body-sm text-body-sm font-medium text-secondary">{{ isset($page_subtitle) ? $page_subtitle : 'Workspace' }}</p>
        </div>
        <div class="flex items-center gap-md">
            <div class="hidden rounded-full bg-surface-container px-3 py-1 font-body-sm text-body-sm font-medium text-on-surface sm:block">
                {{ auth()->user()?->name ?? 'User' }}
            </div>
            <a href="{{ route('profile.edit') }}" class="rounded-full border border-outline-variant bg-surface-container-lowest px-3 py-2 font-body-sm text-body-sm font-medium text-on-surface transition hover:bg-surface-container">
                Profile
            </a>
            <button class="group relative p-2 text-secondary transition-colors hover:text-primary" type="button">
                <span class="material-symbols-outlined">notifications</span>
                <span class="absolute right-2 top-2 h-2 w-2 rounded-full border-2 border-surface bg-primary"></span>
            </button>
            <button class="p-2 text-secondary transition-colors hover:text-primary" type="button">
                <span class="material-symbols-outlined">help_outline</span>
            </button>
        </div>
    </div>
</header>
