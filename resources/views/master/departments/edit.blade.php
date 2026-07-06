@extends('layouts.dashboard')

@section('content')

<div class="space-y-6">

    <x-page-header
        title="Edit Department"
        subtitle="Update department information">

    </x-page-header>

    <x-card>

        <form
            action="{{ route('departments.update',$department) }}"
            method="POST">

            @method('PUT')

            @include('master.departments.partials.form')

        </form>

    </x-card>

</div>

@endsection