<!DOCTYPE html>
<html>

<head>
    <title>Welcome Email</title>
</head>

<body>
    <h1>Hello, {{ $name }}!</h1>
    <p>Welcome to our platform. We’re excited to have you on board.</p>

    <!-- Tracking Pixel -->
    <img src="{{ route('email.tracking', ['email' => $email]) }}" alt="" style="display:none;">
</body>

</html>
