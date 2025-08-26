<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sponsorship Form Submitted</title>
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
            background-color: #007bff;
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
            color: #007bff;
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

        .footer {
            text-align: center;
            padding: 15px;
            background: #f1f5f9;
            font-size: 13px;
            color: #777;
        }

        .button {
            display: inline-block;
            background: #007bff;
            color: #fff;
            padding: 10px 20px;
            margin-top: 15px;
            text-decoration: none;
            border-radius: 5px;
        }

        .button:hover {
            background: #0056b3;
        }
    </style>
</head>

<body>
    <div class="email-wrapper">
        <div class="header">
            <h1>🎉 New Sponsorship Form Submission</h1>
        </div>
        <div class="content">
            <h2>Submitted Details</h2>
            <div class="details">
                <p><strong>Brand Name:</strong> {{ $sponsor->brand_name }}</p>
                <p><strong>Contact Name:</strong> {{ $sponsor->contact_name }}</p>
                <p><strong>Email:</strong> {{ $sponsor->email }}</p>
                <p><strong>Phone:</strong> {{ $sponsor->contact_number }}</p>
            </div>
            <a href="{{ route('sponsorships.show', $sponsor->id) }}" class="button">View Submission</a>
        </div>
        <div class="footer">
            © {{ date('Y') }} {{ config('app.name') }}. All rights reserved.
        </div>
    </div>
</body>

</html>
