<x-guest-layout>
    <div class="rounded-xl border border-[#E5E7EB] bg-white p-6 shadow-none sm:p-8">
        <div class="mb-8">
            <p class="text-xs font-semibold uppercase leading-4 tracking-[0.05em] text-[#E31E24]">Reset access</p>
            <h1 class="mt-2 text-2xl font-semibold leading-8 tracking-[-0.01em] text-[#111827]">Forgot your password?</h1>
            <p class="mt-2 text-sm leading-5 text-[#6B7280]">
                {{ __('Enter your email address and we will send you a secure reset link that lets you choose a new password.') }}
            </p>
        </div>

        <x-auth-session-status class="mb-6" :status="session('status')" />

        <form method="POST" action="{{ route('password.email') }}" class="space-y-5">
            @csrf

            <div>
                <x-input-label for="email" :value="__('Email')" />
                <x-text-input id="email" class="mt-2 block w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <x-primary-button class="w-full">
                {{ __('Email Password Reset Link') }}
            </x-primary-button>
        </form>
    </div>
</x-guest-layout>
