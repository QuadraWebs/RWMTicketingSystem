<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Check-in Successful</title>
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
                                        <div style="background-color: #2563eb; color: white; width: 48px; height: 48px; border-radius: 50%; line-height: 48px; text-align: center; font-size: 24px; margin-bottom: 20px;">✓</div>
                                        <h1 style="color: #2563eb; font-size: 24px; margin: 0 0 30px 0;">Check-in Successful!</h1>
                                    </td>
                                </tr>
                            </table>

                            <!-- Cafe Info -->
                            <table role="presentation" width="100%" cellpadding="0" cellspacing="0" style="background-color: #f8fafc; border-radius: 8px; margin-bottom: 30px;">
                                <tr>
                                    <td style="padding: 25px;">
                                        <p style="margin: 0; color: #4b5563;">Welcome to</p>
                                        <h2 style="color: #2563eb; font-size: 20px; margin: 10px 0;">{{ $cafe->name }}</h2>
                                        
                                        <!-- Session Time -->
                                        <table role="presentation" width="100%" cellpadding="0" cellspacing="0" style="background: linear-gradient(135deg, #2563eb, #9333ea); border-radius: 8px; margin: 20px 0;">
                                            <tr>
                                                <td style="padding: 15px; color: white; text-align: center;">
                                                    <div style="font-size: 14px;">Session Ends At</div>
                                                    <div style="font-size: 18px; font-weight: bold; margin-top: 5px;">{{ $endTime->format('h:i A') }}</div>
                                                </td>
                                            </tr>
                                        </table>
                                        
                                        <p style="margin: 0; color: #4b5563;">Enjoy your productive workspace experience!</p>
                                    </td>
                                </tr>
                            </table>

                            <!-- Guidelines -->
                            <table role="presentation" width="100%" cellpadding="0" cellspacing="0" style="background-color: #f8fafc; border-radius: 8px;">
                                <tr>
                                    <td style="padding: 25px;">
                                        <h3 style="color: #1f2937; font-size: 18px; margin: 0 0 20px 0;">Workspace Guidelines:</h3>
                                        <table role="presentation" width="100%" cellpadding="0" cellspacing="0">
                                            <tr>
                                                <td style="padding: 8px 0;">
                                                    <span
                                                        style="background-color: #2563eb; color: white; width: 24px; height: 24px; border-radius: 50%; display: inline-block; text-align: center; line-height: 24px; margin-right: 10px; font-size: 12px;">1</span>
                                                    Please keep your workspace clean
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="padding: 8px 0;">
                                                    <span 
                                                        style="background-color: #2563eb; color: white; width: 24px; height: 24px; border-radius: 50%; display: inline-block; text-align: center; line-height: 24px; margin-right: 10px; font-size: 12px;">2</span>
                                                    Respect other coworkers' space
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="padding: 8px 0;">
                                                    <span 
                                                        style="background-color: #2563eb; color: white; width: 24px; height: 24px; border-radius: 50%; display: inline-block; text-align: center; line-height: 24px; margin-right: 10px; font-size: 12px;">3</span>
                                                    Use headphones for calls/media
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="padding: 8px 0;">
                                                    <span 
                                                        style="background-color: #2563eb; color: white; width: 24px; height: 24px; border-radius: 50%; display: inline-block; text-align: center; line-height: 24px; margin-right: 10px; font-size: 12px;">4</span>
                                                    Follow cafe house rules
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>

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
