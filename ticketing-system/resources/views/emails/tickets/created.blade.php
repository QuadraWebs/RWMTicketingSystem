<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Remote Work Malaysia</title>
</head>

<body
    style="margin: 0; padding: 0; background-color: #f9fafb; font-family: Arial, Helvetica, sans-serif; -webkit-font-smoothing: antialiased;">
    <center style="width: 100%; background-color: #f9fafb;">
        <div style="max-width: 600px; margin: 0 auto;">
            <table role="presentation" cellpadding="0" cellspacing="0" border="0" width="100%"
                style="margin: auto; background-color: #ffffff; border-radius: 8px; box-shadow: 0 2px 4px rgba(0,0,0,0.1);">
                <!-- Header Section -->
                <tr>
                    <td align="center" style="padding: 40px;">
                        <div
                            style="background-color: #172A91; color: white; width: 48px; height: 48px; border-radius: 50%; line-height: 48px; text-align: center; font-size: 24px; margin: 0 auto 20px auto;">
                            🎉</div>
                        <h1 style="color: #172A91; font-size: 24px; margin: 0; text-align: center;">
                            Welcome,<br>{{ $user->name }}!</h1>
                    </td>
                </tr>

                <!-- Package Info -->
                <tr>
                    <td style="padding: 0 40px;">
                        <table role="presentation" width="100%" cellpadding="0" cellspacing="0" border="0"
                            style="background-color: #f8fafc; border-radius: 8px; margin-bottom: 30px;">
                            <tr>
                                <td align="center" style="padding: 25px;">
                                    <p style="margin: 0; color: #4b5563; text-align: center;">Thank you for choosing</p>
                                    <h2 style="color: #172A91; font-size: 20px; margin: 10px 0; text-align: center;">
                                        {{$ticket->package->title}} - {{ $ticket->package->name }}
                                    </h2>
                                    <p style="margin: 0 0 20px 0; color: #4b5563; text-align: center;">from Remote Work
                                        Malaysia</p>

                                    <!-- Validity Box -->
                                    <table role="presentation" width="100%" cellpadding="0" cellspacing="0" border="0"
                                        style="background-color: #172A91; border-radius: 8px;">
                                        <tr>
                                            <td align="center" style="padding: 15px; color: white;">
                                                <div style="font-size: 14px; text-align: center;">Expires on</div>
                                                <div
                                                    style="font-size: 18px; font-weight: bold; margin-top: 5px; text-align: center;">
                                                    {{ $ticket->valid_until->format('d M Y') }}
                                                </div>
                                            </td>
                                        </tr>
                                    </table>

                                    <p style="margin: 20px 0 0 0; color: #4b5563; text-align: center;">Your workspace
                                        transformation journey begins here! Our partner cafes are ready to welcome you.
                                    </p>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>

                <!-- Check-in Steps -->
                <tr>
                    <td style="padding: 0 40px;">
                        <table role="presentation" width="100%" cellpadding="0" cellspacing="0" border="0"
                            style="background-color: #f8fafc; border-radius: 8px;">
                            <tr>
                                <td style="padding: 25px;">
                                    <h3 style="color: #1f2937; font-size: 18px; margin: 0 0 20px 0;">Hey there! 😄
                                        Checking in with your email pass is super simple. Just follow these quick steps:
                                    </h3>
                                    <table role="presentation" width="100%" cellpadding="0" cellspacing="0" border="0">
                                        <tr>
                                            <td style="padding: 8px 0;">
                                                <div style="display: flex; align-items: flex-start;">
                                                    <span
                                                        style="flex-shrink: 0; background-color: #172A91; color: white; width: 24px; height: 24px; border-radius: 50%; text-align: center; line-height: 24px; margin-right: 10px;">1</span>
                                                    <div style="flex: 1;">Tap the <b>"View Pass"</b> button below.</div>
                                                </div>
                                            </td>
                                        </tr>

                                        <!-- Step 2 -->
                                        <tr>
                                            <td style="padding: 8px 0;">
                                                <div style="display: flex; align-items: flex-start;">
                                                    <span
                                                        style="flex-shrink: 0; background-color: #172A91; color: white; width: 24px; height: 24px; border-radius: 50%; text-align: center; line-height: 24px; margin-right: 10px;">2</span>
                                                    <div style="flex: 1;">Once you're in, tap the <b>"Use Pass"</b>
                                                        button below.</div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="padding: 8px 0;">
                                                <div style="display: flex; align-items: flex-start;">
                                                    <span
                                                        style="flex-shrink: 0; background-color: #172A91; color: white; width: 24px; height: 24px; border-radius: 50%; text-align: center; line-height: 24px; margin-right: 10px;">3</span>
                                                    <div style="flex: 1;"> When you're ready to check-in, select the
                                                        WorkSpace and tap <b>"Confirm Check-In"</b>.</div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="padding: 8px 0;">
                                                <div style="display: flex; align-items: flex-start;">
                                                    <span
                                                        style="flex-shrink: 0; background-color: #172A91; color: white; width: 24px; height: 24px; border-radius: 50%; text-align: center; line-height: 24px; margin-right: 10px;">4</span>
                                                    <div style="flex: 1;">A QR Code will appear - let the crew scan your
                                                        QR Code within <b>2 minutes</b> to complete your check-in.</div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="padding: 20px 0 8px 0;">
                                                <table role="presentation" width="100%" cellpadding="0" cellspacing="0"
                                                    border="0">
                                                    <tr>
                                                        <td>
                                                            <div
                                                                style=" padding: 15px; background-color: #f0f7ff; border-left: 4px solid #172A91; border-radius: 4px;">
                                                                <div
                                                                    style="color: #172A91; font-weight: bold; margin-bottom: 5px;">
                                                                    🎉 You're all set!</div>
                                                                <div style="color: #4b5563;">Feel free to ask our
                                                                    friendly staff if you need any assistance.</div>
                                                            </div>
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

                <!-- Button -->
                <tr>
                    <td align="center" style="padding: 30px 40px;">
                        <a href="{{ url('/viewticket/' . $user->uuid) }}"
                            style="background-color: #172A91; color: white; padding: 16px 32px; border-radius: 8px; text-decoration: none; font-weight: bold; display: inline-block;">View
                            Pass</a>
                    </td>
                </tr>

         
                <!-- Important Notes Section -->
                <tr>
                    <td style="padding: 20px 40px;">
                        <table role="presentation" width="100%" cellpadding="0" cellspacing="0" border="0"
                            style="background-color: #f8fafc; border-radius: 8px;">
                            <tr>
                                <td style="padding: 25px;">
                                    <h3 style="color: #1f2937; font-size: 16px; margin: 0 0 15px 0;">Important Notes:
                                    </h3>
                                    <ul style="margin: 0; padding: 0 0 0 20px; color: #4b5563;">
                                        <li style="margin-bottom: 10px;">Each pass admits one person and is for one-time
                                            use (except monthly pass).</li>
                                        <li style="margin-bottom: 10px;">You can redeem it at <a href="https://remotework.com.my/map/"
                                            style="color: #172A91; text-decoration: none;">any WorkSpaces</a> during
                                            their remote work hours.</li>
                                        <li style="margin-bottom: 10px;">For questions related to WorkSpaces and seat
                                            availability, please contact the WorkSpace directly.</li>
                                        <li style="margin-bottom: 10px;">Passes are non-refundable, non-cancellable and
                                            non-transferable.</li>
                                        <li style="margin-bottom: 10px;">For monthly pass holders, you must present a
                                            valid photo ID with the same name. Failure to do so may result in your pass
                                            not being honoured.</li>
                                    </ul>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>

                <!-- Support Links Section -->
                <tr>
                    <td style="padding: 0 40px 20px;">
                        <table role="presentation" width="100%" cellpadding="0" cellspacing="0" border="0">
                            <tr>
                                <td style="padding: 20px 0; border-bottom: 1px solid #e5e7eb;">
                                    <h3 style="color: #1f2937; font-size: 16px; margin: 0 0 10px 0;">Need support?</h3>
                                    <p style="margin: 0; color: #4b5563;">Browse our <a href="https://remotework.com.my/#faq"
                                            style="color: #172A91; text-decoration: none;">FAQ</a> for quick answers.
                                    </p>
                                </td>
                            </tr>
                            <tr>
                                <td style="padding: 20px 0;">
                                    <h3 style="color: #1f2937; font-size: 16px; margin: 0 0 10px 0;">Inspire yourself
                                        with the <a href="https://pass.remotework.com.my/packages"
                                            style="color: #172A91; text-decoration: none;">next Workspace Pass</a></h3>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>

                <!-- Footer -->
                <tr>
                    <td align="center" style="padding: 0px 40px;">
                        <p style="color: #6b7280; font-size: 13px; line-height: 20px; margin: 0;">
                            Remote Work Malaysia<br>
                            Need help? Contact us at <a href="mailto:hi@remotework.com.my"
                                style="color: #172A91; text-decoration: none;">hi@remotework.com.my</a>
                        </p>
                    </td>
                </tr>
            </table>
        </div>
    </center>
</body>

</html>