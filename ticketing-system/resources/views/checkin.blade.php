<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>RWM Ticketing System - Check In</title>
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    </head>
    <body class="font-sans antialiased bg-gradient-to-br from-blue-50 via-white to-purple-50">
        <div class="min-h-screen flex flex-col">
            <header class="bg-white shadow-sm border-b">
                <div class="max-w-7xl mx-auto py-4 px-4">
                    <nav class="flex flex-col sm:flex-row items-center justify-between space-y-2 sm:space-y-0">
                        <h1 class="text-xl sm:text-2xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-blue-600 to-purple-600">
                            RWM Ticketing System
                        </h1>
                        <span class="text-sm text-gray-500">{{ now()->format('F d, Y') }}</span>
                    </nav>
                </div>
            </header>

            <main class="flex-1 px-4 sm:px-6 md:px-8">
                <div class="max-w-3xl mx-auto py-6 sm:py-12">
                    <div class="bg-white rounded-xl shadow-sm border p-6 sm:p-8">
                        <div class="mb-6 sm:mb-8 text-center">
                            <div class="inline-block p-3 rounded-full bg-blue-50 mb-3">
                                <svg class="w-6 h-6 sm:w-8 sm:h-8 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
                                </svg>
                            </div>
                            <h2 class="text-xl sm:text-2xl font-bold text-gray-900">Ticket Check-In</h2>
                            <p class="text-gray-500 mt-2 text-sm sm:text-base">Ticket ID: {{ $ticket_id ?? 'TICKET-' . rand(1000, 9999) }}</p>
                        </div>

                        <form action="{{ route('ticket.confirm-checkin') }}" method="POST" class="space-y-6" 
                            x-data="{ open: false, search: '', selectedCafe: '', selectedCafeId: '' }"
                            @submit.prevent="
                                if (!selectedCafe.trim()) {
                                    Swal.fire({
                                        title: 'Selection Required',
                                        text: 'Please select a cafe before confirming check-in',
                                        icon: 'warning',
                                        confirmButtonText: 'Ok',
                                        confirmButtonColor: '#3B82F6'
                                    });
                                    return false;
                                }
                                $el.submit();
                            "
                        >
                            @csrf
                            <div class="relative">
                                <label class="block text-sm font-medium text-gray-700 mb-2">Select Cafe</label>
                                <input
                                <input
                                    type="text"
                                    x-model="search"
                                    @click="open = true"
                                    @click.away="open = false"
                                    :value="selectedCafe"
                                    placeholder="Search cafe..."
                                    class="w-full p-3 sm:p-4 border rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 bg-gray-50 text-sm sm:text-base"
                                >
                                <div x-show="open" class="absolute w-full mt-1 bg-white border rounded-lg shadow-lg z-50 max-h-48 sm:max-h-60 overflow-y-auto">
                                    <template x-for="cafe in {{ json_encode($cafes) }}.filter(c => c.name.toLowerCase().includes(search.toLowerCase()))" :key="cafe.id">
                                        <div
                                            @click="selectedCafe = cafe.name; selectedCafeId = cafe.id; open = false"
                                            class="p-3 sm:p-4 hover:bg-blue-50 cursor-pointer border-b last:border-0"
                                        >
                                            <div x-text="cafe.name" class="font-medium text-sm sm:text-base"></div>
                                            <div x-text="cafe.address" class="text-xs sm:text-sm text-gray-500"></div>
                                        </div>
                                    </template>
                                </div>
                            </div>
                            <input type="hidden" name="selected_cafe" x-model="selectedCafe">
                            <input type="hidden" name="cafe_id" x-model="selectedCafeId">
                            <input type="hidden" name="uuid" value="{{ $uuid }}">
                            <input type="hidden" name="ticket_id" value="{{ $ticket_id }}">

                            <div class="mt-8"></div>

                            <button type="submit" class="w-full bg-gradient-to-r from-blue-600 to-purple-600 text-white rounded-lg px-4 py-3 sm:py-4 text-sm sm:text-base font-medium hover:from-blue-700 hover:to-purple-700 transition transform hover:scale-[1.02] duration-200">
                                Confirm Check In
                            </button>
                        </form>
                        @if(isset($selected_cafe_name))
                            <div class="bg-blue-50 p-4 rounded-lg mb-4">
                                <p class="text-blue-700">Your selected cafe is: {{ $selected_cafe_name }}</p>
                                @if(isset($selectedCafe))
                                    <p class="text-blue-600">Address: {{ $selectedCafe->address }}</p>
                                @endif
                            </div>
                        @endif
                        @if(isset($verificationUrl))
                            <div class="mt-6 text-center">
                                <div class="qr-code bg-white p-3 sm:p-4 inline-block rounded-lg shadow-sm flex flex-col items-center">
                                    {!! QrCode::size(150)->format('svg')->errorCorrection('H')->generate($verificationUrl) !!}
                                    <p class="mt-3 text-sm sm:text-base font-semibold text-blue-600 bg-blue-50 py-2 px-4 rounded-lg inline-block">Please show this QR code to the cashier</p>
                                </div>
                                <a href="{{ $verificationUrl }}" 
                                   class="mt-2 inline-block text-blue-600 hover:text-blue-800 hover:underline break-all text-xs sm:text-sm"
                                   target="_blank"
                                   rel="noopener">
                                    {{ $verificationUrl }}
                                </a>
                                <span class="mt-2 inline-block text-gray-500 break-all text-xs sm:text-sm" style="-webkit-user-select: none; -moz-user-select: none; -ms-user-select: none; user-select: none;" oncontextmenu="return false;">
                                    {{ $verificationUrl }}
                                </span>
                            </div>
                        @endif
                    </div>
                </div>
            </main>

            <footer class="bg-white shadow-sm border-t mt-auto">
                <div class="max-w-7xl mx-auto py-3 sm:py-4 px-4 text-center">
                    <span class="text-xs sm:text-sm font-medium text-transparent bg-clip-text bg-gradient-to-r from-blue-600 to-purple-600">
                        Powered by QuadraWebs
                    </span>
                </div>
            </footer>
        </div>
    </body>
</html>
