<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Orders Pizza List</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container">
        <h1 class="mt-5">Orders Pizza List</h1>
        <!-- Boton crear-->
        <a href="{{route('orders_pizza.create')}}" class="btn btn-success mt-3 mb-3">Add</a>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Order Status</th>
                    <th scope="col">Pizza Size</th>
                    <th scope="col">Pizza</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($orders_pizza as $order_pizza)
                <tr>
                    <td>{{ $order_pizza->id }}</td>
                    <td>{{ $order_pizza->order_status }}</td>
                    <td>{{ $order_pizza->pizza_size }}</td>
                    <td>{{ $order_pizza->pizza_name }}</td>
                    <td>{{ $order_pizza->quantity }}</td>
                    <td>
                        <a href="{{route('orders_pizza.edit', ['order_pizza' => $order_pizza->id])}}"
                            class="btn btn-info">Edit</a></li>
                        <form action="{{route('orders_pizza.destroy',['order_pizza' =>$order_pizza->id])}}"
                            method="POST" style="display:inline-block">
                            @method('delete')
                            @csrf
                            <input type="submit" class="btn btn-danger" value="Delete">
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>

