<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Application Update</title>
</head>

<body style="margin:0;background:#f1f5f9;font-family:Arial,Helvetica,sans-serif;color:#334155;">
    <table role="presentation" width="100%" cellpadding="0" cellspacing="0" style="background:#f1f5f9;padding:32px 12px;">
        <tr>
            <td align="center">
                <table role="presentation" width="100%" cellpadding="0" cellspacing="0"
                    style="max-width:620px;overflow:hidden;border:1px solid #e2e8f0;border-radius:16px;background:#ffffff;box-shadow:0 8px 24px rgba(15,23,42,0.06);">
                    <tr>
                        <td style="background:#4f46e5;padding:24px 32px;">
                            <p style="margin:0;color:#ffffff;font-size:18px;font-weight:700;">
                                <?= esc($companyName) ?>
                            </p>
                            <p style="margin:6px 0 0;color:#c7d2fe;font-size:13px;">Recruitment Team</p>
                        </td>
                    </tr>
                    <tr>
                        <td style="padding:32px;">
                            <p style="margin:0 0 20px;font-size:16px;line-height:1.6;color:#0f172a;">
                                Hello <?= esc($candidateName) ?>,
                            </p>

                            <h1 style="margin:0 0 16px;font-size:24px;line-height:1.3;color:#0f172a;">
                                An update on your application
                            </h1>

                            <p style="margin:0 0 16px;font-size:15px;line-height:1.7;">
                                Thank you for the time and effort you invested in applying for the
                                <strong style="color:#0f172a;"><?= esc($jobTitle) ?></strong> position.
                            </p>

                            <p style="margin:0 0 16px;font-size:15px;line-height:1.7;">
                                After careful consideration, we have decided not to move forward with your application
                                for this role. We appreciate your interest and encourage you to apply for future
                                opportunities that match your experience.
                            </p>

                            <?php if (trim((string) $rejectionReason) !== ''): ?>
                                <table role="presentation" width="100%" cellpadding="0" cellspacing="0"
                                    style="margin:24px 0;border-left:4px solid #6366f1;border-radius:8px;background:#f8fafc;">
                                    <tr>
                                        <td style="padding:16px 18px;">
                                            <p style="margin:0 0 6px;font-size:12px;font-weight:700;text-transform:uppercase;letter-spacing:0.06em;color:#6366f1;">
                                                Additional feedback
                                            </p>
                                            <p style="margin:0;font-size:14px;line-height:1.7;color:#475569;">
                                                <?= nl2br(esc($rejectionReason)) ?>
                                            </p>
                                        </td>
                                    </tr>
                                </table>
                            <?php endif; ?>

                            <p style="margin:24px 0 0;font-size:15px;line-height:1.7;">
                                We wish you every success in your job search and future career.
                            </p>

                            <p style="margin:24px 0 0;font-size:15px;line-height:1.7;color:#0f172a;">
                                Kind regards,<br>
                                <strong><?= esc($senderName ?? 'Recruitment Team') ?></strong><br>
                                <span style="color:#64748b;"><?= esc($senderRole ?? 'Recruitment Team') ?>, <?= esc($companyName) ?></span>
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td style="border-top:1px solid #e2e8f0;background:#f8fafc;padding:18px 32px;text-align:center;">
                            <p style="margin:0;font-size:12px;line-height:1.6;color:#64748b;">
                                This is an automated message regarding your job application.
                            </p>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>

</html>
