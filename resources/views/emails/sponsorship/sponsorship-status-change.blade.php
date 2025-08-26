<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sponsorship Status Update</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f6f8fb;
            color: #333;
            margin: 0;
            padding: 0;
        }

        .email-wrapper {
            width: 100%;
            max-width: 600px;
            margin: 20px auto;
            background: #fff;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .header {
            background-color: #28a745;
            color: #fff;
            text-align: center;
            padding: 20px;
        }

        .header h1 {
            margin: 0;
            font-size: 20px;
        }

        .content {
            padding: 20px;
        }

        .content h2 {
            color: #28a745;
            margin-bottom: 15px;
        }

        .details {
            background: #f1f5f9;
            padding: 15px;
            border-radius: 5px;
        }

        .details p {
            margin: 5px 0;
        }

        .status {
            display: inline-block;
            padding: 8px 16px;
            color: #fff;
            background: {{ $status === 'approved' ? '#28a745' : '#dc3545' }};
            border-radius: 4px;
            margin-top: 10px;
        }

        .footer {
            text-align: center;
            padding: 15px;
            background: #f1f5f9;
            font-size: 13px;
            color: #777;
        }
    </style>
</head>

<body>
    <div class="email-wrapper">
        <div class="header">
            <h1>📢 Sponsorship Status Update</h1>
        </div>
        <div class="content">
            <h2>Hello {{ $sponsor->contact_name }},</h2>
            <p>Your sponsorship request status has been updated:</p>
            <div class="status">
                {{ ucfirst($sponsor->status) }}
            </div>
            <p style="margin-top: 15px;">Thank you for your interest in partnering with us.</p>
        </div>
        <div class="footer">
            © {{ date('Y') }} {{ config('app.name') }}. All rights reserved.
        </div>
    </div>
</body>

</html>
