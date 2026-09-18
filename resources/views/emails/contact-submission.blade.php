<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Encore Lacrosse Website Inquiry</title>
</head>
<body style="margin:0;padding:0;background:#f4f4f4;font-family:Arial,sans-serif;color:#252525;">
    <table role="presentation" width="100%" cellspacing="0" cellpadding="0" style="background:#f4f4f4;padding:28px 12px;">
        <tr>
            <td align="center">
                <table role="presentation" width="640" cellspacing="0" cellpadding="0" style="width:100%;max-width:640px;background:#ffffff;border-collapse:collapse;">
                    <tr>
                        <td style="padding:24px 28px;background:#202020;color:#ffffff;">
                            <div style="font-size:12px;letter-spacing:1.4px;text-transform:uppercase;color:#e21d2a;">Encore Lacrosse</div>
                            <div style="margin-top:5px;font-size:24px;font-weight:700;">Website Form Submission</div>
                        </td>
                    </tr>
                    <tr>
                        <td style="padding:26px 28px;">
                            <table role="presentation" width="100%" cellspacing="0" cellpadding="8" style="border-collapse:collapse;font-size:14px;">
                                <tr>
                                    <td style="width:145px;border-bottom:1px solid #eeeeee;font-weight:700;">Form / Page</td>
                                    <td style="border-bottom:1px solid #eeeeee;">{{ $submission['source'] ?? 'Website inquiry' }}</td>
                                </tr>
                                <tr>
                                    <td style="border-bottom:1px solid #eeeeee;font-weight:700;">Name</td>
                                    <td style="border-bottom:1px solid #eeeeee;">{{ $submission['name'] ?? '' }}</td>
                                </tr>
                                <tr>
                                    <td style="border-bottom:1px solid #eeeeee;font-weight:700;">Email</td>
                                    <td style="border-bottom:1px solid #eeeeee;">{{ $submission['email'] ?? '' }}</td>
                                </tr>
                                <tr>
                                    <td style="border-bottom:1px solid #eeeeee;font-weight:700;">Phone</td>
                                    <td style="border-bottom:1px solid #eeeeee;">{{ $submission['phone'] ?: 'Not provided' }}</td>
                                </tr>
                                <tr>
                                    <td style="border-bottom:1px solid #eeeeee;font-weight:700;">Submitted</td>
                                    <td style="border-bottom:1px solid #eeeeee;">{{ $submission['submitted_at'] ?? '' }}</td>
                                </tr>
                                <tr>
                                    <td style="border-bottom:1px solid #eeeeee;font-weight:700;">Page URL</td>
                                    <td style="border-bottom:1px solid #eeeeee;word-break:break-all;">{{ $submission['page_url'] ?? '' }}</td>
                                </tr>
                            </table>

                            <div style="margin-top:24px;font-size:13px;font-weight:700;text-transform:uppercase;letter-spacing:.7px;">Message</div>
                            <div style="margin-top:8px;padding:16px;background:#f7f7f7;line-height:1.7;white-space:pre-wrap;">{{ $submission['message'] ?: 'No message provided.' }}</div>

                            <div style="margin-top:22px;font-size:12px;color:#777777;">
                                Replying to this email will reply directly to {{ $submission['email'] ?? 'the customer' }}.
                            </div>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>
</html>
