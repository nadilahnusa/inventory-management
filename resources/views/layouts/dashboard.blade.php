<!DOCTYPE html>
<html class="light" lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Telkom Inventory - Enterprise Management System</title>

    @vite(['resources/css/app.css'])

    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&amp;display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet">
</head>

<body class="min-h-screen bg-background text-on-background">
    <div id="app-shell" class="flex min-h-screen overflow-hidden">
        @include('partials.dashboard.sidebar')

        <div class="flex min-h-screen flex-1 flex-col min-w-0">
            @include('layouts.header', ['page_subtitle' => 'Dashboard'])

            <main class="flex-1 overflow-x-hidden">
                <div class="mx-auto max-w-7xl p-xl">
                    <div class="mb-xl flex flex-col gap-md sm:flex-row sm:items-end sm:justify-between">
                        <div class="space-y-1">
                            <h1 class="font-display-lg text-display-lg text-on-surface tracking-tight">Dashboard</h1>
                            <p class="font-body-md text-body-md text-secondary">Welcome back, Sarah. Here's what's happening today.</p>
                        </div>
                        <div class="flex gap-md">
                            <button class="flex items-center gap-sm rounded-lg border border-outline-variant bg-surface-container-lowest px-lg py-sm font-body-sm text-body-sm font-medium text-on-surface transition-colors hover:bg-surface-container">
                                <span class="material-symbols-outlined text-[18px]">calendar_today</span>
                                Last 30 Days
                            </button>
                            <button class="flex items-center gap-sm rounded-lg bg-primary px-lg py-sm font-body-sm text-body-sm font-semibold text-on-primary shadow-md shadow-primary/20 transition-all hover:opacity-90 active:scale-[0.98]">
                                <span class="material-symbols-outlined text-[18px]">add</span>
                                New Transaction
                            </button>
                        </div>
                    </div>

                    <div class="group relative flex min-h-[60vh] w-full flex-col items-center justify-center overflow-hidden rounded-2xl border-2 border-dashed border-outline-variant/50 bg-surface-container-low/30">
                        <div class="pointer-events-none absolute inset-0 opacity-5 transition-opacity duration-1000 group-hover:opacity-10"></div>
                        <div class="z-10 p-xl text-center">
                            <div class="mx-auto mb-lg flex h-16 w-16 items-center justify-center rounded-2xl bg-surface-container-high text-outline">
                                <span class="material-symbols-outlined text-[32px]">architecture</span>
                            </div>
                            <h3 class="mb-sm font-headline-sm text-headline-sm text-on-surface">Content Canvas</h3>
                            <p class="mx-auto max-w-md font-body-md text-body-md text-secondary">
                                This area is ready for your specific module components. The layout shell is responsive and follows the Telkom Enterprise design system standards.
                            </p>
                        </div>
                    </div>
                </div>
            </main>

            <footer class="border-t border-outline-variant/50 bg-surface-container-lowest px-xl py-lg">
                <div class="mx-auto flex max-w-7xl items-center justify-between gap-sm text-sm text-secondary">
                    <span>© Telkom Inventory</span>
                    <span>Enterprise dashboard shell</span>
                </div>
            </footer>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const sidebar = document.getElementById('sidebar');
            const overlay = document.getElementById('sidebar-overlay');
            const toggle = document.getElementById('sidebar-toggle');
            const mobileQuery = window.matchMedia('(max-width: 1023px)');
            const storageKey = 'telkom-sidebar-collapsed';
            const labelEls = document.querySelectorAll('[data-sidebar-label]');
            const sectionEls = document.querySelectorAll('[data-sidebar-section]');
            const brandTextEl = document.querySelector('[data-sidebar-brand-text]');
            const itemEls = document.querySelectorAll('[data-sidebar-item]');

            const setSidebarState = (collapsed) => {
                if (!sidebar) {
                    return;
                }

                sidebar.dataset.collapsed = String(collapsed);
                sidebar.classList.toggle('w-[80px]', collapsed);
                sidebar.classList.toggle('w-[280px]', !collapsed);
                sidebar.classList.toggle('-translate-x-full', mobileQuery.matches && !collapsed);
                sidebar.classList.toggle('translate-x-0', mobileQuery.matches ? collapsed || !collapsed : true);
                sidebar.classList.toggle('lg:translate-x-0', true);

                labelEls.forEach((el) => {
                    el.classList.toggle('hidden', collapsed);
                });

                sectionEls.forEach((el) => {
                    el.classList.toggle('hidden', collapsed);
                });

                if (brandTextEl) {
                    brandTextEl.classList.toggle('hidden', collapsed);
                }

                itemEls.forEach((el) => {
                    el.classList.toggle('justify-center', collapsed);
                    el.classList.toggle('justify-start', !collapsed);
                    el.classList.toggle('px-md', !collapsed);
                    el.classList.toggle('px-sm', collapsed);
                });

                if (toggle) {
                    toggle.setAttribute('aria-expanded', String(!collapsed));
                    toggle.querySelector('span').textContent = collapsed ? 'chevron_right' : 'chevron_left';
                }

                if (overlay) {
                    overlay.classList.toggle('hidden', !mobileQuery.matches || !collapsed);
                }

                localStorage.setItem(storageKey, collapsed ? '1' : '0');
            };

            const syncSidebarState = () => {
                if (mobileQuery.matches) {
                    setSidebarState(false);
                    sidebar?.classList.add('-translate-x-full');
                    sidebar?.classList.remove('translate-x-0');
                    return;
                }

                const persisted = localStorage.getItem(storageKey);
                const shouldCollapse = persisted === '1' ? true : window.innerWidth < 1024;
                setSidebarState(shouldCollapse);
            };

            toggle?.addEventListener('click', () => {
                if (mobileQuery.matches) {
                    const isOpen = sidebar?.classList.contains('translate-x-0');
                    sidebar?.classList.toggle('translate-x-0', !isOpen);
                    sidebar?.classList.toggle('-translate-x-full', isOpen);
                    overlay?.classList.toggle('hidden', isOpen);
                    return;
                }

                const collapsed = sidebar?.dataset.collapsed === 'true';
                setSidebarState(!collapsed);
            });

            overlay?.addEventListener('click', () => {
                if (mobileQuery.matches) {
                    sidebar?.classList.add('-translate-x-full');
                    sidebar?.classList.remove('translate-x-0');
                    overlay?.classList.add('hidden');
                }
            });

            window.addEventListener('resize', syncSidebarState);
            syncSidebarState();
        });
    </script>
</body>

</html>