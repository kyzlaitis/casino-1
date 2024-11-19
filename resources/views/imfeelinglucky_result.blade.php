<!DOCTYPE html>
<html>
<head>
    <title>Imfeelinglucky Result</title>
</head>
<body>
<h1>Imfeelinglucky Result</h1>
<p>Random Number: {{ $randomNumber }}</p>
<p>Result: {{ $result }}</p>
<p>Win Amount: ${{ number_format($winAmount, 2) }}</p>

<a href="{{ route('special.page', ['token' => $token]) }}">Back to Special Page</a>
</body>
</html>
