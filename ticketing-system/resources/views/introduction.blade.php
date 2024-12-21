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
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
            background: #172A91;
            min-height: 100vh;
            padding: 1.5rem;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
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

        .passes-grid {
            display: grid;
            grid-template-columns: 1.5fr 1fr;
            gap: 2rem;
            margin-bottom: 2rem;
        }

        .base-pass-card {
            background: linear-gradient(145deg, #ffffff 0%, #f8f9fa 50%, #EBA49E 300%);
            border-radius: 2rem;
            padding: 2.5rem 2rem;
            min-height: 450px;
            box-shadow:
                0 20px 40px rgba(235, 164, 158, 0.2),
                0 0 0 2px rgba(235, 164, 158, 0.1),
                inset 0 0 60px rgba(23, 42, 145, 0.05);
            border: 3px solid #172A91;
            position: relative;
            transition: all 0.4s ease;
            transform: scale(1.02);
            overflow: hidden;
        }

        .base-pass-card::before {
            content: '';
            position: absolute;
            top: 0;
            right: 0;
            width: 100%;
            height: 100%;
            background:
                linear-gradient(45deg, rgba(235, 164, 158, 0.1) 0%, transparent 40%),
                linear-gradient(135deg, rgba(23, 42, 145, 0.15) 10%, transparent 50%),
                radial-gradient(circle at 90% 90%, rgba(235, 164, 158, 0.1) 0%, transparent 40%);
            opacity: 0.9;
        }

        .base-pass-card::after {
            content: "Best Value";
            position: absolute;
            top: 1rem;
            right: -3rem;
            background: linear-gradient(135deg, #FF6B6B, #FF8E53);
            color: white;
            padding: 0.75rem 3rem;
            transform: rotate(45deg);
            font-weight: 600;
            box-shadow: 0 4px 15px rgba(255, 107, 107, 0.3);
            animation: zoom-bounce 2s ease-in-out infinite;
        }


        @keyframes zoom-bounce {

            0%,
            100% {
                transform: rotate(45deg) scale(1);
            }

            50% {
                transform: rotate(45deg) scale(1.1);
            }
        }


        @keyframes shine {
            0% {
                background-position: -100%;
            }

            100% {
                background-position: 200%;
            }
        }

        .base-pass-card .pass-title {
            background: linear-gradient(135deg, #172A91 0%, #EBA49E 200%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            font-size: 2.2rem;
            font-weight: 800;
            animation: titleGlow 2s infinite;
        }

        @keyframes titleGlow {

            0%,
            100% {
                text-shadow: 0 0 10px rgba(235, 164, 158, 0.3);
            }

            50% {
                text-shadow: 0 0 20px rgba(235, 164, 158, 0.5);
            }
        }

        .base-pass-card .buy-button {
            background: linear-gradient(45deg, #172A91, #EBA49E);
            background-size: 200% 200%;
            animation: gradientShift 3s ease infinite;
        }

        @keyframes gradientShift {
            0% {
                background-position: 0% 50%;
            }

            50% {
                background-position: 100% 50%;
            }

            100% {
                background-position: 0% 50%;
            }
        }

        .ultimate-pass-card {
            background: white;
            border-radius: 1.5rem;
            padding: 2.5rem 2rem;
            min-height: 450px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
        }

        .pass-title {
            font-size: 1.8rem;
            margin-bottom: 1rem;
            color: #172A91;
            font-weight: 700;
            position: relative;
            z-index: 2;
        }

        .pass-price {
            font-size: 2rem;
            margin: 1.2rem 0;
            color: #EBA49E;
            font-weight: 700;
            position: relative;
            z-index: 2;
        }

        .pass-price span {
            font-size: 1rem;
            opacity: 0.8;
        }

        .pass-features {
            list-style: none;
            margin: 1.5rem 0;
            position: relative;
            z-index: 2;
        }

        .pass-features li {
            margin-bottom: 0.7rem;
            color: #666;
            display: flex;
            align-items: center;
            font-size: 1rem;
        }

        .pass-features li:before {
            content: "✓";
            color: #EBA49E;
            margin-right: 0.8rem;
            font-weight: bold;
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
            position: relative;
            z-index: 2;
            border: none;
            cursor: pointer;
        }

        .buy-button:hover {
            background: #EBA49E;
            transform: translateY(-2px);
        }

        .trial-pass-section {
            background: rgba(255, 255, 255, 0.05);
            border-radius: 1rem;
            padding: 1.5rem;
            text-align: center;
            backdrop-filter: blur(10px);
            margin-top: 2rem;
        }

        .footer {
            text-align: center;
            margin-top: 3rem;
            padding: 1rem;
            color: white;
        }

        @media (max-width: 768px) {
    .buy-button {
        width: 100%;
        text-align: center;
        justify-content: center;
    }
    
    .passes-grid .base-pass-card div[style*="display: flex"] {
        text-align: center;
        width: 100%;
    }
}


        @media (max-width: 768px) {
            .passes-grid {
                grid-template-columns: 1fr;
                gap: 1.5rem;
            }

            .base-pass-card,
            .ultimate-pass-card {
                min-height: auto;
                padding: 2rem 1.5rem;
            }

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

            .pass-title {
                font-size: 1.6rem;
            }

            .pass-price {
                font-size: 1.8rem;
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
.pass-title, 
.intro-text h1,
.trial-pass-section h3 {
    font-family: 'Cooper Black', serif;
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

        <div class="intro-text">
            <h1>WorkSpace that works for you</h1>
            <p>Don't settle for less. Elevate your workday with a pass that fits your schedule and perks that make a
                difference</p>
        </div>

        <div class="passes-grid">
            <!-- Base Pass -->
            <div class="base-pass-card">
                <h2 class="pass-title" style="font-size: 2.5rem;">WorkSpace Pass</h2>
                <div class="pass-price" style="font-size: 3rem;">RM80 <span>/month</span></div>
                <ul class="pass-features">
                    <li style="font-weight: 600;">5 Coworking Passes</li>
                    <ul style="margin-left: 1.5rem; font-size: 0.95rem; list-style: disc;">
                        <li style="color: #666;">Up to 4 hours per WorkSpace</li>
                        <li style="color: #666;">Wi-Fi, plug point, drinking water</li>
                        <li style="color: #666;">Device Cover™</li>
                        <li style="color: #666;">Virtual focused session</li>
                        <li style="color: #666;">Access to work buddies</li>
                    </ul>
                </ul>

                <div style="display: flex; gap: 1rem; justify-content: center;">
    <a href="https://buy.stripe.com/bIYcNv4gYfwz5TWdQT" class="buy-button" style="background: #172A91; font-family: 'Cooper Black', serif;">Get Started</a>
    <a href="{{ route('introduction-details') }}" class="buy-button" style="background: #EBA49E; font-family: 'Cooper Black', serif;">Add Ons</a>
</div>
            </div>


            <!-- Ultimate Pass -->
            <div class="ultimate-pass-card">
                <h2 class="pass-title">Infinity Elite Pass</h2>
                <div class="pass-price">RM800 <span>/month</span></div>
                <ul class="pass-features">
                    <li>Unlimited Workspace Access</li>
                    <li>RM25 F&B vouchers x unlimited</li>
                    <li>Priority access to new WorkSpaces</li>
                    <li>All Base Pass features included</li>
                </ul>
                <a href="https://buy.stripe.com/3cseVD5l20BFaaceV5" class="buy-button" style="font-family: 'Cooper Black', serif;">Buy Now</a>
                </div>
        </div>

        <!-- One Pass Section -->
        <div class="trial-pass-section"
            style="background: linear-gradient(135deg, rgba(235, 164, 158, 0.15) 0%, rgba(235, 164, 158, 0.05) 100%); backdrop-filter: blur(10px); border: 1px solid rgba(235, 164, 158, 0.2);">
            <h3 style="color: white; opacity: 0.9; margin-bottom: 0.8rem; font-size: 1.2rem;">Start Your Remote Work
                Journey</h3>
            <p style="color: white; opacity: 0.7; margin-bottom: 1rem">Experience the future of work with a single pass
                - perfect for first-time remote workers</p>
                <a href="/trial-pass" class="buy-button" style="background: #EBA49E; font-family: 'Cooper Black', serif;">Get One Pass</a>

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
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);"
                onmouseover="this.style.transform='translateY(-2px)'; this.style.background='rgba(255, 255, 255, 0.2)'"
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
            <div style="margin-bottom: 1rem;">
                Need help? Contact us at <a href="mailto:hi@remotework.com.my"
                    style="color: #EBA49E; text-decoration: none;">hi@remotework.com.my</a>
            </div>
            <div style="margin: 1rem 0;">
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