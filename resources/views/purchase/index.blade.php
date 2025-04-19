<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Listado de Compras</title>
  </head>
  <body>

    <div class="container mt-4">
      <h1>Listado de Compras</h1>

      <a href="{{ route('purchases.create') }}" class="btn btn-success mb-3">Agregar</a>

      <table class="table table-striped">
        <thead>
          <tr>
            <th>ID</th>
            <th>Proveedor</th>
            <th>Materia Prima</th>
            <th>Cantidad</th>
            <th>Precio de Compra</th>
            <th>Fecha de Compra</th>
            <th>Acciones</th>
          </tr>
        </thead>
        <tbody>
          @foreach($purchases as $purchase)
            <tr>
              <td>{{ $purchase->id }}</td>
              <td>{{ $purchase->supplier_name }}</td>
              <td>{{ $purchase->raw_material_name }}</td>
              <td>{{ $purchase->quantity }}</td>
              <td>{{ $purchase->purchase_price }}</td>
              <td>{{ $purchase->purchase_date }}</td>
              <td>
                <a href="{{ route('purchases.edit', ['purchase' => $purchase->id]) }}" class="btn btn-info btn-sm">Editar</a>
                <form action="{{ route('purchases.destroy', ['purchase' => $purchase->id]) }}" method="POST" style="display:inline-block">
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
