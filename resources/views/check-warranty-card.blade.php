<!DOCTYPE html>
<html class="overflow-x-hidden" lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <title>Warranty Card</title>

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
                            </div> */?>
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
                                <h2 class="text-4xl font-black tracking-tight text-white lg:text-5xl">YOUR WARRANTY CARD</h2>
                                <p class="text-lg text-gray-200">Your warranty has been verified. Below are the details we have on file.</p>
                                <p class="text-gray-300">If you need to verify another warranty, <a href="{{ route('warranty.check') }}" class="text-yellow-300 hover:text-yellow-200">start again</a>.</p>
                            </div>

                            <div class="rounded-2xl border border-white/10 bg-white/5 p-6 shadow-xl backdrop-blur">
                                <div class="mt-6 rounded-2xl border border-white/10 bg-black/70 p-6 shadow-inner">
                                    <h3 class="text-lg font-semibold text-white">Warranty verified</h3>
                                    <p class="text-sm text-gray-300">Below are the details we have on file.</p>

                                    <div class="mt-6 grid gap-6">
                                        <div class="relative mx-auto w-full max-w-full sm:max-w-[340px] h-[214px] overflow-hidden rounded-3xl border border-white/10 bg-gray-100 p-5 shadow-xl" style="background: #F3F4F6;">
                                            <div class="absolute inset-0 opacity-40" style="background: linear-gradient(135deg, rgba(0,0,0,0.04) 0%, rgba(0,0,0,0.04) 50%, transparent 50%, transparent 100%);"></div>
                                            <div class="relative flex h-full flex-col items-center justify-center gap-2 text-center">
                                                <div>
                                                    <p class="text-3xl font-black tracking-[0.3em] text-slate-900">PROFLECT</p>
                                                    <p class="text-xs tracking-widest text-slate-600">PAINT PROTECTION</p>
                                                    <p class="text-xs tracking-widest text-slate-500">WARRANTY</p>
                                                </div>

                                                <p class="text-5xl font-black tracking-[0.4em] text-yellow-500">{{ $warranty->unique_number }}</p>

                                                @php
                                                    $expiry = $warranty->expiry_date ?? $warranty->warranty_date->copy()->addYears(5);
                                                    $expired = now()->greaterThan($expiry);
                                                @endphp

                                                <p class="text-xs text-slate-600">
                                                    Expires <span class="font-semibold text-slate-800">{{ $expiry->format('d/m/y') }}</span>
                                                    @if($expired)
                                                        <span class="ml-1 text-xs font-semibold text-red-400">(Expired)</span>
                                                    @endif
                                                </p>

                                                <!-- <p class="text-xs text-slate-500">Please scan the QR code to register and activate your warranty.</p> -->
                                            </div>
                                        </div>

                                        <div class="mx-auto w-full max-w-full sm:max-w-[340px] h-[210px] rounded-3xl border border-white/10 bg-gray-100 p-5 shadow-xl">
                                            <p class="text-xs text-slate-600">Name</p>
                                            <p class="text-sm font-semibold text-slate-900">{{ $warranty->name }}</p>

                                            <p class="mt-3 text-xs text-slate-600">Email</p>
                                            <p class="text-sm font-semibold text-slate-900">{{ $warranty->email }}</p>

                                            <p class="mt-3 text-xs text-slate-600">Phone</p>
                                            <p class="text-sm font-semibold text-slate-900">{{ $warranty->phone }}</p>

                                            <p class="mt-3 text-xs text-slate-600">Car model</p>
                                            <p class="text-sm font-semibold text-slate-900">{{ $warranty->car_model }}</p>
                                        </div>
                                    </div>
                                </div>
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
