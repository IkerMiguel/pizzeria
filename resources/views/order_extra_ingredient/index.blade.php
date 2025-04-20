<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Listado de Ingredientes Extra por Pedido</title>
  </head>
  <body>

    <div class="container mt-4">
      <h1>Listado de Ingredientes Extra por Pedido</h1>

      <a href="{{ route('order_extra_ingredients.create') }}" class="btn btn-success mb-3">Agregar</a>

      <table class="table table-striped">
        <thead>
          <tr>
            <th>ID</th>
            <th>ID Pedido</th>
            <th>ID Ingrediente Extra</th>
            <th>Cantidad</th>
            <th>Acciones</th>
          </tr>
        </thead>
        <tbody>
          @foreach($order_extra_ingredients as $item)
            <tr>
              <td>{{ $item->id }}</td>
              <td>{{ $item->order_code }}</td>
              <td>{{ $item->ingredient_name }}</td>
              <td>{{ $item->quantity }}</td>
              <td>
                <a href="{{ route('order_extra_ingredients.edit', ['order_extra_ingredient' => $item->id]) }}" class="btn btn-info btn-sm">Editar</a>
                <form action="{{ route('order_extra_ingredients.destroy', ['order_extra_ingredient' => $item->id]) }}" method="POST" style="display:inline-block">
                  @method('delete')
                  @csrf
                  <input class="btn btn-danger btn-sm" type="submit" value="Eliminar">
                </form>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>
