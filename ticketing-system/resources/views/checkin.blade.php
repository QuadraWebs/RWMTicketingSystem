<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>RWM Ticketing System - Check In</title>
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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

        .nav-container {
            max-width: 90rem;
            margin: 0 auto;
            padding: 1rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .system-title {
            font-size: 1.5rem;
            font-weight: bold;
            background: linear-gradient(90deg, #2563eb, #9333ea);
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
        }

        .current-date {
            font-size: 0.875rem;
            color: #6b7280;
        }

        .main-content {
            flex: 1;
            padding: 1rem;
        }

        .checkin-card {
            max-width: 48rem;
            margin: 2rem auto;
            background: white;
            border-radius: 0.75rem;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
            border: 1px solid #e5e7eb;
            padding: 2rem;
        }

        .card-header {
            text-align: center;
            margin-bottom: 2rem;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .icon-container {
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 0.75rem;
            background: #F0F7FF;
            border-radius: 50%;
            margin-bottom: 1rem;
            width: 3.5rem;
            height: 3.5rem;
        }

        .icon {
            width: 2rem;
            height: 2rem;
            color: #172A91;
        }

        .card-title {
            font-size: 1.5rem;
            font-weight: bold;
            color: #111827;
        }

        .search-container {
            position: relative;
            margin-bottom: 1rem;
        }

        .search-label {
            display: block;
            font-size: 0.875rem;
            font-weight: 500;
            color: #374151;
            margin-bottom: 0.5rem;
        }

        .search-input {
            width: 100%;
            padding: 0.75rem 1rem;
            border: 1px solid #d1d5db;
            border-radius: 0.5rem;
            background: #f9fafb;
            font-size: 1rem;
        }

        .search-results {
            position: absolute;
            width: 100%;
            background: white;
            border: 1px solid #e5e7eb;
            border-radius: 0.5rem;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
            max-height: 15rem;
            overflow-y: auto;
            z-index: 50;
        }

        .result-item {
            padding: 0.75rem 1rem;
            border-bottom: 1px solid #e5e7eb;
            cursor: pointer;
        }

        .result-item:hover {
            background: #F0F7FF;
            color: #172A91;
        }

        .result-name {
            font-weight: 500;
            color: #111827;
        }

        .result-address {
            font-size: 0.875rem;
            color: #6b7280;
        }

        .submit-button {
            width: 100%;
            padding: 0.75rem 1rem;
            background: #172A91;
            color: white;
            border: none;
            border-radius: 0.5rem;
            font-size: 1.125rem;
            font-weight: 500;
            cursor: pointer;
            transition: transform 0.2s;
            margin-top: 2rem;
        }

        .submit-button:hover {
            background: #131f69;
            transform: scale(1.02);
        }

        .qr-section {
            text-align: center;
            margin-top: 1.5rem;
        }

        .qr-container {
            display: inline-block;
            background: white;
            padding: 1rem;
            border-radius: 0.5rem;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
        }

        .qr-message {
            color: #172A91;
            background: #F0F7FF;
        }

        .qr-expiry {
            color: #EBA49E;
        }

        .refresh-button {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            padding: 0.75rem 1.5rem;
            background: #172A91;
            color: white;
            border-radius: 0.5rem;
            margin-top: 1.5rem;
            cursor: pointer;
            border: none;
            font-weight: 500;
            transition: all 0.2s ease;
        }

        .refresh-button svg {
            width: 1.25rem;
            height: 1.25rem;
            transition: transform 0.3s ease;
        }

        .refresh-button:hover {
            background: #131f69;
            transform: translateY(-1px);
        }

        .refresh-button:hover svg {
            transform: rotate(180deg);
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
            .nav-container {
                flex-direction: column;
                text-align: center;
                gap: 0.5rem;
            }
            
            .logo {
                justify-content: center;
            }
        }

        .redemption-text {
            font-size: 0.875rem;
            color: #4b5563;
            margin: 0.5rem 0;
        }

        .highlight {
            color: #172A91;
            font-weight: 500;
            text-decoration: underline;
        }

        .checkin-prompt {
            text-align: center;
            color: #172A91;
            font-weight: 500;
            font-size: 1.125rem;
        }
    </style>
</head>

<body>
    <div class="container">
        <header class="header">
            <nav class="nav-container">
                <div class="logo">
                    <img src="{{ asset('images/rwm-logo.png') }}" alt="RWM Logo" style="height: 40px;">
                </div>
            </nav>
        </header>

        <main class="main-content">
            <div class="checkin-card">
                <div class="card-header">
                    <div class="icon-container">
                        <svg class="icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                        </svg>
                    </div>
                    <h2 class="card-title">Check-In</h2>
                    <span class="current-date">{{ now()->format('F d, Y') }}</span>
                    <p class="redemption-text">Redeemable at <a href="https://remotework.com.my/map/" class="highlight" style="text-decoration: none;">any WorkSpaces</a> during their remote work hours</p>
                </div>

                <form action="{{ route('ticket.confirm-checkin') }}" method="POST"
                    x-data="{ open: false, search: '', selectedCafe: '', selectedCafeId: '' }" @submit.prevent="
                            if (!selectedCafe.trim()) {
                                Swal.fire({
                                    title: 'Selection Required',
                                    text: 'Please select a cafe before confirming check-in',
                                    icon: 'warning',
                                    confirmButtonText: 'Ok',
                                    confirmButtonColor: '#172A91'
                                });
                                return false;
                            }
                            $el.submit();
                        ">
                    @csrf
                    <div class="search-container">
                        <label class="search-label">Select WorkSpace</label>
                        <input type="text" x-model="search" @click="open = true" @click.away="open = false"
                            :value="selectedCafe" placeholder="Search WorkSpace..." class="search-input">

                        <div x-show="open" class="search-results">
                            <template
                                x-for="cafe in {{ json_encode($cafes) }}.filter(c => {
                                    const searchTerms = search.toLowerCase().split(' ');
                                    const combinedText = (c.name + ' ' + c.address).toLowerCase();
                                    const words = combinedText.split(' ');
                                    
                                    return searchTerms.every(term => 
                                        words.some(word => {
                                            // For shorter search terms (3 chars or less), use contains
                                            if (term.length <= 3) {
                                                return word.includes(term) || 
                                                    (word.includes('starbucks') && 'starbucks'.includes(term));
                                            }
                                            
                                            // For longer terms, use similarity matching
                                            const maxLength = Math.max(term.length, word.length);
                                            const distance = levenshteinDistance(word, term);
                                            const similarity = (maxLength - distance) / maxLength;
                                            
                                            return similarity >= 0.65 || 
                                                (word.includes('starbucks') && 'starbucks'.includes(term));
                                        })
                                    );
                                })"
                                :key="cafe . id">                
                                <div @click="selectedCafe = cafe.name; selectedCafeId = cafe.id; open = false"
                                    class="result-item">
                                    <div x-text="cafe.name" class="result-name"></div>
                                    <div x-text="cafe.address" class="result-address"></div>
                                </div>
                            </template>
                        </div>
                    </div>

                    <input type="hidden" name="selected_cafe" x-model="selectedCafe">
                    <input type="hidden" name="cafe_id" x-model="selectedCafeId">
                    <input type="hidden" name="uuid" value="{{ $uuid }}">
                    <input type="hidden" name="ticket_id" value="{{ $ticket_id }}">

                    <div class="checkin-prompt">Ready to Check-in?</div>
                    <button type="submit" class="submit-button">
                        Confirm Check-in
                    </button>
                </form>

                @if(isset($verificationUrl))
                    <div class="qr-section">
                        <div class="qr-container">
                            {!! QrCode::size(150)->format('svg')->errorCorrection('H')->generate($verificationUrl) !!}
                            <p class="qr-message">Ask the WorkSpace crew to scan your QR Code using any QR Scanner</p>
                            <div class="qr-expiry">
                                <p>This QR code will expire in 2 minutes</p>
                                <p>Expires at: {{ now()->addMinutes(2)->format('h:i:s A') }}</p>
                            </div>
                        </div>

                        <button type="button" onclick="window.location.reload()" class="refresh-button">
                            <svg class="" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
                            </svg>
                            Regenerate QR
                        </button>
                    </div>
                @endif
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

<script>
    function levenshteinDistance(a, b) {
        if (a.length === 0) return b.length;
        if (b.length === 0) return a.length;

        const matrix = [];

        for (let i = 0; i <= b.length; i++) {
            matrix[i] = [i];
        }

        for (let j = 0; j <= a.length; j++) {
            matrix[0][j] = j;
        }

        for (let i = 1; i <= b.length; i++) {
            for (let j = 1; j <= a.length; j++) {
                if (b.charAt(i - 1) === a.charAt(j - 1)) {
                    matrix[i][j] = matrix[i - 1][j - 1];
                } else {
                    matrix[i][j] = Math.min(
                        matrix[i - 1][j - 1] + 1,
                        matrix[i][j - 1] + 1,
                        matrix[i - 1][j] + 1
                    );
                }
            }
        }

        return matrix[b.length][a.length];
    }
</script>