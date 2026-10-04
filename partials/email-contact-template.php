<?php

/**
 * Website feedback / contact email template.
 *
 * File:
 *     partials/email-contact-template.php
 *
 * Expected variables:
 *     $name, $email, $message, $siteName, $sentAt
 *
 * Returns:
 *     ['html' => string, 'text' => string]
 *
 * Notes:
 *     - All dynamic values are escaped with e() in the HTML version.
 *     - Styles are inlined because many email clients (Outlook,
 *       some webmail) ignore or strip <style> blocks.
 *     - Table-based layout for maximum client compatibility.
 */

// -----------------------------------------------------------------------------
// Shared values
// -----------------------------------------------------------------------------

$font = "-apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif";

$replySubject = 'Re: Your feedback on ' . $siteName;
$replyUrl     = 'mailto:' . $email . '?subject=' . rawurlencode($replySubject);


// -----------------------------------------------------------------------------
// Plain-text version
// -----------------------------------------------------------------------------

$text = <<<TEXT
New Website Feedback
{$siteName}
====================

Name:  {$name}
Email: {$email}
Sent:  {$sentAt}

Message:
--------
{$message}

--------
Reply directly to this email to respond to {$name}.
TEXT;


// -----------------------------------------------------------------------------
// HTML version
// -----------------------------------------------------------------------------

