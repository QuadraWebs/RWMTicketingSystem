<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Remote Work Malaysia</title>
</head>
<body style="margin: 0; padding: 0; background-color: #f9fafb; font-family: Arial, sans-serif;">
    <table role="presentation" width="100%" cellpadding="0" cellspacing="0" style="min-width: 100%; background-color: #f9fafb;">
        <tr>
            <td align="center" style="padding: 30px 0;">
                <table role="presentation" cellpadding="0" cellspacing="0" width="600" style="background-color: #ffffff; border-radius: 8px; box-shadow: 0 2px 4px rgba(0,0,0,0.1);">
                    <tr>
                        <td style="padding: 40px;">
                            <!-- Header -->
                            <table role="presentation" width="100%" cellpadding="0" cellspacing="0">
                                <tr>
                                    <td align="center">
                                        <div style="background-color: #2563eb; color: white; width: 48px; height: 48px; border-radius: 50%; line-height: 48px; text-align: center; font-size: 24px; margin-bottom: 20px;">🎉</div>
                                        <h1 style="color: #2563eb; font-size: 24px; margin: 0 0 30px 0;">Welcome, {{ $user->name }}!</h1>
                                    </td>
                                </tr>
                            </table>

                            <!-- Package Info -->
                            <table role="presentation" width="100%" cellpadding="0" cellspacing="0" style="background-color: #f8fafc; border-radius: 8px; margin-bottom: 30px;">
                                <tr>
                                    <td style="padding: 25px;">
                                        <p style="margin: 0; color: #4b5563;">Thank you for choosing</p>
                                        <h2 style="color: #2563eb; font-size: 20px; margin: 10px 0;">{{ $ticket->package->name }}</h2>
                                        <p style="margin: 0; color: #4b5563;">from Remote Work Malaysia</p>
                                        
                                        <!-- Validity Box -->
                                        <table role="presentation" width="100%" cellpadding="0" cellspacing="0" style="background: linear-gradient(135deg, #2563eb, #9333ea); border-radius: 8px; margin: 20px 0;">
                                            <tr>
                                                <td style="padding: 15px; color: white; text-align: center;">
                                                    <div style="font-size: 14px;">Valid Until</div>
                                                    <div style="font-size: 18px; font-weight: bold; margin-top: 5px;">{{ $ticket->valid_until->format('d M Y') }}</div>
                                                </td>
                                            </tr>
                                        </table>
                                        
                                        <p style="margin: 0; color: #4b5563;">Your workspace transformation journey begins here! Our partner cafes are ready to welcome you.</p>
                                    </td>
                                </tr>
                            </table>

                            <!-- Check-in Steps -->
                            <table role="presentation" width="100%" cellpadding="0" cellspacing="0" style="background-color: #f8fafc; border-radius: 8px; margin-bottom: 30px;">
                                <tr>
                                    <td style="padding: 25px;">
                                        <h3 style="color: #1f2937; font-size: 18px; margin: 0 0 20px 0;">How to Check-in:</h3>
                                        <table role="presentation" width="100%" cellpadding="0" cellspacing="0">
                                            <tr><td style="padding: 8px 0;"><span style="background-color: #2563eb; color: white; width: 24px; height: 24px; border-radius: 50%; display: inline-block; text-align: center; margin-right: 10px;">1</span>Click the "View Ticket" button below</td></tr>
                                            <tr><td style="padding: 8px 0;"><span style="background-color: #2563eb; color: white; width: 24px; height: 24px; border-radius: 50%; display: inline-block; text-align: center; margin-right: 10px;">2</span>Select your desired ticket</td></tr>
                                            <tr><td style="padding: 8px 0;"><span style="background-color: #2563eb; color: white; width: 24px; height: 24px; border-radius: 50%; display: inline-block; text-align: center; margin-right: 10px;">3</span>Choose your preferred cafe</td></tr>
                                            <tr><td style="padding: 8px 0;"><span style="background-color: #2563eb; color: white; width: 24px; height: 24px; border-radius: 50%; display: inline-block; text-align: center; margin-right: 10px;">4</span>Click "Check-in" button</td></tr>
                                            <tr><td style="padding: 8px 0;"><span style="background-color: #2563eb; color: white; width: 24px; height: 24px; border-radius: 50%; display: inline-block; text-align: center; margin-right: 10px;">5</span>Present the QR code to cafe staff within 2 minutes</td></tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>

                            <!-- View Ticket Button -->
                            <table role="presentation" width="100%" cellpadding="0" cellspacing="0">
                                <tr>
                                    <td align="center">
                                        <a href="{{ url('/viewticket/' . $user->uuid) }}" style="background-color: #2563eb; color: white; padding: 16px 32px; border-radius: 8px; text-decoration: none; display: inline-block; font-weight: bold;">View Ticket</a>
                                    </td>
                                </tr>
                            </table>

                            <!-- Notice -->
                            <p style="color: #dc2626; font-size: 13px; text-align: center; margin: 20px 0;">* All tickets are non-refundable</p>

                            <!-- Footer -->
                             <table role="presentation" width="100%" cellpadding="0" cellspacing="0">
                                <tr>
                                    <td align="center">
                                        <table role="presentation" cellpadding="0" cellspacing="0" style="width: 100%; max-width: 600px;">
                                            <tr>
                                                <td align="center" style="color: #6b7280; font-size: 13px; line-height: 20px; padding: 0 20px;">
                                                    Remote Work Malaysia<br>
                                                    Need help? Contact us at <a href="mailto:hi@remotework.com.my"
                                                        style="color: #2563eb; text-decoration: none;">hi@remotework.com.my</a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td align="center" style="padding-top: 15px;">
                                                    <table role="presentation" cellpadding="0" cellspacing="0">
                                                        <tr>
                                                            <td style="padding: 0 10px;">
                                                                <a href="https://www.instagram.com/remoteworkmy/">
                                                                    <img src="https://cdn.jsdelivr.net/npm/simple-icons@v5/icons/instagram.svg"
                                                                        alt="Instagram" width="24" height="24" style="display: block; border: 0;">
                                                                </a>
                                                            </td>
                                                            <td style="padding: 0 10px;">
                                                                <a href="https://www.facebook.com/search/top?q=remote%20work%20malaysia">
                                                                    <img src="https://cdn.jsdelivr.net/npm/simple-icons@v5/icons/facebook.svg"
                                                                        alt="Facebook" width="24" height="24" style="display: block; border: 0;">
                                                                </a>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>

                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>
</html>
