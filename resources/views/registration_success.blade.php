<!-- resources/views/registration_success.blade.php -->

<!DOCTYPE html>
<html>
<head>
    <title>Registration Success</title>
</head>
<body>
<h1>Registration Successful!</h1>
<p>Your unique link (valid for 7 days):</p>
<a href="{{ $link }}">{{ $link }}</a>
</body>
</html>
