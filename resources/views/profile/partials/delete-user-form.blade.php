<section class="space-y-6">
    <header>
        <h2 class="text-lg font-semibold leading-6 tracking-[-0.01em] text-[#111827]">
            {{ __('Delete Account') }}
        </h2>

        <p class="mt-1 text-sm leading-5 text-[#6B7280]">
            {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. This action cannot be undone.') }}
        </p>
    </header>

    <div class="rounded-lg border border-[#FECACA] bg-[#FEF2F2] p-4">
        <p class="text-sm font-medium leading-5 text-[#991B1B]">Account deletion is permanent.</p>
        <p class="mt-1 text-sm leading-5 text-[#7F1D1D]">Confirm this action only when the account should no longer have access.</p>
    </div>

    <x-danger-button x-data="" x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')">
        {{ __('Delete Account') }}
    </x-danger-button>

    <x-modal name="confirm-user-deletion" :show="$errors->userDeletion->isNotEmpty()" focusable>
        <form method="post" action="{{ route('profile.destroy') }}" class="p-6">
            @csrf
            @method('delete')

            <h2 class="text-lg font-semibold leading-6 tracking-[-0.01em] text-[#111827]">
                {{ __('Are you sure you want to delete your account?') }}
            </h2>

            <p class="mt-2 text-sm leading-5 text-[#6B7280]">
                {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Please enter your password to confirm permanent deletion.') }}
            </p>

            <div class="mt-6">
                <x-input-label for="password" value="{{ __('Password') }}" class="sr-only" />

                <x-text-input id="password" name="password" type="password" class="block w-full" placeholder="{{ __('Password') }}" />

                <x-input-error :messages="$errors->userDeletion->get('password')" class="mt-2" />
            </div>

            <div class="mt-6 flex flex-col-reverse gap-3 sm:flex-row sm:justify-end">
                <x-secondary-button x-on:click="$dispatch('close')">
                    {{ __('Cancel') }}
                </x-secondary-button>

                <x-danger-button>
                    {{ __('Delete Account') }}
                </x-danger-button>
            </div>
        </form>
    </x-modal>
</section>