ob_start();
?>
    <!DOCTYPE html>
    <html lang="en" xmlns="http://www.w3.org/1999/xhtml">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="color-scheme" content="light">
        <meta name="supported-color-schemes" content="light">
        <title>New Website Feedback</title>

        <style>
            /* Only what inline styles cannot do: reset + small-screen tweaks. */
            body,
            table,
            td,
            a {
                -webkit-text-size-adjust: 100%;
                -ms-text-size-adjust: 100%;
            }

            table,
            td {
                mso-table-lspace: 0pt;
                mso-table-rspace: 0pt;
            }

            @media only screen and (max-width: 640px) {
                .px {
                    padding-left: 20px !important;
                    padding-right: 20px !important;
                }

                .label-cell {
                    width: 64px !important;
                }

                .title {
                    font-size: 20px !important;
                }
            }
        </style>
    </head>

    <body style="margin:0; padding:0; width:100%; background-color:#f3f4f6;">

    <!-- Preheader (inbox preview text) -->
    <div style="display:none; max-height:0; overflow:hidden; opacity:0; mso-hide:all; font-size:1px; line-height:1px; color:#f3f4f6;">
        <?= e($name) ?> sent feedback through <?= e($siteName) ?>.
    </div>

    <table role="presentation" width="100%" cellpadding="0" cellspacing="0" border="0" bgcolor="#f3f4f6" style="background-color:#f3f4f6;">
        <tr>
            <td align="center" style="padding:32px 12px;">

                <table role="presentation" width="600" cellpadding="0" cellspacing="0" border="0" style="width:100%; max-width:600px;">

                    <!-- Card -->
                    <tr>
                        <td bgcolor="#ffffff" style="background-color:#ffffff; border:1px solid #e5e7eb; border-radius:12px;">

                            <table role="presentation" width="100%" cellpadding="0" cellspacing="0" border="0">

                                <!-- Accent bar -->
                                <tr>
                                    <td height="4" bgcolor="#1A4D8F" style="height:4px; line-height:4px; font-size:4px; background-color:#1A4D8F; border-radius:12px 12px 0 0;">&nbsp;</td>
                                </tr>

                                <!-- Header -->
                                <tr>
                                    <td class="px" style="padding:28px 32px 8px 32px; font-family:<?= $font ?>;">
                                        <p style="margin:0 0 6px 0; font-size:11px; line-height:1.4; font-weight:700; letter-spacing:0.08em; text-transform:uppercase; color:#1A4D8F;">
                                            <?= e($siteName) ?>
                                        </p>
                                        <h1 class="title" style="margin:0; font-size:22px; line-height:1.3; font-weight:700; color:#111827;">
                                            New website feedback
                                        </h1>
                                    </td>
                                </tr>

                                <!-- Sender details -->
                                <tr>
                                    <td class="px" style="padding:16px 32px 0 32px;">

                                        <table role="presentation" width="100%" cellpadding="0" cellspacing="0" border="0">

                                            <tr>
                                                <td class="label-cell" width="80" valign="top" style="width:80px; padding:11px 12px 11px 0; border-top:1px solid #eef2f7; font-family:<?= $font ?>; font-size:13px; line-height:1.5; color:#64748b;">
                                                    Name
                                                </td>
                                                <td valign="top" style="padding:11px 0; border-top:1px solid #eef2f7; font-family:<?= $font ?>; font-size:14px; line-height:1.5; font-weight:600; color:#1e293b;">
                                                    <?= e($name) ?>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td class="label-cell" width="80" valign="top" style="width:80px; padding:11px 12px 11px 0; border-top:1px solid #eef2f7; font-family:<?= $font ?>; font-size:13px; line-height:1.5; color:#64748b;">
                                                    Email
                                                </td>
                                                <td valign="top" style="padding:11px 0; border-top:1px solid #eef2f7; font-family:<?= $font ?>; font-size:14px; line-height:1.5; word-break:break-all;">
                                                    <a href="mailto:<?= e($email) ?>" style="color:#1A4D8F; text-decoration:none; font-weight:500;"><?= e($email) ?></a>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td class="label-cell" width="80" valign="top" style="width:80px; padding:11px 12px 11px 0; border-top:1px solid #eef2f7; border-bottom:1px solid #eef2f7; font-family:<?= $font ?>; font-size:13px; line-height:1.5; color:#64748b;">
                                                    Sent
                                                </td>
                                                <td valign="top" style="padding:11px 0; border-top:1px solid #eef2f7; border-bottom:1px solid #eef2f7; font-family:<?= $font ?>; font-size:14px; line-height:1.5; color:#1e293b;">
                                                    <?= e($sentAt) ?>
                                                </td>
                                            </tr>

                                        </table>

                                    </td>
                                </tr>

                                <!-- Message -->
                                <tr>
                                    <td class="px" style="padding:24px 32px 8px 32px; font-family:<?= $font ?>;">

                                        <p style="margin:0 0 8px 0; font-size:11px; line-height:1.5; font-weight:700; letter-spacing:0.08em; text-transform:uppercase; color:#64748b;">
                                            Message
                                        </p>

                                        <table role="presentation" width="100%" cellpadding="0" cellspacing="0" border="0">
                                            <tr>
                                                <td bgcolor="#f8fafc" style="background-color:#f8fafc; border:1px solid #e2e8f0; border-left:4px solid #1A4D8F; border-radius:8px; padding:16px 18px; font-family:<?= $font ?>; font-size:14px; line-height:1.7; color:#334155; word-break:break-word;">
                                                    <?= nl2br(e($message)) ?>
                                                </td>
                                            </tr>
                                        </table>

                                    </td>
                                </tr>

                                <!-- Reply button -->
                                <tr>
                                    <td class="px" align="left" style="padding:20px 32px 32px 32px;">

                                        <table role="presentation" cellpadding="0" cellspacing="0" border="0">
                                            <tr>
                                                <td bgcolor="#1A4D8F" style="background-color:#1A4D8F; border-radius:8px;">
                                                    <a href="<?= e($replyUrl) ?>" style="display:inline-block; padding:12px 22px; font-family:<?= $font ?>; font-size:14px; line-height:1; font-weight:600; color:#ffffff; text-decoration:none; border-radius:8px;">
                                                        Reply to <?= e($name) ?>
                                                    </a>
                                                </td>
                                            </tr>
                                        </table>

                                    </td>
                                </tr>

                                <!-- Card footer -->
                                <tr>
                                    <td class="px" bgcolor="#f8fafc" style="padding:16px 32px; background-color:#f8fafc; border-top:1px solid #e5e7eb; border-radius:0 0 12px 12px; font-family:<?= $font ?>; font-size:12px; line-height:1.6; color:#64748b;">
                                        You can also reply directly to this email, since the reply address is set to
                                        <strong style="color:#334155;"><?= e($name) ?></strong>.
                                    </td>
                                </tr>

                            </table>

                        </td>
                    </tr>

                    <!-- Branding -->
                    <tr>
                        <td align="center" style="padding:16px 8px 0 8px; font-family:<?= $font ?>; font-size:11px; line-height:1.5; color:#94a3b8;">
                            This message was submitted through <?= e($siteName) ?>.
                        </td>
                    </tr>

                </table>

            </td>
        </tr>
    </table>

    </body>

    </html>
<?php

$html = ob_get_clean();

return [
    'html' => $html,
    'text' => $text,
];