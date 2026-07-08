<div class="space-y-6">


<x-card>

    <div class="mb-6">

        <h3 class="text-lg font-semibold text-gray-900">

            Borrowing Information

        </h3>

        <p class="text-sm text-gray-500">

            Fill in the borrowing transaction information.

        </p>

    </div>

    <div class="grid grid-cols-1 gap-6 lg:grid-cols-2">

        {{-- Borrowing Code --}}
        <div>

            <label class="mb-2 block text-sm font-medium text-gray-700">

                Borrowing Code

            </label>

            <input
                type="text"
                value="{{ $borrowing->borrowing_code ?? 'Auto Generated' }}"
                readonly
                class="w-full rounded-xl border border-gray-200 bg-gray-100 px-4 py-3 text-gray-500">

        </div>

        {{-- Borrower --}}
        <div>

            <label class="mb-2 block text-sm font-medium text-gray-700">

                Borrower Name

            </label>

            <input
                type="text"
                name="borrower_name"
                value="{{ old('borrower_name', $borrowing->borrower_name ?? '') }}"
                placeholder="Input borrower name..."
                class="w-full rounded-xl border border-[#E5E7EB] px-4 py-3">

            @error('borrower_name')

                <p class="mt-2 text-sm text-red-500">

                    {{ $message }}

                </p>

            @enderror

        </div>

        {{-- Department --}}
        <div>

            <label class="mb-2 block text-sm font-medium text-gray-700">

                Department

            </label>

            <select
                name="department_id"
                class="w-full rounded-xl border border-[#E5E7EB] px-4 py-3">

                <option value="">

                    -- Select Department --

                </option>

                @foreach($departments as $department)

                    <option
                        value="{{ $department->id }}"
                        @selected(old('department_id',$borrowing->department_id ?? '')==$department->id)>

                        {{ $department->name }}

                    </option>

                @endforeach

            </select>

            @error('department_id')

                <p class="mt-2 text-sm text-red-500">

                    {{ $message }}

                </p>

            @enderror

        </div>

        {{-- Purpose --}}
        <div>

            <label class="mb-2 block text-sm font-medium text-gray-700">

                Purpose

            </label>

            <input
                type="text"
                name="purpose"
                value="{{ old('purpose',$borrowing->purpose ?? '') }}"
                placeholder="Input borrowing purpose..."
                class="w-full rounded-xl border border-[#E5E7EB] px-4 py-3">

            @error('purpose')

                <p class="mt-2 text-sm text-red-500">

                    {{ $message }}

                </p>

            @enderror

        </div>

        {{-- Borrow Date --}}
        <div>

            <label class="mb-2 block text-sm font-medium text-gray-700">

                Borrow Date

            </label>

            <input
                type="date"
                name="borrow_date"
                value="{{ old('borrow_date', isset($borrowing) ? $borrowing->borrow_date?->format('Y-m-d') : now()->format('Y-m-d')) }}"
                class="w-full rounded-xl border border-[#E5E7EB] px-4 py-3">

            @error('borrow_date')

                <p class="mt-2 text-sm text-red-500">

                    {{ $message }}

                </p>

            @enderror

        </div>

        {{-- Return Date --}}
        <div>

            <label class="mb-2 block text-sm font-medium text-gray-700">

                Return Date

            </label>

            <input
                type="date"
                name="return_date"
                value="{{ old('return_date', isset($borrowing) ? $borrowing->return_date?->format('Y-m-d') : '') }}"
                class="w-full rounded-xl border border-[#E5E7EB] px-4 py-3">

            @error('return_date')

                <p class="mt-2 text-sm text-red-500">

                    {{ $message }}

                </p>

            @enderror

        </div>

        {{-- Notes --}}
        <div class="lg:col-span-2">

            <label class="mb-2 block text-sm font-medium text-gray-700">

                Notes

            </label>

            <textarea
                name="notes"
                rows="4"
                placeholder="Additional notes..."
                class="w-full rounded-xl border border-[#E5E7EB] px-4 py-3">{{ old('notes',$borrowing->notes ?? '') }}</textarea>

            @error('notes')

                <p class="mt-2 text-sm text-red-500">

                    {{ $message }}

                </p>

            @enderror

        </div>

    </div>

</x-card>

</div>

{{-- Borrowed Items --}}

<div class="mt-6">

<x-card>

    <div class="flex items-center justify-between mt-2 pt-2">

        <div>

            <h3 class="text-lg font-semibold text-gray-900">

                Borrowed Items

            </h3>

            <p class="mt-1 text-sm text-gray-500">

                Add one or more products to this borrowing transaction.

            </p>

        </div>

        <x-button
            type="button"
            id="addProduct"
            icon="add">

            Add Product

        </x-button>

    </div>

    <div
        id="productContainer"
        class="mt-6 space-y-5">

        {{-- Product Card will appear here --}}

    </div>

</x-card>

</div>


