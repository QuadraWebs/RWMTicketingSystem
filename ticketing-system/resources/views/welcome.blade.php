@php
use Illuminate\Support\Str;
@endphp
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>RWM Ticketing System</title>
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased bg-gradient-to-br from-blue-50 via-white to-purple-50">
        <div class="min-h-screen flex flex-col relative">
            <!-- Mobile-Optimized Header -->
            <header class="bg-white shadow-sm border-b sticky top-0 z-50">
                <div class="max-w-7xl mx-auto py-4 px-4 sm:py-6">
                    <div class="space-y-2 text-center sm:text-left">
                        <h1 class="text-xl sm:text-2xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-blue-600 to-purple-600">
                            RWM Ticketing System
                        </h1>
                        <p class="text-2xl sm:text-3xl font-extrabold text-gray-800">
                            Welcome, <span class="text-transparent bg-clip-text bg-gradient-to-r from-blue-500 to-purple-500">{{ $userName }}</span>
                        </p>
                    </div>
                </div>
            </header>

            <!-- Responsive Main Content -->
            <main class="flex-1 pt-[header-height] pb-[footer-height]">
                <div class="max-w-7xl mx-auto py-4 sm:py-6 px-4">
                    <div class="grid grid-cols-1 gap-8 sm:gap-10">
                        @foreach($tickets as $ticket)
                        <div class="bg-white rounded-lg shadow-sm border p-4 sm:p-6 mb-8">
                            <div class="flex flex-col sm:flex-row sm:justify-between sm:items-center gap-2">
                                <h2 class="text-lg sm:text-xl font-semibold text-gray-800">
                                    {{ $ticket['package_name'] }}
                                </h2>
                                <span class="inline-block px-3 py-1 rounded-full text-sm {{ $ticket['status'] === 'active' ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                    {{ ucfirst($ticket['status']) }}
                                </span>
                            </div>
                            <div class="mt-4 space-y-2">
                                <div class="flex flex-col sm:flex-row sm:justify-between sm:items-center gap-1">
                                    <p class="text-sm">
                                        Available Passes: 
                                        <span class="font-semibold text-blue-600 bg-blue-50 px-2 py-1 rounded">
                                            {{ $ticket['is_unlimited'] ? 'Unlimited' : $ticket['available_pass'] }}
                                        </span>
                                    </p>
                                </div>

                                <p class="text-sm text-gray-600">
                                    Valid Until: {{ $ticket['valid_until'] }}
                                </p>

                                @if($ticket['is_in_used'] && strtotime($ticket['end_time']) > time())
                                    <p class="text-sm font-medium bg-green-50 text-green-600 px-3 py-2 rounded-lg inline-block">
                                        <span class="flex items-center">
                                            <span class="w-2 h-2 bg-green-500 rounded-full mr-2"></span>
                                            Active Session - Ends at: {{ $ticket['end_time'] }}
                                        </span>
                                    </p>
                                @endif
                            </div>
                            <div class="mt-4 sm:mt-6">
                                @if(($ticket['status'] === 'active' && !$ticket['is_in_used'] && ($ticket['is_unlimited'] || $ticket['available_pass'] > 0)) || ($ticket['is_in_used'] && strtotime($ticket['end_time']) < time()))
                                    <form action="{{ route('ticket.checkin', ['uuid' => request()->segment(2)]) }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="ticket_id" value="{{ $ticket['id'] }}">
                                        <button type="submit" class="w-full bg-blue-600 text-white rounded-lg px-4 py-3 text-sm sm:text-base font-medium hover:bg-blue-700 transition duration-200 ease-in-out">
                                            Use Ticket
                                        </button>
                                    </form>
                                @else
                                    <button class="w-full bg-slate-200 text-slate-500 rounded-lg px-4 py-3 text-sm sm:text-base font-medium cursor-not-allowed">
                                        {{ $ticket['is_in_used'] ? 'Ticket In Use' : ($ticket['available_pass'] <= 0 ? 'No Passes Available' : 'Ticket Inactive') }}
                                    </button>
                                @endif
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </main>

            <!-- Mobile-Friendly Footer -->
            <footer class="bg-white shadow-sm border-t sticky bottom-0 z-50">
                <div class="max-w-7xl mx-auto py-3 px-4 text-center">
                    <span class="text-xs sm:text-sm font-medium text-transparent bg-clip-text bg-gradient-to-r from-blue-600 to-purple-600">
                        Powered by QuadraWebs
                    </span>
                </div>
            </footer>
        </div>
    </body>
</html>
