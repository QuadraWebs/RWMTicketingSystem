<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>RWM Ticketing System - Verify Ticket</title>
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <style>
            @keyframes blink {
                0%, 100% { opacity: 1; transform: scale(1); }
                50% { opacity: 0.4; transform: scale(0.9); }
            }
            .blink-animation {
                animation: blink 1.5s cubic-bezier(0.4, 0, 0.6, 1) infinite;
            }
        </style>
    </head>
    <body class="font-sans antialiased bg-gradient-to-br from-blue-50 via-white to-purple-50">
        <div class="min-h-screen flex flex-col">
            <!-- Header -->
            <header class="bg-white shadow-sm border-b">
                <div class="max-w-7xl mx-auto py-4 px-4 sm:py-6">
                    <h1 class="text-xl sm:text-2xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-blue-600 to-purple-600 text-center sm:text-left">
                        Ticket Verification
                    </h1>
                </div>
            </header>

            <!-- Main Content -->
            <main class="flex-1 px-4 sm:px-8 md:px-12">
                @if (session('success'))
                    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
                        <span class="block sm:inline">{{ session('success') }}</span>
                    </div>
                @endif

                @if (session('error'))
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
                        <span class="block sm:inline">{{ session('error') }}</span>
                    </div>
                @endif
                <div class="max-w-3xl mx-auto py-6 sm:py-12">
                    <div class="bg-white rounded-xl shadow-sm border p-6 sm:p-10">
                        <div class="text-center">
                            <div class="inline-block p-3 sm:p-4 rounded-full bg-blue-100 mb-4 sm:mb-6">
                                <svg class="w-8 h-8 sm:w-12 sm:h-12 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                            </div>
                           
                            <h2 class="text-xl sm:text-2xl font-bold text-gray-900 mb-3">Pending Verification</h2>
                           
                            <div class="space-y-3 text-left bg-gray-50 rounded-lg p-4 sm:p-6 mb-6 text-sm sm:text-base">
                                <div class="flex justify-between items-center">
                                    <span class="text-gray-600">Customer:</span>
                                    <span class="text-lg sm:text-xl font-medium text-gray-900 text-transparent bg-clip-text bg-gradient-to-r from-blue-500 to-purple-500">{{ $customer_name }}</span>
                                </div>
                                <div class="flex justify-between items-center">
                                    <span class="text-gray-600">Cafe:</span>
                                    <span class="font-medium text-gray-900">{{ $selected_cafe }}</span>
                                </div>
                                <div class="flex justify-between items-center">
                                    <span class="text-gray-600">Check-in Time:</span>
                                    <span class="font-medium text-gray-900">{{ now()->format('F d, Y h:i A') }}</span>
                                </div>
                                <div class="flex justify-between items-center">
                                    <span class="text-gray-600">Status:</span>
                                    <span class="inline-flex items-center gap-2 px-4 py-2 rounded-full" style="background-color: #FEF3C7; border: 1px solid #FCD34D;">
                                        <span class="inline-flex items-center bg-yellow-100 border-yellow-400">
                                            <svg class="w-5 h-5 text-yellow-600 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                            </svg>
                                            <span class="font-bold text-yellow-800">Pending</span>
                                        </span>
                                    </span>                            
                                </div>
                            </div>
                            
                            <div class="bg-amber-50 border border-amber-200 rounded-lg p-4 mb-6">
                                <p class="text-amber-700 text-center font-medium">
                                    ⚠️ Please verify:
                                </p>
                                <ul class="text-amber-700 text-center font-medium mt-2">
                                    <li>1. Customer's name by checking their NRIC/Business Card</li>
                                    <li>2. Confirm you are the correct cafe location: <span class="text-transparent bg-clip-text bg-gradient-to-r from-blue-500 to-purple-500 font-bold">{{ $selected_cafe }}</span></li>
                                </ul>
                            </div>

                            <div class="flex justify-center gap-6 mt-8">
                                <form action="{{ route('ticket.verify.reject', ['ticket' => $ticket_id, 'uuid' => request()->route('uuid')]) }}" method="POST" class="w-full">
                                    @csrf
                                    <input type="hidden" name="cafe_id" value="{{ request()->query('cafe_id') }}">
                                    <button type="submit" class="w-full bg-gradient-to-r from-red-500 to-red-600 text-white rounded-lg px-6 py-4 text-lg font-medium hover:from-red-600 hover:to-red-700 transform hover:scale-[1.02] transition duration-200 shadow-lg hover:shadow-xl">
                                        <div class="flex items-center justify-center gap-2">
                                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                                            </svg>
                                            <span>Reject</span>
                                        </div>
                                    </button>
                                </form>

                                <form action="{{ route('ticket.verify.accept', ['ticket' => $ticket_id, 'uuid' => request()->route('uuid')]) }}" method="POST" class="w-full">
                                    @csrf
                                    <input type="hidden" name="cafe_id" value="{{ request()->query('cafe_id') }}">
                                    <button type="submit" class="w-full bg-gradient-to-r from-green-500 to-green-600 text-white rounded-lg px-6 py-4 text-lg font-medium hover:from-green-600 hover:to-green-700 transform hover:scale-[1.02] transition duration-200 shadow-lg hover:shadow-xl">
                                        <div class="flex items-center justify-center gap-2">
                                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                            </svg>
                                            <span>Accept</span>
                                        </div>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </main>

            <!-- Footer -->
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
