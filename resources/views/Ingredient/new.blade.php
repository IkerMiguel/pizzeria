<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Add Ingredient</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <div class="container mt-5">
        <h1>Add Ingredient</h1>
        <form method="POST" action="{{ route('ingredients.store') }}">
            @csrf
            <div class="mb-4 w-25">
                <label for="name" class="form-label">Ingredient</label>
                <input type="text" class="form-control" id="name" aria-describedby="nameHelp"
                    name="name" placeholder="Ingredient name.">
            </div>
            <div class="mb-3">
                <button type="submit" class="btn btn-primary me-3 px-4">Save</button>
                <a href="{{route('ingredients.index')}}" class="btn btn-warning px-4">Cancel</a>
            </div>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>
