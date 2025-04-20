<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Listado de Sucursales</title>
  </head>
  <body>

    <div class="container mt-4">
      <h1>Listado de Sucursales</h1>

      <a href="{{ route('branches.create') }}" class="btn btn-success mb-3">Agregar</a>

      <table class="table table-striped">
        <thead>
          <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Dirección</th>
            <th>Acciones</th>
          </tr>
        </thead>
        <tbody>
          @foreach($branches as $branche)
            <tr>
              <td>{{ $branche->id }}</td>
              <td>{{ $branche->name }}</td>
              <td>{{ $branche->address }}</td>
              <td>
                <a href="{{ route('branches.edit', ['branche' => $branche->id]) }}" class="btn btn-info btn-sm">Editar</a>
                <form action="{{ route('branches.destroy', ['branche' => $branche->id]) }}" method="POST" style="display:inline-block">
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
