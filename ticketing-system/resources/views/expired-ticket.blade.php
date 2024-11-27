<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>RWM Ticketing System - Expired Ticket</title>
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
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
            border-bottom: 1px solid #e5e7eb;
        }

        .header-content {
            max-width: 90rem;
            margin: 0 auto;
            padding: 1rem;
        }

        .header-title {
            font-size: 1.5rem;
            font-weight: bold;
            background: linear-gradient(90deg, #2563eb, #7c3aed);
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
            text-align: center;
        }

        .main-content {
            flex: 1;
            padding: 1rem;
        }

        .expired-card {
            max-width: 48rem;
            margin: 1rem auto;
            background: white;
            border-radius: 0.75rem;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
            border: 1px solid #e5e7eb;
            padding: 1.5rem;
        }

        .card-content {
            text-align: center;
        }

        .icon-container {
            display: inline-block;
            padding: 1rem;
            background: #fee2e2;
            border-radius: 9999px;
            margin-bottom: 1rem;
        }

        .expired-icon {
            width: 3rem;
            height: 3rem;
            color: #dc2626;
        }

        .expired-title {
            font-size: 1.5rem;
            font-weight: bold;
            color: #1f2937;
            margin-bottom: 0.75rem;
        }

        .expired-message {
            background: #fee2e2;
            border: 1px solid #fecaca;
            border-radius: 0.5rem;
            padding: 1rem;
            color: #991b1b;
            font-weight: 500;
            text-align: center;
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

        .logo {
            display: flex;
            align-items: center;
        }

        .logo img {
            max-height: 40px;
            width: auto;
        }

        @media (max-width: 640px) {
            .expired-card {
                margin: 0.5rem;
                padding: 1rem;
            }

            .header-title {
                font-size: 1.25rem;
            }

            .expired-title {
                font-size: 1.25rem;
            }
        }
    </style>
</head>

<body>
    <div class="container">
        <header class="header">
            <div class="header-content">
                <div class="logo">
                    <img src="{{ asset('images/rwm-logo.png') }}" alt="RWM Logo" style="height: 40px;">
                </div>
            </div>
        </header>

        <main class="main-content">
            <div class="expired-card">
                <div class="card-content">
                    <div class="icon-container">
                        <svg class="expired-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>

                    <h2 class="expired-title">{{ $message }}</h2>

                    <div class="expired-message">
                        <p>{{ $action }}</p>
                    </div>
                </div>
            </div>
        </main>

        <footer class="footer">
            <div class="copyright">
                Copyright © 2024 Wanderworks Lab, (SA0610699-K)<br>
                ALL RIGHT'S RESERVED
            </div>
            <div class="powered-by">
                Powered by QuadraWebs
            </div>
        </footer>
    </div>
</body>

</html>