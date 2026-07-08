@extends('layouts.app')

@section('content')

@php

$cards = [

    [

        'title' => 'Total Products',

        'value' => $totalProducts,

        'description' => 'Registered assets',

        'icon' => 'inventory_2',

    ],

    [

        'title' => 'Available Stock',

        'value' => $availableProducts,

        'description' => 'Ready to borrow',

        'icon' => 'check_circle',

    ],

    [

        'title' => 'Active Borrowings',

        'value' => $borrowedProducts,

        'description' => 'Currently borrowed',

        'icon' => 'inventory',

    ],

    [

        'title' => 'Total Transactions',

        'value' => $totalBorrowings,

        'description' => 'Borrowing records',

        'icon' => 'assignment',

    ],

];

@endphp

<div class="space-y-8">

    <x-page-header
        title="Dashboard"
        subtitle="Track inventory activity and borrowing statistics.">

        <x-slot:actions>

            <div class="rounded-xl border border-[#E5E7EB] bg-white px-4 py-3 text-sm text-gray-500">

                {{ now()->format('d F Y') }}

            </div>

        </x-slot>

    </x-page-header>

    {{-- Welcome Card --}}
    <x-card>

        <div class="flex flex-col justify-between gap-6 lg:flex-row lg:items-center">

            <div>

                <h2 class="text-2xl font-bold text-gray-900">

                    Welcome back,
                    {{ auth()->user()->name }}

                    👋

                </h2>

                <p class="mt-2 text-gray-500">

                    Here's what's happening with your inventory today.

                </p>

            </div>

            <div class="grid grid-cols-3 gap-4">

                <div class="rounded-xl bg-red-50 px-5 py-4 text-center">

                    <h3 class="text-2xl font-bold text-[#E31E24]">

                        {{ $borrowedProducts }}

                    </h3>

                    <p class="mt-1 text-sm text-gray-500">

                        Active

                    </p>

                </div>

                <div class="rounded-xl bg-green-50 px-5 py-4 text-center">

                    <h3 class="text-2xl font-bold text-green-600">

                        {{ $returnedBorrowings }}

                    </h3>

                    <p class="mt-1 text-sm text-gray-500">

                        Returned

                    </p>

                </div>

                <div class="rounded-xl bg-amber-50 px-5 py-4 text-center">

                    <h3 class="text-2xl font-bold text-amber-600">

                        {{ $overdueBorrowings }}

                    </h3>

                    <p class="mt-1 text-sm text-gray-500">

                        Overdue

                    </p>

                </div>

            </div>

        </div>

    </x-card>

    {{-- Summary Cards --}}
    <section class="grid gap-6 md:grid-cols-2 xl:grid-cols-4">

        @foreach($cards as $card)

            <x-stats-card
                :title="$card['title']"
                :value="$card['value']"
                :description="$card['description']"
                :icon="$card['icon']"/>

        @endforeach

    </section>

    <section class="grid gap-6 xl:grid-cols-[1.7fr_1fr]">

    {{-- Monthly Borrowing --}}
    <x-card>

        <div class="mb-6 flex items-center justify-between">

            <div>

                <h2 class="text-lg font-semibold">

                    Monthly Borrowing Trend

                </h2>

                <p class="mt-1 text-sm text-gray-500">

                    Borrowing transactions throughout the year

                </p>

            </div>

            <x-badge>

                {{ now()->year }}

            </x-badge>

        </div>

        <div class="h-[340px]">

            <canvas id="monthlyChart"></canvas>

        </div>

    </x-card>

    {{-- Borrowing Status --}}
    <x-card>

        <div class="mb-6">

            <h2 class="text-lg font-semibold">

                Borrowing Status

            </h2>

            <p class="mt-1 text-sm text-gray-500">

                Current transaction status

            </p>

        </div>

        <div class="flex h-[340px] items-center justify-center">

            <canvas id="statusChart"></canvas>

        </div>

        <div class="mt-6 space-y-3">

            <div class="flex items-center justify-between">

                <span class="flex items-center gap-2">

                    <span class="h-3 w-3 rounded-full bg-amber-400"></span>

                    Borrowed

                </span>

                <strong>

                    {{ $borrowedProducts }}

                </strong>

            </div>

            <div class="flex items-center justify-between">

                <span class="flex items-center gap-2">

                    <span class="h-3 w-3 rounded-full bg-green-500"></span>

                    Returned

                </span>

                <strong>

                    {{ $returnedBorrowings }}

                </strong>

            </div>

            <div class="flex items-center justify-between">

                <span class="flex items-center gap-2">

                    <span class="h-3 w-3 rounded-full bg-red-500"></span>

                    Overdue

                </span>

                <strong>

                    {{ $overdueBorrowings }}

                </strong>

            </div>

        </div>

    </x-card>

</section>

