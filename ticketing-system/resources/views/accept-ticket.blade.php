<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>RWM Ticketing System - Accepted Ticket</title>
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
                background: linear-gradient(135deg, #ecfdf5 0%, #FFFFFF 50%, #f0fdf9 100%);
            }

            .header {
                background: white;
                box-shadow: 0 1px 3px rgba(0,0,0,0.1);
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
                background: linear-gradient(90deg, #059669, #10b981);
                -webkit-background-clip: text;
                background-clip: text;
                color: transparent;
                text-align: center;
            }

            .main-content {
                flex: 1;
                padding: 1rem;
            }

            .success-card {
                max-width: 48rem;
                margin: 1rem auto;
                background: white;
                border-radius: 0.75rem;
                box-shadow: 0 1px 3px rgba(0,0,0,0.1);
                border: 1px solid #d1fae5;
                padding: 1.5rem;
            }

            .card-content {
                text-align: center;
            }

            .icon-container {
                display: inline-block;
                padding: 1rem;
                background: #ecfdf5;
                border-radius: 9999px;
                margin-bottom: 1rem;
            }

            .success-icon {
                width: 3rem;
                height: 3rem;
                color: #059669;
            }

            .success-title {
                font-size: 1.5rem;
                font-weight: bold;
                color: #059669;
                margin-bottom: 0.75rem;
            }

            .success-message {
                background: #ecfdf5;
                border: 1px solid #a7f3d0;
                border-radius: 0.5rem;
                padding: 1rem;
                color: #047857;
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

            @media (max-width: 640px) {
                .success-card {
                    margin: 0.5rem;
                    padding: 1rem;
                }

                .header-title {
                    font-size: 1.25rem;
                }

                .success-title {
                    font-size: 1.25rem;
                }
            }
        </style>
    </head>
    <body>
        <div class="container">
            <header class="header">
                <div class="header-content">
                    <h1 class="header-title">Ticket Accepted</h1>
                </div>
            </header>

            <main class="main-content">
                <div class="success-card">
                    <div class="card-content">
                        <div class="icon-container">
                            <svg class="success-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                            </svg>
                        </div>
                        
                        <h2 class="success-title">{{ $message }}</h2>
                        
                        <div class="success-message">
                            <p>{{ $action }}</p>
                        </div>
                    </div>
                </div>
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
