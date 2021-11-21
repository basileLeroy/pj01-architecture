<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Hello {{ $first_name }}</h1>
    <br>
    <h3>Your order has been confirmed!</h3>
    <ul>
        <li>First name: {{ $first_name }}</li>
        <li>Last name: {{ $last_name }}</li>
        <li>Product: {{ $product }}</li>
        <li>Price: {{ $price }}</li>
        <li>Status: {{ $status }}</li>
    </ul>
</body>
</html>
