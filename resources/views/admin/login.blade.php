<!DOCTYPE html>
<html class="overflow-x-hidden" lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <title>@yield('title', 'Admin Login') - Proflect Warranty</title>

        <script src="https://cdn.tailwindcss.com"></script>

        @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
            @vite(['resources/css/app.css', 'resources/js/app.js'])
        @else
            <style>
                /*! tailwindcss v4.0.7 | MIT License | https://tailwindcss.com */
                @layer base {
                    html {
                        font-family: "Conqueraa", Conqueraa;
                    }
                }
            </style>
        @endif
    </head>

    <body class="bg-black text-white">
        <div class="min-h-screen flex items-center justify-center px-4 py-10">
            <div class="w-full max-w-lg rounded-3xl border border-white/10 bg-black/60 p-10 shadow-xl backdrop-blur">
                <div class="mb-6 text-center">
                    <div style="display: flex; justify-content: center;">
                        <img src="{{ asset('proflect_logo.jpeg') }}" 
                            style="height: 100px; width: 100px;" 
                            alt="Logo">
                    </div>
                    <h1 class="mt-4 text-2xl font-bold">Admin Login</h1>
                    <p class="mt-1 text-sm text-gray-300">Use your admin credentials to manage warranties.</p>
                </div>

                @if (session('success'))
                    <div class="mb-4 rounded-lg border border-green-500 bg-green-900/40 px-4 py-3 text-sm text-green-100">
                        {{ session('success') }}
                    </div>
                @endif

                @if (session('error'))
                    <div class="mb-4 rounded-lg border border-red-500 bg-red-900/40 px-4 py-3 text-sm text-red-100">
                        {{ session('error') }}
                    </div>
                @endif

                @if ($errors->any())
                    <div class="mb-4 rounded-lg border border-red-500 bg-red-900/40 px-4 py-3 text-sm text-red-100">
                        <ul class="list-disc space-y-1 pl-5">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('admin.login.post') }}" method="POST" class="space-y-4">
                    @csrf
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
                        <span class="text-sm text-gray-300">Password</span>
                        <input
                            type="password"
                            name="password"
                            required
                            class="mt-1 w-full rounded-lg border border-white/15 bg-white/5 px-4 py-3 text-white placeholder:text-white/35 focus:border-yellow-300 focus:outline-none focus:ring-2 focus:ring-yellow-300"
                        />
                    </label>

                    <button type="submit" class="w-full rounded-full bg-yellow-400 px-6 py-3 text-sm font-semibold text-black transition hover:bg-yellow-300">
                        Sign in
                    </button>
                </form>

                <?php /*<p class="mt-6 text-center text-xs text-gray-500">Default admin email: <span class="text-white">admin@proflect.com</span></p>
                <p class="text-center text-xs text-gray-500">Default password: <span class="text-white">Admin@123</span></p> */?>
            </div>
        </div>
    </body>
</html>
