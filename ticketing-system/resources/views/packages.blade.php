<!DOCTYPE html>
<html>

<head>
    <title>Coworking Packages</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
            background: #172A91;
            min-height: 100vh;
            padding: 2rem;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
        }

        .tabs {
            display: flex;
            justify-content: center;
            margin-bottom: 2rem;
            gap: 1rem;
            flex-wrap: nowrap;
            /* Prevents wrapping on mobile */
        }

        .tab-button {
            padding: 0.75rem 1.5rem;
            /* Slightly reduced padding for mobile */
            white-space: nowrap;
            /* Prevents text wrapping */
            min-width: fit-content;
            /* Ensures buttons stay sized to content */
            border: none;
            background: transparent;
            color: white;
            cursor: pointer;
            border-radius: 0.5rem;
            font-size: 1.1rem;
            transition: all 0.3s ease;
        }

        .tab-button.active {
            background: #EBA49E;
        }

        .packages-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 2rem;
            padding: 1rem;
        }

        .package-card {
            background: white;
            border-radius: 1rem;
            padding: 2rem;
            box-shadow: 0 4px 6px -1px rgb(0 0 0 / 0.1);
            transition: transform 0.3s ease;
        }

        .package-card:hover {
            transform: translateY(-5px);
        }

        .package-title {
            color: #172A91;
            font-size: 1.5rem;
            margin-bottom: 1rem;
        }

        .package-price {
            color: #EBA49E;
            font-size: 2rem;
            font-weight: bold;
            margin-bottom: 1rem;
        }

        .package-description {
            color: #666;
            margin-bottom: 1rem;
            line-height: 1.6;
        }

        .buy-button {
            display: inline-block;
            padding: 0.75rem 1.5rem;
            background: #172A91;
            color: white;
            text-decoration: none;
            border-radius: 0.5rem;
            transition: background 0.3s ease;
            width: 100%;
            text-align: center;
        }

        .buy-button:hover {
            background: #EBA49E;
        }

        .tab-content {
            display: none;
        }

        .tab-content.active {
            display: block;
        }

        .header {
            margin-bottom: 2rem;
        }

        .header-content {
            text-align: center;
            padding: 1rem;
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

        .footer {
            text-align: center;
            margin-top: 4rem;
            padding: 1rem;
            color: white;
        }

        .copyright {
            font-size: 0.75rem;
            margin-bottom: 0.25rem;
        }

        .powered-by {
            font-size: 0.75rem;
            font-weight: 500;
            color: #EBA49E;
        }


        @media (max-width: 768px) {
            .packages-grid {
                grid-template-columns: 1fr;
            }

            .tabs {
                flex-direction: row;
                /* Explicitly keep horizontal layout */
                overflow-x: auto;
                /* Allow horizontal scrolling if needed */
                padding-bottom: 0.5rem;
                /* Space for potential scroll bar */
            }

            .tab-button {
                font-size: 1rem;
                /* Slightly smaller text on mobile */
            }
        }
    </style>
</head>

<body>
    <div class="container">
        <header class="header">
            <div class="header-content">
                <div class="logo">
                    <img src="{{ asset('images/white.png') }}" alt="RWM Logo" style="height: 40px;">
                </div>
            </div>
        </header>
        <div class="tabs">
            <button class="tab-button active" onclick="switchTab('coworking')">Coworking Pass</button>
            <button class="tab-button" onclick="switchTab('allin')">All-in Pass</button>
        </div>

        <div id="coworking" class="tab-content active">
            <div class="packages-grid">
                @foreach($packages as $package)
                    @if($package->title == 'Coworking pass')
                        <div class="package-card">
                            <h2 class="package-title">{{ $package->name }}</h2>
                            <div class="package-price">RM {{ number_format($package->price, 2) }}</div>
                            <p class="package-description">{!! nl2br(e($package->description)) !!}</p>
                            <a href="{{ $package->payment_link }}" class="buy-button">Buy Now!</a>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>

        <div id="allin" class="tab-content">
            <div class="packages-grid">
                @foreach($packages as $package)
                    @if($package->title == 'All-in pass')
                        <div class="package-card">
                            <h2 class="package-title">{{ $package->name }}</h2>
                            <div class="package-price">RM {{ number_format($package->price, 2) }}</div>
                            <p class="package-description">{!! nl2br(string: e($package->description)) !!}</p>
                            <a href="{{ $package->payment_link }}" class="buy-button">Buy Now!</a>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>

        <div class="footer">

            <div style="margin-top: 10px; color: white; font-size: 13px;">
                Need help? Contact us at <a href="mailto:hi@remotework.com.my"
                    style="color: #EBA49E; text-decoration: none;">hi@remotework.com.my</a>
            </div>
            <!-- Social Media Icons -->
            <div style="margin-top: 10px; margin-bottom:10px">
                <a href="https://www.instagram.com/remoteworkmy/" style="display: inline-block; margin: 0 10px;">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="white">
                        <path
                            d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z" />
                    </svg>
                </a>
                <a href="https://www.facebook.com/share/g/ibBdv366a6jYdJ87/?mibextid=K35XfP"
                    style="display: inline-block; margin: 0 10px;">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="white">
                        <path
                            d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z" />
                    </svg>
                </a>
            </div>

            <div class="copyright">
                Copyright © 2024 Wanderworks Lab, (SA0610699-K)<br>
                ALL RIGHT'S RESERVED
            </div>

            <div class="powered-by">
                Powered by QuadraWebs
            </div>

        </div>

    </div>


    <script>
        function switchTab(tabId) {
            document.querySelectorAll('.tab-content').forEach(tab => {
                tab.classList.remove('active');
            });

            document.querySelectorAll('.tab-button').forEach(button => {
                button.classList.remove('active');
            });

            document.getElementById(tabId).classList.add('active');
            event.target.classList.add('active');
        }
    </script>
</body>

</html>