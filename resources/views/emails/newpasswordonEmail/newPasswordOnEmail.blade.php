<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Atkans House - Your New Password</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        /* Reset & basic styles */
        body {
            margin: 0;
            padding: 0;
            font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif;
            background-color: #f3f4f6;
        }

        table {
            border-collapse: collapse;
        }

        .container {
            max-width: 600px;
            margin: 40px auto;
            background-color: #ffffff;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
        }

        .header {
            background-color: #4f46e5;
            color: #ffffff;
            padding: 30px;
            text-align: center;
        }

        .header h1 {
            margin: 0;
            font-size: 28px;
        }

        .content {
            padding: 30px;
            color: #374151;
        }

        .content p {
            margin-bottom: 20px;
            line-height: 1.6;
        }

        .password-box {
            display: inline-block;
            background-color: #f3f4f6;
            padding: 15px 25px;
            border-radius: 8px;
            font-weight: bold;
            font-size: 18px;
            letter-spacing: 1px;
            color: #111827;
            margin: 15px 0;
        }

        .button {
            display: inline-block;
            background-color: #4f46e5;
            color: #ffffff !important;
            text-decoration: none;
            padding: 12px 25px;
            border-radius: 8px;
            font-weight: 500;
            transition: background-color 0.3s;
        }

        .button:hover {
            background-color: #4338ca;
        }

        .footer {
            text-align: center;
            padding: 20px;
            color: #9ca3af;
            font-size: 12px;
        }

        @media (max-width: 600px) {
            .container {
                margin: 20px 10px;
            }
        }
    </style>
</head>

<body>
    <table width="100%" cellpadding="0" cellspacing="0">
        <tr>
            <td>
                <table class="container" width="100%" cellpadding="0" cellspacing="0">
                    <!-- Header -->
                    <tr>
                        <td class="header">
                            <h1 style="color:white ; margin-left:30px">Atkans House</h1>
                        </td>
                    </tr>

                    <!-- Content -->
                    <tr>
                        <td class="content">
                            <p>Hi {{ $user->name ?? 'User' }},</p>
                            <p>We’ve reset your password as requested. Please use the new password below to log in to
                                your Atkans House account.</p>

                            <!-- Password -->
                            <div class="password-box">{{ $password }}</div>

                            <p>We recommend that you <strong>change your password after logging in</strong> for security
                                reasons.</p>

                            <!-- Login Button -->
                            <p style="text-align: center;">
                                <a href="https://atkanshouse.com/auth/login" class="button">Login Now</a>
                            </p>

                            <p>If you did not request this change, please contact our support immediately.</p>

                            <p>Thank you,<br>The Atkans House Team</p>
                        </td>
                    </tr>

                    <!-- Footer -->
                    <tr>
                        <td class="footer">
                            &copy; 2025 Atkans House. All rights reserved.<br>
                            <a href="https://atkanshouse.com/" style="color:#9ca3af; text-decoration:underline;">Contact
                                Support</a>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>

</html>
