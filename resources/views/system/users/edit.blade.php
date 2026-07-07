@extends('layouts.app')

@section('content')

<div class="space-y-6">

    <x-page-header
        title="Edit User"
        subtitle="Update user information" />

    <form
        action="{{ route('users.update',$user) }}"
        method="POST">

        @csrf
        @method('PUT')

        @include('system.users.form')

    </form>

</div>

@endsection