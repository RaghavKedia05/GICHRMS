<!DOCTYPE html>
<html lang="en">
<head><meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1.0"><title>Application Selection</title></head>
<body style="margin:0;background:#f1f5f9;font-family:Arial,Helvetica,sans-serif;color:#334155;">
<table role="presentation" width="100%" cellpadding="0" cellspacing="0" style="background:#f1f5f9;padding:32px 12px;"><tr><td align="center">
<table role="presentation" width="100%" cellpadding="0" cellspacing="0" style="max-width:620px;overflow:hidden;border:1px solid #d1fae5;border-radius:16px;background:#ffffff;box-shadow:0 8px 24px rgba(15,23,42,.06);">
<tr><td style="background:#047857;padding:24px 32px;color:#fff;"><p style="margin:0;font-size:18px;font-weight:700;"><?= esc($companyName) ?></p><p style="margin:6px 0 0;color:#a7f3d0;font-size:13px;">Recruitment Team</p></td></tr>
<tr><td style="padding:32px;"><p style="margin:0 0 20px;font-size:16px;color:#0f172a;">Hello <?= esc($candidateName) ?>,</p>
<h1 style="margin:0 0 16px;font-size:25px;line-height:1.3;color:#064e3b;">Congratulations—you have been selected!</h1>
<p style="margin:0 0 16px;font-size:15px;line-height:1.7;">We are pleased to let you know that you have been selected for the <strong style="color:#0f172a;"><?= esc($jobTitle) ?></strong> position.</p>
<p style="margin:0 0 24px;font-size:15px;line-height:1.7;">Please open GICHRMS to review your updated application and continue with the offer and onboarding process.</p>
<p style="margin:0 0 26px;"><a href="<?= esc($applicationUrl, 'attr') ?>" style="display:inline-block;border-radius:10px;background:#047857;padding:12px 20px;color:#fff;text-decoration:none;font-size:14px;font-weight:700;">View application update</a></p>
<p style="margin:0;font-size:15px;line-height:1.7;color:#0f172a;">Kind regards,<br><strong><?= esc($senderName) ?></strong><br><span style="color:#64748b;"><?= esc($senderRole) ?>, <?= esc($companyName) ?></span></p></td></tr>
<tr><td style="border-top:1px solid #e2e8f0;background:#f8fafc;padding:18px 32px;text-align:center;"><p style="margin:0;font-size:12px;color:#64748b;">This is an automated message regarding your job application.</p></td></tr>
</table></td></tr></table>
</body>
</html>
