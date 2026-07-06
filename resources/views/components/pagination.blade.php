@props([
    'data'
])

@if($data->hasPages())

<div class="mt-6">

    {{ $data->links() }}

</div>

@endif