<!-- resources/views/special_page.blade.php -->

<!DOCTYPE html>
<html>
<head>
    <title>Special Page</title>
</head>
<body>
<h1>Welcome, {{ $userLink->user->username }}</h1>

<p>Your link is valid until: {{ $userLink->expires_at }}</p>

<!-- Add CSRF tokens and update forms for generating new link and deactivating link -->

<!-- ... existing content ... -->

<form action="{{ route('generate.new.link', ['token' => $userLink->token]) }}" method="POST">
    @csrf
    <button type="submit">Generate New Link</button>
</form>

<form action="{{ route('deactivate.link', ['token' => $userLink->token]) }}" method="POST">
    @csrf
    <button type="submit">Deactivate Link</button>
</form>

<!-- Add links to Imfeelinglucky and History -->
<a href="{{ route('imfeelinglucky', ['token' => $userLink->token]) }}">Imfeelinglucky</a><br>
<a href="{{ route('history', ['token' => $userLink->token]) }}">History</a>

</body>
</html>
