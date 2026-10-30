@extends('layouts.app')

@section('title', $title)

@section('content')
    <div class="mx-auto max-w-7xl px-6 py-10">
        <div class="mb-8">
            <p class="mb-2 text-sm font-semibold uppercase tracking-wider text-teal-600">Clinic operations</p>
            <h1 class="text-3xl font-bold tracking-tight text-slate-900">{{ $title }}</h1>
            <p class="mt-2 text-slate-500">All resident vaccination appointments ordered by date.</p>
        </div>

        <x-panel title="Complete schedule">
            <div class="overflow-x-auto">
                <table class="w-full min-w-[700px] text-left text-sm">
                    <thead class="bg-slate-50 text-xs uppercase tracking-wider text-slate-500">
                        <tr>
                            <th class="px-6 py-4 font-semibold">#</th>
                            <th class="px-6 py-4 font-semibold">Resident</th>
                            <th class="px-6 py-4 font-semibold">Vaccine</th>
                            <th class="px-6 py-4 font-semibold">Date</th>
                            <th class="px-6 py-4 font-semibold">Status</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100">
                        @forelse ($schedules as $schedule)
                            <tr class="{{ $loop->odd ? 'bg-slate-50' : 'bg-white' }}">
                                <td class="px-6 py-4 text-slate-500">{{ $loop->iteration }}</td>
                                <td class="px-6 py-4 font-semibold text-slate-900">{{ $schedule->patient_name }}</td>
                                <td class="px-6 py-4">{{ $schedule->vaccine }} ({{ $schedule->dose }})</td>
                                <td class="px-6 py-4">{{ $schedule->scheduled_at->format('M j, Y') }}</td>
                                <td class="px-6 py-4">{{ $schedule->status }}</td>
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
