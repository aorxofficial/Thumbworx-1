<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Thumbworx</title>
</head>
<body>
    <h1>{{ $approvedMailData['title'] }}</h1>

    <p>{{ $approvedMailData['body'] }}</p>

    <p>Username: {{ $approvedMailData['email'] }}</p>
    <p>Password: {{ $approvedMailData['password'] }}</p>

    <p>Thank You.</p>

</body>
</html>