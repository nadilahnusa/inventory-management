@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'rounded-lg border border-[#D1D5DB] bg-white px-3 py-2 text-sm text-[#111827] shadow-sm focus:border-[#E31E24] focus:outline-none focus:ring-2 focus:ring-[#FECACA]']) !!}>
