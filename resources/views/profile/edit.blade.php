@extends('layouts.app')

@section('page_title', 'Profile')
@section('page_subtitle', 'Account Settings')

@section('content')
    <div class="space-y-10">
        <section>
            <p class="text-xs font-semibold uppercase leading-4 tracking-[0.05em] text-[#E31E24]">Account Settings</p>
            <h1 class="mt-2 text-2xl font-semibold leading-8 tracking-[-0.01em] text-[#111827]">Profile</h1>
            <p class="mt-2 text-sm leading-5 text-[#6B7280]">Manage account information, password, and account access.</p>
        </section>

        <div class="grid gap-6 lg:grid-cols-[minmax(0,0.85fr)_minmax(320px,0.45fr)]">
            <div class="space-y-6">
                <div class="rounded-xl border border-[#E5E7EB] bg-white p-6 transition-shadow hover:shadow-[0_4px_6px_-1px_rgb(0_0_0_/_0.05),0_2px_4px_-2px_rgb(0_0_0_/_0.05)]">
                    @include('profile.partials.update-profile-information-form')
                </div>

                <div class="rounded-xl border border-[#E5E7EB] bg-white p-6 transition-shadow hover:shadow-[0_4px_6px_-1px_rgb(0_0_0_/_0.05),0_2px_4px_-2px_rgb(0_0_0_/_0.05)]">
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            <div class="rounded-xl border border-[#E5E7EB] bg-white p-6 transition-shadow hover:shadow-[0_4px_6px_-1px_rgb(0_0_0_/_0.05),0_2px_4px_-2px_rgb(0_0_0_/_0.05)]">
                @include('profile.partials.delete-user-form')
            </div>
        </div>
    </div>
@endsection
