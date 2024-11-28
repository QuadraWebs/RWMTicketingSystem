<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Remote Work Malaysia</title>
</head>
<body style="margin: 0; padding: 0; background-color: #f9fafb; font-family: Arial, Helvetica, sans-serif; -webkit-font-smoothing: antialiased;">
    <table role="presentation" width="100%" cellpadding="0" cellspacing="0" border="0" style="width: 100%; max-width: 600px; margin: 0 auto; background-color: #f9fafb;">
        <tr>
            <td align="center" style="padding: 30px 0;">
                <table role="presentation" cellpadding="0" cellspacing="0" border="0" style="width: 100%; max-width: 600px; background-color: #ffffff; border-radius: 8px; box-shadow: 0 2px 4px rgba(0,0,0,0.1);">
                    <!-- Header Section -->
                    <tr>
                        <td style="padding: 40px; text-align: center;">
                            <div style="background-color: #172A91; color: white; width: 48px; height: 48px; border-radius: 50%; line-height: 48px; text-align: center; font-size: 24px; margin: 0 auto 20px auto;">🎉</div>
                            <h1 style="color: #172A91; font-size: 24px; margin: 0;">Welcome,<br>{{ $user->name }}!</h1>
                        </td>
                    </tr>

                    <!-- Package Info -->
                    <tr>
                        <td style="padding: 0 40px;">
                            <table role="presentation" cellpadding="0" cellspacing="0" border="0" style="width: 100%; background-color: #f8fafc; border-radius: 8px; margin-bottom: 30px;">
                                <tr>
                                    <td style="padding: 25px; text-align: center;">
                                        <p style="margin: 0; color: #4b5563;">Thank you for choosing</p>
                                        <h2 style="color: #172A91; font-size: 20px; margin: 10px 0;">{{ $ticket->package->name }}</h2>
                                        <p style="margin: 0 0 20px 0; color: #4b5563;">from Remote Work Malaysia</p>
                                        
                                        <!-- Validity Box -->
                                        <table role="presentation" cellpadding="0" cellspacing="0" border="0" style="width: 100%; background-color: #172A91; border-radius: 8px;">
                                            <tr>
                                                <td style="padding: 15px; color: white; text-align: center;">
                                                    <div style="font-size: 14px;">Valid Until</div>
                                                    <div style="font-size: 18px; font-weight: bold; margin-top: 5px;">{{ $ticket->valid_until->format('d M Y') }}</div>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>

                    <!-- Check-in Steps -->
                    <tr>
                        <td style="padding: 0 40px;">
                            <table role="presentation" cellpadding="0" cellspacing="0" border="0" style="width: 100%; background-color: #f8fafc; border-radius: 8px;">
                                <tr>
                                    <td style="padding: 25px;">
                                        <h3 style="color: #1f2937; font-size: 18px; margin: 0 0 20px 0;">How to Check-in:</h3>
                                        <table role="presentation" cellpadding="0" cellspacing="0" border="0" style="width: 100%;">
                                            <tr>
                                                <td style="padding: 8px 0;">
                                                    <span style="display: inline-block; background-color: #172A91; color: white; width: 24px; height: 24px; border-radius: 50%; text-align: center; line-height: 24px; margin-right: 10px;">1</span>
                                                    Click the "View Ticket" button below
                                                </td>
                                            </tr>
                                            <!-- Repeat for steps 2-5 -->
                                        </table>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>

                    <!-- Button -->
                    <tr>
                        <td style="padding: 30px 40px; text-align: center;">
                            <a href="{{ url('/viewticket/' . $user->uuid) }}" style="display: inline-block; background-color: #172A91; color: white; padding: 16px 32px; border-radius: 8px; text-decoration: none; font-weight: bold;">View Ticket</a>
                        </td>
                    </tr>

                    <!-- Notice -->
                    <tr>
                        <td style="padding: 0 40px; text-align: center;">
                            <p style="color: #dc2626; font-size: 13px;">* All tickets are non-refundable</p>
                        </td>
                    </tr>

                    <!-- Footer -->
                    <tr>
                        <td style="padding: 20px 40px; text-align: center;">
                            <p style="color: #6b7280; font-size: 13px; line-height: 20px;">
                                Remote Work Malaysia<br>
                                Need help? Contact us at <a href="mailto:hi@remotework.com.my" style="color: #172A91; text-decoration: none;">hi@remotework.com.my</a>
                            </p>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>
</html>
