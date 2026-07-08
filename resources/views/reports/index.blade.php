@extends('layouts.app')

@section('content')

<div class="space-y-6">

    {{-- Header --}}
    <x-page-header
        title="Borrowing Report"
        subtitle="Borrowing statistics and transaction report" />

    {{-- Filter --}}
    <form
        action="{{ route('reports.index') }}"
        method="GET">

        <x-card>

            <div class="grid grid-cols-1 gap-6 md:grid-cols-2 lg:grid-cols-4">

                {{-- Date From --}}
                <div>

                    <label class="mb-2 block text-sm font-medium text-gray-700">
                        Date From
                    </label>

                    <input
                        type="date"
                        name="date_from"
                        value="{{ request('date_from') }}"
                        class="w-full rounded-xl border border-[#E5E7EB] px-4 py-3 focus:border-[#E31E24] focus:ring-[#E31E24]/10">

                </div>

                {{-- Date To --}}
                <div>

                    <label class="mb-2 block text-sm font-medium text-gray-700">
                        Date To
                    </label>

                    <input
                        type="date"
                        name="date_to"
                        value="{{ request('date_to') }}"
                        class="w-full rounded-xl border border-[#E5E7EB] px-4 py-3 focus:border-[#E31E24] focus:ring-[#E31E24]/10">

                </div>

                {{-- Department --}}
                <div>

                    <label class="mb-2 block text-sm font-medium text-gray-700">
                        Department
                    </label>

                    <select
                        name="department_id"
                        class="w-full rounded-xl border border-[#E5E7EB] px-4 py-3 focus:border-[#E31E24]">

                        <option value="">
                            All Departments
                        </option>

                        @foreach($departments as $department)

                            <option
                                value="{{ $department->id }}"
                                @selected(request('department_id') == $department->id)>

                                {{ $department->name }}

                            </option>

                        @endforeach

                    </select>

                </div>

                {{-- Status --}}
                <div>

                    <label class="mb-2 block text-sm font-medium text-gray-700">
                        Status
                    </label>

                    <select
                        name="status"
                        class="w-full rounded-xl border border-[#E5E7EB] px-4 py-3 focus:border-[#E31E24]">

                        <option value="">
                            All Status
                        </option>

                        <option
                            value="Borrowed"
                            @selected(request('status')=='Borrowed')>

                            Borrowed

                        </option>

                        <option
                            value="Returned"
                            @selected(request('status')=='Returned')>

                            Returned

                        </option>

                        <option
                            value="Overdue"
                            @selected(request('status')=='Overdue')>

                            Overdue

                        </option>

                    </select>

                </div>

            </div>

            <div class="mt-6 flex flex-wrap justify-end gap-3">

                <x-button
                    href="{{ route('reports.index') }}"
                    variant="secondary"
                    icon="refresh">

                    Reset

                </x-button>

                <x-button
                    type="submit"
                    icon="filter_alt">

                    Filter

                </x-button>

                <x-button
                    href="{{ route('reports.export.pdf', request()->query()) }}"
                    icon="picture_as_pdf">

                    Export PDF

                </x-button>
            </div>

        </x-card>

    </form>

    {{-- Summary --}}
    <div class="grid gap-6 md:grid-cols-2 xl:grid-cols-4">

        {{-- Total --}}
        <x-card>

            <div class="flex items-center justify-between">

                <div>

                    <p class="text-sm text-gray-500">
                        Total Borrowings
                    </p>

                    <h2 class="mt-2 text-3xl font-bold">
                        {{ $totalBorrowings }}
                    </h2>

                </div>

                <div class="rounded-xl bg-blue-100 p-3">

                    <span class="material-symbols-outlined text-3xl text-blue-600">
                        inventory_2
                    </span>

                </div>

            </div>

        </x-card>

        {{-- Borrowed --}}
        <x-card>

            <div class="flex items-center justify-between">

                <div>

                    <p class="text-sm text-gray-500">
                        Borrowed
                    </p>

                    <h2 class="mt-2 text-3xl font-bold text-amber-500">
                        {{ $borrowedCount }}
                    </h2>

                </div>

                <div class="rounded-xl bg-amber-100 p-3">

                    <span class="material-symbols-outlined text-3xl text-amber-500">
                        schedule
                    </span>

                </div>

            </div>

        </x-card>

        {{-- Returned --}}
        <x-card>

            <div class="flex items-center justify-between">

                <div>

                    <p class="text-sm text-gray-500">
                        Returned
                    </p>

                    <h2 class="mt-2 text-3xl font-bold text-green-600">
                        {{ $returnedCount }}
                    </h2>

                </div>

                <div class="rounded-xl bg-green-100 p-3">

                    <span class="material-symbols-outlined text-3xl text-green-600">
                        assignment_return
                    </span>

                </div>

            </div>

        </x-card>

        {{-- Overdue --}}
        <x-card>

            <div class="flex items-center justify-between">

                <div>

                    <p class="text-sm text-gray-500">
                        Overdue
                    </p>

                    <h2 class="mt-2 text-3xl font-bold text-red-600">
                        {{ $overdueCount }}
                    </h2>

                </div>

                <div class="rounded-xl bg-red-100 p-3">

                    <span class="material-symbols-outlined text-3xl text-red-600">
                        warning
                    </span>

                </div>

            </div>

        </x-card>

    </div>

