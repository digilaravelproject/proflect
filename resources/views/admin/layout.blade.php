<!DOCTYPE html>
<html class="overflow-x-hidden" lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <title>@yield('title', 'Admin') - Proflect Warranty</title>

        <script src="https://cdn.tailwindcss.com"></script>

        <style>
            /*! tailwindcss v4.0.7 | MIT License | https://tailwindcss.com */
            @layer base {
                html {
                    font-family: "Conqueraa", Conqueraa !important;
                }
            }
        </style>
            
    </head>

    <body class="bg-black text-white overflow-x-hidden">
        <div class="min-h-screen">
            <header class="relative">
                <div class="absolute inset-0 pointer-events-none" aria-hidden="true">
                    <div class="h-full w-full bg-[radial-gradient(circle_at_top,_rgba(255,255,255,0.08),_transparent_60%)]"></div>
                </div>

                <div class="mx-auto flex w-full max-w-6xl flex-col gap-6 px-4 py-10 lg:px-8">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center gap-3">
                            <div>
                                <img src="{{ asset('proflect_logo.jpeg') }}" 
                                    style="height: 100px; width: 100px;" 
                                    alt="Logo">
                            </div>
                            <div>
                                <h1 class="text-lg font-semibold tracking-wide text-white">Proflect Admin</h1>
                                <p class="text-xs text-gray-300">Warranty management</p>
                                @if (session('admin_name'))
                                    <p class="text-xs text-gray-300">Logged in as <span class="font-medium text-white">{{ session('admin_name') }}</span></p>
                                @endif
                            </div>
                        </div>

                        <div class="flex items-center gap-4">
                            <button id="mobileMenuButton" type="button" class="md:hidden inline-flex items-center justify-center rounded-full border border-white/10 bg-white/5 p-2 text-white hover:bg-white/10 focus:outline-none focus:ring-2 focus:ring-yellow-300" aria-expanded="false" aria-controls="mobileMenu">
                                <span class="sr-only">Open menu</span>
                                <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                    <path fill-rule="evenodd" d="M3 5h14a1 1 0 010 2H3a1 1 0 010-2zm0 4h14a1 1 0 010 2H3a1 1 0 010-2zm0 4h14a1 1 0 010 2H3a1 1 0 010-2z" clip-rule="evenodd" />
                                </svg>
                            </button>

                            <div class="hidden items-center gap-4 text-xs text-gray-200 md:flex">
                                <a href="{{ route('admin.warranties.index') }}" class="inline-flex items-center justify-center rounded-full border border-white/20 bg-white/5 px-4 py-2 text-xs font-medium text-white hover:bg-white/10 transition">
                                    Warranties
                                </a>
                                <?php /*<a href="{{ route('admin.warranties.create') }}" class="inline-flex items-center justify-center rounded-full border border-yellow-400 px-4 py-2 text-xs font-medium text-yellow-400 hover:bg-yellow-400 hover:text-black transition">
                                    Add warranty
                                </a> */?>
                                <form action="{{ route('admin.logout') }}" method="POST" class="inline">
                                    @csrf
                                    <button type="submit" class="inline-flex items-center justify-center rounded-full border border-white/20 bg-white/5 px-4 py-2 text-xs font-medium text-white hover:bg-white/10 transition">
                                        Logout
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>

                    <div id="mobileMenu" class="hidden mt-4 space-y-3 rounded-2xl border border-white/10 bg-black/60 p-4 text-sm text-gray-200 md:hidden">
                        <a href="{{ route('admin.warranties.index') }}" class="block rounded-lg bg-white/10 px-4 py-2 hover:bg-white/15">Warranties</a>
                        <a href="{{ route('admin.warranties.create') }}" class="block rounded-lg border border-yellow-400 bg-white/5 px-4 py-2 text-center text-sm font-medium text-yellow-400 hover:bg-yellow-400 hover:text-black">Add warranty</a>
                        <form action="{{ route('admin.logout') }}" method="POST">
                            @csrf
                            <button type="submit" class="block w-full rounded-lg border border-white/20 bg-white/5 px-4 py-2 text-left text-sm font-medium text-white hover:bg-white/15">Logout</button>
                        </form>
                    </div>

                    <main class="rounded-3xl border border-white/10 bg-black/60 p-6 sm:p-8 lg:p-10 shadow-xl backdrop-blur">
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

                        @yield('content')
                    </main>
                </div>
            </header>
        </div>

        <script>
            document.addEventListener('DOMContentLoaded', () => {
                const toggle = document.getElementById('mobileMenuButton');
                const menu = document.getElementById('mobileMenu');

                toggle?.addEventListener('click', () => {
                    menu?.classList.toggle('hidden');
                });
            });
        </script>
    </body>
</html>
