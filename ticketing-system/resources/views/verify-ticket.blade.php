<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>RWM Ticketing System - Verify Ticket</title>
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
            background: #FFFFFF;
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

        .system-title {
            font-size: 1.5rem;
            font-weight: bold;
            background: linear-gradient(90deg, #2563eb, #9333ea);
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
            text-align: center;
        }

        .main-content {
            flex: 1;
            padding: 1rem;
        }

        .alert {
            max-width: 48rem;
            margin: 0 auto 1rem;
            padding: 0.75rem 1rem;
            border-radius: 0.375rem;
        }

        .alert-success {
            background: #ecfdf5;
            border: 1px solid #34d399;
            color: #065f46;
        }

        .alert-error {
            background: #fef2f2;
            border: 1px solid #f87171;
            color: #991b1b;
        }

        .verify-card {
            max-width: 48rem;
            margin: 1rem auto;
            background: white;
            border-radius: 0.75rem;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
            border: 1px solid #e5e7eb;
            padding: 1.5rem;
        }

        .card-header {
            text-align: center;
            margin-bottom: 1.5rem;
        }

        .icon-container {
            display: inline-block;
            padding: 1rem;
            background: #F0F7FF;
            border-radius: 9999px;
            margin-bottom: 1rem;
        }

        .icon {
            width: 3rem;
            height: 3rem;
            color: #172A91;
        }

        .card-title {
            font-size: 1.5rem;
            font-weight: bold;
            color: #111827;
        }

        .info-section {
            background: #f9fafb;
            border-radius: 0.5rem;
            padding: 1rem;
            margin-bottom: 1.5rem;
        }

        .info-row {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 0.5rem;
        }

        .info-label {
            color: #6b7280;
        }

        .info-value {
            font-weight: 500;
            color: #111827;
        }

        .gradient-text {
            -webkit-background-clip: text;
            background-clip: text;
            color: #EBA49E;
            font-weight: bold;
        }

        .package-description {
            background: white;
            border: 1px solid #e5e7eb;
            border-radius: 0.5rem;
            padding: 1rem;
            margin-top: 0.5rem;
            white-space: pre-line;
            font-size: 0.875rem;
            color: #374151;
        }

        .status-badge {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            padding: 0.5rem 1rem;
            border-radius: 9999px;
            background: #F0F7FF;
            border: 1px solid #172A91;
        }

        .status-icon {
            width: 1.25rem;
            height: 1.25rem;
            color: #172A91;
        }

        .status-text {
            font-weight: bold;
            color: #172A91;
        }

        .warning-section {
            background: #fffbeb;
            border: 1px solid #fcd34d;
            border-radius: 0.5rem;
            padding: 1rem;
            margin: 1.5rem 0;
        }

        .warning-title {
            color: #b45309;
            text-align: center;
            font-weight: 500;
            margin-bottom: 0.5rem;
        }

        .warning-list {
            color: #b45309;
            text-align: center;
            font-weight: 500;
            list-style: none;
        }

        .button-group {
            display: flex;
            justify-content: space-between;
            margin-top: 2rem;
            width: 100%;
        }

        .button-form {
            width: 48%;
        }

        .button {
            width: 100%;
            padding: 1rem;
            border: none;
            border-radius: 0.5rem;
            font-size: 1.125rem;
            font-weight: 500;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
            transition: all 0.2s;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }

        .button:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
        }
        
        .button svg {
            width: 1.5rem;
            height: 1.5rem;
        }

        .button-reject {
            background: #EBA49E;
            color: white;
        }

        .button-accept {
            background: #172A91;
            color: white;
        }

        .button-reject:hover {
            background: #e59089;
        }

        .button-accept:hover {
            background: #131f69;
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
            color: #172A91;
        }

        .logo {
            display: flex;
            justify-content: center;
            width: 100%;
        }

        .logo img {
            max-height: 40px;
            width: auto;
        }

        @media (max-width: 640px) {
            .verify-card {
                margin: 0.5rem;
                padding: 1rem;
            }

            .button-group {
                flex-direction: row;
            }

            .info-row {
                flex-direction: column;
                align-items: flex-start;
                gap: 0.25rem;
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
            @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            @if (session('error'))
                <div class="alert alert-error">{{ session('error') }}</div>
            @endif

            <div class="verify-card">
                <div class="card-header">
                    <div class="icon-container">
                        <svg class="icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <h2 class="card-title">Pending Verification</h2>
                </div>

                <div class="info-section">
                    @if($ticket->is_unlimited)
                        <div class="info-row">
                            <span class="info-label">Customer:</span>
                            <span class="gradient-text">{{ $customer_name }}</span>
                        </div>
                    @endif
                    <div class="info-row">
                        <span class="info-label">Cafe:</span>
                        <span class="info-value">{{ $selected_cafe }}</span>
                    </div>
                    <div class="info-row">
                        <span class="info-label">Check-in Date:</span>
                        <span class="info-value">{{ now()->format('F d, Y') }}</span>
                    </div>
                    <div class="info-row">
                        <span class="info-label">Check-in Time:</span>
                        <span class="info-value">{{ now()->format('h:i A') }}</span>
                    </div>
                    <div class="info-row">
                        <span class="info-label">Check-out Time:</span>
                        <span class="info-value">{{ $end_time->format('h:i A') }}</span>
                    </div>
                    <div class="info-row">
                        <span class="info-label">Included in Pass:</span>
                    </div>
                    <div class="package-description">{{ $package->description }}</div>
                    <div class="info-row">
                        <span class="info-label">Status:</span>
                        <span class="status-badge">
                            <svg class="status-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            <span class="status-text">Pending</span>
                        </span>
                    </div>
                </div>

                <div class="warning-section">
                    <p class="warning-title">⚠️ I've verify:</p>
                    <ul class="warning-list">
                        @if($ticket->is_unlimited)
                            <li>1. Customer with a photo ID with the same name</li>
                            <li>2. that this is the correct WorkSpace: <span
                                    class="gradient-text">{{ $selected_cafe }}</span></li>
                        @else
                            <li>1. that this is the correcetr WorkSpace: <span
                                    class="gradient-text">{{ $selected_cafe }}</span></li>
                        @endif
                    </ul>
                </div>

                <div class="button-group">
                    <form class="button-form" action="{{ route('ticket.verify.reject', ['ticket' => $ticket_id, 'uuid' => request()->route('uuid')]) }}" method="POST">
                        @csrf
                        <input type="hidden" name="cafe_id" value="{{ request()->query('cafe_id') }}">
                        <button type="submit" class="button button-reject">
                            <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                            </svg>
                            Reject
                        </button>
                    </form>

                    <form class="button-form" action="{{ route('ticket.verify.accept', ['ticket' => $ticket_id, 'uuid' => request()->route('uuid')]) }}" method="POST">
                        @csrf
                        <input type="hidden" name="cafe_id" value="{{ request()->query('cafe_id') }}">
                        <button type="submit" class="button button-accept">
                            <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                            </svg>
                            Accept
                        </button>
                    </form>
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