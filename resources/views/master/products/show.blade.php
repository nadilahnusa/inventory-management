@extends('layouts.app')

@section('content')

<div class="space-y-6">

    <x-page-header
        title="Product Detail"
        subtitle="Product information" />

    <x-card>

        <div class="grid grid-cols-1 gap-8 md:grid-cols-3">

            {{-- Product Image --}}
            <div class="flex justify-center">

                @if($product->image)

                    <img
                        src="{{ asset('storage/'.$product->image) }}"
                        alt="{{ $product->name }}"
                        class="h-64 w-64 rounded-xl border object-cover">

                @else

                    <div class="flex h-64 w-64 items-center justify-center rounded-xl border bg-gray-100">

                        <span class="material-symbols-outlined text-7xl text-gray-400">
                            inventory_2
                        </span>

                    </div>

                @endif

            </div>

            {{-- Product Information --}}
            <div class="space-y-5 md:col-span-2">

                <div>

                    <p class="mb-2 text-sm text-gray-500">
                        Product Code
                    </p>

                    <p class="font-medium">
                        {{ $product->code }}
                    </p>

                </div>

                <div>

                    <p class="mb-2 text-sm text-gray-500">
                        Product Name
                    </p>

                    <p class="font-medium">
                        {{ $product->name }}
                    </p>

                </div>

                <div>

                    <p class="mb-2 text-sm text-gray-500">
                        Category
                    </p>

                    <p class="font-medium">
                        {{ $product->category->name }}
                    </p>

                </div>

                <div>

                    <p class="mb-2 text-sm text-gray-500">
                        Description
                    </p>

                    <p>
                        {{ $product->description ?: '-' }}
                    </p>

                </div>

                <div class="grid grid-cols-2 gap-6">

                    <div>

                        <p class="mb-2 text-sm text-gray-500">
                            Total Stock
                        </p>

                        <span class="rounded-full bg-blue-100 px-3 py-1 text-sm font-semibold text-blue-700">

                            {{ $product->total_stock }}

                        </span>

                    </div>

                    <div>

                        <p class="mb-2 text-sm text-gray-500">
                            Available Stock
                        </p>

                        <span class="rounded-full bg-green-100 px-3 py-1 text-sm font-semibold text-green-700">

                            {{ $product->available_stock }}

                        </span>

                    </div>

                </div>

            </div>

        </div>

    </x-card>

    <div class="flex justify-end">

        <x-button
            href="{{ route('products.index') }}"
            variant="secondary"
            icon="arrow_back">

            Back

        </x-button>

    </div>

</div>

@endsection