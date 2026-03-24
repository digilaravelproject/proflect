@extends('admin.layout')

@section('title', 'Add Warranty')

@section('content')
    <div class="space-y-6">
        <div>
            <h2 class="text-2xl font-bold">Add new warranty</h2>
            <p class="text-sm text-gray-300">Create a new warranty record.</p>
        </div>

        <form action="{{ route('admin.warranties.store') }}" method="POST" class="space-y-6">
            @csrf

            <div class="grid gap-4 lg:grid-cols-2">
                <label class="block">
                    <span class="text-sm text-gray-300">Name</span>
                    <input
                        name="name"
                        value="{{ old('name') }}"
                        required
                        class="mt-1 w-full rounded-lg border border-white/15 bg-white/5 px-4 py-3 text-white placeholder:text-white/35 focus:border-yellow-300 focus:outline-none focus:ring-2 focus:ring-yellow-300"
                    />
                </label>

                <label class="block">
                    <span class="text-sm text-gray-300">Email</span>
                    <input
                        type="email"
                        name="email"
                        value="{{ old('email') }}"
                        required
                        class="mt-1 w-full rounded-lg border border-white/15 bg-white/5 px-4 py-3 text-white placeholder:text-white/35 focus:border-yellow-300 focus:outline-none focus:ring-2 focus:ring-yellow-300"
                    />
                </label>

                <label class="block">
                    <span class="text-sm text-gray-300">Phone</span>
                    <input
                        type="tel"
                        name="phone"
                        value="{{ old('phone') }}"
                        required
                        inputmode="numeric"
                        pattern="[0-9]*"
                        oninput="this.value=this.value.replace(/[^0-9]/g,'')"
                        class="mt-1 w-full rounded-lg border border-white/15 bg-white/5 px-4 py-3 text-white placeholder:text-white/35 focus:border-yellow-300 focus:outline-none focus:ring-2 focus:ring-yellow-300"
                    />
                </label>

                <label class="block">
                    <span class="text-sm text-gray-300">Car model</span>
                    <input
                        name="car_model"
                        value="{{ old('car_model') }}"
                        required
                        class="mt-1 w-full rounded-lg border border-white/15 bg-white/5 px-4 py-3 text-white placeholder:text-white/35 focus:border-yellow-300 focus:outline-none focus:ring-2 focus:ring-yellow-300"
                    />
                </label>
            </div>

            <label class="block">
                <span class="text-sm text-gray-300">Job description</span>
                <textarea
                    name="job_description"
                    required
                    rows="4"
                    class="mt-1 w-full resize-none rounded-lg border border-white/15 bg-white/5 px-4 py-3 text-white placeholder:text-white/35 focus:border-yellow-300 focus:outline-none focus:ring-2 focus:ring-yellow-300"
                >{{ old('job_description') }}</textarea>
            </label>

            <div class="grid gap-4 lg:grid-cols-2">
                <label class="block">
                    <span class="text-sm text-gray-300">Warranty card number</span>
                    <input
                        id="uniqueNumberInput"
                        name="unique_number"
                        value="{{ old('unique_number') }}"
                        required
                        maxlength="5"
                        inputmode="numeric"
                        class="mt-1 w-full rounded-lg border border-white/15 bg-white/5 px-4 py-3 text-white placeholder:text-white/35 focus:border-yellow-300 focus:outline-none focus:ring-2 focus:ring-yellow-300"
                        placeholder="5 digits"
                        oninput="this.value = this.value.replace(/[^0-9]/g, '')"
                    />
                </label>

                <div class="flex items-end">
                    <button type="submit" class="w-full rounded-full bg-yellow-400 px-6 py-3 text-sm font-semibold text-black hover:bg-yellow-300">
                        Save warranty
                    </button>
                </div>
            </div>

            <div class="text-xs text-gray-400">Note: This will send the confirmation email to the customer.</div>
        </form>
    </div>
@endsection
