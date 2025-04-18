<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Listado de Materias Primas por Pizza</title>
  </head>
  <body>

    <div class="container mt-4">
      <h1>Listado de Materias Primas por Pizza</h1>

      <a href="{{ route('pizza_raw_materials.create') }}" class="btn btn-success mb-3">Agregar</a>

      <table class="table table-striped">
        <thead>
          <tr>
            <th>ID</th>
            <th>Pizza</th>
            <th>Materia Prima</th>
            <th>Cantidad</th>
            <th>Acciones</th>
          </tr>
        </thead>
        <tbody>
          @foreach($pizza_raw_materials as $item)
            <tr>
              <td>{{ $item->id }}</td>
              <td>{{ $item->pizza_name }}</td>
              <td>{{ $item->raw_material_name }}</td>
              <td>{{ $item->quantity }}</td>
              <td>
                <a href="{{ route('pizza_raw_materials.edit', ['pizza_raw_material' => $item->id]) }}" class="btn btn-info btn-sm">Editar</a>
                <form action="{{ route('pizza_raw_materials.destroy', ['pizza_raw_material' => $item->id]) }}" method="POST" style="display:inline-block">
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
