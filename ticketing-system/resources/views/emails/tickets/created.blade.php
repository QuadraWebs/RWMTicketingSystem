<!DOCTYPE html>
<html>
<head>
    <style>
        body{margin:0;padding:20px}
        .card{background:#fff;border-radius:8px;box-shadow:0 2px 4px rgba(0,0,0,.1);padding:30px;max-width:350px;margin:0 auto;box-sizing:border-box}
        .header{font-size:18px;margin-bottom:25px;background-image:linear-gradient(to right, #2563eb, #9333ea);-webkit-background-clip:text;background-clip:text;color:transparent}
        .row{margin-bottom:12px;line-height:1.6}
        .label{background-image:linear-gradient(to right, #2563eb, #9333ea);-webkit-background-clip:text;background-clip:text;color:transparent;font-weight:700;display:block;margin:8px 0}
        .value{color:#4b5563;margin-top:8px;line-height:1.4;display:block;font-size:13px;font-style:italic}
        .validity{margin-top:15px;padding:12px;background:#f8fafc;border-radius:6px;text-align:center}
        .validity-label{color:#4b5568;font-size:12px;display:block;margin-bottom:4px}
        .validity-date{background-image:linear-gradient(to right, #2563eb, #9333ea);-webkit-background-clip:text;background-clip:text;color:transparent;font-weight:600;font-size:14px}
        .btn{background-image:linear-gradient(to right, #2563eb, #9333ea);color:#fff;padding:12px 24px;border-radius:6px;text-decoration:none;display:block;margin:25px 0;text-align:center}
        .footer{text-align:center;color:#6b7280;font-size:12px;margin-top:25px;padding-top:15px;border-top:1px solid #edf2f7}
        .steps{padding:20px 0;margin:20px 0;border-top:1px solid #edf2f7}
        .step{margin-bottom:10px;color:#4b5563;font-size:14px}
        .step-number{font-weight:700;background-image:linear-gradient(to right, #2563eb, #9333ea);-webkit-background-clip:text;background-clip:text;color:transparent}
        .notice{color:#dc2626;font-size:12px;text-align:center;margin:15px 0;padding:0 20px;word-wrap:break-word}
        .support{background-image:linear-gradient(to right, #2563eb, #9333ea);-webkit-background-clip:text;background-clip:text;color:transparent;font-size:12px;text-align:center;margin-top:10px}
        .details{margin-bottom:20px}
        .purchase-text{display:block;margin-bottom:8px}
        .company-name{display:block;margin-top:8px}
    </style>
</head>
<body>
    <div class="card">
        <h1 class="header">Hi {{ $user->name }}!</h1>
        <div class="details">
            <div class="row">
                <span class="purchase-text">Thank you for purchasing</span>
                <span class="label">{{ $ticket->package->name }}</span>
                <span class="company-name">from Remote Work Malaysia!</span>
            </div>
            <div class="value">
                Ready to transform your workspace? Our partner cafes await!
            </div>
            <div class="validity">
                <span class="validity-label">Valid Until</span>
                <span class="validity-date">{{ $ticket->valid_until->format('d M Y') }}</span>
            </div>
        </div>
        <div class="steps">
            <h2 style="background-image:linear-gradient(to right, #2563eb, #9333ea);-webkit-background-clip:text;background-clip:text;color:transparent;font-size:16px;margin-bottom:15px">5 simple steps to Check-in:</h2>
            <div class="step"><span class="step-number">1.</span> Click the "View Ticket" button below</div>
            <div class="step"><span class="step-number">2.</span> Select your desired ticket</div>
            <div class="step"><span class="step-number">3.</span> Choose cafe from dropdown</div>
            <div class="step"><span class="step-number">4.</span> Click "Check-in" button</div>
            <div class="step"><span class="step-number">5.</span> Show generated QR code to restaurant cashier within 2 minutes</div>
        </div>
        <a href="{{ url('/viewticket/' . $user->uuid) }}" class="btn">View Ticket</a>
        <div class="notice">* Tickets sold are non-refundable</div>
        <div class="footer" style="width:100%;max-width:100%;box-sizing:border-box;margin-left:0;margin-right:0">
            {{ config('app.name') }}<br>
            <div class="support">
                Support: <a href="mailto:hi@remotework.com.my" style="text-decoration:none;background-image:linear-gradient(to right, #2563eb, #9333ea);-webkit-background-clip:text;background-clip:text;color:transparent;">hi@remotework.com.my</a>
            </div>
        </div>
    </div>
</body>
</html>
