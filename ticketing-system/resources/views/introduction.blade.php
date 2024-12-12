<!DOCTYPE html>
<html>

<head>
    <title>Remote Work Malaysia - Introduction</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta property="og:title" content="WorkSpace that works for you">
    <meta property="og:description"
        content="Elevate your workday with a pass that fits your schedule and perks that make a difference">
    <meta property="og:image" content="{{ asset('favicon.png') }}">
    <link rel="icon" type="image/png" href="{{ asset('favicon.png') }}">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:type" content="website">
    <meta property="og:site_name" content="Remote Work Malaysia">

    <style>
        /* Base styles from packages.blade.php */
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

        /* Header and Logo styles */
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

        /* Pass Cards Grid */
        .passes-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 2rem;
            margin-bottom: 3rem;
        }

        .pass-card {
            background: white;
            border-radius: 1rem;
            padding: 2rem;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            display: flex;
            flex-direction: column;
        }

        .pass-title {
            color: #172A91;
            font-size: 1.5rem;
            margin-bottom: 1rem;
        }

        .pass-price {
            color: #EBA49E;
            font-size: 24px;
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

        /* Ultimate Perk Card */
        .ultimate-perk {
            background: linear-gradient(145deg, #172A91, #1e357d);
            color: white;
            padding: 2rem;
            border-radius: 1rem;
            margin: 2rem 0;
            text-align: center;
        }

        /* Trial Pass Section */
        .trial-pass {
            background: white;
            padding: 2rem;
            border-radius: 1rem;
            text-align: center;
            margin: 2rem 0;
        }

        /* Button Styles */
        .buy-button {
            display: inline-block;
            padding: 0.75rem 1.5rem;
            background: #172A91;
            color: white;
            text-decoration: none;
            border-radius: 0.5rem;
            transition: background 0.3s ease;
            text-align: center;
            border: none;
            cursor: pointer;
        }

        .buy-button:hover {
            background: #EBA49E;
        }

        /* Footer styles from packages.blade.php */
        .footer {
            text-align: center;
            margin-top: 4rem;
            padding: 1rem;
            color: white;
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

        .reminder-text {
            font-size: 0.8rem;
            color: #666;
            font-style: italic;
            margin-top: 0.5rem;
        }

        .popular-badge {
        position: absolute;
        top: -15px;
        right: -15px;
        background: linear-gradient(135deg, #FF6B6B, #FF8E53);
        color: white;
        padding: 0.75rem 1.5rem;
        border-radius: 2rem;
        font-size: 1rem;
        font-weight: 700;
        box-shadow: 0 4px 15px rgba(255, 107, 107, 0.3);
        letter-spacing: 0.5px;
        text-transform: uppercase;
        animation: zoom-bounce 2s ease-in-out infinite;
    }

    @keyframes zoom-bounce {
        0%, 100% {
            transform: rotate(3deg) scale(1);
        }
        50% {
            transform: rotate(3deg) scale(1.1);
        }
    }


        /* Mobile Responsiveness */
        @media (max-width: 768px) {
            .passes-grid {
                grid-template-columns: 1fr;
            }

            .container {
                padding: 1rem;
            }

            .pass-card,
            .ultimate-perk,
            .trial-pass {
                margin-bottom: 1.5rem;
            }
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

        <!-- Main Passes Grid -->
        <div class="passes-grid">
            <!-- Basic Workspace Pass -->
            <div class="pass-card">
                <h2 class="pass-title">Starter Spark Pass</h2>
                <div class="pass-price">RM80 + RM20 /month</div>
                <div style="color: #666; margin-bottom: 1rem;">Total: RM100/month</div>
                <ul class="pass-features">
                    <li>5 Coworking Passes</li>
                    <li>Up to 4 hours per WorkSpace</li>
                    <li>Wi-Fi, plug point, drinking water</li>
                    <li>Device Cover TM</li>
                    <li>Virtual focused session</li>
                    <li>Access to work buddies</li>
                    <li><a href="https://remotework.com.my/blog" target="_blank" style="cursor: pointer; color: #666; text-decoration: underline;">Special Member-Only Event Deals</a></li>
                    <li class="highlight-feature">RM25 F&B voucher x 1</li>
                    <li class="highlight-feature">Save RM5 on F&B add-on</li>
                </ul>
                <div class="reminder-text">
                    F&B voucher is valid at all partner WorkSpaces
                </div>
                <a href="https://buy.stripe.com/4gw00J6p6acf4PS3cl" class="buy-button">Buy Now!</a>
            </div>

            <!-- Plus Workspace Pass -->
            <div class="pass-card" style="position: relative;">
            <div class="popular-badge">Best Seller</div>

                <h2 class="pass-title">Power Boost Pass</h2>
                <div class="pass-price">RM80 + RM80 /month</div>
                <div style="color: #666; margin-bottom: 1rem;">Total: RM160/month</div>
                <ul class="pass-features">
                    <li>5 Coworking Passes</li>
                    <li>Up to 4 hours per WorkSpace</li>
                    <li>Wi-Fi, plug point, drinking water</li>
                    <li>Device Cover TM</li>
                    <li>Virtual focused session</li>
                    <li>Access to work buddies</li>
                    <li><a href="https://remotework.com.my/blog" target="_blank" style="cursor: pointer; color: #666; text-decoration: underline;">Special Member-Only Event Deals</a></li>
                    <li class="highlight-feature">RM25 F&B voucher x 5</li>
                    <li class="highlight-feature">Save RM45 on F&B add-on</li>
                </ul>
                <div class="reminder-text">
                    F&B voucher is valid at all partner WorkSpaces
                </div>
                <a href="https://buy.stripe.com/eVa6p7aFm5VZ5TWcMW" class="buy-button">Buy Now!</a>
            </div>

            <!-- Premium Workspace Pass -->
            <div class="pass-card">
                <h2 class="pass-title">Peak Performance Pass</h2>
                <div class="pass-price">RM80 + RM200 /month</div>
                <div style="color: #666; margin-bottom: 1rem;">Total: RM280/month</div>
                <ul class="pass-features">
                    <li>5 Coworking Passes</li>
                    <li>Up to 4 hours per WorkSpace</li>
                    <li>Wi-Fi, plug point, drinking water</li>
                    <li>Device Cover TM</li>
                    <li>Virtual focused session</li>
                    <li>Access to work buddies</li>
                    <li><a href="https://remotework.com.my/blog" target="_blank" style="cursor: pointer; color: #666; text-decoration: underline;">Special Member-Only Event Deals</a></li>
                    <li class="highlight-feature">Monthly unlimited passes</li>
                    <li class="highlight-feature">Even more privileged rates</li>
                    <li class="highlight-feature">Save forever more</li>
                </ul>
                <a href="https://buy.stripe.com/00gcNv8xe7030zC3co" class="buy-button">Buy Now!</a>
            </div>
        </div>

        <div class="ultimate-perk" style="background: linear-gradient(165deg, #172A91, #1e357d); box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1); position: relative;">
    <div style="display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap;">
        <div style="flex: 1; text-align: left; padding: 1rem;">
            <h2 class="pass-title" style="color: white; font-size: 1.6rem; font-weight: 600;">Infinity Elite Pass</h2>
            <div style="color: #EBA49E; font-size: 24px; margin: 0.5rem 0; font-weight: 600;">
                RM80 + RM700 /month
            </div>
            <div style="color: white; font-size: 1.1rem;">
                Total: RM780/month
            </div>
        </div>
        <div style="flex: 2; text-align: left; padding: 1rem;">
            <ul class="pass-features" style="color: white; font-size: 1.1rem; font-weight: 500;">
                <li style="color:white">All Workspace Pass features</li>
                <li class="highlight-feature" style="color: #EBA49E;">RM25 F&B vouchers x unlimited</li>
                <li class="highlight-feature" style="color: #EBA49E;">Priority access to new WorkSpaces</li>
                </ul>
        </div>
        <div style="flex: 1; text-align: right; padding: 1rem;">
        <a href="https://buy.stripe.com/3cseVD5l20BFaaceV5" style="background-color: #EBA49E;" class="buy-button">Buy Now!</a>
        </div>
    </div>
    <div style="position: absolute; bottom: 1rem; right: 1rem; font-size: 0.8rem; color: rgba(255,255,255,0.7);">
        F&B voucher is valid at all partner WorkSpaces
    </div>
</div>



        <!-- Trial Pass -->
        <div class="trial-pass">
            <h2 class="pass-title">Trial Coworking Pass</h2>
            <p style="margin-bottom: 1rem;">Use Promo Code "<b>20OFF</b>"</p>
            <button class="buy-button">Redeem Now</button>
        </div>

        <!-- Footer -->
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
                <a href="https://www.quadrawebs.com" target="_blank" rel="noopener noreferrer"
                    style="color: #EBA49E; text-decoration: none;">
                    Powered by QuadraWebs
                </a>
            </div>
        </div>
    </div>
</body>

</html>