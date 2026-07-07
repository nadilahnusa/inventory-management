@extends('layouts.app')

@section('content')

<div class="space-y-6">

    <x-page-header
        title="Create Category"
        subtitle="Add new category" />

    <form
        action="{{ route('categories.store') }}"
        method="POST">

        @include('master.categories.form')

    </form>

</div>

@endsection