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
                background: linear-gradient(135deg, #F0F7FF 0%, #FFFFFF 50%, #FAF5FF 100%);
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
            }

            .system-title {
                font-size: 1.5rem;
                font-weight: bold;
                background: linear-gradient(90deg, #2563eb, #9333ea);
                -webkit-background-clip: text;
                background-clip: text;
                color: transparent;
            }

            .welcome-text {
                font-size: 2rem;
                font-weight: 800;
                color: #1f2937;
                margin-top: 0.5rem;
            }

            .welcome-name {
                background: linear-gradient(90deg, #3b82f6, #8b5cf6);
                -webkit-background-clip: text;
                background-clip: text;
                color: transparent;
            }

            .main-content {
                flex: 1;
                max-width: 120rem; /* Increased from 100rem */
                margin: 0 auto;
                padding: 2rem;
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
                background-color: #e0e7ff;
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
                color: #2563eb;
                background: #eff6ff;
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
                background: #2563eb;
                color: white;
            }

            .button-primary:hover {
                background: #1d4ed8;
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
                background: linear-gradient(90deg, #2563eb, #9333ea);
                -webkit-background-clip: text;
                background-clip: text;
                color: transparent;
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
            }
        </style>
    </head>
    <body>
        <div class="container">
            <header class="header">
                <div class="header-content">
                    <h1 class="system-title">RWM Ticketing System</h1>
                    <p class="welcome-text">Welcome, <span class="welcome-name">{{ $userName }}</span></p>
                </div>
            </header>

            <main class="main-content">
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

                        <p class="valid-until">Valid Until: {{ $ticket['valid_until'] }}</p>

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
    </body>
</html>
