@extends('layouts.app')

@section('content')

<div class="space-y-6">

    <x-page-header
        title="Edit Product"
        subtitle="Update product information" />

    <form
        action="{{ route('products.update', $product) }}"
        method="POST"
        enctype="multipart/form-data">
        
        @csrf
        @method('PUT')

        @include('master.products.form')

    </form>

</div>

@endsection