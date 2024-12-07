<!DOCTYPE html>
<html>

<head>
    <title>Coworking Packages</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta property="og:title" content="WorkSpace that works for you">
    <meta property="og:description" content="Elevate your workday with a pass that fits your schedule and perks that make a difference">
    <meta property="og:image" content="{{ asset('favicon.png') }}">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:type" content="website">
    <meta property="og:site_name" content="Remote Work Malaysia">
    <meta name="description" content="Elevate your workday with a pass that fits your schedule and perks that make a difference">

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
            display: flex;
            flex-direction: column;
            height: 100%;
            position: relative;
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
            flex-grow: 1;
            /* Take up remaining space */
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

        @keyframes zoom-bounce {

            0%,
            100% {
                transform: rotate(3deg) scale(1);
            }

            50% {
                transform: rotate(3deg) scale(1.1);
            }
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

        .included-section {
            background: linear-gradient(145deg, #ffffff, #f8f9fa);
            border-radius: 1.5rem;
            padding: 2rem;
            margin-top: 2rem;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05);
        }

        .included-title {
            color: #172A91;
            font-size: 1.8rem;
            margin-bottom: 1.5rem;
            font-weight: 600;
            text-align: center;
        }

        .included-list {
            color: #4a5568;
            line-height: 1.6;
            max-width: 800px;
            margin: 0 auto;
        }

        .included-intro {
            font-size: 1.1rem;
            color: #172A91;
            margin-bottom: 1rem;
            text-align: center;
        }

        .included-items {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 1rem;
            padding: 0 1rem;
        }

        .included-items-container {
            display: flex;
            justify-content: center;
            gap: 4rem;
            margin-top: 2rem;
        }

        .included-items-column {
            display: flex;
            flex-direction: column;
            gap: 1rem;
        }

        .included-item {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            background: rgba(23, 42, 145, 0.03);
            padding: 0.75rem 1.25rem;
            border-radius: 0.5rem;
            transition: transform 0.2s;
        }

        .included-item:hover {
            transform: translateX(5px);
        }

        .included-item span {
            color: #EBA49E;
            font-weight: bold;
            font-size: 1.1rem;
        }


        .why-choose-section {
            background: linear-gradient(145deg, #172A91, #1e357d);
            border-radius: 1.5rem;
            padding: 3rem;
            margin-top: 3rem;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        }

        .why-choose-title {
            color: white;
            font-size: 2rem;
            margin-bottom: 3rem;
            font-weight: 600;
            position: relative;
            padding-bottom: 1rem;
        }

        .why-choose-title:after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 50%;
            transform: translateX(-50%);
            width: 60px;
            height: 3px;
            background: #EBA49E;
        }

        .benefits-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 2.5rem;
            margin: 2rem 0;
            width: 100%;
            /* Ensure full width */
            max-width: 100%;
            /* Prevent overflow */
        }


        .benefit-item {
            background: rgba(255, 255, 255, 0.1);
            padding: 2rem;
            border-radius: 1rem;
            transition: transform 0.3s ease;
        }

        .benefit-item:hover {
            transform: translateY(-5px);
        }

        .benefit-title {
            color: #EBA49E;
            font-size: 1.2rem;
            font-weight: 600;
            margin-bottom: 1rem;
        }

        .benefit-text {
            color: white;
            line-height: 1.8;
            font-size: 1.1rem;
        }

        .closing-text {
            color: white;
            font-size: 1.3rem;
            font-weight: 500;
            margin-top: 3rem;
            padding: 2rem;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 1rem;
            text-align: center;
        }



        @media (max-width: 768px) {
            .container {
                padding: 1rem;
                /* Reduce container padding */
            }

            .included-section,
            .why-choose-section {
                padding: 2rem 1rem;
                /* Reduced padding */
                margin-top: 2rem;
            }

            .benefit-item {
                padding: 1.5rem;
                /* Slightly reduced padding */
            }

            .benefits-grid {
                gap: 1.5rem;
                padding: 0;
                /* Remove any extra padding */
            }

            .included-items {
                grid-template-columns: 1fr;
            }

            .included-section {
                padding: 1.5rem;
            }

            .included-items-container {
                flex-direction: column;
                gap: 1rem;
            }

            .included-title,
            .why-choose-title {
                font-size: 1.75rem;
                text-align: center;
            }

            .benefits-grid {
                gap: 1.5rem;
            }

            .closing-text {
                font-size: 1.1rem;
                padding: 1.5rem;
            }

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


        <div class="description-text">
            WorkSpace Pass gives you easy, everyday access to your favorite WorkSpace. Choose any WorkSpace, anywhere,
            with one flexible membership.
        </div>


        <div id="coworking" class="tab-content active">
            <div class="packages-grid">
            @foreach($packages as $package)
    @if($package->title == 'Coworking pass')
        <div class="package-card">
            @if($package->id == 2)
                <div class="popular-badge">Most Popular</div>
            @endif
            <h2 class="package-title">{{ $package->name }}</h2>
            <div class="package-price">RM {{ number_format($package->price, 2) }}</div>
            
            {{-- Replace dynamic description with hardcoded ones --}}
            @if($package->id == 1)
                <p class="package-description">
                    Perfect for a Trial or a Change of Scene<br><br>
                    ● Ideal for individuals who want to explore our WorkSpace's or need a productive environment for 4 hours.<br><br>
                    ● No commitment, just drop in and experience a professional setup designed to enhance your focus.
                </p>
            @elseif($package->id == 2)
                <p class="package-description">
                    Flexibility for Hybrid Work<br><br>
                    ● Tailored for remote or hybrid workers who need an inspiring WorkSpace occasionally.<br><br>
                    ● Save more while enjoying 5 sessions of access.<br><br>
                    ● Great for those balancing work-from-home with on-site productivity.
                </p>
            @elseif($package->id == 3)
                <p class="package-description">
                    Your Ultimate Productivity Solution<br><br>
                    ● Perfect for full-time remote workers or freelancers who need consistent WorkSpaces.<br><br>
                    ● Unlimited access to all cafes, coworking facilities, giving you the freedom to work on your terms every day.<br><br>
                    ● Build a routine in a vibrant and collaborative environment.
                </p>
            @endif
            
            <a href="{{ $package->payment_link }}" class="buy-button">Buy Now!</a>
        </div>
    @endif
@endforeach

            </div>
            <div class="included-section">
                <h2 class="included-title">Included in all Plans</h2>
                <div class="included-list">
                    <p class="included-intro">
                        Perfect for those who are looking for no fuss. Just productivity.
                    </p>
                    <div class="included-items-container">
                        <div class="included-items-column">
                            <div class="included-item">
                                <span>✓</span> Up to 4 hours per WorkSpace
                            </div>
                            <div class="included-item">
                                <span>✓</span> Wi-Fi, plug point, drinking water
                            </div>
                            <div class="included-item">
                                <span>✓</span> DeviceCover TM
                            </div>
                        </div>
                        <div class="included-items-column">
                            <div class="included-item">
                                <span>✓</span> Redeemable at any partner WorkSpaces
                            </div>
                            <div class="included-item">
                                <span>✓</span> Privileged rates on community events
                            </div>
                            <div class="included-item">
                                <span>✓</span> Valid for 1 month after purchase
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="why-choose-section">
                <h2 class="why-choose-title">Why Choose our Coworking Pass?</h2>
                <div class="benefits-grid">
                    <div class="benefit-item">
                        <div class="benefit-title">Convenient & Accessible</div>
                        <div class="benefit-text">
                            Our WorkSpaces are easy to reach and are ready to welcome you.
                        </div>
                    </div>
                    <div class="benefit-item">
                        <div class="benefit-title">Plug in Anytime</div>
                        <div class="benefit-text">
                            Enjoy peace of mind knowing you're more than welcome to settle in and get straight to work.
                        </div>
                    </div>
                    <div class="benefit-item">
                        <div class="benefit-title">Community</div>
                        <div class="benefit-text">
                            Network with like-minded professionals.
                        </div>
                    </div>
                </div>
                <div class="closing-text">
                    Which pass fits your work style? Let us help you make the most of your workday!
                </div>
            </div>
        </div>

        <div id="allin" class="tab-content">
            <div class="packages-grid">
            @foreach($packages as $package)
    @if($package->title == 'All-in pass')
        <div class="package-card">
            @if($package->id == 4)
                <div class="popular-badge">Most Popular</div>
            @endif
            <h2 class="package-title">{{ $package->name }}</h2>
            <div class="package-price">RM {{ number_format($package->price, 2) }}</div>
            
            @if($package->id == 4)
                <p class="package-description">
                    Perfect for Quick, Productive Days<br><br>
                    ● Gain access to our vibrant partner WorkSpaces for 4 hours.<br><br>
                    ● Includes RM 25 spending credits to use for F&B.<br><br>
                    ● Ideal for individuals who want to
                </p>
            @elseif($package->id == 5)
                <p class="package-description">
                    Great for Balanced Work Weeks<br><br>
                    ● Enjoy 5 access to our inspiring WorkSpaces.<br><br>
                    ● Includes RM 125 (RM 25 x 5) spending credits, perfect for grabbing your comfort food and drinks.<br><br>
                    ● Perfect for hybrid or part-time remote workers who value flexibility and perks.
                </p>
            @elseif($package->id == 6)
                <p class="package-description">
                    Your Premium Coworking Experience<br><br>
                    ● Unlimited access to our WorkSpaces for the month.<br><br>
                    ● Includes a no-limits F&B package (RM25 per WorkSpace, unlimited) spending credits, ensuring you have everything you need to stay productive.<br><br>
                    ● Designed for full-time remote workers or freelancers looking for consistent access to professional and inspiring WorkSpaces.
                </p>
            @endif
            
            <a href="{{ $package->payment_link }}" class="buy-button">Buy Now!</a>
        </div>
    @endif
@endforeach
            </div>

            <div class="included-section">
                <h2 class="included-title">Included in all Plans</h2>
                <div class="included-list">
                    <p class="included-intro">
                        Perfect for those who are looking for that extra perk on your workday.
                    </p>
                    <div class="included-items-container">
                        <div class="included-items-column">
                            <div class="included-item">
                                <span>✓</span> Up to 4-hours per WorkSpace
                            </div>
                            <div class="included-item">
                                <span>✓</span> Wi-Fi, plug point, drinking water
                            </div>
                            <div class="included-item">
                                <span>✓</span> DeviceCover TM
                            </div>
                        </div>
                        <div class="included-items-column">
                            <div class="included-item">
                                <span>✓</span> Up to unlimited spending credits
                            </div>
                            <div class="included-item">
                                <span>✓</span> Redeemable at any partner WorkSpaces
                            </div>
                            <div class="included-item">
                                <span>✓</span> Valid for 1 month after purchase
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="why-choose-section">
                <h2 class="why-choose-title">Why Choose Our All-In Passes?</h2>
                <div class="benefits-grid">
                    <div class="benefit-item">
                        <div class="benefit-title">Value with Flexibility</div>
                        <div class="benefit-text">
                            Work on your schedule while enjoying added spending credits.
                        </div>
                    </div>
                    <div class="benefit-item">
                        <div class="benefit-title">Boost Your Productivity Anytime</div>
                        <div class="benefit-text">
                            Enjoy peace of mind knowing you can step in, focus, and make the most of your workday with
                            meaningful perks.
                        </div>
                    </div>
                    <div class="benefit-item">
                        <div class="benefit-title">Community Perks</div>
                        <div class="benefit-text">
                            Build connections in a dynamic and collaborative setting.
                        </div>
                    </div>
                </div>
                <div class="closing-text">
                    Which pass suits your style of work? Treat yourself to a WorkSpace that works for you!
                </div>
            </div>
        </div>
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
                <a href="https://www.quadrawebs.com" target="_blank" rel="noopener noreferrer"
                    style="color: #EBA49E; text-decoration: none;">
                    Powered by QuadraWebs
                </a>
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