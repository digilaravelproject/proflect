<!doctype html>

<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>New Warranty Request</title>
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
                                <h1 style="margin: 0; color: #ffffff; font-size: 26px; letter-spacing: 2px">
                                    Paint Protection Warranty
                                </h1>
                                <p style="margin: 8px 0 0; color: #9ca3af; font-size: 14px">
                                    New Warranty Request Received
                                </p>
                            </td>
                        </tr>

                        <!-- Notification -->

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
                                    A new warranty request has been submitted from the website.
                                </div>
                            </td>
                        </tr>

                        <!-- Customer Details -->

                        <tr>
                            <td style="padding: 0 30px 20px 30px">
                                <h3 style="color: #ffffff; margin-bottom: 15px">Customer Details</h3>

                                <table
                                    width="100%"
                                    cellpadding="8"
                                    cellspacing="0"
                                    style="border-collapse: collapse; font-size: 14px"
                                >
                                    <tr>
                                        <td style="color: #9ca3af">Name</td>
                                        <td style="color: #ffffff">{{ $warranty->name }}</td>
                                    </tr>

                                    <tr>
                                        <td style="color: #9ca3af">Email</td>
                                        <td style="color: #ffffff">{{ $warranty->email }}</td>
                                    </tr>

                                    <tr>
                                        <td style="color: #9ca3af">Phone</td>
                                        <td style="color: #ffffff">{{ $warranty->phone }}</td>
                                    </tr>
                                </table>
                            </td>
                        </tr>

                        <!-- Warranty Details -->

                        <tr>
                            <td style="padding: 0 30px 20px 30px">
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
                                        <td style="color: #9ca3af">Submitted At</td>
                                        <td style="color: #ffffff">
                                            {{ $warranty->warranty_date->format('d/m/Y H:i') }}
                                        </td>
                                    </tr>

                                    <tr>
                                        <td style="color: #9ca3af">Car Model</td>
                                        <td style="color: #ffffff">{{ $warranty->car_model }}</td>
                                    </tr>
                                </table>
                            </td>
                        </tr>

                        <!-- Job Description -->

                        <tr>
                            <td style="padding: 0 30px 30px 30px">
                                <h3 style="color: #ffffff; margin-bottom: 10px">Job Description</h3>

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
                                    You can view and manage this warranty request from the admin system.
                                </p>

                                <p style="margin-top: 12px; color: #facc15; font-size: 14px; font-weight: bold">
                                    Proflect Warranty System
                                </p>

                                <p style="margin-top: 10px; color: #6b7280; font-size: 12px">
                                    © {{ date('Y') }} Proflect
                                </p>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
    </body>
</html>
