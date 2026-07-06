@props([
    'headers' => [],
])

<div class="overflow-hidden rounded-xl border border-outline-variant bg-surface shadow-sm">

    <div class="overflow-x-auto">

        <table class="min-w-full">

            <thead class="bg-surface-container-low">

                <tr>

                    @foreach($headers as $header)

                        <th class="px-6 py-4 text-left text-sm font-semibold border-b border-outline-variant">

                            {{ $header }}

                        </th>

                    @endforeach

                </tr>

            </thead>

            <tbody class="divide-y divide-outline-variant">

                {{ $slot }}

            </tbody>

        </table>

    </div>

</div>