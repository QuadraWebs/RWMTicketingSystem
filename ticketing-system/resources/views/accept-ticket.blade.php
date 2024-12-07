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
                color: #172A91;
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
                    <div class="logo">
                        <img src="{{ asset('images/rwm-logo.png') }}" alt="RWM Logo" style="height: 40px;">
                    </div>
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

            <div class="footer">
                <div style="margin-top: 10px; color: #172A91; font-size: 13px;">
                    Need help? Contact us at <a href="mailto:hi@remotework.com.my" style="color: #EBA49E; text-decoration: none;">hi@remotework.com.my</a>
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
