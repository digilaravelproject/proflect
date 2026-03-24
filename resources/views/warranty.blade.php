<!DOCTYPE html>
<html class="overflow-x-hidden" lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Proflect Warranty Request</title>

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
                <div class="h-full w-full bg-[radial-gradient(circle_at_top,_rgba(255,255,255,0.08),_transparent_60%)]">
                </div>
            </div>

            <div class="mx-auto flex w-full max-w-6xl flex-col gap-6 px-4 py-10 lg:px-8">
                <div class="flex items-center justify-between">
                    <div class="flex items-center gap-3">
                        <div>
                            <img src="{{ asset('proflect_logo.jpeg') }}" style="height: 100px; width: 100px;"
                                alt="Logo">
                        </div>
                        <?php /*<div>
                                <h1 class="text-lg font-semibold tracking-wide text-white">Proflect</h1>
                                <p class="text-xs text-gray-300">Servicing Melbourne’s East</p>
                            </div> */
                        ?>
                    </div>

                    <div class="flex items-center gap-4">
                        <button id="mobileMenuButton" type="button"
                            class="md:hidden inline-flex items-center justify-center rounded-full border border-white/10 bg-white/5 p-2 text-white hover:bg-white/10 focus:outline-none focus:ring-2 focus:ring-yellow-300"
                            aria-expanded="false" aria-controls="mobileMenu">
                            <span class="sr-only">Open menu</span>
                            <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                <path fill-rule="evenodd"
                                    d="M3 5h14a1 1 0 010 2H3a1 1 0 010-2zm0 4h14a1 1 0 010 2H3a1 1 0 010-2zm0 4h14a1 1 0 010 2H3a1 1 0 010-2z"
                                    clip-rule="evenodd" />
                            </svg>
                        </button>

                        <div class="hidden items-center gap-4 text-xs text-gray-200 md:flex">
                            <a href="mailto:info@proflect.com.au"
                                class="inline-flex items-center gap-2 rounded-full bg-white/10 px-4 py-2 hover:bg-white/15 transition">
                                <span class="inline-flex h-2 w-2 rounded-full bg-yellow-400"></span>
                                <span>info@proflect.com.au</span>
                            </a>
                            <a href="tel:0400527840"
                                class="inline-flex items-center gap-2 rounded-full bg-white/10 px-4 py-2 hover:bg-white/15 transition">
                                <span class="inline-flex h-2 w-2 rounded-full bg-yellow-400"></span>
                                <span>0400 527 840</span>
                            </a>
                            <div class="flex gap-2">
                                <a href="{{ route('warranty.check') }}"
                                    class="inline-flex items-center justify-center rounded-full border border-white/20 bg-white/5 px-4 py-2 text-xs font-medium text-white hover:bg-white/10 transition">
                                    CHECK WARRANTY
                                </a>
                                <a href="https://proflect.com.au/shop/"
                                    class="inline-flex items-center justify-center rounded-full border border-yellow-400 px-4 py-2 text-xs font-medium text-yellow-400 hover:bg-yellow-400 hover:text-black transition">
                                    STORE
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <div id="mobileMenu"
                    class="hidden mt-4 space-y-3 rounded-2xl border border-white/10 bg-black/60 p-4 text-sm text-gray-200 md:hidden">
                    <a href="mailto:info@proflect.com.au"
                        class="block rounded-lg bg-white/10 px-4 py-2 hover:bg-white/15">info@proflect.com.au</a>
                    <a href="tel:0400527840" class="block rounded-lg bg-white/10 px-4 py-2 hover:bg-white/15">0400 527
                        840</a>
                    <a href="{{ route('warranty.check') }}"
                        class="block rounded-lg border border-white/20 bg-white/5 px-4 py-2 text-center text-sm font-medium text-white hover:bg-white/10">CHECK
                        WARRANTY</a>
                    <a href="https://proflect.com.au/shop/"
                        class="block rounded-lg border border-yellow-400 bg-white/5 px-4 py-2 text-center text-sm font-medium text-yellow-400 hover:bg-yellow-400 hover:text-black">STORE</a>
                </div>

                <div
                    class="mt-10 rounded-3xl border border-white/10 bg-black/60 p-6 sm:p-8 lg:p-10 shadow-xl backdrop-blur">
                    <div class="grid gap-10 lg:grid-cols-2">
                        <div class="space-y-6">
                            <h2 class="text-4xl font-black tracking-tight text-white lg:text-5xl">PROFLECT WARRANTY</h2>
                            <p class="text-lg text-gray-200">Get in touch with the Proflect team today to discuss your
                                vehicle’s paint protection.</p>
                            <p class="text-gray-300">Whether you have a question about our premium protective films or
                                want a quote, just complete the form and we’ll be in touch.</p>
                            <div class="space-y-2 text-sm text-gray-400">
                                <p><span class="font-semibold text-white">Email:</span> info@proflect.com.au</p>
                                <p><span class="font-semibold text-white">Phone:</span> 0400 527 840</p>
                            </div>
                        </div>

                        <div class="rounded-2xl border border-white/10 bg-white/5 p-6 shadow-xl backdrop-blur">
                            @if (session('success'))
                                <div
                                    class="mb-4 rounded-lg border border-green-500 bg-green-900/40 px-4 py-3 text-sm text-green-100">
                                    {{ session('success') }}
                                </div>
                            @endif

                            @if ($errors->any())
                                <div
                                    class="mb-4 rounded-lg border border-red-500 bg-red-900/40 px-4 py-3 text-sm text-red-100">
                                    <ul class="list-disc space-y-1 pl-5">
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <form id="warrantyForm" action="{{ route('warranty.store') }}" method="POST"
                                class="space-y-4">
                                @csrf

                                <div class="grid gap-4 lg:grid-cols-2">
                                    <label class="block">
                                        <input name="name" value="{{ old('name') }}" required
                                            class="mt-1 w-full rounded-lg border border-white/15 bg-white/5 px-4 py-3 text-white placeholder:text-white/35 focus:border-yellow-300 focus:outline-none focus:ring-2 focus:ring-yellow-300"
                                            placeholder="Name" />
                                    </label>

                                    <label class="block">
                                        <input type="email" name="email" value="{{ old('email') }}" required
                                            class="mt-1 w-full rounded-lg border border-white/15 bg-white/5 px-4 py-3 text-white placeholder:text-white/35 focus:border-yellow-300 focus:outline-none focus:ring-2 focus:ring-yellow-300"
                                            placeholder="Email" />
                                    </label>

                                    <label class="block">
                                        <input type="tel" name="phone" value="{{ old('phone') }}" required
                                            inputmode="numeric" pattern="[0-9]*"
                                            oninput="this.value=this.value.replace(/[^0-9]/g,'')"
                                            class="mt-1 w-full rounded-lg border border-white/15 bg-white/5 px-4 py-3 text-white placeholder:text-white/35 focus:border-yellow-300 focus:outline-none focus:ring-2 focus:ring-yellow-300"
                                            placeholder="Phone" />
                                    </label>

                                    <label class="block">
                                        <input name="car_model" value="{{ old('car_model') }}" required
                                            class="mt-1 w-full rounded-lg border border-white/15 bg-white/5 px-4 py-3 text-white placeholder:text-white/35 focus:border-yellow-300 focus:outline-none focus:ring-2 focus:ring-yellow-300"
                                            placeholder="Car model" />
                                    </label>
                                </div>

                                <label class="block">
                                    <textarea name="job_description" required rows="4"
                                        class="mt-1 w-full resize-none rounded-lg border border-white/15 bg-white/5 px-4 py-3 text-white placeholder:text-white/35 focus:border-yellow-300 focus:outline-none focus:ring-2 focus:ring-yellow-300"
                                        placeholder="Description of job">{{ old('job_description') }}</textarea>
                                </label>

                                <label class="block">
                                    <span class="text-xs text-gray-300">Warranty number (read-only)</span>
                                    <input type="text" name="unique_number"
                                        value="{{ $nextWarrantyNumber ?? '10001' }}" readonly
                                        class="mt-1 w-full rounded-lg border border-white/15 bg-white/10 px-4 py-3 text-gray-200 placeholder:text-gray-400 focus:border-yellow-300 focus:outline-none focus:ring-2 focus:ring-yellow-300" />
                                </label>

                                <label class="mt-4 flex items-start gap-3 text-xs text-gray-400">
                                    <input type="checkbox" name="accept_terms"
                                        {{ old('accept_terms') ? 'checked' : '' }} required
                                        class="h-4 w-4 rounded border-white/25 bg-black/20 text-yellow-400 focus:ring-yellow-300" />
                                    <span class="leading-tight">
                                        By submitting, you agree to our <a href="{{ route('terms') }}"
                                            class="text-yellow-300 hover:underline">terms and conditions</a>.
                                    </span>
                                </label>

                                @error('accept_terms')
                                    <p class="mt-1 text-xs font-semibold text-red-300">{{ $message }}</p>
                                @enderror

                                <div id="warrantyPreview"
                                    class="relative mx-auto mt-6 w-full max-w-full sm:max-w-[340px] min-h-[214px] overflow-hidden rounded-3xl border border-white/10 p-6 shadow-2xl"
                                    style="background-image: url('{{ asset('storage/proflect-card-2.png') }}'); background-size: cover; background-position: center;">
                                    <div class="relative flex flex-col justify-center items-center gap-1 text-center h-full" style="left: 17px;top: 43px;">
                                        <p id="cardNumber"
                                            class="mt-5 ml-5 text-3xl font-black tracking-[0.05em] text-amber-500">
                                            {{ $nextWarrantyNumber ?? 'AUTOGEN' }}</p>

                                        <p class="text-xs text-gray-200" style="margin-left: -23px;">Expires <span id="cardExpiry"
                                                class="font-semibold text-white">--/--/--</span></p>
                                    </div>
                                </div>

                                <div class="flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
                                    <p class="text-xs text-gray-400">We will never share your information.</p>

                                    <button id="submitButton" type="submit"
                                        class="inline-flex items-center justify-center gap-2 rounded-full bg-yellow-400 px-6 py-3 text-sm font-semibold text-black transition hover:bg-yellow-300 disabled:cursor-not-allowed disabled:opacity-60">
                                        <svg id="spinner" class="hidden h-5 w-5 animate-spin text-black"
                                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                            <circle class="opacity-25" cx="12" cy="12" r="10"
                                                stroke="currentColor" stroke-width="4"></circle>
                                            <path class="opacity-75" fill="currentColor"
                                                d="M4 12a8 8 0 018-8v4a4 4 0 00-4 4H4z"></path>
                                        </svg>
                                        <span id="submitText">Submit</span>
                                    </button>
                                </div>
                            </form>

                            <div class="mt-6 text-xs text-gray-500">
                                <p class="mb-2">Need help? Call us: <a href="tel:0400527840"
                                        class="text-yellow-300 hover:underline">0400 527 840</a></p>
                                <p>Prefer email? <a href="mailto:info@proflect.com.au"
                                        class="text-yellow-300 hover:underline">info@proflect.com.au</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
    </div>

    <script>
        const form = document.getElementById('warrantyForm');
        const submitButton = document.getElementById('submitButton');
        const submitText = document.getElementById('submitText');
        const spinner = document.getElementById('spinner');

        const cardNumber = document.getElementById('cardNumber');
        const cardExpiry = document.getElementById('cardExpiry');
        const warrantyPreview = document.getElementById('warrantyPreview');

        function formatExpiry(date) {
            const dd = String(date.getDate()).padStart(2, '0');
            const mm = String(date.getMonth() + 1).padStart(2, '0');
            const yy = String(date.getFullYear()).slice(-2);
            return `${dd}/${mm}/${yy}`;
        }

        const nextWarrantyNumber = '{{ $nextWarrantyNumber ?? 'AUTOGEN' }}';

        function updateCard() {
            cardNumber.textContent = nextWarrantyNumber;

            const now = new Date();
            const expiry = new Date(now.getTime());
            expiry.setFullYear(expiry.getFullYear() + 5);
            cardExpiry.textContent = formatExpiry(expiry);

            warrantyPreview.classList.add('animate-wiggle');
            setTimeout(() => warrantyPreview.classList.remove('animate-wiggle'), 600);
        }

        form.addEventListener('submit', () => {
            submitButton.disabled = true;
            submitText.textContent = 'Submitting...';
            spinner.classList.remove('hidden');
        });

        document.addEventListener('DOMContentLoaded', updateCard);

        document.addEventListener('DOMContentLoaded', () => {
            const toggle = document.getElementById('mobileMenuButton');
            const menu = document.getElementById('mobileMenu');

            toggle?.addEventListener('click', () => {
                menu?.classList.toggle('hidden');
            });
        });
    </script>

    <style>
        @keyframes wiggle {

            0%,
            100% {
                transform: translateX(0) rotate(0deg);
            }

            25% {
                transform: translateX(-4px) rotate(-1deg);
            }

            75% {
                transform: translateX(4px) rotate(1deg);
            }
        }

        .animate-wiggle {
            animation: wiggle 0.6s ease-in-out;
        }
    </style>
</body>

</html>
