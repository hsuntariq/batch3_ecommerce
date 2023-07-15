<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <x-boot />
    <title>Cart</title>
</head>

<body>
    <table class="table">
        <thead>
            <tr>
                <th>id</th>
                <th>Name</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Image</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($cartData as $item)
                <tr>
                    <td>{{ $item['id'] }}</td>
                    <td>{{ $item['product_name'] }}</td>
                    <td>{{ $item['product_price'] }}</td>
                    <td>{{ $item['product_quantity'] }}</td>
                    <td><img width="50px" src="{{ asset('storage/' . $item['product_image']) }}" alt=""></td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <table class="table">
        <thead>
            <tr>
                <th>id</th>
                <th>Name</th>
                <th>Email</th>
            </tr>
        </thead>
        <tbody>

            <tr>
                <td>{{ $userData['id'] }}</td>
                <td>{{ $userData['name'] }}</td>
                <td>{{ $userData['email'] }}</td>
            </tr>

        </tbody>
    </table>
</body>

</html>