<section class="grid gap-6 xl:grid-cols-[1.6fr_1fr]">

    {{-- Recent Borrowings --}}
    <x-card>

        <div class="mb-6 flex items-center justify-between">

            <div>

                <h2 class="text-lg font-semibold">

                    Recent Borrowings

                </h2>

                <p class="mt-1 text-sm text-gray-500">

                    Latest borrowing transactions

                </p>

            </div>

            <x-button
                href="{{ route('borrowings.index') }}"
                variant="secondary"
                icon="arrow_forward">

                View All

            </x-button>

        </div>

        <x-datatable
            :headers="[
                'Code',
                'Borrower',
                'Department',
                'Items',
                'Status'
            ]">

            @forelse($recentBorrowings as $borrowing)

                <tr class="hover:bg-gray-50">

                    <td class="px-6 py-4 font-medium">

                        {{ $borrowing->borrowing_code }}

                    </td>

                    <td class="px-6 py-4">

                        {{ $borrowing->borrower_name }}

                    </td>

                    <td class="px-6 py-4">

                        {{ $borrowing->department->name }}

                    </td>

                    <td class="px-6 py-4">

                        {{ $borrowing->details->count() }}

                        Item(s)

                    </td>

                    <td class="px-6 py-4">

                        @switch($borrowing->status)

                            @case('Borrowed')

                                <x-badge color="warning">

                                    Borrowed

                                </x-badge>

                            @break

                            @case('Returned')

                                <x-badge color="success">

                                    Returned

                                </x-badge>

                            @break

                            @case('Overdue')

                                <x-badge color="danger">

                                    Overdue

                                </x-badge>

                            @break

                        @endswitch

                    </td>

                </tr>

            @empty

                <tr>

                    <td
                        colspan="5"
                        class="px-6 py-10 text-center text-gray-500">

                        No borrowing transaction found.

                    </td>

                </tr>

            @endforelse

        </x-datatable>

    </x-card>


    {{-- Low Stock --}}
    <x-card>

        <div class="mb-6 flex items-center justify-between">

            <div>

                <h2 class="text-lg font-semibold">

                    Low Stock Alert

                </h2>

                <p class="mt-1 text-sm text-gray-500">

                    Products that need replenishment

                </p>

            </div>

            <span
                class="rounded-full bg-red-100 px-3 py-1 text-xs font-semibold text-red-600">

                {{ $lowStockProducts->count() }}

                Items

            </span>

        </div>

        <div class="space-y-4">

            @forelse($lowStockProducts as $product)

                <div
                    class="rounded-xl border border-red-100 bg-red-50 p-4">

                    <div class="flex items-start justify-between">

                        <div>

                            <h3 class="font-semibold text-gray-900">

                                {{ $product->name }}

                            </h3>

                            <p class="mt-1 text-sm text-gray-500">

                                {{ $product->category->name }}

                            </p>

                        </div>

                        <span
                            class="rounded-full bg-white px-3 py-1 text-sm font-bold text-red-600">

                            {{ $product->available_stock }}

                        </span>

                    </div>

                    <div
                        class="mt-4 h-2 overflow-hidden rounded-full bg-red-100">

                        <div
                            class="h-full rounded-full bg-red-500"
                            style="width: {{ min(($product->available_stock/5)*100,100) }}%">

                        </div>

                    </div>

                </div>

            @empty

                <div
                    class="rounded-xl border border-green-100 bg-green-50 p-8 text-center">

                    <span class="material-symbols-outlined text-5xl text-green-500">

                        verified

                    </span>

                    <p class="mt-3 font-medium text-green-700">

                        Great!

                    </p>

                    <p class="mt-1 text-sm text-green-600">

                        No products are running low.

                    </p>

                </div>

            @endforelse

        </div>

    </x-card>

</section>

</div>

@endsection

@push('scripts')

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>

const monthlyChart = @json($monthlyChart);

const statusChart = @json($statusChart);

// Monthly Line Chart
new Chart(

    document.getElementById('monthlyChart'),

    {

        type: 'line',

        data: {

            labels: monthlyChart.map(item => item.month),

            datasets: [

                {

                    label: 'Borrowings',

                    data: monthlyChart.map(item => item.total),

                    borderColor: '#E31E24',

                    backgroundColor: 'rgba(227,30,36,.12)',

                    borderWidth: 3,

                    fill: true,

                    tension: .35,

                    pointRadius: 5,

                }

            ]

        },

        options: {

            responsive: true,

            maintainAspectRatio: false,

            plugins: {

                legend: {

                    display: false

                }

            },

            scales: {

                y: {

                    beginAtZero: true

                }

            }

        }

    }

);

// Doughnut Chart
new Chart(

    document.getElementById('statusChart'),

    {

        type: 'doughnut',

        data: {

            labels: Object.keys(statusChart),

            datasets: [

                {

                    data: Object.values(statusChart),

                    backgroundColor: [

                        '#F59E0B',

                        '#22C55E',

                        '#EF4444'

                    ],

                    borderWidth: 0,

                    cutout: '72%'

                }

            ]

        },

        options: {

            responsive: true,

            maintainAspectRatio: false,

            plugins: {

                legend: {

                    display: false

                }

            }

        }

    }

);

</script>

@endpush