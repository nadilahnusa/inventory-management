<div
    id="logoutModal"
    class="fixed inset-0 z-50 hidden items-center justify-center bg-black/50 p-4">

    <div class="w-full max-w-md rounded-2xl bg-white p-6 shadow-xl">

        <div class="flex items-start gap-4">

            <div class="flex h-12 w-12 items-center justify-center rounded-full bg-red-100">

                <span class="material-symbols-outlined text-red-600">

                    logout

                </span>

            </div>

            <div>

                <h2 class="text-lg font-semibold text-gray-900">

                    Logout

                </h2>

                <p class="mt-1 text-sm text-gray-500">

                    Are you sure you want to logout from your account?

                </p>

            </div>

        </div>

        <form
            id="logoutForm"
            action="{{ route('logout') }}"
            method="POST"
            class="mt-8 flex justify-end gap-3">

            @csrf

            <x-button
                type="button"
                variant="secondary"
                onclick="closeLogoutModal()">

                Cancel

            </x-button>

            <x-button
                type="submit"
                variant="danger"
                icon="logout">

                Logout

            </x-button>

        </form>

    </div>

</div>