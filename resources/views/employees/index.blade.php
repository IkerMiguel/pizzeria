<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Employees List</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container">
        <h1 class="mt-5">Lista de Empleados</h1>

        <a href="{{ route('employees.create') }}" class="btn btn-success mt-3 mb-3">Agregar</a>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>ID de Usuario</th>
                    <th>Posicion</th>
                    <th>Numero de Identificacion</th>
                    <th>Salario</th>
                    <th>Fecha</th>
                    <th>Actiones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($employees as $employee)
                <tr>
                    <td>{{ $employee->id }}</td>
                    <td>{{ $employee->user_name }}</td>
                    <td>{{ $employee->position }}</td>
                    <td>{{ $employee->identification_number }}</td>
                    <td>{{ '$' . number_format($employee->salary, 2, '.', ',') }}</td>
                    <td>{{ $employee->hire_date }}</td>
                    <td>
                        <a href="{{ route('employees.edit', ['employee' => $employee->id]) }}" class="btn btn-info">Edit</a>
                        <form action="{{ route('employees.destroy', ['employee' => $employee->id]) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('delete')
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
