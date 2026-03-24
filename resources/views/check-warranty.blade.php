<!DOCTYPE html>
<html class="overflow-x-hidden" lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <title>Check Warranty</title>

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
                            <?php /*<div>
                                <h1 class="text-lg font-semibold tracking-wide text-white">Proflect</h1>
                                <p class="text-xs text-gray-300">Servicing Melbourne’s East</p>
                            </div>*/ ?>
                        </div>

                        <div class="flex items-center gap-4">
                            <button id="mobileMenuButton" type="button" class="md:hidden inline-flex items-center justify-center rounded-full border border-white/10 bg-white/5 p-2 text-white hover:bg-white/10 focus:outline-none focus:ring-2 focus:ring-yellow-300" aria-expanded="false" aria-controls="mobileMenu">
                                <span class="sr-only">Open menu</span>
                                <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                    <path fill-rule="evenodd" d="M3 5h14a1 1 0 010 2H3a1 1 0 010-2zm0 4h14a1 1 0 010 2H3a1 1 0 010-2zm0 4h14a1 1 0 010 2H3a1 1 0 010-2z" clip-rule="evenodd" />
                                </svg>
                            </button>

                            <div class="hidden items-center gap-4 text-xs text-gray-200 md:flex">
                                <a href="mailto:info@proflect.com.au" class="inline-flex items-center gap-2 rounded-full bg-white/10 px-4 py-2 hover:bg-white/15 transition">
                                    <span class="inline-flex h-2 w-2 rounded-full bg-yellow-400"></span>
                                    <span>info@proflect.com.au</span>
                                </a>
                                <a href="tel:0400527840" class="inline-flex items-center gap-2 rounded-full bg-white/10 px-4 py-2 hover:bg-white/15 transition">
                                    <span class="inline-flex h-2 w-2 rounded-full bg-yellow-400"></span>
                                    <span>0400 527 840</span>
                                </a>
                                <a href="{{ route('warranty.create') }}" class="inline-flex items-center justify-center rounded-full border border-yellow-400 px-4 py-2 text-xs font-medium text-yellow-400 hover:bg-yellow-400 hover:text-black transition">
                                    WARRANTY
                                </a>
                            </div>
                        </div>
                    </div>

                    <div id="mobileMenu" class="hidden mt-4 space-y-3 rounded-2xl border border-white/10 bg-black/60 p-4 text-sm text-gray-200 md:hidden">
                        <a href="mailto:info@proflect.com.au" class="block rounded-lg bg-white/10 px-4 py-2 hover:bg-white/15">info@proflect.com.au</a>
                        <a href="tel:0400527840" class="block rounded-lg bg-white/10 px-4 py-2 hover:bg-white/15">0400 527 840</a>
                        <a href="{{ route('warranty.create') }}" class="block rounded-lg border border-yellow-400 bg-white/5 px-4 py-2 text-center text-sm font-medium text-yellow-400 hover:bg-yellow-400 hover:text-black">WARRANTY</a>
                    </div>

                    <div class="mt-10 w-full rounded-3xl border border-white/10 bg-black/60 p-6 sm:p-8 lg:p-10 shadow-xl backdrop-blur">
                        <div class="grid gap-10 lg:grid-cols-2">
                            <div class="space-y-6">
                                <h2 class="text-4xl font-black tracking-tight text-white lg:text-5xl">CHECK WARRANTY</h2>
                                <p class="text-lg text-gray-200">Enter the email and warranty card number used when the warranty was registered. We'll send a code to verify your access.</p>
                                <p class="text-gray-300">Once verified, you'll be shown your warranty card details.</p>
                            </div>

                            <div class="rounded-2xl border border-white/10 bg-white/5 p-6 shadow-xl backdrop-blur">
                                @if ($errors->any())
                                    <div class="mb-4 rounded-lg border border-red-500 bg-red-900/40 px-4 py-3 text-sm text-red-100">
                                        <ul class="list-disc space-y-1 pl-5">
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif

                                <form action="{{ route('warranty.check.send') }}" method="POST" class="space-y-4">
                                    @csrf

                                    <label class="block">
                                        <span class="text-sm text-gray-300">Email</span>
                                        <input
                                            name="email"
                                            value="{{ old('email') }}"
                                            required
                                            class="mt-1 w-full rounded-lg border border-white/15 bg-white/5 px-4 py-3 text-white placeholder:text-white/35 focus:border-yellow-300 focus:outline-none focus:ring-2 focus:ring-yellow-300"
                                            placeholder="you@example.com"
                                        />
                                    </label>

                                    <label class="block">
                                        <span class="text-sm text-gray-300">Warranty card number (5 digits)</span>
                                        <input
                                            name="unique_number"
                                            value="{{ old('unique_number') }}"
                                            required
                                            maxlength="5"
                                            inputmode="numeric"
                                            class="mt-1 w-full rounded-lg border border-white/15 bg-white/5 px-4 py-3 text-white placeholder:text-white/35 focus:border-yellow-300 focus:outline-none focus:ring-2 focus:ring-yellow-300"
                                            placeholder="12345"
                                            oninput="this.value = this.value.replace(/[^0-9]/g, '')"
                                        />
                                    </label>

                                    <button
                                        type="submit"
                                        class="inline-flex w-full items-center justify-center gap-2 rounded-full bg-yellow-400 px-6 py-3 text-sm font-semibold text-black transition hover:bg-yellow-300"
                                    >
                                        Send verification code
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
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
