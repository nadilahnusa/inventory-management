@props(['value'])

<label {{ $attributes->merge(['class' => 'block text-sm font-medium text-[#374151]']) }}>
    {{ $value ?? $slot }}
</label>
