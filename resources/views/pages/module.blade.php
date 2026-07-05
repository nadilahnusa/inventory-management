@extends('layouts.app')

@section('page_title', $title)
@section('page_subtitle', $action)

@section('content')
    <div class="rounded-xl border border-[#E5E7EB] bg-white p-8 shadow-sm">
        <div class="flex items-center justify-between gap-4">
            <div>
                <h1 class="text-2xl font-semibold text-[#111827]">{{ $title }}</h1>
                <p class="mt-2 text-sm text-[#6B7280]">{{ ucfirst($module) }} access is currently routed through role-based authorization.</p>
            </div>
            <span class="rounded-full bg-[#F3F4F6] px-3 py-1 text-xs font-semibold uppercase tracking-[0.08em] text-[#374151]">
                {{ $action }}
            </span>
        </div>
    </div>
@endsection
