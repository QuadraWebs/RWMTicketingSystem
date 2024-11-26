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
            background: linear-gradient(135deg, #F0F7FF 0%, #FFFFFF 50%, #FAF5FF 100%);
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
        }

        .icon-container {
            display: inline-block;
            padding: 0.75rem;
            background: #eff6ff;
            border-radius: 9999px;
            margin-bottom: 1rem;
        }

        .icon {
            width: 2rem;
            height: 2rem;
            color: #3b82f6;
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
            background: #eff6ff;
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
            background: linear-gradient(90deg, #3b82f6, #8b5cf6);
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
            margin-top: 0.75rem;
            font-weight: 500;
            color: #2563eb;
            background: #eff6ff;
            padding: 0.5rem 1rem;
            border-radius: 0.5rem;
            display: inline-block;
        }

        .qr-expiry {
            margin-top: 0.5rem;
            font-size: 0.875rem;
            color: #dc2626;
        }

        .refresh-button {
            display: inline-flex;
            align-items: center;
            padding: 0.2rem 1rem;
            background: #eff6ff;
            color: #2563eb;
            border-radius: 0.5rem;
            margin-top: 1rem;
            cursor: pointer;
        }

        .refresh-button:hover {
            background: #dbeafe;
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
            .nav-container {
                flex-direction: column;
                text-align: center;
                gap: 0.5rem;
            }

            .checkin-card {
                padding: 1rem;
                margin: 1rem;
            }

            .card-title {
                font-size: 1.25rem;
            }
        }
    </style>
</head>

<body>
    <div class="container">
        <header class="header">
            <nav class="nav-container">
                <h1 class="system-title">RWM Ticketing System</h1>
                <span class="current-date">{{ now()->format('F d, Y') }}</span>
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
                    <h2 class="card-title">Ticket Check-In</h2>
                </div>

                <form action="{{ route('ticket.confirm-checkin') }}" method="POST"
                    x-data="{ open: false, search: '', selectedCafe: '', selectedCafeId: '' }" @submit.prevent="
                            if (!selectedCafe.trim()) {
                                Swal.fire({
                                    title: 'Selection Required',
                                    text: 'Please select a cafe before confirming check-in',
                                    icon: 'warning',
                                    confirmButtonText: 'Ok',
                                    confirmButtonColor: '#3B82F6'
                                });
                                return false;
                            }
                            $el.submit();
                        ">
                    @csrf
                    <div class="search-container">
                        <label class="search-label">Select Cafe</label>
                        <input type="text" x-model="search" @click="open = true" @click.away="open = false"
                            :value="selectedCafe" placeholder="Search cafe..." class="search-input">

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

                    <button type="submit" class="submit-button">
                        Confirm Check In
                    </button>
                </form>

                @if(isset($verificationUrl))
                    <div class="qr-section">
                        <div class="qr-container">
                            {!! QrCode::size(150)->format('svg')->errorCorrection('H')->generate($verificationUrl) !!}
                            <p class="qr-message">Please show this QR code to the cashier</p>
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

        <footer class="footer">
            <div class="copyright">
                Copyright © 2024 Wanderworks Lab, (SA0610699-K) ALL RIGHT'S RESERVED
            </div>
                <div class="powered-by">
                    Powered by QuadraWebs
                </div>
            </div>
        </footer>
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