<div class="flex justify-end gap-3 mt-6">

    <x-button
        href="{{ route('borrowings.index') }}"
        variant="secondary"
        icon="arrow_back">

        Cancel

    </x-button>

    <x-button
        type="submit"
        icon="save">

        Save Borrowing

    </x-button>

</div>

<template id="productTemplate">

<div class="product-card rounded-xl border border-gray-200 bg-gray-50 p-6 shadow-sm">

    <div class="grid grid-cols-1 gap-6 lg:grid-cols-4">

        {{-- Product --}}
        <div class="lg:col-span-2">

            <label class="mb-2 block text-sm font-medium">

                Product

            </label>

            <select
                class="product-select w-full rounded-xl border border-gray-300 px-4 py-3">

            </select>

        </div>

        {{-- Available --}}
        <div>

            <label class="mb-2 block text-sm font-medium">

                Available Stock

            </label>

            <div
                class="available rounded-xl bg-green-100 px-4 py-3 font-semibold text-green-700">

                -

            </div>

        </div>

        {{-- Qty --}}
        <div>

            <label class="mb-2 block text-sm font-medium">

                Quantity

            </label>

            <input
                type="number"
                min="1"
                value="1"
                class="quantity w-full rounded-xl border border-gray-300 px-4 py-3">

        </div>

    </div>

    <div class="mt-6 border-t border-gray-200 pt-5 flex justify-end">

        <button
            type="button"
            class="remove-product inline-flex items-center gap-2 rounded-lg bg-red-100 px-4 py-2 text-red-600 hover:bg-red-200">

            <span class="material-symbols-outlined">

                delete

            </span>

            Remove

        </button>

    </div>

</div>

</template>

@push('scripts')

<script>


const products = @json($productData);

const container = document.getElementById('productContainer');
const addButton = document.getElementById('addProduct');
const template = document.getElementById('productTemplate');

let index = 0;

addButton.addEventListener('click', addProductCard);

addProductCard();

function addProductCard()
{
    const clone = template.content.cloneNode(true);

    const card = clone.querySelector('div');

    const select = clone.querySelector('.product-select');

    const stock = clone.querySelector('.available');

    const qty = clone.querySelector('.quantity');

    const remove = clone.querySelector('.remove-product');

    select.name = `products[${index}][product_id]`;

    qty.name = `products[${index}][quantity]`;

    loadOptions(select);

    select.addEventListener('change', function(){

        updateStock(this, stock, qty);

        refreshOptions();

    });

    qty.addEventListener('input', function(){

        if(Number(this.value) > Number(this.max))
        {
            this.value = this.max;
        }

        if(Number(this.value) < 1)
        {
            this.value = 1;
        }

    });

    remove.addEventListener('click', function(){

        if(container.children.length == 1){

            select.value = "";

            stock.innerHTML = "-";

            stock.className = "available rounded-xl bg-gray-100 px-4 py-3 font-semibold text-gray-600";

            qty.value = 1;

            qty.max = "";

            refreshOptions();

            return;

        }

        card.remove();

        refreshOptions();

    });

    container.appendChild(clone);

    index++;

    refreshOptions();

}

function loadOptions(select)
{
    select.innerHTML = '<option value="">-- Select Product --</option>';

    products.forEach(product => {

        select.innerHTML += `
            <option value="${product.id}">
                ${product.code} - ${product.name}
            </option>
        `;

    });

}

function updateStock(select, stock, qty)
{
    const product = products.find(item => item.id == select.value);

    if(!product){

        stock.innerHTML = "-";

        stock.className = "available rounded-xl bg-gray-100 px-4 py-3 font-semibold text-gray-600";

        qty.max = "";

        return;

    }

    qty.max = product.stock;

    if(qty.value > product.stock){

        qty.value = product.stock;

    }

    if(product.stock == 0){

        stock.innerHTML = "🔴 Out of Stock";

        stock.className = "available rounded-xl bg-red-100 px-4 py-3 font-semibold text-red-600";

    }
    else if(product.stock <= 5){

        stock.innerHTML = `🟡 ${product.stock} Units`;

        stock.className = "available rounded-xl bg-yellow-100 px-4 py-3 font-semibold text-yellow-700";

    }
    else{

        stock.innerHTML = `🟢 ${product.stock} Units`;

        stock.className = "available rounded-xl bg-green-100 px-4 py-3 font-semibold text-green-700";

    }

}

function refreshOptions()
{
    const selected = [];

    document.querySelectorAll('.product-select').forEach(select => {

        if(select.value){

            selected.push(select.value);

        }

    });

    document.querySelectorAll('.product-select').forEach(select => {

        const current = select.value;

        Array.from(select.options).forEach(option => {

            if(option.value == "")
                return;

            option.disabled = selected.includes(option.value) && option.value != current;

        });

    });

    const totalProducts = products.length;

    if(selected.length >= totalProducts){

        addButton.disabled = true;

        addButton.classList.add('opacity-50','cursor-not-allowed');

    }else{

        addButton.disabled = false;

        addButton.classList.remove('opacity-50','cursor-not-allowed');

    }

}

</script>

@endpush