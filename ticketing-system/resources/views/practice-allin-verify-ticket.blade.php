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
            margin: 0.5rem auto;
            background: white;
            border-radius: 0.75rem;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
            border: 1px solid #e5e7eb;
            padding: 1rem;
        }

        .card-header {
            text-align: center;
            margin-bottom: 1rem;
        }

        .icon-container {
            display: inline-block;
            padding: 0.75rem; 
            background: #F0F7FF;
            border-radius: 9999px;
            margin-bottom: 0.75rem;
        }

        .icon {
            width: 2.5rem; 
            height: 2.5rem; 
            color: #172A91;
        }

        .card-title {
            font-size: 1.25rem;
            font-weight: bold;
            color: #111827;
        }

        .info-section {
            background: #f9fafb;
            border-radius: 0.5rem;
            padding: 0.75rem; 
        }

        .info-row {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;  
            margin-bottom: 0.25rem;
            gap: 1rem; 
        }

        .info-label {
            color: #6b7280;
            flex: 0 0 auto; 
            min-width: 100px; 
        }

        .info-value {
            font-weight: 500;
            color: #111827;
            flex: 1;  
            text-align: right;
            word-wrap: break-word;  
            max-width: 60%;
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
            padding: 0.75rem;
        }

        .warning-title {
            color: #b45309;
            text-align: center;
            font-weight: 500;
            margin-bottom: 0.25rem; 
            font-size: 0.9rem; 
        }
        
        .warning-list li {
            margin-bottom: 0.25rem; 
        }

        .warning-list {
            color: #b45309;
            text-align: center;
            font-weight: 500;
            list-style: none;
            font-size: 0.85rem; 
            margin: 0; 
            padding: 0; 
        }

        .button-group {
            display: flex;
            justify-content: space-between;
            margin-top: 0.75rem;
            width: 100%;
        }

        .button-form {
            width: 48%;
        }

        .button {
            width: 100%;
            padding: 0.75rem;
            border: none;
            border-radius: 0.5rem;
            font-size: 1rem; 
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
            width: 1.25rem; 
            height: 1.25rem;
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
                margin: 0.25rem;
                padding: 0.75rem;
            }

            .button-group {
                flex-direction: row;
            }

            .info-row {
                flex-direction: row;
                align-items: flex-start;
                gap: 0.5rem;
                justify-content: space-between; 
            }

            .info-label {
                flex: 1; 
                text-align: left;
                font-size: 0.9rem;
            }

            .info-value {
                flex: 1;
                text-align: right;
                font-size: 0.9rem;
            }
            .card-title {
                font-size: 1.1rem; 
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
                    <!-- <div class="icon-container">
                        <svg class="icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div> -->
                    <h2 class="card-title">Pending Verification</h2>
                    <p style="color: #6b7280; margin-top: 0.5rem; font-size: 0.9rem;">Your responsibility as host:</p>
                    @if($package->title === 'Coworking pass')
                        <!-- <p style="color: #374151; margin-top: 0.5rem; font-size: 0.9rem;">{{ $package->title }}</p> -->
                        <p style="color: #374151; margin-top: 0.25rem; font-size: 0.9rem;">Collect payment as usual</p>
                    @elseif($package->title === 'All-in pass')
                        <!-- <p style="color: #374151; margin-top: 0.5rem; font-size: 0.9rem;">{{ $package->title }}</p> -->
                        <div style="color: #374151; font-size: 0.9rem; text-align: left;">
                            <p style="margin-bottom: 0.25rem;">For bill less than RM25, customer does not need to pay. The bill will be settled separately.</p>
                            <p style="margin-bottom: 0.25rem;">For bill more than RM25, collect the excess.</p>
                            <p>E.g. If customer spends RM30, you will deduct RM25 and collect RM5 from customer.</p>
                        </div>
                    @endif
                </div>

                <div class="info-section">
                    @if($ticket->is_unlimited)
                        <div class="info-row">
                            <span class="info-label">Customer:</span>
                            <span class="gradient-text">{{ $customer_name }}</span>
                        </div>
                    @endif
                    <div class="info-row">
                        <span class="info-label">WorkSpace:</span>
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
                        <span class="info-label">Status:</span>
                        <span class="status-badge">
                            <svg class="status-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            <span class="status-text">Pending</span>
                        </span>
                    </div>
                    <div class="info-row">
                        <span class="info-label">Included in Pass:</span>
                    </div>
                    <div class="package-description">{{ $package->description }}</div>

                    <p style="margin-top: 0.2rem; font-size: 0.9rem;">
                        Review your café information page 
                        <a href="https://remotework.com.my/map/" 
                        target="_blank" 
                        style="color: #172A91; text-decoration: underline;">
                        here.
                        </a>
                    </p>
                    <p style="margin-top: 0.5rem; font-size: 0.9rem; color: #6b7280;">
                        You can screenshot this for your own record.
                    </p>
                </div>

                <div class="warning-section">
                    <p class="warning-title">⚠️ I've verified:</p>
                    <ul class="warning-list">
                        @if($ticket->is_unlimited)
                            <li>1. Customer with a photo ID with the same name</li>
                            <li>2. that this is the correct WorkSpace: <span
                                    class="gradient-text">{{ $selected_cafe }}</span></li>
                        @else
                            <li>1. that this is the correct WorkSpace: <span
                                    class="gradient-text">{{ $selected_cafe }}</span></li>
                        @endif
                    </ul>
                </div>

                <div class="button-group">
                    <form class="button-form" action="{{ route('ticket.practice.verify.reject') }}" method="POST">
                        @csrf
                        <input type="hidden" name="cafe_id" value="{{ request()->query('cafe_id') }}">
                        <button type="submit" class="button button-reject">
                            <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                            </svg>
                            Cancel
                        </button>
                    </form>

                    <form class="button-form" action="{{ route('ticket.practice.verify.accept') }}" method="POST">
                        @csrf
                        <input type="hidden" name="cafe_id" value="{{ request()->query('cafe_id') }}">
                        <button type="submit" class="button button-accept">
                            <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                            </svg>
                            Check in
                        </button>
                    </form>
                </div>
            </div>
        </main>

        <div class="footer">
            <div style="margin-top: 10px; color: #172A91; font-size: 13px;">
                Need help? Contact us at <a href="mailto:hi@remotework.com.my" style="color: #EBA49E; text-decoration: none;">hi@remotework.com.my</a> or <a href="tel:+60107973713" style="color: #EBA49E; text-decoration: none;">+60107973713</a>
            </div>
            <!-- Social Media Icons -->
            <div style="margin-top: 10px; margin-bottom:10px">
                <a href="https://www.instagram.com/remoteworkmy/" style="display: inline-block; margin: 0 10px;">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="#172A91">
                        <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/>
                    </svg>
                </a>
                <a href="https://www.facebook.com/share/g/ibBdv366a6jYdJ87/?mibextid=K35XfP"
                    style="display: inline-block; margin: 0 10px;">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="#172A91">
                        <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/>
                    </svg>
                </a>
            </div>

            <div class="copyright">
                Copyright © 2024 Wanderworks Lab, (SA0610699-K)<br>
                ALL RIGHT'S RESERVED
            </div>

            <div class="powered-by">
                <a href="https://www.quadrawebs.com" target="_blank" style="color: #172A91; text-decoration: none;">
                    Powered by QuadraWebs
                </a>
            </div>
        </div>
    </div>
</body>

</html>