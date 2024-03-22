<h2>hola mundp</h2><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Usuarios</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            padding: 40px;
            background-color: #f4f4f4;
            color: #333;
            display: flex;
            justify-content: center;
        }
        .card {
            box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
            transition: 0.3s;
            width: 80%;
            background-color: white;
            border-radius: 5px;
            padding: 20px;
        }
        table {
            width: 100%;
            margin-top: 20px;
            border-collapse: collapse;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        th, td {
            padding: 12px 15px;
            border: 1px solid #ddd;
            text-align: left;
            font-size: 16px;
        }
        th {
            background-color: #6a5b7a;
            color: white;
        }
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        .edit-btn, .delete-btn {
            border: none;
            padding: 8px 16px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 14px;
            margin: 4px 2px;
            transition: opacity 0.3s;
            border-radius: 5px;
            cursor: pointer;
        }
        .edit-btn {
            background-color: #ffa500;
            color: white;
        }
        .delete-btn {
            background-color: #f44336;
            color: white;
        }
        .edit-btn:hover, .delete-btn:hover {
            opacity: 0.7;
        }
        form > div {
            margin-bottom: 20px;
        }
        form > button {
            cursor: pointer;
        }
    </style>
</head>
<body>
    <div class="card">
        <h1>Administrador de Usuarios</h1>
        <h3>En este apartado podrás administrar los usuarios</h3>
        <form action="{{ url('usuarios') }}" method="GET">
            <div>
                <input type="text" name="nombre" placeholder="Buscar por nombre..." value="{{ request()->nombre }}">
            </div>
            <div>
                <select name="estado">
                    <option value="">Selecciona un estado</option>
                    @foreach ($estados as $estado)
                        <option value="{{ $estado->id }}" {{ request()->estado == $estado->id ? 'selected' : '' }}>{{ $estado->strDescripcion }}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <select name="tipo">
                    <option value="">Selecciona un tipo</option>
                    @foreach ($tipos as $tipo)
                        <option value="{{ $tipo->id }}" {{ request()->tipo == $tipo->id ? 'selected' : '' }}>{{ $tipo->strNombre }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit">Buscar</button>
        </form>
        <table>
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Estado</th>
                    <th>Tipo</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                <tr>
                    <td>{{ $user->strNombreUsuario }}</td>
                    <td>{{ $user->estado->strDescripcion }}</td>
                    <td>{{ $user->tipoUsuario->strNombre
                    }}</td>
                    <td>
                    <button class="edit-btn" onclick="location.href='{{ route('usuarios.edit', $user->id) }}'">Editar</button>
                    <form action="{{ route('usuarios.destroy', $user->id) }}" method="POST" style="display: inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="delete-btn">Eliminar</button>
                    </form>
                    </td>
                    </tr>
                    @endforeach
                    </tbody>
                    </table>
                    </div>
                    
                    </body>
                    </html>