<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>Your Warranty Verification Code</title>
    </head>

    <body style="margin: 0; padding: 0; background: #0b0b0b; font-family: 'Conqueraa', Arial, Helvetica, sans-serif">
        <table width="100%" cellpadding="0" cellspacing="0" style="background: #0b0b0b; padding: 40px 0">
            <tr>
                <td align="center">
                    <table
                        width="600"
                        cellpadding="0"
                        cellspacing="0"
                        style="background: #111111; border-radius: 10px; overflow: hidden; border: 1px solid #1f1f1f"
                    >
                        <!-- Header -->
                        <tr>
                            <td style="padding: 30px; text-align: center; border-bottom: 1px solid #1f1f1f">
                                <h1 style="margin: 0; color: #ffffff; font-size: 28px; letter-spacing: 2px">
                                    Paint Protection Warranty
                                </h1>

                                <h4 style="margin: 8px 0 0; color: #9ca3af; font-size: 14px">
                                    Zach O'Grady
                                </h4>
                            </td>
                        </tr>

                        <!-- Info Message -->
                        <tr>
                            <td style="padding: 30px">
                                <div
                                    style="
                                        background: #1f2937;
                                        border: 1px solid #374151;
                                        color: #e5e7eb;
                                        padding: 15px;
                                        border-radius: 6px;
                                        font-size: 14px;
                                    "
                                >
                                    We received a otp to check warranty details for warranty number
                                    <strong>#{{ $warrantyNumber }}</strong>.
                                </div>
                            </td>
                        </tr>

                        <!-- OTP Section -->
                        <tr>
                            <td style="padding: 0 30px 30px 30px; text-align: center">
                                <p style="color: #9ca3af; font-size: 14px; margin-bottom: 10px">
                                    Your verification code is
                                </p>

                                <div
                                    style="
                                        background: #0f0f0f;
                                        border: 1px solid #1f1f1f;
                                        border-radius: 8px;
                                        padding: 20px;
                                        display: inline-block;
                                    "
                                >
                                    <span
                                        style="font-size: 32px; letter-spacing: 8px; font-weight: bold; color: #facc15"
                                    >
                                        {{ $otp }}
                                    </span>
                                </div>

                                <p style="color: #9ca3af; font-size: 13px; margin-top: 15px">
                                    This code will expire in <strong>10 minutes</strong>.
                                </p>

                                <p style="color: #6b7280; font-size: 13px">
                                    If you did not request this code, you can safely ignore this email.
                                </p>
                            </td>
                        </tr>

                        <!-- Footer -->
                        <tr>
                            <td style="padding: 25px 30px; border-top: 1px solid #1f1f1f; text-align: center">
                                <p style="margin: 0; color: #9ca3af; font-size: 13px">
                                    If you need anything, reply to this email or call us
                                </p>

                                <p style="margin: 6px 0 0; color: #facc15; font-size: 16px; font-weight: bold">
                                    0400 527 840
                                </p>

                                <p style="margin-top: 15px; color: #6b7280; font-size: 12px">
                                    © {{ date('Y') }} Proflect. All rights reserved.
                                </p>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
    </body>
</html>
