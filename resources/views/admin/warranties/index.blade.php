@extends('admin.layout')

@section('title', 'Warranties')

@section('content')
    <div class="flex flex-col gap-4">
        <div class="flex flex-col gap-4 lg:flex-row lg:items-center lg:justify-between">
            <div>
                <h2 class="text-2xl font-bold">Warranties</h2>
                <p class="text-sm text-gray-300">Search, view or manage submitted warranty requests.</p>
            </div>

            <div class="flex flex-col gap-2 sm:flex-row sm:items-center">
                <a href="{{ route('admin.warranties.create') }}" class="inline-flex items-center justify-center rounded-full border border-yellow-400 bg-yellow-400/10 px-4 py-2 text-sm font-semibold text-yellow-200 hover:bg-yellow-400/20">Add new warranty</a>
                <?php /*<a href="{{ route('admin.dashboard') }}" class="inline-flex items-center justify-center rounded-full border border-white/20 bg-white/5 px-4 py-2 text-sm font-semibold text-white hover:bg-white/10">Dashboard</a>*/ ?>
            </div>
        </div>

        <form class="grid gap-3 rounded-2xl border border-white/10 bg-black/50 p-5" method="GET" action="{{ route('admin.warranties.index') }}">
            <h3 class="text-sm font-semibold text-white">Filter</h3>

            <div class="grid gap-3 lg:grid-cols-3">
                @foreach (['name' => 'Name', 'email' => 'Email', 'phone' => 'Phone', 'car_model' => 'Car model', 'job_description' => 'Job description', 'unique_number' => 'Card number'] as $field => $label)
                    <label class="block">
                        <span class="text-xs text-gray-300">{{ $label }}</span>
                        <input
                            name="{{ $field }}"
                            value="{{ $filters[$field] ?? '' }}"
                            class="mt-1 w-full rounded-lg border border-white/15 bg-white/5 px-4 py-2 text-white placeholder:text-white/35 focus:border-yellow-300 focus:outline-none focus:ring-2 focus:ring-yellow-300"
                            placeholder="{{ $label }}"
                        />
                    </label>
                @endforeach
            </div>

            <div class="flex flex-col gap-3 sm:flex-row sm:items-center">
                <button type="submit" class="inline-flex items-center justify-center rounded-full bg-yellow-400 px-6 py-2 text-sm font-semibold text-black hover:bg-yellow-300">
                    Apply filters
                </button>
                <a href="{{ route('admin.warranties.index') }}" class="inline-flex items-center justify-center rounded-full border border-white/20 bg-white/5 px-6 py-2 text-sm font-semibold text-white hover:bg-white/10">
                    Clear filters
                </a>
            </div>
        </form>

        <div class="overflow-x-auto rounded-2xl border border-white/10 bg-black/50 p-4">
            <table class="w-full text-left text-sm">
                <thead class="text-xs uppercase text-gray-300">
                    <tr>
                        <th class="px-3 py-2">#</th>
                        <th class="px-3 py-2">Name</th>
                        <th class="px-3 py-2">Email</th>
                        <th class="px-3 py-2">Phone</th>
                        <th class="px-3 py-2">Car</th>
                        <th class="px-3 py-2">Card</th>
                        <th class="px-3 py-2">Start Date</th>
                        <th class="px-3 py-2">Expiry Date</th>
                        <th class="px-3 py-2">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($warranties as $warranty)
                        <tr class="border-t border-white/10">
                            <td class="px-3 py-2 text-gray-200">{{ $warranty->id }}</td>
                            <td class="px-3 py-2 text-gray-200">{{ $warranty->name }}</td>
                            <td class="px-3 py-2 text-gray-200">{{ $warranty->email }}</td>
                            <td class="px-3 py-2 text-gray-200">{{ $warranty->phone }}</td>
                            <td class="px-3 py-2 text-gray-200">{{ $warranty->car_model }}</td>
                            <td class="px-3 py-2 text-gray-200">{{ $warranty->unique_number }}</td>
                            <td class="px-3 py-2 text-gray-200">{{ $warranty->warranty_date?->format('d/m/Y') ?? $warranty->created_at->format('d/m/Y') }}</td>
                            <td class="px-3 py-2 text-gray-200">{{ $warranty->expiry_date?->format('d/m/Y') ?? '—' }}</td>
                            <td class="px-3 py-2">
                                <div class="flex flex-wrap gap-2">
                                    <a href="{{ route('admin.warranties.show', $warranty) }}" class="inline-flex items-center justify-center rounded-full border border-white/20 bg-white/5 px-3 py-2 text-xs font-medium text-white hover:bg-white/10">View</a>

                                    <form method="POST" action="{{ route('admin.warranties.destroy', $warranty) }}" onsubmit="return confirm('Delete this warranty?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="inline-flex items-center justify-center rounded-full border border-red-500 bg-red-500/10 px-3 py-2 text-xs font-medium text-red-200 hover:bg-red-500/20">Delete</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="8" class="px-3 py-6 text-center text-gray-400">
                                No warranties found.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="mt-4 flex items-center justify-between text-xs text-gray-300">
            <div>
                Showing {{ $warranties->count() }} of {{ $warranties->total() }} warranties
            </div>
            <div>
                {{ $warranties->links() }}
            </div>
        </div>
    </div>
@endsection
