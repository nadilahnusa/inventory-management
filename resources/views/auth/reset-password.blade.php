<x-guest-layout>
    <div class="rounded-xl border border-[#E5E7EB] bg-white p-6 shadow-none sm:p-8">
        <div class="mb-8">
            <p class="text-xs font-semibold uppercase leading-4 tracking-[0.05em] text-[#E31E24]">Create password</p>
            <h1 class="mt-2 text-2xl font-semibold leading-8 tracking-[-0.01em] text-[#111827]">Reset your password</h1>
            <p class="mt-2 text-sm leading-5 text-[#6B7280]">Choose a strong password to keep your inventory workspace secure.</p>
        </div>

        <form method="POST" action="{{ route('password.store') }}" class="space-y-5">
            @csrf

            <input type="hidden" name="token" value="{{ $request->route('token') }}">

            <div>
                <x-input-label for="email" :value="__('Email')" />
                <x-text-input id="email" class="mt-2 block w-full" type="email" name="email" :value="old('email', $request->email)" required autofocus autocomplete="username" />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <div>
                <x-input-label for="password" :value="__('Password')" />
                <x-text-input id="password" class="mt-2 block w-full" type="password" name="password" required autocomplete="new-password" />
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <div>
                <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
                <x-text-input id="password_confirmation" class="mt-2 block w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
            </div>

            <x-primary-button class="w-full">
                {{ __('Reset Password') }}
            </x-primary-button>
        </form>
    </div>
</x-guest-layout>
