@extends('layouts.app')

@section('content')
    <div class="space-y-6">
        <x-page-header title="Categories" subtitle="Manage all categories">
            <x-slot:actions>
                <x-button href="{{ route('categories.create') }}" icon="add">
                    Add Category
                </x-button>
            </x-slot:actions>
        </x-page-header>

        <div class="space-y-6">
                    <x-search-filter
                        :action="route('categories.index')"
                        placeholder="Search department..." />

            <x-card class="!p-0">
                <x-datatable :headers="['No', 'Category Name', 'Description', 'Created At', 'Action']">
                    @forelse ($categories as $category)
                        <tr class="hover:bg-surface-container-low">
                            <td class="px-6 py-4">
                                {{ $loop->iteration + $categories->firstItem() - 1 }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $category->name }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $category->description ?? '-' }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $category->created_at->format('d M Y, H:i') }}
                            </td>
                            <td class="px-6 py-4">
                                <div class="flex justify-center">
                                    <x-table-action :show="route('categories.show', $category)" :edit="route('categories.edit', $category)" :delete="route('categories.destroy', $category)" />
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="py-10 text-center">
                                No categories found.
                            </td>
                        </tr>
                    @endforelse
                </x-datatable>
            </x-card>

            @if ($categories->hasPages())
                <x-pagination :data="$categories" />
            @endif
        </div>
    </div>

    @push('modals')
        <x-delete-modal title="Delete Category"
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
