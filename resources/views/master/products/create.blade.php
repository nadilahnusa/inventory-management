@extends('layouts.app')

@section('content')

<div class="space-y-6">

    <x-page-header
        title="Create Product"
        subtitle="Add new product" />

    <form
        action="{{ route('products.store') }}"
        method="POST"
        enctype="multipart/form-data">

        @csrf

        @include('master.products.form')

    </form>

</div>

@endsection