<!DOCTYPE html>
<html class="overflow-x-hidden" lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <title>Terms and Conditions</title>

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
                            <?php /*<div class="flex h-12 w-12 items-center justify-center rounded-full bg-gradient-to-br from-yellow-400 to-white text-black shadow-xl">
                                <span class="text-xl font-black">P</span>
                            </div>
                            <div>
                                <h1 class="text-lg font-semibold tracking-wide text-white">Proflect</h1>
                                <p class="text-xs text-gray-300">Terms & Conditions</p>
                            </div> */?> 
                            <div>
                                <img src="{{ asset('proflect_logo.jpeg') }}" 
                                    style="height: 100px; width: 100px;" 
                                    alt="Logo">
                            </div> 
                        </div>

                        <div class="flex items-center gap-4">
                            <a href="{{ route('warranty.create') }}" class="inline-flex items-center justify-center rounded-full border border-yellow-400 px-4 py-2 text-xs font-medium text-yellow-400 hover:bg-yellow-400 hover:text-black transition">
                                WARRANTY
                            </a>
                        </div>
                    </div>

                    <div class="mt-10 rounded-3xl border border-white/10 bg-black/60 p-6 sm:p-8 lg:p-10 shadow-xl backdrop-blur">
                        <h2 class="text-3xl font-bold">Terms & Conditions</h2>
                        <p class="mt-4 text-gray-300">The text below is placeholder content. Replace it with your actual terms and conditions.</p>

                        <div class="mt-6 space-y-4 text-sm text-gray-200">
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus luctus urna sed urna ultricies ac tempor dui sagittis.</p>
                            <p>In condimentum facilisis porta. Sed nec diam eu diam mattis viverra. Nulla fringilla, orci ac euismod semper.</p>
                            <p>Praesent dapibus, neque id cursus faucibus, tortor neque egestas augue, eu vulputate magna eros eu erat.</p>
                            <p>Aliquam erat volutpat. Nam dui mi, tincidunt quis, accumsan porttitor, facilisis luctus, metus.</p>
                        </div>

                        <div class="mt-8">
                            <a href="{{ route('warranty.create') }}" class="inline-flex items-center justify-center rounded-full border border-white/20 bg-white/5 px-6 py-3 text-sm font-semibold text-white hover:bg-white/10">
                                Back to warranty form
                            </a>
                        </div>
                    </div>
                </div>
            </header>
        </div>
    </body>
</html>
