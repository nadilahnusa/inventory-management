@props([
'headers'=>[]
])

<div class="overflow-x-auto">

<table class="min-w-full divide-y divide-[#E5E7EB]">

<thead class="bg-[#FFF5F5]">

<tr>

@foreach($headers as $header)

<th
class="px-6 py-4 text-left text-sm font-semibold text-[#374151]">

{{ $header }}

</th>

@endforeach

</tr>

</thead>

<tbody class="divide-y divide-[#E5E7EB] bg-white">

{{ $slot }}

</tbody>

</table>

</div>