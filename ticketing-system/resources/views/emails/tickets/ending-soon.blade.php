<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Session Ending Soon</title>
</head>

<body style="margin: 0; padding: 0; background-color: #f9fafb; font-family: Arial, sans-serif;">
    <table role="presentation" width="100%" cellpadding="0" cellspacing="0"
        style="min-width: 100%; background-color: #f9fafb;">
        <tr>
            <td align="center" style="padding: 30px 0;">
                <table role="presentation" cellpadding="0" cellspacing="0" width="600"
                    style="background-color: #ffffff; border-radius: 8px; box-shadow: 0 2px 4px rgba(0,0,0,0.1);">
                    <tr>
                        <td style="padding: 40px;">
                            <!-- Header -->
                            <table role="presentation" width="100%" cellpadding="0" cellspacing="0">
                                <tr>
                                    <td align="center">
                                        <div
                                            style="background-color: #2563eb; color: white; width: 48px; height: 48px; border-radius: 50%; line-height: 48px; text-align: center; font-size: 24px; margin-bottom: 20px;">
                                            ⏰</div>
                                        <h1 style="color: #2563eb; font-size: 24px; margin: 0 0 30px 0;">Time's Almost
                                            Up!</h1>
                                    </td>
                                </tr>
                            </table>

                            <!-- Session Info -->
                            <table role="presentation" width="100%" cellpadding="0" cellspacing="0"
                                style="background-color: #f8fafc; border-radius: 8px; margin-bottom: 30px;">
                                <tr>
                                    <td style="padding: 25px;">
                                        <p style="margin: 0; color: #4b5563;">Your session is ending soon</p>
                                        @if($cafe)
                                            <h2 style="color: #2563eb; font-size: 20px; margin: 10px 0;">{{ $cafe->name }}
                                            </h2>
                                        @endif

                                        <!-- End Time Box -->
                                        <table role="presentation" width="100%" cellpadding="0" cellspacing="0"
                                            style="background: #172A91; border-radius: 8px; margin: 20px 0;">
                                            <tr>
                                                <td style="padding: 15px; color: white; text-align: center;">
                                                    <div style="font-size: 14px;">Your Session Ends At</div>
                                                    <div style="font-size: 18px; font-weight: bold; margin-top: 5px;">
                                                        {{ $endTime->format('h:i A') }}</div>
                                                </td>
                                            </tr>
                                        </table>

                                        <p style="margin: 0; color: #4b5563;">Please prepare to wrap up your work
                                            session. Thank you for using our workspace!</p>
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
                                                                <a href="https://www.instagram.com/remoteworkmy/" style="color: #000000;">
                                                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="#172A91">
                                                                        <path
                                                                            d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z" />
                                                                    </svg>
                                                                </a>
                                                            </td>
                                                            <td style="padding: 0 10px;">
                                                                <a href="https://www.facebook.com/share/g/ibBdv366a6jYdJ87/?mibextid=K35XfP"
                                                                    style="color: #000000;">
                                                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="#172A91">
                                                                        <path
                                                                            d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z" />
                                                                    </svg>
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