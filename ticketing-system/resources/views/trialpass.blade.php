<!DOCTYPE html>
<html>
<head>
    <title>Remote Work Malaysia - Trial Pass</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta property="og:title" content="WorkSpace that works for you">
    <meta property="og:description" content="Elevate your workday with a pass that fits your schedule and perks that make a difference">
    <meta property="og:image" content="{{ asset('favicon.png') }}">
    <link rel="icon" type="image/png" href="{{ asset('favicon.png') }}">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:type" content="website">
    <meta property="og:site_name" content="Remote Work Malaysia">

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

        .header {
            margin-bottom: 2rem;
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

        .description-text {
            text-align: center;
            color: white;
            margin-bottom: 2rem;
            font-size: 1.1rem;
            line-height: 1.6;
            max-width: 800px;
            margin-left: auto;
            margin-right: auto;
            padding: 0 1rem;
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
            display: flex;
            flex-direction: column;
            height: 100%;
            position: relative;
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

        .pass-features {
            list-style: none;
            margin-bottom: 2rem;
            flex-grow: 1;
        }

        .pass-features li {
            margin-bottom: 0.5rem;
            color: #666;
            display: flex;
            align-items: center;
        }

        .pass-features li:before {
            content: "✓";
            color: #EBA49E;
            margin-right: 0.5rem;
            font-weight: bold;
        }

        .highlight-feature {
            color: #000;
            font-weight: 700;
            position: relative;
            padding-left: 20px;
        }

        .highlight-feature:before {
            content: "★";
            position: absolute;
            left: 0;
            color: #000;
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
            border: none;
            cursor: pointer;
        }

        .buy-button:hover {
            background: #EBA49E;
        }

        .reminder-text {
            font-size: 0.8rem;
            color: #666;
            font-style: italic;
            margin-top: 0.5rem;
            margin-bottom: 1rem;
        }

        .footer {
            text-align: center;
            margin-top: 4rem;
            padding: 1rem;
            color: white;
        }

        @media (max-width: 768px) {
            .container {
                padding: 1rem;
            }
            
            .packages-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>

<body>
    <div class="container">
        <header class="header">
            <div class="logo">
                <a href="https://remotework.com.my/">
                    <img src="{{ asset('images/white.png') }}" alt="RWM Logo">
                </a>
            </div>
        </header>

        <div class="description-text">
            Try our WorkSpace Pass for a day. Experience productivity in your preferred environment.
        </div>

        <div class="packages-grid">
            <div class="package-card">
                <h2 class="package-title">Trial Coworking Pass</h2>
                <div class="package-price">RM20</div>
                <ul class="pass-features">
                    <li>1 Coworking Pass</li>
                    <li>Up to 4 hours per WorkSpace</li>
                    <li>Wi-Fi, plug point, drinking water</li>
                    <li>Device Cover TM</li>
                    <li>Valid at any partner WorkSpaces</li>
                </ul>
                <div class="reminder-text">
                    Use Promo Code "20OFF"
                </div>
                <a href="https://buy.stripe.com/8wM6p714M2JN4PS002" class="buy-button">Redeem Now</a>
            </div>

            <div class="package-card">
                <h2 class="package-title">Trial All-in Pass</h2>
                <div class="package-price">RM35</div>
                <ul class="pass-features">
                    <li>1 Coworking Pass</li>
                    <li>Up to 4 hours per WorkSpace</li>
                    <li>Wi-Fi, plug point, drinking water</li>
                    <li>Device Cover TM</li>
                    <li>Valid at any partner WorkSpaces</li>
                    <li class="highlight-feature">RM25 F&B voucher x 1</li>
                </ul>
                <div class="reminder-text">
                    Use Promo Code "20OFF"
                </div>
                <a href="https://buy.stripe.com/fZebJr8xe8471DG5kp" class="buy-button">Redeem Now</a>
            </div>
        </div>

        <div class="footer">
            <div style="margin-top: 10px; color: white; font-size: 13px;">
                Need help? Contact us at <a href="mailto:hi@remotework.com.my" style="color: #EBA49E; text-decoration: none;">hi@remotework.com.my</a>
            </div>
            <div style="margin-top: 10px; margin-bottom:10px">
                <a href="https://www.instagram.com/remoteworkmy/" style="display: inline-block; margin: 0 10px;">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="white">
                        <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/>
                    </svg>
                </a>
                <a href="https://www.facebook.com/share/g/ibBdv366a6jYdJ87/?mibextid=K35XfP" style="display: inline-block; margin: 0 10px;">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="white">
                        <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/>
                    </svg>
                </a>
            </div>
            <div class="copyright">
                Copyright © 2024 Wanderworks Lab, (SA0610699-K)<br>
                ALL RIGHT'S RESERVED
            </div>
            <div class="powered-by">
                <a href="https://www.quadrawebs.com" target="_blank" rel="noopener noreferrer" style="color: #EBA49E; text-decoration: none;">
                    Powered by QuadraWebs
                </a>
            </div>
        </div>
    </div>
</body>
</html>
