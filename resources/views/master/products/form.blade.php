<div class="space-y-6">

    <x-card>

        <div class="grid grid-cols-1 gap-6">

            {{-- Category --}}
            <div>

                <label class="mb-2 block text-sm font-medium text-gray-700">
                    Category
                </label>

                <select
                    name="category_id"
                    class="w-full rounded-xl border border-[#E5E7EB] px-4 py-3 focus:border-[#E31E24] focus:ring-[#E31E24]/10">

                    <option value="">-- Select Category --</option>

                    @foreach ($categories as $category)

                        <option
                            value="{{ $category->id }}"
                            @selected(old('category_id', $product->category_id ?? '') == $category->id)>

                            {{ $category->name }}

                        </option>

                    @endforeach

                </select>

                @error('category_id')
                    <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
                @enderror

            </div>

            {{-- Product Code --}}
            <div>

                <label class="mb-2 block text-sm font-medium text-gray-700">
                    Product Code
                </label>

                <input
                    type="text"
                    name="code"
                    value="{{ old('code', $product->code ?? '') }}"
                    placeholder="Input product code..."
                    class="w-full rounded-xl border border-[#E5E7EB] px-4 py-3 focus:border-[#E31E24] focus:ring-[#E31E24]/10">

                @error('code')
                    <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
                @enderror

            </div>

            {{-- Product Name --}}
            <div>

                <label class="mb-2 block text-sm font-medium text-gray-700">
                    Product Name
                </label>

                <input
                    type="text"
                    name="name"
                    value="{{ old('name', $product->name ?? '') }}"
                    placeholder="Input product name..."
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
                    rows="4"
                    placeholder="Input description..."
                    class="w-full rounded-xl border border-[#E5E7EB] px-4 py-3 focus:border-[#E31E24] focus:ring-[#E31E24]/10">{{ old('description', $product->description ?? '') }}</textarea>

                @error('description')
                    <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
                @enderror

            </div>

            {{-- Total Stock --}}
            <div>

                <label class="mb-2 block text-sm font-medium text-gray-700">
                    Total Stock
                </label>

                <input
                    type="number"
                    name="total_stock"
                    min="1"
                    value="{{ old('total_stock', $product->total_stock ?? '') }}"
                    placeholder="Input total stock..."
                    class="w-full rounded-xl border border-[#E5E7EB] px-4 py-3 focus:border-[#E31E24] focus:ring-[#E31E24]/10">

                @error('total_stock')
                    <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
                @enderror

            </div>

            {{-- Product Image --}}
            <div>

                <label class="mb-2 block text-sm font-medium text-gray-700">
                    Product Image
                </label>

                <input
                    type="file"
                    name="image"
                    accept="image/*"
                    class="block w-full rounded-xl border border-[#E5E7EB] px-4 py-3 file:mr-4 file:rounded-lg file:border-0 file:bg-[#E31E24] file:px-4 file:py-2 file:text-sm file:font-medium file:text-white hover:file:bg-red-700">

                @error('image')
                    <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
                @enderror

                @if(isset($product) && $product->image)

                    <div class="mt-4">

                        <img
                            src="{{ asset('storage/'.$product->image) }}"
                            class="h-32 w-32 rounded-xl border object-cover">

                    </div>

                @endif

            </div>

        </div>

    </x-card>

    <div class="flex justify-end gap-3">

        <x-button
            href="{{ route('products.index') }}"
            variant="secondary"
            icon="arrow_back">

            Cancel

        </x-button>

        <x-button
            type="submit"
            icon="save">

            Save Product

        </x-button>

    </div>

</div>