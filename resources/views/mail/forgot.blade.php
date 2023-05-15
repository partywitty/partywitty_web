<html>

<body>
    <p>Dear {{$user->username}},</p>
    <p>We have received a request to reset your password. To complete the password reset process, please enter the
        following one-time password (OTP) when prompted:</p>
    <p>OTP: {{$otp}}</p>
    <p>Please note that this OTP is only valid for 15 minutes. If you did not request a password reset, you can safely
        ignore this email.</p>
    <p>Thank you,</p>
    <p>Party Witty</p>
</body>

</html>
