<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Order List</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container">
        <h1 class="mt-5">Order List</h1>

        <!-- Boton crear-->
        <a href="" class="btn btn-success mt-3 mb-3">Add</a>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Client</th>
                    <th>Branch</th>
                    <th>Total Price</th>
                    <th>Status</th>
                    <th>Delivery Type</th>
                    <th>Delivery Person</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($orders as $order)
                    <tr>
                        <td>{{ $order->id }}</td>
                        <td>{{ $order->client_name }}</td>
                        <td>{{ $order->branch_name }}</td>
                        <td>{{ '$' . number_format($order->total_price, 2, '.', ',') }}</td>
                        <td>{{ $order->status }}</td>
                        <td>{{ $order->delivery_type }}</td>
                        <td>{{ $order->employees_name ?? 'N/A' }}</td>
                        <td>
                            Actions
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
