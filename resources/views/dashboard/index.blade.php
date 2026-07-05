@extends('layouts.app')

@section('page_title', 'Dashboard')
@section('page_subtitle', 'Inventory Overview')

@section('content')
    <div class="space-y-10">
        <section class="flex flex-col gap-4 sm:flex-row sm:items-end sm:justify-between">
            <div>
                <p class="text-xs font-semibold uppercase leading-4 tracking-[0.05em] text-[#E31E24]">Inventory Overview</p>
                <h1 class="mt-2 text-2xl font-semibold leading-8 tracking-[-0.01em] text-[#111827]">Dashboard</h1>
                <p class="mt-2 text-sm leading-5 text-[#6B7280]">Track stock, activity, and borrowing status at a glance.</p>
            </div>
            <div class="rounded-lg border border-[#E5E7EB] bg-white px-4 py-3 text-sm leading-5 text-[#6B7280]">
                Last updated: Today, 08:45 AM
            </div>
        </section>

        <section class="grid gap-6 md:grid-cols-2 xl:grid-cols-4" aria-label="Inventory metrics">
            @php
                $cards = [
                    ['title' => 'Total Products', 'value' => '248', 'description' => 'Registered assets', 'icon' => 'M4 7h16M4 12h16M4 17h10'],
                    ['title' => 'Available Products', 'value' => '186', 'description' => 'Ready to borrow', 'icon' => 'M5 13l4 4L19 7'],
                    ['title' => 'Borrowed Products', 'value' => '42', 'description' => 'Currently checked out', 'icon' => 'M9 17v-2m3 2v-4m3 4V7m-6 10H5a2 2 0 0 1-2-2V7a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2h-4'],
                    ['title' => 'Total Borrowings', 'value' => '64', 'description' => 'This month', 'icon' => 'M7 7h10M7 12h10M7 17h6'],
                ];
            @endphp

            @foreach ($cards as $card)
                <article class="rounded-xl border border-[#E5E7EB] bg-white p-6 transition-shadow hover:shadow-[0_4px_6px_-1px_rgb(0_0_0_/_0.05),0_2px_4px_-2px_rgb(0_0_0_/_0.05)]">
                    <div class="flex items-start justify-between gap-4">
                        <div>
                            <p class="text-sm font-medium leading-5 text-[#6B7280]">{{ $card['title'] }}</p>
                            <p class="mt-2 text-3xl font-semibold leading-9 tracking-[-0.01em] text-[#111827]">{{ $card['value'] }}</p>
                        </div>
                        <div class="flex h-10 w-10 items-center justify-center rounded-lg bg-[#FFF0EE] text-[#BA0013]">
                            <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="{{ $card['icon'] }}" />
                            </svg>
                        </div>
                    </div>
                    <p class="mt-4 text-sm leading-5 text-[#6B7280]">{{ $card['description'] }}</p>
                </article>
            @endforeach
        </section>

        <section class="grid gap-6 xl:grid-cols-[1.4fr_0.9fr]">
            <article class="rounded-xl border border-[#E5E7EB] bg-white p-6">
                <div class="mb-6 flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
                    <div>
                        <h2 class="text-lg font-semibold leading-6 tracking-[-0.01em] text-[#111827]">Statistics Chart</h2>
                        <p class="mt-1 text-sm leading-5 text-[#6B7280]">Borrowing trend overview for this period.</p>
                    </div>
                    <span class="w-fit rounded-full bg-[#F3F4F6] px-3 py-1 text-xs font-semibold leading-4 text-[#374151]">Preview</span>
                </div>
                <div class="flex h-64 items-end gap-3 rounded-lg border border-dashed border-[#E5E7EB] bg-[#F9FAFB] p-4" aria-label="Borrowing statistics preview">
                    @foreach (['h-[45%]', 'h-[64%]', 'h-[52%]', 'h-[78%]', 'h-[69%]', 'h-[84%]', 'h-[72%]'] as $height)
                        <div class="flex flex-1 items-end">
                            <div class="w-full rounded-t-md bg-[#E31E24]/80 {{ $height }}"></div>
                        </div>
                    @endforeach
                </div>
            </article>

            <article class="rounded-xl border border-[#E5E7EB] bg-white p-6">
                <div class="mb-6">
                    <h2 class="text-lg font-semibold leading-6 tracking-[-0.01em] text-[#111827]">Inventory Summary</h2>
                    <p class="mt-1 text-sm leading-5 text-[#6B7280]">Current asset distribution.</p>
                </div>
                <div class="space-y-3">
                    @foreach ([['Available', '186', 'bg-[#ECFDF5] text-[#047857]'], ['Borrowed', '42', 'bg-[#FFF0EE] text-[#BA0013]'], ['Maintenance', '20', 'bg-[#EFF6FF] text-[#1D4ED8]']] as $item)
                        <div class="flex min-h-12 items-center justify-between rounded-lg border border-[#E5E7EB] px-4 py-3">
                            <span class="text-sm font-medium leading-5 text-[#374151]">{{ $item[0] }}</span>
                            <span class="rounded-full px-3 py-1 text-xs font-semibold leading-4 {{ $item[2] }}">{{ $item[1] }}</span>
                        </div>
                    @endforeach
                </div>
            </article>
        </section>

        <section class="grid gap-6 xl:grid-cols-2">
            <article class="rounded-xl border border-[#E5E7EB] bg-white p-6">
                <div class="mb-6">
                    <h2 class="text-lg font-semibold leading-6 tracking-[-0.01em] text-[#111827]">Recent Borrowings</h2>
                    <p class="mt-1 text-sm leading-5 text-[#6B7280]">Latest transaction updates.</p>
                </div>
                <div class="overflow-x-auto rounded-lg border border-[#E5E7EB]">
                    <table class="min-w-full divide-y divide-[#E5E7EB] text-sm">
                        <thead class="sticky top-0 bg-[#F9FAFB] text-[#374151]">
                            <tr>
                                <th class="px-4 py-3 text-left font-semibold">Borrower</th>
                                <th class="px-4 py-3 text-left font-semibold">Item</th>
                                <th class="px-4 py-3 text-left font-semibold">Date</th>
                                <th class="px-4 py-3 text-left font-semibold">Status</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-[#E5E7EB] bg-white text-[#374151]">
                            @foreach ([['Rina S.', 'Laptop Dell XPS', '04 Jul 2026', 'Borrowed', 'bg-[#FFF0EE] text-[#BA0013]'], ['Budi T.', 'Projector Epson', '03 Jul 2026', 'Returned', 'bg-[#ECFDF5] text-[#047857]'], ['Sari M.', 'Mobile Scanner', '02 Jul 2026', 'Overdue', 'bg-[#FEF3C7] text-[#92400E]']] as $row)
                                <tr class="h-12 hover:bg-[#F9FAFB]">
                                    <td class="px-4 py-3">{{ $row[0] }}</td>
                                    <td class="px-4 py-3">{{ $row[1] }}</td>
                                    <td class="px-4 py-3">{{ $row[2] }}</td>
                                    <td class="px-4 py-3"><span class="rounded-full px-2.5 py-1 text-xs font-semibold leading-4 {{ $row[4] }}">{{ $row[3] }}</span></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </article>

            <article class="rounded-xl border border-[#E5E7EB] bg-white p-6">
                <div class="mb-6">
                    <h2 class="text-lg font-semibold leading-6 tracking-[-0.01em] text-[#111827]">Latest Activities</h2>
                    <p class="mt-1 text-sm leading-5 text-[#6B7280]">Recent operational events.</p>
                </div>
                <div class="space-y-3">
                    @foreach ([['Laptop Dell XPS', 'Requested by Rina S.', 'Borrowed'], ['Projector Epson', 'Returned by Budi T.', 'Returned'], ['Mobile Scanner', 'Due date passed', 'Overdue']] as $activity)
                        <div class="flex min-h-12 items-center justify-between gap-4 rounded-lg border border-[#E5E7EB] px-4 py-3 hover:bg-[#F9FAFB]">
                            <div>
                                <p class="text-sm font-medium leading-5 text-[#111827]">{{ $activity[0] }}</p>
                                <p class="text-sm leading-5 text-[#6B7280]">{{ $activity[1] }}</p>
                            </div>
                            <span class="rounded-full bg-[#F3F4F6] px-3 py-1 text-xs font-semibold leading-4 text-[#374151]">{{ $activity[2] }}</span>
                        </div>
                    @endforeach
                </div>
            </article>
        </section>
    </div>
@endsection
