<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>RWM Ticketing System</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased bg-gradient-to-br from-blue-50 via-white to-purple-50">
    <div class="min-h-screen flex flex-col relative">
        <!-- Mobile-Optimized Header -->
        <header class="bg-white shadow-sm border-b sticky top-0 z-50">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between h-16">
                    <div class="flex items-center">
                        <a href="{{ url('/') }}" class="flex items-center">
                            <i class="fas fa-ticket-alt text-blue-600 text-2xl mr-2"></i>
                            <span class="text-xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-blue-600 to-purple-600">
                                RWM Ticketing System
                            </span>
                        </a>
                        
                        <div class="hidden space-x-8 sm:flex sm:ml-10">
                            @auth
                                <a href="{{ route('home') }}" class="inline-flex items-center px-1 pt-1 text-sm font-medium text-gray-900 border-b-2 border-transparent hover:border-blue-600">
                                    Dashboard
                                </a>
                                <a href="{{ route('admin.subscribers') }}" class="inline-flex items-center px-1 pt-1 text-sm font-medium {{ request()->routeIs('admin.subscribers') ? 'text-blue-600 border-b-2 border-blue-600' : 'text-gray-500 border-b-2 border-transparent hover:border-blue-600' }}">
                                    Subscribers
                                </a>
                                <a href="{{ route('admin.tickets') }}" class="inline-flex items-center px-1 pt-1 text-sm font-medium {{ request()->routeIs('tickets') ? 'text-blue-600 border-b-2 border-blue-600' : 'text-gray-500 border-b-2 border-transparent hover:border-blue-600' }}">
                                    My Tickets
                                </a>
                                <a href="{{ route('admin.history') }}" class="inline-flex items-center px-1 pt-1 text-sm font-medium {{ request()->routeIs('history') ? 'text-blue-600 border-b-2 border-blue-600' : 'text-gray-500 border-b-2 border-transparent hover:border-blue-600' }}">
                                    History
                                </a>
                            @endauth
                        </div>
                    </div>

                    <div class="flex items-center">
                        @guest
                            @if (Route::has('login'))
                                <a href="{{ route('login') }}" class="text-sm text-gray-700 hover:text-blue-600 mr-4">
                                    {{ __('Login') }}
                                </a>
                            @endif

                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="hidden bg-gradient-to-r from-blue-600 to-purple-600 text-white px-4 py-2 rounded-lg text-sm font-medium hover:opacity-90">
                                    {{ __('Register') }}
                                </a>
                            @endif
                        @else
                            <button class="mr-4 relative text-gray-500 hover:text-gray-700">
                                <i class="fas fa-bell text-xl"></i>
                                <span class="absolute top-0 right-0 -mt-1 -mr-1 px-2 py-0.5 text-xs text-white bg-gradient-to-r from-blue-600 to-purple-600 rounded-full">3</span>
                            </button>

                            <div class="relative" x-data="{ open: false }">
                                <button @click="open = !open" class="flex items-center space-x-2 text-gray-700 hover:text-gray-900">
                                    <img src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->name) }}" alt="Profile" class="h-8 w-8 rounded-full">
                                    <span class="text-sm font-medium">{{ Auth::user()->name }}</span>
                                    <i class="fas fa-chevron-down text-xs"></i>
                                </button>

                                <div x-show="open" @click.away="open = false" class="absolute right-0 mt-2 w-48 bg-white rounded-lg shadow-lg py-1">
                                    <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-blue-50">Profile</a>
                                    <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-blue-50">Settings</a>
                                    <div class="border-t border-gray-100"></div>
                                    <a href="{{ route('login') }}" 
                                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                                    class="block px-4 py-2 text-sm text-red-600 hover:bg-red-50">
                                        {{ __('Logout') }}
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                                        @csrf
                                        <input type="hidden" name="redirect" value="{{ route('login') }}">
                                    </form>
                                </div>
                            </div>
                        @endguest
                    </div>
                </div>
            </div>
        </header>

        <!-- Main Content -->
        <main class="flex-1">
            @yield('content')
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

    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
</body>
</html>
