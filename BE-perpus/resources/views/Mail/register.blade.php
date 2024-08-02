<!DOCTYPE html>
<html>
<head>
    <title>OTP Code</title>
</head>
<body>
    <h1>Hi {{ $user->name }},</h1>
    <p>Your OTP code is: {{ $user->otpCode->otp }}</p>
    <p>This OTP code will expire at {{ $user->otpCode->valid_until }}</p>
</body>
</html>
