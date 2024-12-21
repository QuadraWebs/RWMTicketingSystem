<!DOCTYPE html>
<html>

<head>
    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-8SJ9K7GGKQ"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag() { dataLayer.push(arguments); }
        gtag('js', new Date());
        gtag('config', 'G-8SJ9K7GGKQ');
    </script>
    <title>Remote Work Malaysia - WorkSpace Pass Add-ons</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta property="og:title" content="Enhance Your WorkSpace Experience">
    <meta property="og:description" content="Customize your workspace experience with our value-adding options">
    <meta property="og:image" content="{{ asset('favicon.png') }}">
    <link rel="icon" type="image/png" href="{{ asset('favicon.png') }}">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:type" content="website">
    <meta property="og:site_name" content="Remote Work Malaysia">

    <style>
        @font-face {
            font-family: 'Sofia Pro';
            src: url('/fonts/Sofia Pro Regular Az.otf') format('opentype');
            font-weight: 900;
            font-style: normal;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Sofia Pro', system-ui, -apple-system, sans-serif;
            background: #172A91;
            min-height: 100vh;
            padding: 1.5rem;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
        }

        /* New Add-on Cards Grid */
        .addons-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 2rem;
            margin: 2rem 0;
        }

        .addon-card {
            background: white;
            border-radius: 1.5rem;
            padding: 2rem;
            text-align: center;
            transition: transform 0.3s ease;
            border: 2px solid rgba(235, 164, 158, 0.2);
        }

        .addon-card:hover {
            transform: translateY(-5px);
        }

        .addon-price {
            font-size: 2rem;
            color: #EBA49E;
            font-weight: 700;
            margin: 1rem 0;
        }

        .addon-features {
            list-style: none;
            margin: 1.5rem 0;
            text-align: left;
        }

        .addon-features li {
            margin-bottom: 0.8rem;
            color: #666;
            padding-left: 1.5rem;
            position: relative;
        }

        .addon-features li:before {
            content: "✓";
            color: #172A91;
            position: absolute;
            left: 0;
        }

        .savings {
            color: #10B981;
            font-weight: 600;
            margin: 1rem 0;
        }

        .buy-button {
            display: inline-block;
            padding: 0.8rem 2rem;
            background: #172A91;
            color: white;
            text-decoration: none;
            border-radius: 0.8rem;
            transition: all 0.3s ease;
            font-weight: 600;
        }

        .buy-button:hover {
            background: #EBA49E;
        }

        .header {
            margin-bottom: 1.5rem;
        }

        .logo {
            display: flex;
            justify-content: center;
            width: 100%;
        }

        .logo img {
            max-height: 35px;
            width: auto;
        }

        .intro-text {
            text-align: center;
            margin-bottom: 2rem;
        }

        .intro-text h1 {
            color: white;
            font-size: 2.2rem;
            margin-bottom: 0.8rem;
            font-weight: 600;
            font-family: 'Cooper Black', serif;
        }

        .intro-text p {
            color: white;
            font-size: 1.1rem;
            line-height: 1.5;
            max-width: 700px;
            margin: 0 auto;
            opacity: 0.9;
        }

        .savings {
            color: #10B981;
            font-weight: 700;
            margin: 1rem 0;
            font-size: 1.2rem;
            padding: 0.5rem;
            background: rgba(16, 185, 129, 0.1);
            border-radius: 0.5rem;
            transform: scale(1);
            transition: transform 0.3s ease;
        }

        .savings:hover {
            transform: scale(1.05);
        }

        .savings strong {
            font-size: 1.4rem;
            color: #059669;
        }

        /* Footer Styles */
        .footer {
            text-align: center;
            margin-top: 3rem;
            padding: 1rem;
            color: white;
        }

        .footer a {
            color: #EBA49E;
            text-decoration: none;
        }

        .footer .social-links {
            margin: 1rem 0;
        }

        .footer .social-links a {
            display: inline-block;
            margin: 0 10px;
        }

        .footer .copyright {
            margin: 1rem 0;
            opacity: 0.8;
        }

        .footer .powered-by {
            font-size: 0.9rem;
        }

        .addon-card {
            background: white;
            border-radius: 1.5rem;
            padding: 2rem;
            text-align: center;
            transition: transform 0.3s ease;
            border: 2px solid rgba(235, 164, 158, 0.2);
            display: flex;
            flex-direction: column;
        }

        .addon-features {
            list-style: none;
            margin: 1.5rem 0;
            text-align: left;
            flex-grow: 1;
        }

        .buy-button {
            margin-top: auto;
            display: inline-block;
            padding: 0.8rem 2rem;
            background: #172A91;
            color: white;
            text-decoration: none;
            border-radius: 0.8rem;
            transition: all 0.3s ease;
            font-weight: 600;
        }



        @media (max-width: 768px) {
            .addons-grid {
                grid-template-columns: 1fr;
                padding: 0 1rem;
            }

            .addon-card {
                min-height: auto;
                margin-bottom: 1.5rem;
            }

            .intro-text h1 {
                font-size: 1.8rem;
                padding: 0 1rem;
            }

            .intro-text p {
                font-size: 1rem;
                padding: 0 1rem;
            }

            .addon-price {
                font-size: 2.2rem;
            }

            .savings {
                font-size: 1.1rem;
                padding: 0.75rem;
            }

            .buy-button {
                width: 100%;
                padding: 1rem;
            }
        }

        /* Add to the style section */
        .buy-button,
        .addon-card h2,
        .intro-text h1,
        .addon-price {
            font-family: 'Cooper Black', serif;
        }
    </style>
