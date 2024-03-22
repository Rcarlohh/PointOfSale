<!DOCTYPE html>
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
    max-width: 80%;
    width: 1100px; /* Ajusta según necesites */
    background-color: white;
    border-radius: 10px;
    padding: 20px;
    margin: 20px auto; /* Centrado vertical y horizontal */
    display: flex;
    flex-direction: column;
    align-items: center;
}

form {
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    gap: 10px;
    width: 100%;
}

input[type="text"], select {
    padding: 10px;
    border: 0.8px solid #000000;
    border-radius: 10px;
    margin: 5px 0;
    flex: 1; /* Asegura que los inputs tomen todo el espacio disponible */
    min-width: 120px; /* Evita que sean demasiado pequeños en pantallas estrechas */
}

button {
    padding: 10px 20px;
    background-color: #5b6e83;
    color: white;
    border: none;
    border-radius: 15px;
    cursor: pointer;
    flex: none; /* No se ajusta con el tamaño de la pantalla */
}

button:hover {
    background-color: #000000;
}

table {
    width: 100%;
    border-collapse: collapse;
    border-radius: 10px;
    margin-top: 20px;
}

th, td {
    padding: 12px 15px;
    border: 1px solid #ddd;
    text-align: left;
    font-size: 16px;
}

th {
    background-color: #3c3775;
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
    border-radius: 10px;
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

    </style>
</head>
<body>
    <div class="card">
        <h1 style="font-weight: bold;">Administrador de Usuarios</h1>
        <div style="margin-bottom: 20px;">
            <a href="{{ route('register') }}" style="padding: 10px 20px; background-color: #4CAF50; color: white; border-radius: 10px; text-decoration: none;">Registrarse</a>
        </div>
        <form action="{{ url('usuarios') }}" method="GET">
            <input type="text" name="nombre" placeholder="Buscar por nombre..." value="{{ request()->nombre }}">
            <select name="estado">
                <option value="">Selecciona un estado</option>
                @foreach ($estados as $estado)
                        <option value="{{ $estado->id }}" {{ request()->estado == $estado->id ? 'selected' : '' }}>{{ $estado->strDescripcion }}</option>
                    @endforeach
            </select>
            <select name="tipo">
                <option value="">Selecciona un tipo</option>
                @foreach ($tipos as $tipo)
                        <option value="{{ $tipo->id }}" {{ request()->tipo == $tipo->id ? 'selected' : '' }}>{{ $tipo->strNombre }}</option>
                    @endforeach
            </select>
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
                    <td>
                        @if ($user->estado)
                            {{ $user->estado->strDescripcion }}
                        @else
                            Sin estado
                        @endif
                    </td>
                    <td>{{ $user->tipoUsuario ? $user->tipoUsuario->strNombre : 'Tipo de usuario no disponible' }}</td>
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
