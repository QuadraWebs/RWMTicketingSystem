<!DOCTYPE html>
<html>
<head>
    <style>
        @font-face {
            font-family: 'Sofia Pro';
            src: url('/fonts/Sofia Pro Black Az.otf') format('opentype');
            font-weight: 900;
            font-style: normal;
        }

        :root { --gradient: linear-gradient(135deg, #2563eb, #9333ea); }
        body { 
            margin: 0; 
            padding: 30px; 
            font-family: 'Sofia Pro', 'Segoe UI', Arial, sans-serif; 
            background: #f9fafb; 
        }
        .card { 
            background: #fff;
            border-radius: 16px;
            box-shadow: 0 4px 6px -1px rgba(0,0,0,0.1);
            padding: 40px;
            max-width: 480px;
            margin: 0 auto;
            box-sizing: border-box;
            font-family: 'Sofia Pro', 'Segoe UI', Arial, sans-serif;
        }
        .header { 
            font-size: 24px;
            font-weight: 700;
            margin-bottom: 30px;
            background: var(--gradient);
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
            text-align: center;
        }
        .receipt-header {
            text-align: center;
            margin-bottom: 20px;
        }
        .check-icon {
            width: 48px;
            height: 48px;
            margin: 0 auto 15px;
            background: var(--gradient);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 24px;
        }
        .ticket-container {
            background: #f8fafc;
            border-radius: 12px;
            padding: 25px;
            margin-bottom: 30px;
        }
        .package-name {
            font-size: 20px;
            font-weight: 600;
            background: var(--gradient);
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
            margin: 15px 0;
        }
        .welcome-text {
            color: #4b5563;
            line-height: 1.6;
            font-size: 15px;
        }
        .validity-box {
            background: var(--gradient);
            color: white;
            padding: 15px;
            border-radius: 8px;
            text-align: center;
            margin: 20px 0;
        }
        .validity-label { font-size: 14px; opacity: 0.9; }
        .validity-date { font-size: 18px; font-weight: 600; margin-top: 5px; }
        .thank-you-box {
            background: #f0f9ff;
            border: 1px solid #bae6fd;
            padding: 15px;
            border-radius: 8px;
            text-align: center;
            margin: 20px 0;
            color: #0369a1;
        }
        .footer {
            text-align: center;
            color: #6b7280;
            font-size: 13px;
            margin-top: 30px;
            padding-top: 20px;
            border-top: 1px solid #e5e7eb;
        }
        .support a {
            color: #2563eb;
            text-decoration: none;
            font-weight: 500;
        }
    </style>
</head>
<body>
    <div class="card">
        <div class="receipt-header">
            <div class="check-icon">✓</div>
            <h1 class="header">Session Complete!</h1>
        </div>
        
        <div class="ticket-container">
            <div class="welcome-text">You've completed your session at</div>
            @if($cafe)
                <div class="package-name">{{ $cafe->name }}</div>
            @endif
            
            <div class="validity-box">
                <div class="mt-2">
                    <div class="validity-label">Session Ended At</div>
                    <div class="validity-date">{{ $endTime->format('h:i A') }}</div>
                </div>
            </div>
            
            <div class="thank-you-box">
                Thank you for choosing Remote Work Malaysia! We hope you had a productive session.
            </div>
        </div>
        
        <div class="footer">
            Remote Work Malaysia<br>
            <div class="support">
                Need help? Contact us at <a href="mailto:hi@remotework.com.my">hi@remotework.com.my</a>
            </div>
        </div>
    </div>
</body>
</html>
