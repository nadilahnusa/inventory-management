@extends('layouts.app')

@section('content')

<div class="space-y-6">

    <x-page-header
        title="Create Borrowing"
        subtitle="Add new borrowing" />

    <form
        action="{{ route('borrowings.store') }}"
        method="POST"
        enctype="multipart/form-data">

        @csrf

        @include('transaction.borrowings.form')

    </form>

</div>

@endsection