@extends('layouts.app')

@section('content')

<div class="space-y-6">

    <x-page-header
        title="Users"
        subtitle="Manage system users">

        <x-slot:actions>

            <x-button
                href="{{ route('users.create') }}"
                icon="person_add">

                Add User

            </x-button>

        </x-slot:actions>

    </x-page-header>

    <div class="space-y-6">

        <x-search-filter
            :action="route('users.index')"
            placeholder="Search users..." />

        <x-card class="!p-0">

            <x-datatable
                :headers="[
                    'No',
                    'Name',
                    'Email',
                    'Role',
                    'Created At',
                    'Action'
                ]">

                @forelse($users as $user)

                    @php
                        $role = $user->roles->first()?->name;

                        $badge = [
                            'Administrator' => 'bg-red-100 text-red-700',
                            'Warehouse Staff' => 'bg-green-100 text-green-700',
                            'Manager' => 'bg-blue-100 text-blue-700',
                        ];
                    @endphp

                    <tr class="hover:bg-surface-container-low">

                        <td class="px-6 py-4">
                            {{ $loop->iteration + $users->firstItem() - 1 }}
                        </td>

                        <td class="px-6 py-4 font-medium">
                            {{ $user->name }}
                        </td>

                        <td class="px-6 py-4">
                            {{ $user->email }}
                        </td>

                        <td class="px-6 py-4">

                            <span class="rounded-full px-3 py-1 text-xs font-semibold {{ $badge[$role] ?? 'bg-gray-100 text-gray-600' }}">

                                {{ $role ?? '-' }}

                            </span>

                        </td>

                        <td class="px-6 py-4">

                            {{ $user->created_at->format('d M Y, H:i') }}

                        </td>

                        <td class="px-6 py-4">

                            <div class="flex justify-center">

                                <x-table-action
                                    :show="route('users.show', $user)"
                                    :edit="route('users.edit', $user)"
                                    :delete="auth()->id() !== $user->id ? route('users.destroy', $user) : null" />

                            </div>

                        </td>

                    </tr>

                @empty

                    <tr>

                        <td colspan="6">

                            <div class="flex flex-col items-center justify-center py-12">

                                <span class="material-symbols-outlined text-6xl text-gray-300">

                                    group

                                </span>

                                <h3 class="mt-4 text-lg font-semibold">

                                    No Users Available

                                </h3>

                                <p class="mt-2 text-sm text-gray-500">

                                    There are no registered users yet.
                                    Create a new user to get started.

                                </p>

                                <x-button
                                    class="mt-5"
                                    href="{{ route('users.create') }}"
                                    icon="person_add">

                                    Add User

                                </x-button>

                            </div>

                        </td>

                    </tr>

                @endforelse

            </x-datatable>

        </x-card>

        @if($users->hasPages())

            <x-pagination :data="$users"/>

        @endif

    </div>

</div>

@push('modals')

    <x-delete-modal
        title="Delete User"
        subtitle="Are you sure you want to delete this user? This action cannot be undone." />

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