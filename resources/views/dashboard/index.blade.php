@extends('layouts.app')

@section('page_title', 'Dashboard')
@section('page_subtitle', 'Inventory Overview')

@section('content')

@php

$cards = [
    [
        'title' => 'Total Products',
        'value' => '248',
        'description' => 'Registered assets',
        'icon' => 'inventory_2',
    ],
    [
        'title' => 'Available Products',
        'value' => '186',
        'description' => 'Ready to borrow',
        'icon' => 'check_circle',
    ],
    [
        'title' => 'Borrowed Products',
        'value' => '42',
        'description' => 'Currently checked out',
        'icon' => 'inventory',
    ],
    [
        'title' => 'Total Borrowings',
        'value' => '64',
        'description' => 'This month',
        'icon' => 'assignment',
    ],
];

@endphp

<div class="space-y-10">

    <x-page-header
        title="Dashboard"
        subtitle="Track stock, activity, and borrowing status at a glance.">

        <x-slot:actions>

            <div class="rounded-lg border border-[#E5E7EB] bg-white px-4 py-3 text-sm text-[#6B7280]">

                Last updated: Today, 08:45 AM

            </div>

        </x-slot>

    </x-page-header>


    <section class="grid gap-6 md:grid-cols-2 xl:grid-cols-4">

        @foreach($cards as $card)

            <x-stats-card
                :title="$card['title']"
                :value="$card['value']"
                :description="$card['description']"
                :icon="$card['icon']"/>

        @endforeach

    </section>


    <section class="grid gap-6 xl:grid-cols-[1.4fr_0.9fr]">

        <x-card>

            <div class="mb-6 flex items-center justify-between">

                <div>

                    <h2 class="text-lg font-semibold">

                        Statistics Chart

                    </h2>

                    <p class="mt-1 text-sm text-[#6B7280]">

                        Borrowing trend overview for this period.

                    </p>

                </div>

                <x-badge>

                    Preview

                </x-badge>

            </div>

            <div class="flex h-64 items-end gap-3 rounded-lg border border-dashed border-[#E5E7EB] bg-[#F9FAFB] p-4">

                @foreach (['h-[45%]', 'h-[64%]', 'h-[52%]', 'h-[78%]', 'h-[69%]', 'h-[84%]', 'h-[72%]'] as $height)

                    <div class="flex flex-1 items-end">

                        <div class="w-full rounded-t-md bg-[#E31E24]/80 {{ $height }}"></div>

                    </div>

                @endforeach

            </div>

        </x-card>


        <x-card>

            <div class="mb-6">

                <h2 class="text-lg font-semibold">

                    Inventory Summary

                </h2>

                <p class="mt-1 text-sm text-[#6B7280]">

                    Current asset distribution.

                </p>

            </div>

            <div class="space-y-3">

                @foreach([
                    ['Available','186','success'],
                    ['Borrowed','42','danger'],
                    ['Maintenance','20','info']
                ] as $item)

                    <div class="flex items-center justify-between rounded-lg border border-[#E5E7EB] px-4 py-3">

                        <span>

                            {{ $item[0] }}

                        </span>

                        <x-badge :color="$item[2]">

                            {{ $item[1] }}

                        </x-badge>

                    </div>

                @endforeach

            </div>

        </x-card>

    </section>


    <section class="grid gap-6 xl:grid-cols-2">

        <x-card>

            <h2 class="mb-1 text-lg font-semibold">

                Recent Borrowings

            </h2>

            <p class="mb-6 text-sm text-[#6B7280]">

                Latest transaction updates.

            </p>

            <x-datatable
                :headers="[
                    'Borrower',
                    'Item',
                    'Date',
                    'Status'
                ]">

                @foreach([
                    ['Rina S.','Laptop Dell XPS','04 Jul 2026','Borrowed','danger'],
                    ['Budi T.','Projector Epson','03 Jul 2026','Returned','success'],
                    ['Sari M.','Mobile Scanner','02 Jul 2026','Overdue','warning']
                ] as $row)

                    <tr>

                        <td class="px-6 py-4">

                            {{ $row[0] }}

                        </td>

                        <td class="px-6 py-4">

                            {{ $row[1] }}

                        </td>

                        <td class="px-6 py-4">

                            {{ $row[2] }}

                        </td>

                        <td class="px-6 py-4">

                            <x-badge :color="$row[4]">

                                {{ $row[3] }}

                            </x-badge>

                        </td>

                    </tr>

                @endforeach

            </x-datatable>

        </x-card>


        <x-card>

            <h2 class="mb-1 text-lg font-semibold">

                Latest Activities

            </h2>

            <p class="mb-6 text-sm text-[#6B7280]">

                Recent operational events.

            </p>

            <div class="space-y-3">

                @foreach([
                    ['Laptop Dell XPS','Requested by Rina S.','Borrowed'],
                    ['Projector Epson','Returned by Budi T.','Returned'],
                    ['Mobile Scanner','Due date passed','Overdue']
                ] as $activity)

                    <div class="flex items-center justify-between rounded-lg border border-[#E5E7EB] px-4 py-3 hover:bg-[#F9FAFB]">

                        <div>

                            <p class="font-medium">

                                {{ $activity[0] }}

                            </p>

                            <p class="text-sm text-[#6B7280]">

                                {{ $activity[1] }}

                            </p>

                        </div>

                        <x-badge>

                            {{ $activity[2] }}

                        </x-badge>

                    </div>

                @endforeach

            </div>

        </x-card>

    </section>

</div>

@endsection

@push('scripts')

<script>

function openDeleteModal(action){

    document
        .getElementById('deleteForm')
        .action = action;

    document
        .getElementById('deleteModal')
        .classList.remove('hidden');

    document
        .getElementById('deleteModal')
        .classList.add('flex');

}

function closeDeleteModal(){

    document
        .getElementById('deleteModal')
        .classList.add('hidden');

    document
        .getElementById('deleteModal')
        .classList.remove('flex');

}

</script>

@endpush