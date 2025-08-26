<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Event Notification</title>
    <style>
        /* Reset & base styles */
        body {
            margin: 0;
            padding: 0;
            background-color: #f1f5f9;
            /* light gray bg */
            font-family: Arial, sans-serif;
            color: #374151;
            /* dark text */
        }

        .container {
            max-width: 600px;
            margin: 40px auto;
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }

        .header {
            background-color: #f1f5f9;
            text-align: center;
            padding: 20px;
            font-size: 22px;
            font-weight: 600;
            color: #1f2937;
        }

        .content {
            padding: 50px ;
        }

        .content h2 {
            margin-top: 0;
            font-size: 20px;
            color: #1f2937;
        }

        .content p {
            font-size: 16px;
            line-height: 1.5;
            color: #4b5563;
        }

        .details {
            margin-top: 20px;
        }

        .details p {
            margin: 8px 0;
            font-size: 16px;
            color: #374151;
        }

        .button-wrapper {
            text-align: center;
            margin: 30px 0;
        }

        .btn {
            background-color: #1f2937;
            color: #ffffff;
            text-decoration: none;
            padding: 12px 24px;
            border-radius: 5px;
            font-weight: bold;
            display: inline-block;
        }

        .footer {
            background-color: #f1f5f9;
            text-align: center;
            font-size: 14px;
            color: #9ca3af;
            padding: 15px 0;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="header">Atkans Event Management</div>
        <div class="content">
            <h2>{{ $event->title }}</h2>
            <p>{{ $event->short_description }}</p>
            <div class="details">
                <p>📅 <strong>Date:</strong> {{ \Carbon\Carbon::parse($event->end_date)->format('d M Y') }}</p>
                <p>📍 <strong>Location:</strong> {{ $event->location }}</p>
            </div>
            <div class="button-wrapper">
                <a href="{{ route('event.details', $event->id) }}" class="btn">View Event</a>
            </div>
        </div>
        <div class="footer">
            Thanks,<br>
            Atkans Event Management Team
        </div>
    </div>
</body>

</html>
