<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Payment Request</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.5;
            color: #333;
        }

        .container {
            width: 100%;
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #eee;
            border-radius: 8px;
        }

        .qr {
            text-align: center;
            margin: 20px 0;
        }

        .button {
            display: inline-block;
            background-color: #1d72b8;
            color: #fff !important;
            padding: 12px 20px;
            border-radius: 5px;
            text-decoration: none;
            font-weight: bold;
        }

        .footer {
            margin-top: 30px;
            font-size: 12px;
            color: #888;
        }
    </style>
</head>

<body>
    <div class="container">
        <h2>Payment Request</h2>

        <p>Hello {{ $customerName ?: 'Customer' }},</p>

        <p>You have a pending payment of <strong>₹{{ number_format($amount, 2) }}</strong>.</p>
        <p>Scan the QR code below using your UPI app to pay:</p>

        <div class="qr">
            {{-- <img src="data:image/png;base64,{{ $qrBase64 }}" alt="UPI QR Code" width="200" height="200"> --}}
            <img src="cid:qrcode.png" alt="UPI QR" width="200">
        </div>

        <p>Or click the button below to pay directly:</p>

        <p>Thank you for your purchase !</p>

        <div class="footer">
            Regards,<br>
            {{ config('app.name') }}
        </div>
    </div>
</body>

</html>
