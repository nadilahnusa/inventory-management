<!DOCTYPE html>
<html class="light" lang="en" style="">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Login | Telkom Inventory</title>

    @vite(['resources/css/app.css'])
    
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&amp;display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet">
    
</head>

<body class="bg-background text-on-background selection:bg-primary-container selection:text-on-primary-container">
    <main class="flex min-h-screen w-full">
        <!-- Left Side: Illustration & Branding -->
        <section class="hidden lg:flex w-1/2 flex-col p-xl relative overflow-hidden px-xl bg-surface justify-between">
            <!-- Top Nav Branding (Implicitly part of the layout) -->
            <div class="z-10 px-lg">
                <div class="flex items-center gap-sm">
                    <div class="w-8 h-8 bg-primary rounded-lg flex items-center justify-center">
                        <span class="material-symbols-outlined text-white" style="font-variation-settings: 'FILL' 1;">inventory_2</span>
                    </div>
                    <span class="font-headline-sm text-headline-sm font-bold text-primary tracking-tight">Telkom Inventory</span>
                </div>
            </div>
            
            <!-- Centered Content -->
            <div>
                <!-- Content -->
                <div class="z-10 px-lg max-w-2xl">
                    <h1 class="font-display-lg text-display-lg text-on-background mb-md">
                        Inventory Management System
                    </h1>
                    <h2 class="font-headline-sm text-headline-sm text-primary mb-lg">
                        PT Telkom Indonesia
                    </h2>
                    <p class="font-body-md text-body-md text-on-surface-variant leading-relaxed">
                        Secure, real-time tracking and logistics management for enterprise-scale operations. Streamline your supply chain with our next-generation digital twin technology.
                    </p>
                </div>

            </div>

            <!-- Footer area in left pane -->
            <div class="z-4 pt-lg px-lg mt-xl">
                <p class="font-body-sm text-body-sm text-on-secondary-container">
                    © 2026 PT Telkom Indonesia (Persero) Tbk. All rights reserved.
                </p>
            </div>
            <!-- Subtle background decorative elements -->
            <div class="absolute -bottom-20 -left-20 w-80 h-80 bg-primary/5 rounded-full blur-3xl"></div>
            <div class="absolute top-1/4 -right-10 w-60 h-60 bg-tertiary-container/10 rounded-full blur-3xl"></div>
        </section>

        <!-- Right Side: Login Form -->
        <section class="w-full lg:w-1/2 bg-surface flex items-start lg:items-center justify-center p-gutter relative pt-32 lg:pt-0">
            <!-- Mobile Branding (Only visible when left side is hidden) -->
            <div class="lg:hidden absolute top-xl left-gutter">
                <div class="flex items-center gap-sm">
                    <div class="w-8 h-8 bg-primary rounded-lg flex items-center justify-center">
                        <span class="material-symbols-outlined text-white" style="font-variation-settings: 'FILL' 1;">inventory_2</span>
                    </div>
                    <span class="font-headline-sm text-headline-sm font-bold text-primary tracking-tight">Telkom Inventory</span>
                </div>
            </div>
            <div class="w-full max-w-[420px]">
                <div class="login-card bg-surface-container-lowest p-xl rounded-xl border border-outline-variant/30">
                    <div class="mb-xl">
                        <h3 class="font-headline-sm text-headline-sm font-bold text-on-surface mb-xs">Sign In</h3>
                        <p class="font-body-sm text-body-sm text-on-surface-variant">Enter your enterprise credentials to access the dashboard.</p>
                    </div>
                    <form method="POST" action="{{ route('login') }}" class="space-y-lg">
                    @csrf

                    {{-- Session Status --}}
                    @if (session('status'))
                        <div class="rounded-lg border border-green-200 bg-green-50 p-3 text-sm text-green-700">
                            {{ session('status') }}
                        </div>
                    @endif

                    <!-- Email Field -->
                    <div class="space-y-sm">
                        <label
                            class="font-label-caps text-label-caps text-on-surface-variant"
                            for="email">
                            Email Address
                        </label>

                        <div class="relative group">
                            <span
                                class="material-symbols-outlined absolute left-md top-1/2 -translate-y-1/2 text-on-surface-variant text-[20px] transition-colors group-focus-within:text-primary">
                                mail
                            </span>

                            <input
                                id="email"
                                name="email"
                                type="email"
                                value="{{ old('email') }}"
                                autocomplete="username"
                                required
                                autofocus
                                placeholder="admin@telkom.co.id"
                                class="w-full pl-[48px] pr-md py-md bg-surface-container-low border border-outline-variant rounded-lg font-body-md text-body-md focus:outline-none focus:border-on-background focus:ring-1 focus:ring-on-background transition-all placeholder:text-outline">

                        </div>

                        @error('email')
                            <p class="text-sm text-red-600">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    <!-- Password Field -->
                    <div class="space-y-sm">

                        <div class="flex justify-between items-center">

                            <label
                                class="font-label-caps text-label-caps text-on-surface-variant"
                                for="password">
                                Password
                            </label>

                            @if (Route::has('password.request'))
                                <a
                                    href="{{ route('password.request') }}"
                                    class="font-body-sm text-body-sm text-primary font-semibold hover:underline">
                                    Forgot Password?
                                </a>
                            @endif

                        </div>

                        <div class="relative group">

                            <span
                                class="material-symbols-outlined absolute left-md top-1/2 -translate-y-1/2 text-on-surface-variant text-[20px] transition-colors group-focus-within:text-primary">
                                lock
                            </span>

                            <input
                                id="password"
                                name="password"
                                type="password"
                                autocomplete="current-password"
                                required
                                placeholder="••••••••"
                                class="w-full pl-[48px] pr-[48px] py-md bg-surface-container-low border border-outline-variant rounded-lg font-body-md text-body-md focus:outline-none focus:border-on-background focus:ring-1 focus:ring-on-background transition-all placeholder:text-outline">

                            <button
                                type="button"
                                id="togglePassword"
                                class="absolute right-md top-1/2 -translate-y-1/2 text-on-surface-variant hover:text-on-surface transition-colors">

                                <span
                                    id="togglePasswordIcon"
                                    class="material-symbols-outlined text-[20px]">
                                    visibility
                                </span>

                            </button>

                        </div>

                        @error('password')
                            <p class="text-sm text-red-600">
                                {{ $message }}
                            </p>
                        @enderror

                    </div>

                    <!-- Remember -->
                    <div class="flex items-center justify-between">

                        <label class="flex items-center gap-sm cursor-pointer group">

                            <input
                                id="remember"
                                name="remember"
                                type="checkbox"
                                {{ old('remember') ? 'checked' : '' }}
                                class="h-5 w-5 rounded border-outline-variant text-primary focus:ring-primary/20">

                            <span
                                class="font-body-sm text-body-sm text-on-surface-variant group-hover:text-on-surface">
                                Remember Me
                            </span>

                        </label>

                    </div>

                    <!-- Submit Button -->
                    <button
                        type="submit"
                        class="w-full bg-primary-container text-on-primary py-md px-lg rounded-lg font-body-md text-body-md font-bold hover:brightness-110 active:scale-[0.98] transition-all flex items-center justify-center gap-sm shadow-lg shadow-primary/20 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary">

                        Sign In

                        <span class="material-symbols-outlined text-[20px]">
                            arrow_forward
                        </span>

                    </button>

                </form>


                </div>
            </div>
        </section>
    </main>

    <!-- Global Interactions -->
    <script>
        // Micro-interaction for input focusing
        document.querySelectorAll('input').forEach(input => {
            input.addEventListener('focus', () => {
                input.parentElement.closest('.space-y-sm').querySelector('label').classList.add('text-primary');
            });
            input.addEventListener('blur', () => {
                input.parentElement.closest('.space-y-sm').querySelector('label').classList.remove('text-primary');
            });
        });

        // Toggle password visibility (simplified mock)
        const toggleBtn = document.querySelector('button[type="button"]');
        const passInput = document.getElementById('password');
        toggleBtn.addEventListener('click', () => {
            const isPass = passInput.type === 'password';
            passInput.type = isPass ? 'text' : 'password';
            toggleBtn.querySelector('span').textContent = isPass ? 'visibility_off' : 'visibility';
        });

        document.addEventListener('DOMContentLoaded', () => {

            const toggle = document.getElementById('togglePassword');
            const password = document.getElementById('password');
            const icon = document.getElementById('togglePasswordIcon');

            toggle.addEventListener('click', () => {

                if (password.type === 'password') {

                    password.type = 'text';
                    icon.textContent = 'visibility_off';

                } else {

                    password.type = 'password';
                    icon.textContent = 'visibility';

                }

            });

});
</script>
    </>
</body>

</html>