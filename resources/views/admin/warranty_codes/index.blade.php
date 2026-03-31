@extends('admin.layout')

@section('title', 'Code generation')

@section('content')
    <div class="flex flex-col gap-6">
        <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
            <div>
                <h2 class="text-3xl font-black tracking-tight text-white">Code generation</h2>
                <p class="mt-2 text-sm text-gray-300">Upload and manage 5-digit codes for users to redeem during warranty requests.</p>
            </div>
            <a href="{{ route('admin.code_generation.create') }}" class="inline-flex items-center justify-center rounded-full border border-yellow-400 bg-yellow-400/10 px-5 py-3 text-sm font-semibold text-yellow-200 hover:bg-yellow-400 hover:text-black transition">
                Upload new code
            </a>
        </div>

        <form method="GET" action="{{ route('admin.code_generation.index') }}" class="grid gap-4 md:grid-cols-4">
            <input name="code" value="{{ $filters['code'] ?? '' }}" type="text" placeholder="Code" class="rounded-lg border border-white/10 bg-black/80 px-4 py-3 text-white placeholder:text-white/40 focus:border-yellow-300 focus:outline-none focus:ring-2 focus:ring-yellow-300" />
            <input name="owner_name" value="{{ $filters['owner_name'] ?? '' }}" type="text" placeholder="Owner name" class="rounded-lg border border-white/10 bg-black/80 px-4 py-3 text-white placeholder:text-white/40 focus:border-yellow-300 focus:outline-none focus:ring-2 focus:ring-yellow-300" />
            <input name="owner_email" value="{{ $filters['owner_email'] ?? '' }}" type="text" placeholder="Owner email" class="rounded-lg border border-white/10 bg-black/80 px-4 py-3 text-white placeholder:text-white/40 focus:border-yellow-300 focus:outline-none focus:ring-2 focus:ring-yellow-300" />
            <select name="status" class="rounded-lg border border-white/10 bg-black/80 px-4 py-3 text-white focus:border-yellow-300 focus:outline-none focus:ring-2 focus:ring-yellow-300">
                <option value="">All status</option>
                <option value="available" {{ (isset($filters['status']) && $filters['status'] === 'available') ? 'selected' : '' }}>Available</option>
                <option value="used" {{ (isset($filters['status']) && $filters['status'] === 'used') ? 'selected' : '' }}>Used</option>
            </select>
            <button type="submit" class="inline-flex items-center justify-center rounded-full bg-yellow-400 px-5 py-3 text-sm font-semibold text-black hover:bg-yellow-300 transition">
                Filter
            </button>
        </form>

        <div class="overflow-x-auto rounded-3xl border border-white/10 bg-black/50 p-4">
            <table class="min-w-full text-left text-sm text-gray-200">
                <thead>
                    <tr class="border-b border-white/10 text-xs uppercase tracking-[0.2em] text-gray-400">
                        <th class="px-4 py-3">Code</th>
                        <th class="px-4 py-3">Owner Name</th>
                        <th class="px-4 py-3">Owner Email</th>
                        <th class="px-4 py-3">Status</th>
                        <th class="px-4 py-3">Created</th>
                        <th class="px-4 py-3">Used</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($codes as $code)
                        <tr class="border-b border-white/10">
                            <td class="px-4 py-4 font-semibold text-white">{{ $code->code }}</td>
                            <td class="px-4 py-4">
                                @if ($code->owner_name)
                                    {{ $code->owner_name }}
                                @else
                                    No Owner
                                @endif
                            </td>
                            <td class="px-4 py-4">
                                @if ($code->owner_email)
                                    {{ $code->owner_email }}
                                @else
                                    No Owner
                                @endif
                            </td>
                            <td class="px-4 py-4">
                                @if ($code->status === 'used')
                                    <span class="rounded-full bg-red-500/10 px-3 py-1 text-xs font-semibold text-red-200">Used</span>
                                @else
                                    <span class="rounded-full bg-emerald-500/10 px-3 py-1 text-xs font-semibold text-emerald-200">Available</span>
                                @endif
                            </td>
                            <td class="px-4 py-4 text-gray-300">{{ $code->created_at->format('d/m/Y') }}</td>
                            <td class="px-4 py-4 text-gray-300">{{ $code->used_at ? $code->used_at->format('d/m/Y') : '—' }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="px-4 py-6 text-center text-sm text-gray-400">No codes found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="mt-6">
            {{ $codes->links() }}
        </div>
    </div>
@endsection
