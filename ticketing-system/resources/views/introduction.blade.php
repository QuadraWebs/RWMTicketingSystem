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

            0%,
            100% {
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

        <!-- Add these styles -->
        <style>
            .workspace-pass {
                background: linear-gradient(135deg, #EBA49E, #e89891);
                border-radius: 2rem;
                padding: 3rem 2rem;
                margin-bottom: 4rem;
                position: relative;
                overflow: hidden;
            }

            .workspace-pass::before {
                content: '';
                position: absolute;
                top: 0;
                right: 0;
                width: 300px;
                height: 300px;
                background: radial-gradient(circle, rgba(255, 255, 255, 0.1) 0%, rgba(255, 255, 255, 0) 70%);
                border-radius: 50%;
                transform: translate(50%, -50%);
            }

            .workspace-content {
                display: grid;
                grid-template-columns: 1fr 2fr;
                gap: 3rem;
                align-items: center;
            }

            .workspace-header {
                position: relative;
            }

            .base-badge {
                background: #172A91;
                color: white;
                padding: 0.5rem 1.5rem;
                border-radius: 2rem;
                font-size: 0.9rem;
                font-weight: 600;
                display: inline-block;
                margin-bottom: 1rem;
            }

            .workspace-title {
                color: white;
                font-size: 2.5rem;
                font-weight: 700;
                margin-bottom: 1rem;
                line-height: 1.2;
            }

            .workspace-price {
                color: #172A91;
                font-size: 2.5rem;
                font-weight: 700;
                margin: 1.5rem 0;
            }

            .workspace-price span {
                font-size: 1.2rem;
                font-weight: 500;
            }

            .workspace-features {
                display: grid;
                grid-template-columns: 1fr 1fr;
                gap: 2rem;
            }

            .feature-group {
                margin-bottom: 1rem;
            }

            .main-feature {
                color: white;
                font-size: 1.1rem;
                font-weight: 500;
                display: flex;
                align-items: center;
                gap: 0.5rem;
            }

            .sub-features {
                margin-left: 2.5rem;
                margin-top: 0.5rem;
            }

            .right-features {
                display: flex;
                flex-direction: column;
                gap: 1rem;
            }

            .sub-feature {
                color: white;
                opacity: 0.9;
                position: relative;
                padding-left: 1rem;
                margin-top: 0.5rem;
            }

            .sub-feature::before {
                content: "•";
                position: absolute;
                left: 0;
                color: white;
            }

            .highlight-feature {
                color: white;
                display: flex;
                align-items: center;
                gap: 0.5rem;
            }

            .highlight-feature::before {
                content: "✓";
                color: #172A91;
            }

            @media (max-width: 768px) {
                .workspace-features {
                    grid-template-columns: 1fr;
                    gap: 1.5rem;
                }

                .sub-features {
                    margin-left: 1.5rem;
                }
            }


            .workspace-feature {
                color: white;
                font-size: 1.1rem;
                display: flex;
                align-items: center;
                gap: 0.5rem;
            }

            .workspace-feature::before {
                content: "✓";
                font-weight: bold;
                color: #172A91;
            }

            .sub-feature {
                position: relative;
                padding-left: 20px;
            }

            .pass-features li.sub-feature:before {
                content: "•" !important;
                font-size: 1.5rem;
                color: #172A91;
            }


            .workspace-cta {
                text-align: center;
                margin-top: 2rem;
            }

            @media (max-width: 768px) {
                .workspace-pass {
                    padding: 2rem 1.5rem;
                }

                .workspace-content {
                    grid-template-columns: 1fr;
                    gap: 2rem;
                }



                .workspace-features {
                    grid-template-columns: 1fr;

                    gap: 1rem;
                    margin-bottom: 1.5rem;
                }

                .workspace-feature {
                    font-size: 1rem;
                    gap: 0.3rem;
                }

                .workspace-pass {
                    padding: 2rem 1.5rem;
                }

                .workspace-content {
                    gap: 1.5rem;
                }

                .workspace-title {
                    font-size: 2rem;
                }
            }

            .workspace-pass {
                background: linear-gradient(135deg, #EBA49E 0%, #e89891 50%, #dc8680 100%);
                box-shadow:
                    0 20px 40px rgba(235, 164, 158, 0.2),
                    inset 0 -1px 0 rgba(255, 255, 255, 0.1);
                border-radius: 2rem;
                padding: 3rem 2rem;
                margin-bottom: 4rem;
                position: relative;
                overflow: hidden;
            }

            .workspace-pass::before {
                content: '';
                position: absolute;
                top: 0;
                right: 0;
                width: 100%;
                height: 100%;
                background:
                    radial-gradient(circle at 10% 10%, rgba(255, 255, 255, 0.1) 0%, transparent 50%),
                    radial-gradient(circle at 90% 90%, rgba(255, 255, 255, 0.08) 0%, transparent 40%);
                opacity: 0.8;
            }

            @font-face {
                font-family: 'Cooper Black';
                src: url('{{ asset("fonts/COOPBL.TTF") }}') format('truetype');
            }
        </style>

        <div style="text-align: center; margin-bottom: 3rem;">
            <h1
                style="color: white; font-size: 2.5rem; margin-bottom: 1rem; font-weight: 600; font-family: 'Cooper Black', serif;">
                WorkSpace that works for you
            </h1>
            <p style="color: white; font-size: 1.2rem; line-height: 1.6; max-width: 800px; margin: 0 auto;">
                Don't settle for less. Elevate your workday with a pass that fits your schedule and perks that make a
                difference
            </p>
        </div>
        <!-- The new WorkSpace Pass section -->
        <div class="workspace-pass">
            <div class="workspace-content">
                <div class="workspace-header">
                    <div class="base-badge">BASE PASS</div>
                    <h2 class="workspace-title">WorkSpace Pass</h2>
                    <div class="workspace-price">
                        RM80 <span>/month</span>
                    </div>
                    <p style="color: white; opacity: 0.9;">Your gateway to productive workspaces</p>
                    <div class="workspace-cta">
                        <a href="https://buy.stripe.com/bIYcNv4gYfwz5TWdQT" class="buy-button"
                            style="background: #172A91; font-size: 1.2rem; padding: 1.2rem 2.5rem; font-weight: 600; box-shadow: 0 4px 15px rgba(23, 42, 145, 0.2); text-decoration: none; display: inline-block;">
                            Get Started
                        </a>

                    </div>
                </div>

                <div class="workspace-features">
                    <div class="feature-group">
                        <div class="highlight-feature">5 Coworking Passes</div>
                        <div class="sub-features">
                            <div class="sub-feature">Up to 4 hours per WorkSpace</div>
                            <div class="sub-feature">Wi-Fi, plug point, drinking water</div>
                            <div class="sub-feature">Device Cover<sup>TM</sup></div>
                        </div>
                    </div>

                    <div class="right-features">
                        <div class="highlight-feature">Virtual focused session</div>
                        <div class="highlight-feature">Access to work buddies</div>
                        <div class="highlight-feature">
                            <a href="https://remotework.com.my/blog" target="_blank"
                                style="color: white; text-decoration: underline;">
                                Special Member-Only Event Deals
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <!-- Main Passes Grid -->
        <div class="passes-grid">
            <!-- Basic Workspace Pass -->
            <div class="pass-card">
                <h2 class="pass-title">Starter Spark Pass</h2>
                <div class="pass-price">RM80 + RM20 /month</div>
                <div style="color: #666; margin-bottom: 1rem;">Total: RM100/month</div>
                <ul class="pass-features">
                    <li class="highlight-feature">5 Coworking Passes</li>
                    <li class="sub-feature">Up to 4 hours per WorkSpace</li>
                    <li class="sub-feature">Wi-Fi, plug point, drinking water</li>
                    <li class="sub-feature">Device Cover<sup>TM</sup></li>
                    <li class="highlight-feature">Virtual focused session</li>
                    <li class="highlight-feature">Access to work buddies</li>
                    <li class="highlight-feature"><a href="https://remotework.com.my/blog" target="_blank"
                            style="cursor: pointer; color: #666; text-decoration: underline;">Special Member-Only Event
                            Deals</a></li>
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
                    <li class="highlight-feature">5 Coworking Passes</li>
                    <li class="sub-feature">Up to 4 hours per WorkSpace</li>
                    <li class="sub-feature">Wi-Fi, plug point, drinking water</li>
                    <li class="sub-feature">Device Cover<sup>TM</sup></li>
                    <li class="highlight-feature">Virtual focused session</li>
                    <li class="highlight-feature">Access to work buddies</li>
                    <li class="highlight-feature"><a href="https://remotework.com.my/blog" target="_blank"
                            style="cursor: pointer; color: #666; text-decoration: underline;">Special Member-Only Event
                            Deals</a></li>

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
                <div class="pass-price">RM80 + RM220 /month</div>
                <div style="color: #666; margin-bottom: 1rem;">Total: RM300/month</div>
                <ul class="pass-features">
                    <li class="highlight-feature">Monthly unlimited passes</li>
                    <li class="sub-feature">Up to 4 hours per WorkSpace</li>
                    <li class="sub-feature">Wi-Fi, plug point, drinking water</li>
                    <li class="sub-feature">Device Cover<sup>TM</sup></li>
                    <li class="highlight-feature">Virtual focused session</li>
                    <li class="highlight-feature">Access to work buddies</li>
                    <li class="highlight-feature"><a href="https://remotework.com.my/blog" target="_blank"
                            style="cursor: pointer; color: #666; text-decoration: underline;">Special Member-Only Event
                            Deals</a></li>

                    <li class="highlight-feature">Even more privileged rates</li>
                    <li class="highlight-feature">Save forever more</li>
                </ul>
                <a href="https://buy.stripe.com/00gcNv8xe7030zC3co" class="buy-button">Buy Now!</a>
            </div>
        </div>

        <div class="ultimate-perk"
            style="background: linear-gradient(165deg, #172A91, #1e357d); box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1); position: relative;">
            <div style="display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap;">
                <div style="flex: 1; text-align: left; padding: 1rem;">
                    <h2 class="pass-title" style="color: white; font-size: 1.6rem; font-weight: 600;">Infinity Elite
                        Pass</h2>
                    <div style="color: #EBA49E; font-size: 24px; margin: 0.5rem 0; font-weight: 600;">
                        RM80 + RM720 /month
                    </div>
                    <div style="color: white; font-size: 1.1rem;">
                        Total: RM800/month
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
                    <a href="https://buy.stripe.com/3cseVD5l20BFaaceV5" style="background-color: #EBA49E;"
                        class="buy-button">Buy Now!</a>
                </div>
            </div>
            <div
                style="position: absolute; bottom: 1rem; right: 1rem; font-size: 0.8rem; color: rgba(255,255,255,0.7);">
                F&B voucher is valid at all partner WorkSpaces
            </div>
        </div>

        <!-- Trial Pass -->
        <div class="trial-pass">
            <h2 class="pass-title">Trial WorkSpace Pass</h2>
            <a href="https://pass.remotework.com.my/trial-pass" class="buy-button">View Passes</a>
        </div>

        <div style="text-align: center; margin: 2rem 0;">
            <a href="https://remotework.com.my/map/" target="_blank" style="
           display: inline-flex;
           align-items: center;
           gap: 0.5rem;
           background: rgba(255, 255, 255, 0.1);
           color: white;
           padding: 1rem 2rem;
           border-radius: 2rem;
           text-decoration: none;
           font-weight: 500;
           transition: all 0.3s ease;
           border: 1px solid rgba(255, 255, 255, 0.2);
           box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
       " onmouseover="this.style.transform='translateY(-2px)'; this.style.background='rgba(255, 255, 255, 0.2)'"
                onmouseout="this.style.transform='translateY(0)'; this.style.background='rgba(255, 255, 255, 0.1)'">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7z" />
                    <circle cx="12" cy="9" r="2.5" />
                </svg>
                Discover Our Partner WorkSpaces
            </a>
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