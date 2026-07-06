<div
    id="deleteModal"
    class="fixed inset-0 z-[999] hidden items-center justify-center bg-black/50">

    <div class="w-full max-w-md rounded-2xl bg-white shadow-xl">

        <div class="border-b p-6">

            <h2 class="text-xl font-semibold">

                Delete Department

            </h2>

            <p class="mt-2 text-sm text-secondary">

                This action cannot be undone.

            </p>

        </div>

        <div class="flex justify-end gap-3 p-6">

            <button
                onclick="closeDeleteModal()"
                class="rounded-lg border border-outline-variant px-5 py-2">

                Cancel

            </button>

            <form
                id="deleteForm"
                method="POST">

                @csrf
                @method('DELETE')

                <button
                    class="rounded-lg bg-red-600 px-5 py-2 text-white">

                    Delete

                </button>

            </form>

        </div>

    </div>

</div>