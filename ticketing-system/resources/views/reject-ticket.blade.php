<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>RWM Ticketing System - Rejected Ticket</title>
        <style>
            @font-face {
                font-family: 'Sofia Pro';
                src: url('/fonts/Sofia Pro Regular Az.otf') format('opentype');
                font-weight: 900;
                font-style: normal;
            }

            * {
                font-family: 'Sofia Pro', system-ui, -apple-system, sans-serif;
            }
        </style>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased bg-gradient-to-br from-red-50 via-white to-pink-50">
        <div class="min-h-screen flex flex-col">
            <!-- Header -->
            <header class="bg-white shadow-sm border-b">
                <div class="max-w-7xl mx-auto py-4 px-4 sm:py-6">
                    <h1 class="text-xl sm:text-2xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-red-600 to-pink-600 text-center sm:text-left">
                        Ticket Rejected
                    </h1>
                </div>
            </header>

            <!-- Main Content -->
            <main class="flex-1 px-4 sm:px-8 md:px-12">
                <div class="max-w-3xl mx-auto py-6 sm:py-12">
                    <div class="bg-white rounded-xl shadow-sm border border-red-200 p-6 sm:p-10">
                        <div class="text-center">
                            <div class="inline-block p-3 sm:p-4 rounded-full bg-red-100 mb-4 sm:mb-6">
                                <svg class="w-8 h-8 sm:w-12 sm:h-12 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                </svg>
                            </div>
                            
                            <h2 class="text-xl sm:text-2xl font-bold text-red-600 mb-3">{{ $message }}</h2>
                            
                            <div class="bg-red-50 border border-red-200 rounded-lg p-4 mb-6">
                                <p class="text-red-700 text-center font-medium">
                                    {{ $action }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
            
            <footer class="bg-white shadow-sm border-t mt-auto">
                <div class="max-w-7xl mx-auto py-3 sm:py-4 px-4 text-center">
                    <div class="text-xs sm:text-sm text-gray-600 mb-1">
                        Copyright © 2024 Wanderworks Lab, (SA0610699-K) ALL RIGHT'S RESERVED
                    </div>
                    <span
                        class="text-xs sm:text-sm font-medium text-transparent bg-clip-text bg-gradient-to-r from-blue-600 to-purple-600">
                        Powered by QuadraWebs
                    </span>
                </div>
            </footer>
        </div>
    </body>
</html>
