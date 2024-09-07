<!DOCTYPE html>
<html>
<head>
    <title>Reset Password</title>
</head>
<body>
    <h2>Reset Password</h2>
    <p>You are receiving this email because we received a password reset request for your account.</p>
    <p>Click the link below to reset your password:</p>
    <a href="{{ route('reset.password', ['token' => $token]) }}">Reset Password</a>
    <p>If you did not request a password reset, no further action is required.</p>
</body>
</html>




