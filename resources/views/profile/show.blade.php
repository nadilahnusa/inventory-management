@extends('layouts.app')

@section('content')

<div class="space-y-6">

    <x-page-header
        title="My Profile"
        subtitle="View your account information." />

    <div class="grid gap-6 xl:grid-cols-[320px_1fr]">

        {{-- Profile Card --}}
        <x-card>

            <div class="flex flex-col items-center">

                <div
                    class="flex h-28 w-28 items-center justify-center rounded-full bg-red-100 text-4xl font-bold text-red-600">

                    {{ strtoupper(substr($user->name,0,2)) }}

                </div>

                <h2 class="mt-6 text-xl font-semibold">

                    {{ $user->name }}

                </h2>

                <p class="text-gray-500">

                    {{ $user->getRoleNames()->first() }}

                </p>

                <span
                    class="mt-5 inline-flex items-center gap-2 rounded-full bg-green-100 px-4 py-2 text-sm font-medium text-green-700">

                    <span class="h-2.5 w-2.5 rounded-full bg-green-500"></span>

                    Active

                </span>

            </div>

        </x-card>

        {{-- Account Information --}}
        <x-card>

            <div class="mb-6">

                <h2 class="text-lg font-semibold">

                    Account Information

                </h2>

                <p class="mt-1 text-sm text-gray-500">

                    Your registered account details.

                </p>

            </div>

            <div class="grid gap-5 md:grid-cols-2">

                <div>

                    <p class="text-sm text-gray-500">

                        Full Name

                    </p>

                    <p class="mt-1 font-medium">

                        {{ $user->name }}

                    </p>

                </div>

                <div>

                    <p class="text-sm text-gray-500">

                        Email Address

                    </p>

                    <p class="mt-1 font-medium">

                        {{ $user->email }}

                    </p>

                </div>

                <div>

                    <p class="text-sm text-gray-500">

                        Role

                    </p>

                    <p class="mt-1 font-medium">

                        {{ $user->getRoleNames()->first() }}

                    </p>

                </div>

                <div>

                    <p class="text-sm text-gray-500">

                        Member Since

                    </p>

                    <p class="mt-1 font-medium">

                        {{ $user->created_at->format('d F Y') }}

                    </p>

                </div>

            </div>

        </x-card>

    </div>

    {{-- Security --}}
    <x-card>

        <div class="flex gap-4">

            <div
                class="flex h-12 w-12 items-center justify-center rounded-full bg-red-100">

                <span class="material-symbols-outlined text-red-600">

                    lock

                </span>

            </div>

            <div>

                <h3 class="font-semibold">

                    Account Security

                </h3>

                <p class="mt-2 text-sm text-gray-500">

                    This account is managed by the system administrator.
                    Profile information cannot be modified from this page.

                </p>

            </div>

        </div>

    </x-card>

</div>

@endsection