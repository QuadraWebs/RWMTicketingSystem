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
        }

    
        .tab-button {
        padding: 1rem 2rem;
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
            margin-bottom: 1.5rem;
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

        @media (max-width: 768px) {
            .packages-grid {
                grid-template-columns: 1fr;
            }
            
            .tabs {
                flex-direction: column;
                align-items: center;
            }
        }
    </style>
</head>
<body>
<div class="container">
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
                        <a href="{{ $package->payment_link }}" class="buy-button">Get Started</a>
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
                        <p class="package-description">{!! nl2br(e($package->description)) !!}</p>
                        <a href="{{ $package->payment_link }}" class="buy-button">Get Started</a>
                    </div>
                @endif
            @endforeach
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
