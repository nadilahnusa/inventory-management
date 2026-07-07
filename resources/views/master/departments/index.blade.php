@extends('layouts.app')

@section('content')
    <div class="space-y-6">
        <x-page-header title="Departments" subtitle="Manage all departments">
            <x-slot:actions>
                <x-button href="{{ route('departments.create') }}" icon="add">
                    Add Department
                </x-button>
            </x-slot:actions>
        </x-page-header>

        <div class="space-y-6">
                    <x-search-filter
                        :action="route('departments.index')"
                        placeholder="Search department..." />

            <x-card class="!p-0">
                <x-datatable :headers="['No', 'Department Name', 'Description', 'Created At', 'Action']">
                    @forelse ($departments as $department)
                        <tr class="hover:bg-surface-container-low">
                            <td class="px-6 py-4">
                                {{ $loop->iteration + $departments->firstItem() - 1 }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $department->name }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $department->description ?? '-' }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $department->created_at->format('d M Y, H:i') }}
                            </td>
                            <td class="px-6 py-4">
                                <div class="flex justify-center">
                                    <x-table-action :show="route('departments.show', $department)" :edit="route('departments.edit', $department)" :delete="route('departments.destroy', $department)" />
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="py-10 text-center">
                                No departments found.
                            </td>
                        </tr>
                    @endforelse
                </x-datatable>
            </x-card>

            @if ($departments->hasPages())
                <x-pagination :data="$departments" />
            @endif
        </div>
    </div>

    @push('modals')
        <x-delete-modal title="Delete Department"
            subtitle="Are you sure you want to delete this department? This action cannot be undone." />
    @endpush

    @push('scripts')
        <script>
            function openDeleteModal(action) {
                const deleteModal = document.getElementById('deleteModal');
                const deleteForm = document.getElementById('deleteForm');
                deleteForm.action = action;
                deleteModal.classList.remove('hidden');
                deleteModal.classList.add('flex');
            }

            function closeDeleteModal() {
                const deleteModal = document.getElementById('deleteModal');
                deleteModal.classList.add('hidden');
                deleteModal.classList.remove('flex');
            }
        </script>
    @endpush
@endsection
