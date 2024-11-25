<!DOCTYPE html>
<html>
<head>
    <style>
        :root { --gradient: linear-gradient(135deg, #2563eb, #9333ea); }
        body { margin: 0; padding: 30px; font-family: 'Segoe UI', Arial, sans-serif; background: #f9fafb; }
        .card { 
            background: #fff;
            border-radius: 16px;
            box-shadow: 0 4px 6px -1px rgba(0,0,0,0.1), 0 2px 4px -1px rgba(0,0,0,0.06);
            padding: 40px;
            max-width: 480px;
            margin: 0 auto;
            box-sizing: border-box;
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
        .steps-container {
            background: #f8fafc;
            border-radius: 12px;
            padding: 25px;
            margin: 30px 0;
        }
        .steps-title {
            font-size: 18px;
            font-weight: 600;
            color: #1f2937;
            margin-bottom: 20px;
        }
        .step {
            display: flex;
            align-items: flex-start;
            margin-bottom: 15px;
            color: #4b5563;
            font-size: 15px;
            line-height: 1.5;
        }
        .step-number {
            background: var(--gradient);
            color: white;
            width: 24px;
            height: 24px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 12px;
            margin-right: 12px;
            flex-shrink: 0;
        }
        .btn {
            background: var(--gradient);
            color: white;
            padding: 16px 32px;
            border-radius: 8px;
            text-decoration: none;
            display: inline-block;
            font-weight: 600;
            text-align: center;
            width: 100%;
            box-sizing: border-box;
            transition: transform 0.2s;
        }
        .notice {
            color: #dc2626;
            font-size: 13px;
            text-align: center;
            margin: 20px 0;
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
            <div class="check-icon">🎉</div>
            <h1 class="header">Welcome, {{ $user->name }}!</h1>
        </div>
        
        <div class="ticket-container">
            <div class="welcome-text">Thank you for choosing</div>
            <div class="package-name">{{ $ticket->package->name }}</div>
            <div class="welcome-text">from Remote Work Malaysia</div>
            
            <div class="validity-box">
                <div class="validity-label">Valid Until</div>
                <div class="validity-date">{{ $ticket->valid_until->format('d M Y') }}</div>
            </div>
            
            <div class="welcome-text">Your workspace transformation journey begins here! Our partner cafes are ready to welcome you.</div>
        </div>

        <div class="steps-container">
            <div class="steps-title">How to Check-in:</div>
            <div class="step">
                <span class="step-number">1</span>
                <span>Click the "View Ticket" button below</span>
            </div>
            <div class="step">
                <span class="step-number">2</span>
                <span>Select your desired ticket</span>
            </div>
            <div class="step">
                <span class="step-number">3</span>
                <span>Choose your preferred cafe</span>
            </div>
            <div class="step">
                <span class="step-number">4</span>
                <span>Click "Check-in" button</span>
            </div>
            <div class="step">
                <span class="step-number">5</span>
                <span>Present the QR code to cafe staff within 2 minutes</span>
            </div>
        </div>

        <a href="{{ url('/viewticket/' . $user->uuid) }}" class="btn">View Ticket</a>
        
        <div class="notice">* All tickets are non-refundable</div>
        
        <div class="footer">
            {{ config('app.name') }}<br>
            <div class="support">
                Need help? Contact us at <a href="mailto:hi@remotework.com.my">hi@remotework.com.my</a>
            </div>
        </div>
    </div>
</body>
</html>
