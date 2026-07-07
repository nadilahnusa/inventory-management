@extends('layouts.app')

@section('content')

<div class="space-y-6">

    <x-page-header
        title="Department Detail"
        subtitle="Department information" />

    <x-card>

        <div class="grid gap-6">

            <div>

                <p class="mb-2 text-sm text-gray-500">
                    Department Name
                </p>

                <p class="font-medium">
                    {{ $department->name }}
                </p>

            </div>

            <div>

                <p class="mb-2 text-sm text-gray-500">
                    Description
                </p>

                <p>
                    {{ $department->description ?: '-' }}
                </p>

            </div>

        </div>

    </x-card>

    <div class="flex justify-end">

        <x-button
            href="{{ route('departments.index') }}"
            variant="secondary"
            icon="arrow_back">

            Back

        </x-button>

    </div>

</div>

@endsection