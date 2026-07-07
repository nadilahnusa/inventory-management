@extends('layouts.app')

@section('content')

<div class="space-y-6">

    <x-page-header
        title="Create User"
        subtitle="Add new user" />

    <form
        action="{{ route('users.store') }}"
        method="POST">

        @include('system.users.form')

    </form>

</div>

@endsection