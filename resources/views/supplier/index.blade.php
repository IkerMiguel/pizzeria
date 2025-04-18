<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Listado de Proveedores</title>
  </head>
  <body>

    <div class="container mt-4">
      <h1>Listado de Proveedores</h1>

      <a href="{{ route('suppliers.create') }}" class="btn btn-success mb-3">Agregar</a>

      <table class="table table-striped">
        <thead>
          <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Información de Contacto</th>
            <th>Acciones</th>
          </tr>
        </thead>
        <tbody>
          @foreach($suppliers as $supplier)
            <tr>
              <td>{{ $supplier->id }}</td>
              <td>{{ $supplier->name }}</td>
              <td>{{ $supplier->contact_info }}</td>
              <td>
                <a href="{{ route('suppliers.edit', ['supplier' => $supplier->id]) }}" class="btn btn-info btn-sm">Editar</a>
                <form action="{{ route('suppliers.destroy', ['supplier' => $supplier->id]) }}" method="POST" style="display:inline-block">
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
