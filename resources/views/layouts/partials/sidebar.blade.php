@vite(['resources/css/app.css'])

    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&amp;display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet">

@php($user = auth()->user())
<aside class="fixed left-0 top-0 h-screen w-64 bg-surface-container-lowest border-r border-outline-variant z-50 flex flex-col" style="width: 280px;">
    <div class="px-lg py-xl flex items-center gap-sm">
        <div class="w-8 h-8 bg-primary rounded flex items-center justify-center flex-shrink-0">
            <span class="material-symbols-outlined text-on-primary" style="font-variation-settings: &quot;FILL&quot; 1;">inventory_2</span>
        </div>
        <div class="flex flex-col">
            <span class="font-headline-sm text-headline-sm font-bold text-primary tracking-tight">Telkom</span>
            <span class="text-[10px] font-bold uppercase tracking-widest text-on-surface-variant opacity-60 -mt-1">Inventory</span>
        </div>
    </div>

    <nav class="flex-1 px-md py-sm overflow-y-auto sidebar-scroll flex flex-col gap-1">
        <div class="flex flex-col gap-1 mb-lg">
            <div class="px-md py-2 text-[12px] font-semibold uppercase tracking-widest text-outline opacity-80">Main</div>
            <a class="flex items-center gap-md px-md py-sm {{ request()->routeIs('dashboard') ? 'bg-surface-container-low text-primary font-medium rounded-r-full relative' : 'text-on-surface-variant hover:bg-surface-container-low transition-colors rounded-lg' }} group" href="{{ route('dashboard') }}">
                @if(request()->routeIs('dashboard'))
                    <div class="absolute left-0 top-1/2 -translate-y-1/2 w-1 h-6 bg-primary rounded-r-full"></div>
                @endif
                <span class="material-symbols-outlined text-[20px] {{ request()->routeIs('dashboard') ? 'text-primary' : 'group-hover:text-primary transition-colors' }}" style="font-variation-settings: &quot;FILL&quot; 1;">dashboard</span>
                <span class="font-body-sm text-body-sm">Dashboard</span>
            </a>
        </div>

        @if($user && $user->hasRole('Administrator'))
            <div class="flex flex-col gap-1 mb-lg">
                <div class="px-md py-2 text-[12px] font-semibold uppercase tracking-widest text-outline opacity-80">Master Data</div>
                <a class="flex items-center gap-md px-md py-sm {{ request()->routeIs('departments.index') ? 'bg-surface-container-low text-primary' : 'text-on-surface-variant hover:bg-surface-container-low' }} transition-colors rounded-lg group" href="{{ route('departments.index') }}">
                    <span class="material-symbols-outlined text-[20px] group-hover:text-primary transition-colors">corporate_fare</span>
                    <span class="font-body-sm text-body-sm">Departments</span>
                </a>
                <a class="flex items-center gap-md px-md py-sm {{ request()->routeIs('categories.index') ? 'bg-surface-container-low text-primary' : 'text-on-surface-variant hover:bg-surface-container-low' }} transition-colors rounded-lg group" href="{{ route('categories.index') }}">
                    <span class="material-symbols-outlined text-[20px] group-hover:text-primary transition-colors">category</span>
                    <span class="font-body-sm text-body-sm">Categories</span>
                </a>
                <a class="flex items-center gap-md px-md py-sm {{ request()->routeIs('products.index') ? 'bg-surface-container-low text-primary' : 'text-on-surface-variant hover:bg-surface-container-low' }} transition-colors rounded-lg group" href="{{ route('products.index') }}">
                    <span class="material-symbols-outlined text-[20px] group-hover:text-primary transition-colors">inventory_2</span>
                    <span class="font-body-sm text-body-sm">Products</span>
                </a>
            </div>
        @endif

        @if($user && $user->hasAnyRole(['Administrator', 'Warehouse Staff']))
            <div class="flex flex-col gap-1 mb-lg">
                <div class="px-md py-2 text-[12px] font-semibold uppercase tracking-widest text-outline opacity-80">Transactions</div>
                <a class="flex items-center gap-md px-md py-sm {{ request()->routeIs('borrowings.index') ? 'bg-surface-container-low text-primary' : 'text-on-surface-variant hover:bg-surface-container-low' }} transition-colors rounded-lg group" href="{{ route('borrowings.index') }}">
                    <span class="material-symbols-outlined text-[20px] group-hover:text-primary transition-colors">file_upload</span>
                    <span class="font-body-sm text-body-sm">Borrowing</span>
                </a>
            </div>
        @endif

        <div class="flex flex-col gap-1 mb-lg">
            <div class="px-md py-2 text-[12px] font-semibold uppercase tracking-widest text-outline opacity-80">Reports</div>
            @if($user && $user->hasAnyRole(['Administrator', 'Warehouse Staff', 'Manager']))
                <a class="flex items-center gap-md px-md py-sm {{ request()->routeIs('reports.index') ? 'bg-surface-container-low text-primary' : 'text-on-surface-variant hover:bg-surface-container-low' }} transition-colors rounded-lg group" href="{{ route('reports.index') }}">
                    <span class="material-symbols-outlined text-[20px] group-hover:text-primary transition-colors">assessment</span>
                    <span class="font-body-sm text-body-sm">Reports</span>
                </a>
            @endif
        </div>

        @if($user && $user->hasRole('Administrator'))
            <div class="flex flex-col gap-1 mb-lg">
                <div class="px-md py-2 text-[12px] font-semibold uppercase tracking-widest text-outline opacity-80">System</div>
                <a class="flex items-center gap-md px-md py-sm {{ request()->routeIs('users.index') ? 'bg-surface-container-low text-primary' : 'text-on-surface-variant hover:bg-surface-container-low' }} transition-colors rounded-lg group" href="{{ route('users.index') }}">
                    <span class="material-symbols-outlined text-[20px] group-hover:text-primary transition-colors">group</span>
                    <span class="font-body-sm text-body-sm">User Management</span>
                </a>
            </div>
        @endif
    </nav>

    <div class="mt-auto border-t border-outline-variant/30 p-md">
        <a
            href="#"
            onclick="event.preventDefault(); openLogoutModal();"
            class="flex items-center gap-md px-md py-sm text-on-surface-variant hover:bg-surface-container-low transition-colors rounded-lg group">

            <span class="material-symbols-outlined text-[20px] group-hover:text-primary transition-colors">
                logout
            </span>

            <span class="font-body-sm text-body-sm">
                Logout
            </span>
        </a>
    </div>
</aside>

<script>

function openLogoutModal()
{
    document
        .getElementById('logoutModal')
        .classList.remove('hidden');

    document
        .getElementById('logoutModal')
        .classList.add('flex');
}

function closeLogoutModal()
{
    document
        .getElementById('logoutModal')
        .classList.add('hidden');

    document
        .getElementById('logoutModal')
        .classList.remove('flex');
}

</script>