@extends('layouts.app')

@section('content')

<div class="space-y-6">

    <x-page-header
        title="Edit Department"
        subtitle="Update department information" />

    <form
        action="{{ route('departments.update',$department) }}"
        method="POST">

        @csrf
        @method('PUT')

        @include('master.departments.form')

    </form>

</div>

@endsection