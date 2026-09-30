<!DOCTYPE html>
<html>
<head>
    <title>Product Filter</title>
</head>

<body>

    <h1>Product Filter</h1>

    <p>Prepared by: Jonna Icawat</p>

    @if ($stock)
        <h2>Showing products with stock: {{ $stock }} or higher</h2>
    @else
        <h2>Showing all products</h2>
    @endif

    <table border="1" cellpadding="8">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Price</th>
            <th>Stock</th>
        </tr>

        @foreach ($products as $product)
            <tr>
                <td>{{ $product['id'] }}</td>

                <td>
                    <a href="{{ route('products.show', $product['id']) }}">
                        {{ $product['name'] }}
                    </a>
                </td>

                <td>${{ $product['price'] }}</td>

                <td>{{ $product['stock'] }}</td>
            </tr>
        @endforeach

    </table>

    <br>

    <a href="{{ route('products.index') }}">Back to Product List</a>

</body>
</html>