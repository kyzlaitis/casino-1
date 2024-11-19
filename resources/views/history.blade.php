<!DOCTYPE html>
<html>
<head>
    <title>Imfeelinglucky History</title>
</head>
<body>
<h1>Your Last 3 Imfeelinglucky Results</h1>

@if ($history->isEmpty())
    <p>No history available.</p>
@else
    <table border="1">
        <tr>
            <th>Date</th>
            <th>Random Number</th>
            <th>Result</th>
            <th>Win Amount</th>
        </tr>
        @foreach ($history as $game)
            <tr>
                <td>{{ $game->created_at }}</td>
                <td>{{ $game->random_number }}</td>
                <td>{{ $game->result }}</td>
                <td>${{ number_format($game->win_amount, 2) }}</td>
            </tr>
        @endforeach
    </table>
@endif

<a href="{{ route('special.page', ['token' => $token]) }}">Back to Special Page</a>
</body>
</html>
