@extends('layouts.app')

@section('content')

<div class="space-y-6">

    <x-page-header
        title="Edit Category"
        subtitle="Update category information" />

    <form
        action="{{ route('categories.update',$category) }}"
        method="POST">

        @csrf
        @method('PUT')

        @include('master.categories.form')

    </form>

</div>

@endsection