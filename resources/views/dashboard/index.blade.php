@extends('layouts.app')

@section('title', $title)

@section('content')
    <div class="mx-auto max-w-7xl px-6 py-10">
        <div class="mb-10 flex flex-col justify-between gap-5 md:flex-row md:items-end">
            <div>
                <p class="mb-2 text-sm font-semibold uppercase tracking-wider text-teal-600">Week 2 dashboard</p>
                <h1 class="text-3xl font-bold tracking-tight text-slate-900">{{ $title }}</h1>
                <p class="mt-2 text-slate-500">Vaccination schedule for Barangay Matina Crossing Health Center.</p>
            </div>
            <div class="rounded-xl bg-teal-700 px-5 py-3 text-white shadow-sm">
                <p class="text-xs uppercase tracking-wide text-teal-100">Today</p>
                <p class="font-semibold">{{ now()->format('F j, Y') }}</p>
            </div>
        </div>

        <section class="grid gap-4 sm:grid-cols-2 md:grid-cols-4" aria-label="Vaccination summary">
            @foreach ($stats as $stat)
                <x-stat-card :title="$stat['label']" :value="$stat['value']" />
            @endforeach
        </section>

        @if ($alerts->isNotEmpty())
            <section class="mt-8 rounded-2xl border border-amber-200 bg-amber-50 p-5" aria-labelledby="alerts-heading">
                <h2 id="alerts-heading" class="font-bold text-amber-900">Follow-up alerts</h2>
                <p class="mt-1 text-sm text-amber-800">
                    {{ $alerts->count() }} vaccination appointment{{ $alerts->count() === 1 ? '' : 's' }} need attention.
                </p>
            </section>
        @elseif ($schedules->isEmpty())
            <section class="mt-8 rounded-2xl border border-sky-200 bg-sky-50 p-5" aria-labelledby="special-case-heading">
                <h2 id="special-case-heading" class="font-bold text-sky-900">Special case</h2>
                <p class="mt-1 text-sm text-sky-800">No vaccines are scheduled yet. Add a schedule before the next clinic day.</p>
            </section>
        @else
            <section class="mt-8 rounded-2xl border border-emerald-200 bg-emerald-50 p-5" aria-labelledby="clear-heading">
                <h2 id="clear-heading" class="font-bold text-emerald-900">All clear</h2>
                <p class="mt-1 text-sm text-emerald-800">There are no overdue vaccination appointments.</p>
            </section>
        @endif

        <x-panel title="Upcoming vaccination schedule" class="mt-8">
            <div class="overflow-x-auto">
                <table class="w-full min-w-[850px] text-left text-sm">
                    <thead class="bg-slate-50 text-xs uppercase tracking-wider text-slate-500">
                        <tr>
                            <th class="px-6 py-4 font-semibold">Resident</th>
                            <th class="px-6 py-4 font-semibold">Purok</th>
                            <th class="px-6 py-4 font-semibold">Vaccine / Dose</th>
                            <th class="px-6 py-4 font-semibold">Scheduled</th>
                            <th class="px-6 py-4 font-semibold">Status</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100">
                        @forelse ($schedules as $schedule)
                            <tr class="{{ $loop->odd ? 'bg-slate-50' : 'bg-white' }} hover:bg-teal-50">
                                <td class="px-6 py-4 font-semibold text-slate-900">
                                    <span class="mr-2 text-xs text-slate-400">{{ $loop->iteration }}</span>
                                    {{ $schedule->patient_name }}
                                </td>
                                <td class="px-6 py-4">{{ $schedule->purok }}</td>
                                <td class="px-6 py-4">
                                    <div class="font-medium text-slate-900">{{ $schedule->vaccine }}</div>
                                    <div class="text-xs text-slate-500">{{ $schedule->dose }}</div>
                                </td>
                                <td class="px-6 py-4">{{ $schedule->scheduled_at->format('M j, Y') }}</td>
                                <td class="px-6 py-4">
                                    <span class="rounded-full px-3 py-1 text-xs font-semibold
                                        {{ $schedule->status === 'Done' ? 'bg-emerald-100 text-emerald-700' : ($schedule->status === 'Overdue' ? 'bg-amber-100 text-amber-800' : 'bg-sky-100 text-sky-700') }}">
                                        {{ $schedule->status }}
                                    </span>
                                    @unless ($schedule->status === 'Overdue')
                                        <span class="ml-1 text-xs text-slate-400">On track</span>
                                    @endunless
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="px-6 py-10 text-center text-slate-500">No schedules yet.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </x-panel>
    </div>
@endsection
