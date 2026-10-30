@extends('layouts.app')

@section('title', 'Sign in')

@section('content')
    <div class="mx-auto flex min-h-[70vh] max-w-md items-center px-6 py-10">
        <div class="w-full rounded-2xl bg-white p-8 shadow-sm ring-1 ring-slate-200">
            <p class="text-sm font-semibold uppercase tracking-wider text-teal-600">Health center access</p>
            <h1 class="mt-2 text-2xl font-bold text-slate-900">Sign in to Bakuna Tracker</h1>
            <p class="mt-2 text-sm text-slate-500">Use your seeded health worker account to continue.</p>

            <form method="POST" action="{{ url('/login') }}" class="mt-8 space-y-5">
                @csrf

                <div>
                    <label for="email" class="block text-sm font-medium text-slate-700">Email</label>
                    <input id="email" name="email" type="email" value="{{ old('email') }}" required autofocus
                        class="mt-1 block w-full rounded-lg border-slate-300 px-3 py-2 shadow-sm focus:border-teal-500 focus:ring-teal-500">
                    @error('email')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="password" class="block text-sm font-medium text-slate-700">Password</label>
                    <input id="password" name="password" type="password" required
                        class="mt-1 block w-full rounded-lg border-slate-300 px-3 py-2 shadow-sm focus:border-teal-500 focus:ring-teal-500">
                    @error('password')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <button type="submit"
                    class="w-full rounded-lg bg-teal-700 px-4 py-2.5 font-semibold text-white transition hover:bg-teal-800">
                    Sign in
                </button>
            </form>
        </div>
    </div>
@endsection
