@php
use Illuminate\Support\Str;
@endphp
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>RWM Ticketing System</title>
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
                box-shadow: 0 1px 3px rgba(0,0,0,0.1);
                border-bottom: 1px solid #e5e7eb;
                position: sticky;
                top: 0;
                z-index: 50;
            }

            .header-content {
                max-width: 80rem;
                margin: 0 auto;
                padding: 1rem;
                text-align: center;
                display: flex;
                flex-direction: column;
                align-items: center;
            }

            .system-title {
                font-size: 1.5rem;
                font-weight: bold;
                color: #172A91;
            }

            .welcome-text {
                font-size: 2rem;
                font-weight: 800;
                color: #1f2937;
            }

            .welcome-name {
                color: #EBA49E;
                font-size: 2rem;
                font-weight: 800;
                margin-bottom: 1rem;
            }

            .main-content {
                flex: 1;
                max-width: 120rem; /* Increased from 100rem */
                margin: 0 auto;
                padding: 1rem;
            }

            .ticket-card {
                background: white;
                border-radius: 0.5rem;
                box-shadow: 0 1px 2px rgba(0,0,0,0.05);
                border: 1px solid #e5e7eb;
                padding: 2rem; /* Increased from 1rem */
                margin-bottom: 1.5rem; /* Increased from 1rem */
                width: 100%;
            }

            .ticket-header {
                display: flex;
                flex-direction: column;
                gap: 0.5rem;
                margin-bottom: 1rem;
            }

            .package-name {
                font-size: 0.875rem;
                font-weight: 500;
                color: #6b7280;
            }
            
            .package-name:hover {
                background-color: #FFF5F4;
                color: #EBA49E;
                transform: translateY(-1px);
            }

            .package-title {
                font-size: 1.5rem;
                font-weight: 700;
                color: #1f2937;
                letter-spacing: -0.025em;
            }

            .package-name-wrapper {
                display: inline-block;
            }

            .status-badge {
                padding: 0.25rem 0.75rem;
                border-radius: 9999px;
                font-size: 0.875rem;
                display: inline-block;
                margin-bottom: 1rem;
            }

            .status-active {
                background: #dcfce7;
                color: #166534;
            }

            .status-inactive {
                background: #fee2e2;
                color: #991b1b;
            }

            .passes-count {
                font-size: 0.875rem;
                color: #172A91;
                background: #F0F7FF;
                padding: 0.25rem 0.5rem;
                border-radius: 0.25rem;
                display: inline-block;
            }

            .valid-until {
                font-size: 0.875rem;
                color: #4b5563;
                margin-top: 0.5rem;
            }

            .active-session {
                font-size: 0.875rem;
                background: #ecfdf5;
                color: #059669;
                padding: 0.5rem 1rem;
                border-radius: 0.5rem;
                margin-top: 0.5rem;
                display: inline-flex;
                align-items: center;
            }

            .session-dot {
                width: 0.5rem;
                height: 0.5rem;
                background: #10b981;
                border-radius: 50%;
                margin-right: 0.5rem;
            }

            .action-button {
                width: 100%;
                padding: 0.75rem 1rem;
                border-radius: 0.5rem;
                font-weight: 500;
                border: none;
                margin-top: 1rem;
                cursor: pointer;
                transition: background-color 0.2s;
            }

            .button-primary {
                background: #172A91;
                color: white;
            }

            .button-primary:hover {
                background: #131f69;
            }

            .button-disabled {
                background: #e2e8f0;
                color: #64748b;
                cursor: not-allowed;
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
                color: #172A91;
            }
            
            .package-description {
                font-size: 0.875rem;
                color: #6b7280;
                line-height: 0.75;
            }

            .entitlement-section {
                margin-top: 0.5rem;
                margin-bottom: 1rem;
            }

            .entitlement-title {
                font-size: 1rem;
                font-weight: 600;
                color: #374151;
                margin-bottom: 0.5rem;
            }

            @media (min-width: 640px) {
                .header-content {
                    text-align: left;
                    padding: 1.5rem 1rem;
                }

                .system-title {
                    font-size: 1.75rem;
                }

                .welcome-text {
                    font-size: 2.25rem;
                }
                            
                .main-content {
                    padding: 2rem; /* Increased from 0.25rem */
                }
                
                .ticket-card {
                    margin: 1rem 0; /* Increased from 0.5rem */
                    padding: 2rem; 
                }

                .logo {
                    display: flex;
                    align-items: center;
                }

                .logo img {
                    max-height: 40px;
                    width: auto;
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
                <p class="welcome-text">Welcome,</span></p>
                <p class="welcome-name">{{ $userName }}</p>

                @foreach($tickets as $ticket)
                    <div class="ticket-card">
                        <div class="ticket-header">
                            <h2 class="package-title">{{ $ticket['package_title'] }}</h2>
                            <div class="package-name-wrapper">
                                <span class="package-name">{{ $ticket['package_name'] }}</span>
                            </div>
                        </div>
                        <span class="status-badge {{ $ticket['status'] === 'active' ? 'status-active' : 'status-inactive' }}">
                            {{ ucfirst($ticket['status']) }}
                        </span>

                        <div class="entitlement-section">
                            <h3 class="entitlement-title">Entitlement</h3>
                            <p class="package-description">{!! nl2br(str_replace(search: '- ', replace: "<br>-", subject: $ticket['package_description'])) !!}</p>
                        </div>

                        <p class="passes-count">
                            Available Passes: {{ $ticket['is_unlimited'] ? 'Unlimited' : $ticket['available_pass'] }}
                        </p>

                        <p class="valid-until">Valid Until: {{ date('Y-m-d', strtotime($ticket['valid_until'])) }}</p>


                        @if($ticket['is_in_used'] && strtotime($ticket['end_time']) > time())
                        <div class="active-session">
                            <span class="session-dot"></span>
                            Active Session - Ends at: {{ $ticket['end_time'] }}
                        </div>
                        @endif

                        @if(($ticket['status'] === 'active' && !$ticket['is_in_used'] && ($ticket['is_unlimited'] || $ticket['available_pass'] > 0)) || ($ticket['is_in_used'] && strtotime($ticket['end_time']) < time()))
                            <form action="{{ route('ticket.checkin', ['uuid' => request()->segment(2)]) }}" method="POST">
                                @csrf
                                <input type="hidden" name="ticket_id" value="{{ $ticket['id'] }}">
                                <button type="submit" class="action-button button-primary">Use Ticket</button>
                            </form>
                        @else
                            <button class="action-button button-disabled">
                                {{ $ticket['is_in_used'] ? 'Ticket In Use' : ($ticket['available_pass'] <= 0 ? 'No Passes Available' : 'Ticket Inactive') }}
                            </button>
                        @endif
                    </div>
                @endforeach

            <div style="margin-top: 10px; color: #172A91; font-size: 13px;">
                Need help? Contact us at <a href="mailto:hi@remotework.com.my"
                    style="color: #EBA49E; text-decoration: none;">hi@remotework.com.my</a>
            </div>
            <!-- Social Media Icons -->
            <div style="margin-top: 10px; display:flex; justify-items:center; margin-bottom:10px">
                <a href="https://www.instagram.com/remoteworkmy/" style="display: inline-block; margin: 0 10px;">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="#172A91">
                        <path
                            d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z" />
                    </svg>
                </a>
                <a href="https://www.facebook.com/share/g/ibBdv366a6jYdJ87/?mibextid=K35XfP"
                    style="display: inline-block; margin: 0 10px;">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="#172A91">
                        <path
                            d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z" />
                    </svg>
                </a>
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