</div>

{{-- Charts --}}
<div class="grid grid-cols-1 gap-6 xl:grid-cols-2 mt-6">

    {{-- Pie Chart --}}
    <x-card>

        <div class="mb-6 flex items-center justify-between">

            <div>

                <h2 class="text-lg font-semibold">
                    Borrowing Status
                </h2>

                <p class="text-sm text-gray-500">
                    Distribution of borrowing transactions
                </p>

            </div>

        </div>

        <div class="h-[320px]">

            <canvas id="statusChart"></canvas>

        </div>

    </x-card>

    {{-- Monthly Trend --}}
    <x-card>

        <div class="mb-6">

            <h2 class="text-lg font-semibold">

                Monthly Borrowing Trend

            </h2>

            <p class="text-sm text-gray-500">

                Number of borrowings each month

            </p>

        </div>

        <div class="h-[320px]">

            <canvas id="monthlyChart"></canvas>

        </div>

    </x-card>

</div>

{{-- Top Products --}}
<div class="mt-6">

    <x-card>

        <div class="mb-6">

            <h2 class="text-lg font-semibold">

                Top 5 Borrowed Products

            </h2>

            <p class="text-sm text-gray-500">

                Products with the highest borrowing frequency

            </p>

        </div>

        <div class="h-[380px]">

            <canvas id="productChart"></canvas>

        </div>

    </x-card>
</div>

@endsection

@push('scripts')

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>

const statusChart = @json($statusChart);

const monthlyChart = @json($monthlyChart);

const topProducts = @json(
    $topProducts->map(function($item){

        return [

            'name' => $item->product?->name,
            'total' => $item->total,

        ];

    })
);

new Chart(

    document.getElementById('statusChart'),

    {

        type: 'pie',

        data: {

            labels: Object.keys(statusChart),

            datasets: [{

                data: Object.values(statusChart),

                backgroundColor: [

                    '#F59E0B',

                    '#10B981',

                    '#EF4444'

                ]

            }]

        },

        options: {

            responsive: true,

            maintainAspectRatio: false,

        }

    }

);

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

                    backgroundColor: 'rgba(227,30,36,.15)',

                    fill: true,

                    tension: .35

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

new Chart(

    document.getElementById('productChart'),

    {

        type: 'bar',

        data: {

            labels: topProducts.map(item => item.name),

            datasets: [

                {

                    label: 'Borrowed',

                    data: topProducts.map(item => item.total),

                    backgroundColor: '#E31E24',

                    borderRadius: 8,

                }

            ]

        },

        options: {

            indexAxis: 'y',

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