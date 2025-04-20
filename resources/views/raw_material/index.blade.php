<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Listado de Materias Primas</title>
  </head>
  <body>

    <div class="container mt-4">
      <h1>Listado de Materias Primas</h1>

      <a href="{{ route('raw_materials.create') }}" class="btn btn-success mb-3">Agregar</a>

      <table class="table table-striped">
        <thead>
          <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Unidad</th>
            <th>Stock Actual</th>
            <th>Acciones</th>
          </tr>
        </thead>
        <tbody>
          @foreach($raw_materials as $raw_material)
            <tr>
              <td>{{ $raw_material->id }}</td>
              <td>{{ $raw_material->name }}</td>
              <td>{{ $raw_material->unit }}</td>
              <td>{{ $raw_material->current_stock }}</td>
              <td>
                <a href="{{ route('raw_materials.edit', ['raw_material' => $raw_material->id]) }}" class="btn btn-info btn-sm">Editar</a>
                <form action="{{ route('raw_materials.destroy', ['raw_material' => $raw_material->id]) }}" method="POST" style="display:inline-block">
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
