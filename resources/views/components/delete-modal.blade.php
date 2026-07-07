@props([
    'title' => 'Delete Data',
    'subtitle' => 'This action cannot be undone.'
])

<div
    id="deleteModal"
    class="fixed inset-0 z-[999] hidden items-center justify-center bg-black/40">

    <div class="w-full max-w-md rounded-2xl bg-white p-6 shadow-xl">

        <div class="flex items-center gap-3">

            <div class="flex h-12 w-12 items-center justify-center rounded-full bg-red-100">

                <span class="material-symbols-outlined text-red-600">
                    delete
                </span>

            </div>

            <div>

                <h2 class="text-lg font-semibold">
                    {{ $title }}
                </h2>

                <p class="text-sm text-gray-500">
                    {{ $subtitle }}
                </p>

            </div>

        </div>

        <form
            id="deleteForm"
            method="POST"
            class="mt-6">

            @csrf
            @method('DELETE')

            <div class="flex justify-end gap-3">

                <x-button
                    type="button"
                    variant="secondary"
                    onclick="closeDeleteModal()">

                    Cancel

                </x-button>

                <x-button
                    type="submit"
                    icon="delete">

                    Delete

                </x-button>

            </div>

        </form>

    </div>

</div>