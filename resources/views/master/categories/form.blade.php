@csrf

<div class="space-y-6">

    <x-card>

        <div class="grid grid-cols-1 gap-6">

            {{-- Category Name --}}
            <div>

                <label class="mb-2 block text-sm font-medium text-gray-700">
                    Category Name
                </label>

                <input
                    type="text"
                    name="name"
                    value="{{ old('name', $category->name ?? '') }}"
                    placeholder="Input category name..."
                    class="w-full rounded-xl border border-[#E5E7EB] px-4 py-3 focus:border-[#E31E24] focus:ring-[#E31E24]/10">

                @error('name')
                    <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
                @enderror

            </div>

            {{-- Description --}}
            <div>

                <label class="mb-2 block text-sm font-medium text-gray-700">
                    Description
                </label>

                <textarea
                    name="description"
                    rows="5"
                    placeholder="Input description..."
                    class="w-full rounded-xl border border-[#E5E7EB] px-4 py-3 focus:border-[#E31E24] focus:ring-[#E31E24]/10">{{ old('description', $category->description ?? '') }}</textarea>

                @error('description')
                    <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
                @enderror

            </div>

        </div>

    </x-card>

    <div class="flex justify-end gap-3">

        <x-button
            href="{{ route('categories.index') }}"
            variant="secondary"
            icon="arrow_back">

            Cancel

        </x-button>

        <x-button
            type="submit"
            icon="save">

            Save Category

        </x-button>

    </div>

</div>