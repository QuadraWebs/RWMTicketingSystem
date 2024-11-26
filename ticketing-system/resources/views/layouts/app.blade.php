<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Wanderworks Lab</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        @font-face {
            font-family: 'Sofia Pro';
            src: url('/fonts/Sofia Pro Regular Az.otf') format('opentype');
            font-weight: 900;
            font-style: normal;
        }

        * {
            font-family: 'Sofia Pro', system-ui, -apple-system, sans-serif;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        .container {
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            background: linear-gradient(135deg, #eff6ff 0%, #FFFFFF 50%, #f5f3ff 100%);
        }

        .header {
            background: white;
            box-shadow: 0 1px 3px rgba(0,0,0,0.1);
            border-bottom: 1px solid #e5e7eb;
            position: sticky;
            top: 0;
            z-index: 50;
        }

        .nav-container {
            max-width: 90rem;
            margin: 0 auto;
            padding: 0 1rem;
        }

        .nav-content {
            display: flex;
            justify-content: space-between;
            height: 4rem;
        }

        .nav-left {
            display: flex;
            align-items: center;
        }

        .brand-link {
            display: flex;
            align-items: center;
            text-decoration: none;
        }

        .brand-icon {
            color: #2563eb;
            font-size: 1.5rem;
            margin-right: 0.5rem;
        }

        .brand-text {
            font-size: 1.25rem;
            font-weight: bold;
            background: linear-gradient(90deg, #2563eb, #9333ea);
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
        }

        .nav-links {
            display: none;
            margin-left: 2.5rem;
            gap: 2rem;
        }

        .nav-link {
            display: inline-flex;
            align-items: center;
            padding: 0.25rem;
            font-size: 0.875rem;
            font-weight: 500;
            color: #4b5563;
            text-decoration: none;
            border-bottom: 2px solid transparent;
            transition: all 0.2s;
        }

        .nav-link:hover {
            color: #2563eb;
            border-bottom-color: #2563eb;
        }

        .nav-link.active {
            color: #2563eb;
            border-bottom-color: #2563eb;
        }

        .nav-right {
            display: flex;
            align-items: center;
        }

        .user-menu {
            position: relative;
        }

        .user-button {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            padding: 0.5rem;
            color: #4b5563;
            cursor: pointer;
            border: none;
            background: none;
        }

        .user-button:hover {
            color: #1f2937;
        }

        .dropdown-menu {
            position: absolute;
            right: 0;
            top: 100%;
            width: 12rem;
            background: white;
            border-radius: 0.5rem;
            box-shadow: 0 4px 6px -1px rgba(0,0,0,0.1);
            padding: 0.25rem;
            margin-top: 0.5rem;
        }

        .dropdown-link {
            display: block;
            padding: 0.5rem 1rem;
            color: #4b5563;
            text-decoration: none;
            font-size: 0.875rem;
        }

        .dropdown-link:hover {
            background: #eff6ff;
            color: #2563eb;
            border-radius: 0.375rem;
        }

        .dropdown-divider {
            border-top: 1px solid #e5e7eb;
            margin: 0.25rem 0;
        }

        .dropdown-link.danger {
            color: #dc2626;
        }

        .dropdown-link.danger:hover {
            background: #fef2f2;
            color: #dc2626;
        }

        .main-content {
            flex: 1;
        }

        .footer {
            background: white;
            border-top: 1px solid #e5e7eb;
            padding: 1rem;
            text-align: center;
            margin-top: auto;
        }

        .copyright {
            font-size: 0.75rem;
            color: #4b5563;
            margin-bottom: 0.25rem;
        }

        .powered-by {
            font-size: 0.75rem;
            font-weight: 500;
            background: linear-gradient(90deg, #2563eb, #9333ea);
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
        }

        @media (min-width: 640px) {
            .nav-links {
                display: flex;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <header class="header">
            <div class="nav-container">
                <div class="nav-content">
                    <div class="nav-left">
                        <a href="{{ url('/home') }}" class="brand-link">
                            <i class="fas fa-ticket-alt brand-icon"></i>
                            <span class="brand-text">Wanderworks Lab</span>
                        </a>
                        
                        <div class="nav-links">
                            @auth
                                <a href="{{ route('home') }}" class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}">
                                    Dashboard
                                </a>
                                <a href="{{ route('admin.subscribers') }}" class="nav-link {{ request()->routeIs('admin.subscribers') ? 'active' : '' }}">
                                    Subscribers
                                </a>
                                <a href="{{ route('admin.package') }}" class="nav-link {{ request()->routeIs('admin.package') ? 'active' : '' }}">
                                    My Package
                                </a>
                                <a href="{{ route('admin.history') }}" class="nav-link {{ request()->routeIs('admin.history') ? 'active' : '' }}">
                                    History
                                </a>
                            @endauth
                        </div>
                    </div>

                    <div class="nav-right">
                        @guest
                            @if (Route::has('login'))
                                <a href="{{ route('login') }}" class="nav-link">
                                    {{ __('Login') }}
                                </a>
                            @endif
                        @else
                            <div class="user-menu" x-data="{ open: false }">
                                <button @click="open = !open" class="user-button">
                                    <span>{{ Auth::user()->name }}</span>
                                    <i class="fas fa-chevron-down"></i>
                                </button>

                                <div x-show="open" @click.away="open = false" class="dropdown-menu">
                                    <a href="#" class="dropdown-link">Profile</a>
                                    <a href="#" class="dropdown-link">Settings</a>
                                    <div class="dropdown-divider"></div>
                                    <a href="{{ route('login') }}" 
                                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                                        class="dropdown-link danger">
                                        {{ __('Logout') }}
                                    </a>
                                </div>
                            </div>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                                @csrf
                                <input type="hidden" name="redirect" value="{{ route('login') }}">
                            </form>
                        @endguest
                    </div>
                </div>
            </div>
        </header>

        <main class="main-content">
            @yield('content')
        </main>

        <footer class="footer">
            <div class="copyright">
                Copyright © 2024 Wanderworks Lab, (SA0610699-K) ALL RIGHT'S RESERVED
            </div>
            <div class="powered-by">
                Powered by QuadraWebs
            </div>
        </footer>
    </div>

    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
</body>
</html>
