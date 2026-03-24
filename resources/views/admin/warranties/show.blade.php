@extends('admin.layout')

@section('title', 'Warranty details')

@section('content')
    <div class="space-y-6">
        <div class="flex flex-col gap-4 lg:flex-row lg:items-center lg:justify-between">
            <div>
                <h2 class="text-2xl font-bold">Warranty #{{ $warranty->unique_number }}</h2>
                <p class="text-sm text-gray-300">Details and history for this warranty request.</p>
            </div>

            <div class="flex flex-wrap gap-2">
                <a href="{{ route('admin.warranties.index') }}" class="inline-flex items-center justify-center rounded-full border border-white/20 bg-white/5 px-4 py-2 text-sm font-semibold text-white hover:bg-white/10">Back to list</a>
                <form method="POST" action="{{ route('admin.warranties.destroy', $warranty) }}" onsubmit="return confirm('Delete this warranty?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="inline-flex items-center justify-center rounded-full border border-red-500 bg-red-500/10 px-4 py-2 text-sm font-semibold text-red-200 hover:bg-red-500/20">Delete</button>
                </form>
            </div>
        </div>

        <div class="grid gap-6 lg:grid-cols-2">
            <div class="rounded-2xl border border-white/10 bg-black/50 p-6">
                <h3 class="text-lg font-semibold text-white">Customer</h3>
                <dl class="mt-4 space-y-3 text-sm text-gray-200">
                    <div>
                        <dt class="font-semibold text-gray-300">Name</dt>
                        <dd>{{ $warranty->name }}</dd>
                    </div>
                    <div>
                        <dt class="font-semibold text-gray-300">Email</dt>
                        <dd>{{ $warranty->email }}</dd>
                    </div>
                    <div>
                        <dt class="font-semibold text-gray-300">Phone</dt>
                        <dd>{{ $warranty->phone }}</dd>
                    </div>
                    <div>
                        <dt class="font-semibold text-gray-300">Car model</dt>
                        <dd>{{ $warranty->car_model }}</dd>
                    </div>
                </dl>
            </div>

            <div class="rounded-2xl border border-white/10 bg-black/50 p-6">
                <h3 class="text-lg font-semibold text-white">Warranty</h3>
                <dl class="mt-4 space-y-3 text-sm text-gray-200">
                    <div>
                        <dt class="font-semibold text-gray-300">Card number</dt>
                        <dd>{{ $warranty->unique_number }}</dd>
                    </div>
                    <div>
                        <dt class="font-semibold text-gray-300">Issued</dt>
                        <dd>{{ $warranty->warranty_date?->format('d/m/Y H:i') ?? $warranty->created_at->format('d/m/Y H:i') }}</dd>
                    </div>
                    <div>
                        <dt class="font-semibold text-gray-300">OTP verified</dt>
                        <dd>{{ $warranty->otp_verified_at ? $warranty->otp_verified_at->format('d/m/Y H:i') : 'Not verified' }}</dd>
                    </div>
                    <div>
                        <dt class="font-semibold text-gray-300">OTP Expires</dt>
                        <dd>{{ $warranty->otp_expires_at?->format('d/m/Y H:i') ?? '—' }}</dd>
                    </div>
                </dl>
            </div>
        </div>

        <div class="rounded-2xl border border-white/10 bg-black/50 p-6">
            <h3 class="text-lg font-semibold text-white">Job description</h3>
            <p class="mt-3 whitespace-pre-line text-sm text-gray-200">{{ $warranty->job_description }}</p>
        </div>
    </div>
@endsection
