@extends('layouts.app')

@section('content')

<div class="space-y-6">

    <x-page-header
        title="Create Department"
        subtitle="Add new department" />

    <form
        action="{{ route('departments.store') }}"
        method="POST">

        @include('master.departments.form')

    </form>

</div>

@endsection