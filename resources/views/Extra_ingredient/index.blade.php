<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Extra Ingredients List</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container">
        <h1 class="mt-5">Extra Ingredients List</h1>

        <a href="{{route('extra_ingredients.create')}}" class="btn btn-success mt-3 mb-3">Add</a>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Price</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($extra_ingredients as $extra_ingredient)
                <tr>
                    <td>{{ $extra_ingredient->id }}</td>
                    <td>{{ $extra_ingredient->name }}</td>
                    <td>{{ '$' . number_format($extra_ingredient->price, 2, '.', ',') }}</td>
                    <td>
                        <a href="{{route('extra_ingredients.edit', ['extra_ingredient' => $extra_ingredient->id])}}"
                            class="btn btn-info">Edit</a></li>
                        <form action="{{route('extra_ingredients.destroy',['extra_ingredient' =>$extra_ingredient->id])}}"
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
