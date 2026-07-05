<section>
    <header>
        <h2 class="text-lg font-semibold leading-6 tracking-[-0.01em] text-[#111827]">
            {{ __('Profile Information') }}
        </h2>

        <p class="mt-1 text-sm leading-5 text-[#6B7280]">
            {{ __('Update your account profile information and email address.') }}
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-5">
        @csrf
        @method('patch')

        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" name="name" type="text" class="mt-2 block w-full" :value="old('name', $user->name)" required autofocus autocomplete="name" />
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div>

        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" name="email" type="email" class="mt-2 block w-full" :value="old('email', $user->email)" required autocomplete="username" />
            <x-input-error class="mt-2" :messages="$errors->get('email')" />

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                <div class="mt-3 rounded-lg border border-[#FEF3C7] bg-[#FFFBEB] px-4 py-3">
                    <p class="text-sm leading-5 text-[#92400E]">
                        {{ __('Your email address is unverified.') }}
                        <button form="send-verification" class="font-semibold underline decoration-[#92400E]/40 underline-offset-4 transition-colors hover:text-[#78350F] focus:outline-none focus:ring-2 focus:ring-[#111827] focus:ring-offset-2">
                            {{ __('Click here to re-send the verification email.') }}
                        </button>
                    </p>

                    @if (session('status') === 'verification-link-sent')
                        <p class="mt-2 text-sm font-medium leading-5 text-[#047857]">
                            {{ __('A new verification link has been sent to your email address.') }}
                        </p>
                    @endif
                </div>
            @endif
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Save') }}</x-primary-button>

            @if (session('status') === 'profile-updated')
                <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)" class="text-sm leading-5 text-[#6B7280]">
                    {{ __('Saved.') }}
                </p>
            @endif
        </div>
    </form>
</section>
