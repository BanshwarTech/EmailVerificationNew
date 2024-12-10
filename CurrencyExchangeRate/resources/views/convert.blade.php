<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Currency Conversion</title>
</head>

<body>
    <h1>Currency Conversion</h1>
    @if (isset($convertedAmount))
        <p>{{ $amount }} {{ $from_currency }} = {{ $convertedAmount }} {{ $to_currency }}</p>
        <p>Exchange Rate: 1 {{ $from_currency }} = {{ $rate }} {{ $to_currency }}</p>
    @endif

    @if (isset($error))
        <p style="color: red;">{{ $error }}</p>
    @endif

    <form action="{{ url('/convert') }}" method="POST">
        @csrf
        <label for="amount">Amount:</label>
        <input type="number" name="amount" id="amount" step="0.01" required>

        <label for="from_currency">From Currency (e.g., USD):</label>
        <input type="text" name="from_currency" id="from_currency" maxlength="3" required>

        <label for="to_currency">To Currency (e.g., EUR):</label>
        <input type="text" name="to_currency" id="to_currency" maxlength="3" required>

        <button type="submit">Convert</button>
    </form>
</body>

</html>
