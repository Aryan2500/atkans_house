<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Welcome to Atkan</title>
    <style>
        body {
            background-color: #f5f5f5;
            font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif;
            margin: 0;
            padding: 0;
            color: #333;
        }

        .container {
            max-width: 600px;
            margin: 40px auto;
            background: #fff;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        .header {
            background-color: #000;
            color: #fff;
            text-align: center;
            padding: 40px 20px;
        }

        .header h1 {
            margin: 0;
            font-size: 28px;
            letter-spacing: 1px;
        }

        .content {
            padding: 30px 20px;
            text-align: center;
        }

        .content h2 {
            color: #000;
            margin-bottom: 20px;
        }

        .content p {
            font-size: 16px;
            margin: 15px 0;
        }

        .cta {
            margin-top: 30px;
        }

        .cta a {
            display: inline-block;
            background-color: #000;
            color: #fff !important;
            padding: 12px 25px;
            border-radius: 5px;
            text-decoration: none;
            font-weight: bold;
            letter-spacing: 1px;
        }

        .footer {
            background-color: #f0f0f0;
            text-align: center;
            color: #777;
            padding: 20px;
            font-size: 13px;
        }

        .footer a {
            color: #000;
            text-decoration: none;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="header">
            <h1>Welcome to Atkan</h1>
        </div>
        <div class="content">
            <h2>Hello {{ $user->name }},</h2>
            <p>We’re excited to have you onboard with <strong>Atkan – India’s leading modeling platform</strong>.</p>
            <p>Discover opportunities, connect with industry professionals, and showcase your talent on the runway.</p>
            <div class="cta">
                <a href="{{ url('/') }}">Visit Atkan</a>
            </div>
            <p style="margin-top: 30px;">Stay tuned for updates, events, and exclusive content.</p>
        </div>
        <div class="footer">
            © {{ date('Y') }} Atkan Modelling Agency. All rights reserved. <br>
            <a href="{{ url('/') }}">www.atkan.com</a>
        </div>
    </div>
</body>

</html>
