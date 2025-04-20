<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Pizza Ingredients List</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container">
        <h1 class="mt-5">Pizza Ingredients List</h1>

        <a href="{{route('pizza_ingredients.create')}}" class="btn btn-success mt-3 mb-3">Add</a>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Pizza</th>
                    <th scope="col">Ingredient</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($pizza_ingredients as $pizza_ingredient)
                <tr>
                    <td>{{ $pizza_ingredient->id }}</td>
                    <td>{{ $pizza_ingredient->pizza_name }}</td>
                    <td>{{ $pizza_ingredient->ingredient_name }}</td>
                    <td>
                        <a href="{{route('pizza_ingredients.edit', ['pizza_ingredient' => $pizza_ingredient->id])}}"
                            class="btn btn-info">Edit</a></li>
                        <form action="{{route('pizza_ingredients.destroy',['pizza_ingredient' =>$pizza_ingredient->id])}}"
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