</head>

<body>
    <div class="container">
        <!-- Header -->
        <header class="header">
            <div class="logo">
                <a href="https://remotework.com.my/">
                    <img src="{{ asset('images/white.png') }}" alt="RWM Logo">
                </a>
            </div>
        </header>

        <!-- Intro Text -->
        <div class="intro-text">
            <h1>Enhance Your WorkSpace Experience</h1>
            <p>Choose from our carefully curated add-ons to maximize your workspace benefits</p>
        </div>

        <!-- Add-ons Grid -->
        <div class="addons-grid">
            <!-- Basic Add-on -->
            <div class="addon-card">
                <h2>Essential Add-on</h2>
                <div class="addon-price">+RM 20</div>
                <ul class="addon-features">
                    <li>RM25 F&B voucher x 1</li>
                    <li>Usable at any partner WorkSpaces</li>
                </ul>
                <div class="savings">Save <strong>RM5</strong> (20% off)</div>
                <a href="https://buy.stripe.com/4gw00J6p6acf4PS3cl" class="buy-button"
                    style="font-family: 'Cooper Black', serif;">Purchase with add-on</a>
            </div>

            <!-- Value Add-on -->
            <div class="addon-card">
                <h2>Value Add-on</h2>
                <div class="addon-price">+RM 80</div>
                <ul class="addon-features">
                    <li>RM25 F&B voucher x 5</li>
                    <li>Usable at any partner WorkSpaces</li>
                </ul>
                <div class="savings">Save <strong>RM35</strong> (24% off)</div>
                <a href="https://buy.stripe.com/eVa6p7aFm5VZ5TWcMW" class="buy-button"
                    style="font-family: 'Cooper Black', serif;">Purchase with add-on</a>
            </div>

            <!-- Premium Add-on -->
            <div class="addon-card">
                <h2>Premium Add-on</h2>
                <div class="addon-price">+RM 220</div>
                <ul class="addon-features">
                    <li>Monthly unlimited Coworking Passes</li>
                    <li>Even more privileged rates</li>
                    <li>Ultimate flexibility</li>
                </ul>
                <div class="savings">Save <strong>∞</strong> (Unlimited)</div>

                <a href="https://buy.stripe.com/00gcNv8xe7030zC3co" class="buy-button"
                    style="font-family: 'Cooper Black', serif;">Purchase with add-on</a>
            </div>
        </div>

        <!-- Footer -->
        <div class="footer">
            <div style="margin-bottom: 1rem;">
                Need help? Contact us at <a href="mailto:hi@remotework.com.my"
                    style="color: #EBA49E; text-decoration: none;">hi@remotework.com.my</a>
            </div>
            <div class="copyright">
                Copyright © 2024 Wanderworks Lab, (SA0610699-K)<br>
                ALL RIGHT'S RESERVED
            </div>
            <div class="powered-by">
                <a href="https://www.quadrawebs.com" target="_blank" rel="noopener noreferrer"
                    style="color: #EBA49E; text-decoration: none;">
                    Powered by QuadraWebs
                </a>
            </div>
        </div>
    </div>
</body>

</html>