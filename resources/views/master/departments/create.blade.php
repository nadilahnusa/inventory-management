@extends('layouts.dashboard')

@section('content')

<div class="space-y-6">

    <x-page-header
        title="Create Department"
        subtitle="Add a new department">

    </x-page-header>

    <x-card>

        <form
            action="{{ route('departments.store') }}"
            method="POST">

            @include('master.departments.partials.form')

        </form>

    </x-card>

</div>

@endsection