@extends('layouts.app')

@section('content')

<div class="space-y-6">

    <x-page-header
        title="User Detail"
        subtitle="View user information" />

    <x-card>

        @php
            $role = $user->roles->first()?->name;
        @endphp

        <div class="grid gap-6">

            {{-- Name --}}
            <div>

                <p class="mb-2 text-sm text-gray-500">
                    Full Name
                </p>

                <p class="font-medium">
                    {{ $user->name }}
                </p>

            </div>

            {{-- Email --}}
            <div>

                <p class="mb-2 text-sm text-gray-500">
                    Email
                </p>

                <p>
                    {{ $user->email }}
                </p>

            </div>

            {{-- Role --}}
            <div>

                <p class="mb-2 text-sm text-gray-500">
                    Role
                </p>

                <p>
                    {{ $role ?? '-' }}
                </p>

            </div>

            {{-- Created At --}}
            <div>

                <p class="mb-2 text-sm text-gray-500">
                    Created At
                </p>

                <p>
                    {{ $user->created_at->format('d M Y, H:i') }}
                </p>

            </div>

        </div>

    </x-card>

    <div class="flex justify-end">

        <x-button
            href="{{ route('users.index') }}"
            variant="secondary"
            icon="arrow_back">

            Back

        </x-button>

    </div>

</div>

@endsection