@extends('layouts.app')

@section('content')

<div class="space-y-6">

    <x-page-header
        title="Products"
        subtitle="Manage all products">

        <x-slot:actions>

            <x-button
                href="{{ route('products.create') }}"
                icon="add">

                Add Product

            </x-button>

        </x-slot:actions>

    </x-page-header>

    <div class="space-y-6">

        <x-search-filter
            :action="route('products.index')"
            placeholder="Search product..." />

        <x-card class="!p-0">

            <x-datatable
                :headers="[
                    'No',
                    'Product',
                    'Category',
                    'Stock',
                    'Available',
                    'Action'
                ]">

                @forelse ($products as $product)

                    <tr class="hover:bg-surface-container-low">

                        <td class="px-6 py-4">

                            {{ $loop->iteration + $products->firstItem() - 1 }}

                        </td>

                        {{-- Product --}}
                        <td class="px-6 py-4">

                            <div class="flex items-center gap-4">

                                @if($product->image)

                                    <img
                                        src="{{ asset('storage/'.$product->image) }}"
                                        alt="{{ $product->name }}"
                                        class="h-14 w-14 rounded-xl border object-cover">

                                @else

                                    <div class="flex h-14 w-14 items-center justify-center rounded-xl bg-gray-100">

                                        <span class="material-symbols-outlined text-gray-400">
                                            inventory_2
                                        </span>

                                    </div>

                                @endif

                                <div>

                                    <p class="font-semibold text-gray-900">

                                        {{ $product->name }}

                                    </p>

                                    <p class="text-sm text-gray-500">

                                        {{ $product->code }}

                                    </p>

                                </div>

                            </div>

                        </td>

                        {{-- Category --}}
                        <td class="px-6 py-4">

                            {{ $product->category->name }}

                        </td>

                        {{-- Total Stock --}}
                        <td class="px-6 py-4 text-center">

                            <span
                                class="rounded-full bg-blue-100 px-3 py-1 text-sm font-medium text-blue-700">

                                {{ $product->total_stock }}

                            </span>

                        </td>

                        {{-- Available Stock --}}
                        <td class="px-6 py-4 text-center">

                            <span
                                class="rounded-full bg-green-100 px-3 py-1 text-sm font-medium text-green-700">

                                {{ $product->available_stock }}

                            </span>

                        </td>

                        {{-- Action --}}
                        <td class="px-6 py-4">

                            <div class="flex justify-center">

                                <x-table-action
                                    :show="route('products.show', $product)"
                                    :edit="route('products.edit', $product)"
                                    :delete="route('products.destroy', $product)" />

                            </div>

                        </td>

                    </tr>

                @empty

                    <tr>

                        <td colspan="6">

                            <div class="flex flex-col items-center justify-center py-14">

                                <span class="material-symbols-outlined text-6xl text-gray-300">

                                    inventory_2

                                </span>

                                <h3 class="mt-4 text-lg font-semibold">

                                    No Products Found

                                </h3>

                                <p class="mt-2 text-sm text-gray-500">

                                    Start by creating your first product.

                                </p>

                                <x-button
                                    class="mt-5"
                                    href="{{ route('products.create') }}"
                                    icon="add">

                                    Add Product

                                </x-button>

                            </div>

                        </td>

                    </tr>

                @endforelse

            </x-datatable>

        </x-card>

        @if ($products->hasPages())

            <x-pagination
                :data="$products" />

        @endif

    </div>

</div>

@push('modals')

    <x-delete-modal
        title="Delete Product"
        subtitle="Are you sure you want to delete this product? This action cannot be undone." />

@endpush

@push('scripts')

<script>

function openDeleteModal(action){

    document.getElementById('deleteForm').action = action;

    document.getElementById('deleteModal').classList.remove('hidden');

    document.getElementById('deleteModal').classList.add('flex');

}

function closeDeleteModal(){

    document.getElementById('deleteModal').classList.add('hidden');

    document.getElementById('deleteModal').classList.remove('flex');

}

</script>

@endpush

@endsection