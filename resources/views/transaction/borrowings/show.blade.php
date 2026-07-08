@extends('layouts.app')

@section('content')

<div class="space-y-6">

    <x-page-header
        title="Borrowing Detail"
        subtitle="Borrowing transaction information" />

    {{-- Borrowing Information --}}
    <x-card>

        <h2 class="mb-6 text-lg font-semibold">
            Borrowing Information
        </h2>

        <div class="grid grid-cols-1 gap-6 md:grid-cols-2">

            <div>
                <p class="mb-2 text-sm text-gray-500">
                    Borrowing Code
                </p>

                <p class="font-medium">
                    {{ $borrowing->borrowing_code }}
                </p>
            </div>

            <div>
                <p class="mb-2 text-sm text-gray-500">
                    Borrower
                </p>

                <p class="font-medium">
                    {{ $borrowing->borrower_name }}
                </p>
            </div>

            <div>
                <p class="mb-2 text-sm text-gray-500">
                    Department
                </p>

                <p>
                    {{ $borrowing->department->name }}
                </p>
            </div>

            <div>
                <p class="mb-2 text-sm text-gray-500">
                    Warehouse Staff
                </p>

                <p>
                    {{ $borrowing->user->name }}
                </p>
            </div>

            <div>
                <p class="mb-2 text-sm text-gray-500">
                    Borrow Date
                </p>

                <p>
                    {{ $borrowing->borrow_date->format('d M Y') }}
                </p>
            </div>

            <div>
                <p class="mb-2 text-sm text-gray-500">
                    Return Date
                </p>

                <p>
                    {{ $borrowing->return_date->format('d M Y') }}
                </p>
            </div>

            <div>
                <p class="mb-2 text-sm text-gray-500">
                    Status
                </p>

                @if($borrowing->status == 'Borrowed')

                    <span class="rounded-full bg-yellow-100 px-3 py-1 text-sm font-medium text-yellow-700">
                        Borrowed
                    </span>

                @elseif($borrowing->status == 'Returned')

                    <span class="rounded-full bg-green-100 px-3 py-1 text-sm font-medium text-green-700">
                        Returned
                    </span>

                @else

                    <span class="rounded-full bg-red-100 px-3 py-1 text-sm font-medium text-red-700">
                        Overdue
                    </span>

                @endif

            </div>

            <div>
                <p class="mb-2 text-sm text-gray-500">
                    Purpose
                </p>

                <p>
                    {{ $borrowing->purpose }}
                </p>
            </div>

            <div class="md:col-span-2">

                <p class="mb-2 text-sm text-gray-500">
                    Notes
                </p>

                <p>
                    {{ $borrowing->notes ?: '-' }}
                </p>

            </div>

        </div>

    </x-card>

    {{-- Borrowed Items --}}
    <x-card>

        <h2 class="mb-6 text-lg font-semibold">
            Borrowed Items
        </h2>

        <x-datatable
            :headers="[
                'No',
                'Product',
                'Category',
                'Quantity'
            ]">

            @foreach($borrowing->details as $detail)

                <tr>

                    <td class="px-6 py-4">

                        {{ $loop->iteration }}

                    </td>

                    <td class="px-6 py-4">

                        <div>

                            <p class="font-medium">

                                {{ $detail->product->name }}

                            </p>

                            <p class="text-sm text-gray-500">

                                {{ $detail->product->code }}

                            </p>

                        </div>

                    </td>

                    <td class="px-6 py-4">

                        {{ $detail->product->category->name }}

                    </td>

                    <td class="px-6 py-4">

                        <span class="rounded-full bg-blue-100 px-3 py-1 text-sm font-medium text-blue-700">

                            {{ $detail->quantity }}

                        </span>

                    </td>

                </tr>

            @endforeach

        </x-datatable>

    </x-card>

    <div class="flex justify-end">

        <x-button
            href="{{ route('borrowings.index') }}"
            variant="secondary"
            icon="arrow_back">

            Back

        </x-button>

    </div>

</div>

@endsection