<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exchange Rates</title>
</head>

<body>
    <h1>Exchange Rates</h1>
    <table border="1">
        <thead>
            <tr>
                <th>Currency</th>
                <th>Rate</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($rates['rates'] as $currency => $rate)
                <tr>
                    <td>{{ $currency }}</td>
                    <td>{{ $rate }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>
