<x-guest-layout>
    <div class="rounded-xl border border-[#E5E7EB] bg-white p-6 shadow-none sm:p-8">
        <div class="mb-8">
            <p class="text-xs font-semibold uppercase leading-4 tracking-[0.05em] text-[#E31E24]">Secure action</p>
            <h1 class="mt-2 text-2xl font-semibold leading-8 tracking-[-0.01em] text-[#111827]">Confirm your password</h1>
            <p class="mt-2 text-sm leading-5 text-[#6B7280]">
                {{ __('This is a secure area of the application. Please confirm your password before continuing.') }}
            </p>
        </div>

        <form method="POST" action="{{ route('password.confirm') }}" class="space-y-5">
            @csrf

            <div>
                <x-input-label for="password" :value="__('Password')" />
                <x-text-input id="password" class="mt-2 block w-full" type="password" name="password" required autocomplete="current-password" />
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <x-primary-button class="w-full">
                {{ __('Confirm') }}
            </x-primary-button>
        </form>
    </div>
</x-guest-layout>
