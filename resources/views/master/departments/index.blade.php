@extends('layouts.dashboard')

@section('content')

<div class="space-y-6">

    <x-page-header
        title="Departments"
        subtitle="Manage all departments">

        <x-slot:actions>

            <a
                href="{{ route('departments.create') }}"
                class="rounded-lg bg-primary px-5 py-3 text-on-primary">

                + Add Department

            </a>

        </x-slot:actions>

    </x-page-header>

    <x-card>

        <x-search-filter/>

    </x-card>

    <x-card>

        <x-datatable
            :headers="[
                'Department',
                'Description',
                'Created',
                'Action'
            ]">

            @forelse($departments as $department)

                <tr class="hover:bg-surface-container-low">

                    <td class="px-6 py-4">

                        {{ $department->name }}

                    </td>

                    <td class="px-6 py-4">

                        {{ $department->description ?? '-' }}

                    </td>

                    <td class="px-6 py-4">

                        {{ $department->created_at->format('d M Y') }}

                    </td>

                    <td class="px-6 py-4 text-center">

                        <x-table-action
                            :edit="route('departments.edit',$department)"
                            :delete="route('departments.destroy',$department)"
                        />

                    </td>

                </tr>

            @empty

                <tr>

                    <td
                        colspan="4"
                        class="py-10 text-center">

                        No departments found.

                    </td>

                </tr>

            @endforelse

        </x-datatable>

    </x-card>

    {{ $departments->links() }}

</div>

@endsection

<x-delete-modal/>

<script>

function openDeleteModal(action)
{
    document
        .getElementById('deleteForm')
        .action = action;

    document
        .getElementById('deleteModal')
        .classList
        .remove('hidden');

    document
        .getElementById('deleteModal')
        .classList
        .add('flex');
}

function closeDeleteModal()
{
    document
        .getElementById('deleteModal')
        .classList
        .remove('flex');

    document
        .getElementById('deleteModal')
        .classList
        .add('hidden');
}

</script>