<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Email Notification</title>
    <style>
        /* Bootstrap-like email styles */
        body {
            background-color: #f8f9fa;
            font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
            margin: 0;
            padding: 0;
            color: #343a40;
        }

        .email-container {
            max-width: 600px;
            margin: 30px auto;
            background: #ffffff;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            border: 1px solid #dee2e6;
        }

        .email-header {
            background-color: #007bff;
            color: #ffffff;
            padding: 20px 30px;
            text-align: center;
        }

        .email-header h2 {
            margin: 0;
            font-weight: 600;
            font-size: 22px;
        }

        .email-body {
            padding: 30px;
            line-height: 1.6;
        }

        .email-body h4 {
            color: #007bff;
            margin-bottom: 15px;
        }

        .email-body p {
            margin-bottom: 15px;
            font-size: 15px;
        }

        .email-footer {
            background-color: #f1f3f5;
            padding: 15px 30px;
            text-align: center;
            font-size: 13px;
            color: #6c757d;
        }

        .btn-primary {
            background-color: #007bff;
            color: white !important;
            text-decoration: none;
            padding: 10px 20px;
            border-radius: 5px;
            display: inline-block;
            font-size: 15px;
            margin-top: 10px;
        }

        .btn-primary:hover {
            background-color: #0056b3;
        }

        .highlight-box {
            background-color: #e9f7fe;
            border-left: 4px solid #007bff;
            padding: 15px;
            border-radius: 5px;
            margin: 20px 0;
        }
    </style>
</head>

<body>

    <div class="email-container">
        <div class="email-header">
            <h2>📩 Notification from Atkans House</h2>
        </div>

        <div class="email-body">
            <h4>Hello {{ $user->name ?? 'User' }},</h4>
            <p>We hope you're doing great! Here’s an important update related to your account or participation.</p>

            <div class="highlight-box">
                {!! $messageBody !!}
            </div>

            <p>For more details, please visit your dashboard and check the latest updates.</p>

            {{-- <a href="{{ $actionUrl ?? '#' }}" class="btn-primary">Go to Dashboard</a> --}}

            <p style="margin-top: 25px;">If you have any questions, feel free to reply to this email or contact our
                support team.</p>
        </div>

        <div class="email-footer">
            &copy; {{ date('Y') }} Atkans House. All rights reserved.
            <br>
            <small>You're receiving this email because you're registered with Atkans House.</small>
        </div>
    </div>

</body>

</html>
