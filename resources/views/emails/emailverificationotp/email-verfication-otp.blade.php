<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>OTP Verification</title>
</head>

<body style="font-family: Arial, sans-serif; background: #f8f9fa; padding: 20px;">
    <div style="max-width: 600px; margin: auto; background: #1f2937; color: #fff; padding: 30px; border-radius: 10px;">
        <h2>Hello {{ $recipientName ?? 'User' }},</h2>
        <p>Your One-Time Password (OTP) for verification is:</p>
        <h1 style="color: #3b82f6; letter-spacing: 3px;">{{ $otp->otp }}</h1>
        <p>This OTP is valid for <strong>10 minutes</strong>. Please do not share it with anyone.</p>
        <p>Thank you for using {{ config('app.name') }}!</p>
        <p>Best regards,</p>
        <p>{{ config('app.name') }} Team</p>
    </div>
</body>

</html>
