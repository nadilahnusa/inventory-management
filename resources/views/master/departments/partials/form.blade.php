@csrf

<div class="grid grid-cols-1 gap-6">

    {{-- Department Name --}}
    <div>

        <label class="mb-2 block text-sm font-medium text-on-surface">

            Department Name <span class="text-red-500">*</span>

        </label>

        <input
            type="text"
            name="name"
            value="{{ old('name', $department->name ?? '') }}"
            placeholder="Enter department name"
            class="w-full rounded-lg border border-outline-variant px-4 py-3 focus:border-primary focus:outline-none">

        @error('name')

            <p class="mt-1 text-sm text-red-500">

                {{ $message }}

            </p>

        @enderror

    </div>

    {{-- Description --}}
    <div>

        <label class="mb-2 block text-sm font-medium text-on-surface">

            Description

        </label>

        <textarea
            name="description"
            rows="4"
            placeholder="Department description..."
            class="w-full rounded-lg border border-outline-variant px-4 py-3 focus:border-primary focus:outline-none">{{ old('description', $department->description ?? '') }}</textarea>

        @error('description')

            <p class="mt-1 text-sm text-red-500">

                {{ $message }}

            </p>

        @enderror

    </div>

</div>

<div class="mt-8 flex justify-end gap-3">

    <a
        href="{{ route('departments.index') }}"
        class="rounded-lg border border-outline-variant px-5 py-2">

        Cancel

    </a>

    <button
        type="submit"
        class="rounded-lg bg-primary px-5 py-2 text-on-primary">

        Save Department

    </button>

</div>