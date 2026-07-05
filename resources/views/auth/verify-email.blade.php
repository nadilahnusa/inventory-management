<x-guest-layout>
    <div class="rounded-xl border border-[#E5E7EB] bg-white p-6 shadow-none sm:p-8">
        <div class="mb-8">
            <p class="text-xs font-semibold uppercase leading-4 tracking-[0.05em] text-[#E31E24]">Verify email</p>
            <h1 class="mt-2 text-2xl font-semibold leading-8 tracking-[-0.01em] text-[#111827]">Check your inbox</h1>
            <p class="mt-2 text-sm leading-5 text-[#6B7280]">
                {{ __('Thanks for signing up. Before getting started, verify your email address by clicking the link we just emailed to you.') }}
            </p>
        </div>

        @if (session('status') == 'verification-link-sent')
            <x-auth-session-status class="mb-6" :status="__('A new verification link has been sent to the email address you provided during registration.')" />
        @endif

        <div class="flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
            <form method="POST" action="{{ route('verification.send') }}">
                @csrf
                <x-primary-button>
                    {{ __('Resend Verification Email') }}
                </x-primary-button>
            </form>

            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="inline-flex min-h-10 items-center justify-center rounded-lg px-3 py-2 text-sm font-semibold leading-5 text-[#374151] transition-colors hover:text-[#111827] focus:outline-none focus:ring-2 focus:ring-[#111827] focus:ring-offset-2">
                    {{ __('Log Out') }}
                </button>
            </form>
        </div>
    </div>
</x-guest-layout>
