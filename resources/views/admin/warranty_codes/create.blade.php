@extends('admin.layout')

@section('title', 'Upload code')

@section('content')
    <div class="space-y-6">
        <div>
            <h2 class="text-3xl font-black tracking-tight text-white">Upload new codes</h2>
            <p class="mt-2 text-sm text-gray-300">Enter a 5-digit code range and upload available warranty codes in bulk.</p>
        </div>

        <form action="{{ route('admin.code_generation.store') }}" method="POST" class="space-y-6">
            @csrf

            <div class="grid gap-4 md:grid-cols-2">
                <label class="block">
                    <span class="text-sm text-gray-300">From</span>
                    <input name="from_code" value="{{ old('from_code') }}" required maxlength="5" minlength="5" pattern="\d{5}"
                        class="mt-2 w-full rounded-lg border border-white/15 bg-black/80 px-4 py-3 text-white placeholder:text-white/40 focus:border-yellow-300 focus:outline-none focus:ring-2 focus:ring-yellow-300"
                        placeholder="10001" />
                </label>
                <label class="block">
                    <span class="text-sm text-gray-300">To</span>
                    <input name="to_code" value="{{ old('to_code') }}" required maxlength="5" minlength="5" pattern="\d{5}"
                        class="mt-2 w-full rounded-lg border border-white/15 bg-black/80 px-4 py-3 text-white placeholder:text-white/40 focus:border-yellow-300 focus:outline-none focus:ring-2 focus:ring-yellow-300"
                        placeholder="10010" />
                </label>
            </div>

            <div class="flex items-center justify-between gap-4">
                <a href="{{ route('admin.code_generation.index') }}" class="inline-flex items-center justify-center rounded-full border border-white/20 bg-white/5 px-5 py-3 text-sm font-semibold text-white hover:bg-white/10 transition">Back</a>
                <button type="submit" class="inline-flex items-center justify-center rounded-full bg-yellow-400 px-5 py-3 text-sm font-semibold text-black hover:bg-yellow-300 transition">Upload code</button>
            </div>
        </form>
    </div>
@endsection
