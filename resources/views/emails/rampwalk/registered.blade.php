<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Welcome to Atkan Ramp Walk</title>
    <style>
        body {
            background-color: #f7f7f7;
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            color: #333;
        }

        .container {
            max-width: 600px;
            margin: 40px auto;
            background: #ffffff;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.15);
        }

        .header {
            background-color: #000;
            color: #fff;
            text-align: center;
            padding: 30px 20px;
        }

        .header h1 {
            margin: 0;
            font-size: 28px;
            letter-spacing: 1px;
        }

        .content {
            padding: 30px 20px;
            line-height: 1.8;
        }

        .content h2 {
            color: #000;
        }

        .content p {
            margin: 15px 0;
        }

        .cta {
            text-align: center;
            margin: 30px 0;
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
            font-size: 14px;
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
            <h1>Welcome to Atkan Ramp Walk</h1>
        </div>
        <div class="content">
            <h2>Hello {{ $user->name }},</h2>
            <p>Thank you for registering for the <strong>Atkan Ramp Walk</strong>. You’re now part of India’s most
                unique runway experience where fashion, raw talent, and street culture collide.</p>

            <p><strong>📅 Event Date:</strong> {{ \Carbon\Carbon::parse($event->start_date)->format('d M Y') }}
            </p>
            <p><strong>📍 Location:</strong> {{ $event->location }}</p>

            <div class="cta">
                <a href="{{ url('/') }}">View Event Details</a>
            </div>

            <p>We can’t wait to see you shine on the runway. Stay tuned for more updates!</p>
        </div>
        <div class="footer">
            © {{ date('Y') }} Atkan Modelling Agency. All rights reserved. <br>
            <a href="{{ url('/') }}">Visit our website</a>
        </div>
    </div>
</body>

</html>
