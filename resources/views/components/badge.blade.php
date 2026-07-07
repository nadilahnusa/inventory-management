@props([
'color'=>'gray'
])

@php

$colors=[

'success'=>'bg-[#ECFDF5] text-[#047857]',

'danger'=>'bg-[#FFF0EE] text-[#BA0013]',

'warning'=>'bg-[#FEF3C7] text-[#92400E]',

'info'=>'bg-[#EFF6FF] text-[#1D4ED8]',

'gray'=>'bg-[#F3F4F6] text-[#374151]'

];

@endphp

<span class="rounded-full px-3 py-1 text-xs font-semibold {{ $colors[$color] }}">
{{ $slot }}
</span>