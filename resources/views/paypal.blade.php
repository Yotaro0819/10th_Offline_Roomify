<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PayPal</title>
</head>
<body>
    <h1>paypal</h1>
    <p>test</p>
    <p>price: ¥1,000</p>

    <form method="POST" action="{{ route('paypal.payment') }}">
        @csrf
        <button type="submit">PayPal</button>
    </form>
</body>
</html>
