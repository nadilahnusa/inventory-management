@extends('layouts.app')

@section('content')

<div class="space-y-6">

    <x-page-header
        title="Borrowings"
        subtitle="Manage borrowing transactions">

        <x-slot:actions>

            <x-button
                href="{{ route('borrowings.create') }}"
                icon="add">

                New Borrowing

            </x-button>

        </x-slot:actions>

    </x-page-header>

    <div class="space-y-6">

        <x-search-filter
            :action="route('borrowings.index')"
            placeholder="Search borrowing..." />

        <x-card class="!p-0">

            <x-datatable
                :headers="[
                    'No',
                    'Code',
                    'Borrower',
                    'Department',
                    'Items',
                    'Borrow Date',
                    'Status',
                    'Action'
                ]">

                @forelse ($borrowings as $borrowing)

                    <tr class="hover:bg-surface-container-low">

                        <td class="px-6 py-4">

                            {{ $loop->iteration + $borrowings->firstItem() - 1 }}

                        </td>

                        {{-- Borrowing Code --}}
                        <td class="px-6 py-4">

                            <span class="font-semibold text-[#E31E24]">

                                {{ $borrowing->borrowing_code }}

                            </span>

                        </td>

                        {{-- Borrower --}}
                        <td class="px-6 py-4">

                            {{ $borrowing->borrower_name }}

                        </td>

                        {{-- Department --}}
                        <td class="px-6 py-4">

                            {{ $borrowing->department->name }}

                        </td>

                        {{-- Items --}}
                        <td class="px-6 py-4 text-center">

                            <span class="rounded-full bg-blue-100 px-3 py-1 text-sm font-medium text-blue-700">

                                {{ $borrowing->details_count }} Item{{ $borrowing->details_count > 1 ? 's' : '' }}

                            </span>

                        </td>

                        {{-- Borrow Date --}}
                        <td class="px-6 py-4">

                            {{ $borrowing->borrow_date->format('d M Y') }}

                        </td>

                        {{-- Status --}}
                        <td>
                            @if($borrowing->status == 'Borrowed')

                            <span class="rounded-full bg-yellow-100 px-3 py-1 text-yellow-700">

                            Borrowed

                            </span>

                            @elseif($borrowing->status == 'Returned')

                            <span class="rounded-full bg-green-100 px-3 py-1 text-green-700">

                            Returned

                            </span>

                            @else

                            <span class="rounded-full bg-red-100 px-3 py-1 text-red-700">

                            Overdue

                            </span>

                            @endif

                        </td>

                        {{-- Action --}}
                        <td class="px-6 py-4">

                            <div class="flex justify-center gap-2">

                                {{-- Detail --}}
                                <a
                                    href="{{ route('borrowings.show', $borrowing) }}"
                                    class="rounded-lg p-2 text-blue-600 hover:bg-blue-100">

                                    <span class="material-symbols-outlined">
                                        visibility
                                    </span>

                                </a>


                                {{-- Confirm Return --}}
                                @if($borrowing->status == 'Borrowed')

                                    <button
                                        type="button"
                                        onclick="openReturnModal('{{ route('borrowings.return',$borrowing) }}')"
                                        class="rounded-lg p-2 text-green-600 hover:bg-green-100">

                                        <span class="material-symbols-outlined">
                                            assignment_return
                                        </span>

                                    </button>

                                @endif

                            </div>

                        </td>

                    </tr>

                @empty

                    <tr>

                        <td colspan="8">

                            <div class="flex flex-col items-center justify-center py-14">

                                <span class="material-symbols-outlined text-6xl text-gray-300">

                                    inventory

                                </span>

                                <h3 class="mt-4 text-lg font-semibold">

                                    No Borrowing Found

                                </h3>

                                <p class="mt-2 text-sm text-gray-500">

                                    Create your first borrowing transaction.

                                </p>

                                <x-button
                                    class="mt-5"
                                    href="{{ route('borrowings.create') }}"
                                    icon="add">

                                    New Borrowing

                                </x-button>

                            </div>

                        </td>

                    </tr>

                @endforelse

            </x-datatable>

        </x-card>

        @if ($borrowings->hasPages())

            <x-pagination
                :data="$borrowings" />

        @endif

    </div>

</div>



@push('modals')

<x-return-modal
    title="Confirm Return"
    subtitle="Are you sure you want to confirm this borrowing has been returned? This action will restore the product stock." />

@endpush


@push('scripts')

<script>

function openReturnModal(action)
{
    document
        .getElementById('returnForm')
        .action = action;

    document
        .getElementById('returnModal')
        .classList.remove('hidden');

    document
        .getElementById('returnModal')
        .classList.add('flex');
}

function closeReturnModal()
{
    document
        .getElementById('returnModal')
        .classList.add('hidden');

    document
        .getElementById('returnModal')
        .classList.remove('flex');
}

</script>

@endpush

@endsection