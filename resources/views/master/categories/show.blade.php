@extends('layouts.app')

@section('content')

<div class="space-y-6">

    <x-page-header
        title="Category Detail"
        subtitle="Category information" />

    <x-card>

        <div class="grid gap-6">

            <div>

                <p class="mb-2 text-sm text-gray-500">
                    Category Name
                </p>

                <p class="font-medium">
                    {{ $category->name }}
                </p>

            </div>

            <div>

                <p class="mb-2 text-sm text-gray-500">
                    Description
                </p>

                <p>
                    {{ $category->description ?: '-' }}
                </p>

            </div>

        </div>

    </x-card>

    <div class="flex justify-end">

        <x-button
            href="{{ route('categories.index') }}"
            variant="secondary"
            icon="arrow_back">

            Back

        </x-button>

    </div>

</div>

@endsection