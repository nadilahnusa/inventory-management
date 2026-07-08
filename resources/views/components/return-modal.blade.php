@props([
    'title',
    'subtitle',
])

<div
    id="returnModal"
    class="fixed inset-0 z-50 hidden items-center justify-center bg-black/50 p-4">

    <div class="w-full max-w-md rounded-2xl bg-white p-6 shadow-xl">

        <div class="flex items-start gap-4">

            <div class="flex h-12 w-12 items-center justify-center rounded-full bg-green-100">

                <span class="material-symbols-outlined text-green-600">
                    assignment_return
                </span>

            </div>

            <div>

                <h2 class="text-lg font-semibold text-gray-900">
                    {{ $title }}
                </h2>

                <p class="mt-1 text-sm text-gray-500">
                    {{ $subtitle }}
                </p>

            </div>

        </div>

        <form
            id="returnForm"
            method="POST"
            class="mt-8 flex justify-end gap-3">

            @csrf
            @method('PATCH')

            <x-button
                type="button"
                variant="secondary"
                onclick="closeReturnModal()">

                Cancel

            </x-button>

            <x-button
                type="submit"
                icon="assignment_return">

                Confirm Return

            </x-button>

        </form>

    </div>

</div>