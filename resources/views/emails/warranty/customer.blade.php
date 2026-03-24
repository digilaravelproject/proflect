<!doctype html>

<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>Warranty Request Received</title>
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

                        <!-- Success Message -->

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
                                    Your warranty request <strong>(#{{ $warranty->unique_number }})</strong> was
                                    submitted on <strong>{{ $warranty->warranty_date->format('d/m/Y H:i') }}</strong>.
                                    We will contact you soon.
                                </div>
                            </td>
                        </tr>

                        <!-- Greeting -->

                        <tr>
                            <td style="padding: 0 30px 20px 30px">
                                <p style="color: #e5e7eb; font-size: 16px; margin: 0">
                                    Hi <strong>{{ $warranty->name }}</strong>,
                                </p>

                                <p style="color: #9ca3af; font-size: 14px; line-height: 1.6">
                                    Thanks for submitting a warranty request with Proflect. Our team has received your
                                    details and will contact you shortly to confirm the next steps.
                                </p>
                            </td>
                        </tr>

                        <!-- Details -->

                        <tr>
                            <td style="padding: 0 30px 30px 30px">
                                <h3 style="color: #ffffff; margin-bottom: 15px">Warranty Details</h3>

                                <table
                                    width="100%"
                                    cellpadding="8"
                                    cellspacing="0"
                                    style="border-collapse: collapse; font-size: 14px"
                                >
                                    <tr>
                                        <td style="color: #9ca3af">Warranty Number</td>
                                        <td style="color: #ffffff">{{ $warranty->unique_number }}</td>
                                    </tr>

                                    <tr>
                                        <td style="color: #9ca3af">Car Model</td>
                                        <td style="color: #ffffff">{{ $warranty->car_model }}</td>
                                    </tr>

                                    <tr>
                                        <td style="color: #9ca3af">Phone</td>
                                        <td style="color: #ffffff">{{ $warranty->phone }}</td>
                                    </tr>

                                    <tr>
                                        <td style="color: #9ca3af">Email</td>
                                        <td style="color: #ffffff">{{ $warranty->email }}</td>
                                    </tr>
                                </table>
                            </td>
                        </tr>

                        <!-- Warranty Card -->

                        <tr>
                            <td style="padding: 30px">
                                <h3 style="color: #ffffff; margin-bottom: 20px; text-align: center">Your Warranty Card</h3>

                                <table
                                    width="100%"
                                    cellpadding="0"
                                    cellspacing="0"
                                    style="
                                        background: linear-gradient(135deg, #2a2a2a 0%, #1a1a1a 50%, #0f0f0f 100%);
                                        border-radius: 20px;
                                        border: 1px solid rgba(217, 119, 6, 0.4);
                                        overflow: hidden;
                                        max-width: 400px;
                                        margin: 0 auto;
                                    "
                                >
                                    <tr>
                                        <td style="padding: 35px 25px; text-align: center; position: relative; background: url('data:image/svg+xml,<svg xmlns=\"http://www.w3.org/2000/svg\" width=\"100\" height=\"100\"><defs><pattern id=\"diag\" patternUnits=\"userSpaceOnUse\" width=\"60\" height=\"60\" patternTransform=\"rotate(45)\"><line x1=\"0\" y1=\"0\" x2=\"0\" y2=\"60\" stroke=\"rgba(217,119,6,0.1)\" stroke-width=\"6\"/></pattern></defs><rect width=\"100\" height=\"100\" fill=\"url(%23diag)\"/></svg>'); background-repeat: repeat;">

                                            <!-- Diagonal stripe overlay -->
                                            <div style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; opacity: 0.1; background: repeating-linear-gradient(45deg, transparent, transparent 40px, rgba(217, 119, 6, 0.2) 40px, rgba(217, 119, 6, 0.2) 42px);"></div>

                                            <!-- Gold accent line right edge -->
                                            <div style="position: absolute; top: 0; right: 0; width: 3px; height: 100%; background: linear-gradient(to bottom, #fbbf24, #f59e0b, #d97706);"></div>

                                            <table width="100%" cellpadding="0" cellspacing="0" style="position: relative; z-index: 1;">
                                                <!-- Logo and Brand -->
                                                <tr>
                                                    <td style="text-align: center; padding-bottom: 10px;">
                                                        <div style="margin-bottom: 8px; font-weight: 900; font-size: 16px; letter-spacing: 3px; color: #ffffff;">
                                                            PROFLECT
                                                        </div>
                                                        <div style="font-size: 9px; letter-spacing: 2px; color: #d1d5db; margin-bottom: 2px;">
                                                            PAINT PROTECTION
                                                        </div>
                                                        <div style="font-size: 9px; letter-spacing: 2px; color: #9ca3af;">
                                                            WARRANTY
                                                        </div>
                                                    </td>
                                                </tr>

                                                <!-- Warranty Number and QR -->
                                                <tr>
                                                    <td style="text-align: center; padding: 15px 0;">
                                                        <table width="100%" cellpadding="0" cellspacing="0">
                                                            <tr>
                                                                <td style="text-align: center; vertical-align: middle;">
                                                                    <div style="font-weight: 900; font-size: 52px; letter-spacing: 2px; color: #fbbf24; line-height: 1;">
                                                                        {{ $warranty->unique_number }}
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        </table>
                                                    </td>
                                                </tr>

                                                <!-- Expiry Date -->
                                                <tr>
                                                    <td style="text-align: center; padding-bottom: 15px; padding-top: 15px;">
                                                        <div style="font-size: 14px; color: #d1d5db;">
                                                            Expires <strong style="color: #ffffff;">{{ $warranty->expiry_date->format('d/m/y') }}</strong>
                                                        </div>
                                                    </td>
                                                </tr>

                                                <!-- Bottom Text -->
                                                <tr>
                                                    <td style="text-align: center; padding: 0 15px; padding-bottom: 5px;">
                                                        <div style="font-size: 10px; color: #d1d5db; line-height: 1.4;">
                                                            
                                                        </div>
                                                    </td>
                                                </tr>
                                            </table>
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>

                        <!-- Job Description -->

                        <tr>
                            <td style="padding: 0 30px 30px 30px">
                                <h3 style="color: #ffffff; margin-bottom: 10px">Description of Work</h3>

                                <div
                                    style="
                                        background: #0f0f0f;
                                        border: 1px solid #1f1f1f;
                                        border-radius: 6px;
                                        padding: 15px;
                                        color: #d1d5db;
                                        font-size: 14px;
                                        line-height: 1.6;
                                    "
                                >
                                    {{ $warranty->job_description }}
                                </div>
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
