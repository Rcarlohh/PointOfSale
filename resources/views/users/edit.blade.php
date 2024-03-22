<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Usuario</title>
</head>
<body>
    <h1>Editar Usuario</h1>
    <form action="{{ route('usuarios.update', $user->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div>
            <label for="strNombreUsuario">Nombre de Usuario:</label>
            <input type="text" id="strNombreUsuario" name="strNombreUsuario" value="{{ $user->strNombreUsuario }}" required>
        </div>
        <div>
            <label for="idUsuCatEstado">Estado:</label>
            <select id="idUsuCatEstado" name="idUsuCatEstado" required>
                @foreach($estados as $estado)
                    <option value="{{ $estado->id }}" {{ $user->idUsuCatEstado == $estado->id ? 'selected' : '' }}>{{ $estado->strDescripcion }}</option>
                @endforeach
            </select>
        </div>
        <div>
            <label for="idUsuCatTipoUsuario">Tipo de Usuario:</label>
            <select id="idUsuCatTipoUsuario" name="idUsuCatTipoUsuario" required>
                @foreach($tiposUsuarios as $tipoUsuario)
                    <option value="{{ $tipoUsuario->id }}" {{ $user->idUsuCatTipoUsuario == $tipoUsuario->id ? 'selected' : '' }}>{{ $tipoUsuario->strNombre }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit">Actualizar Usuario</button>
    </form>
</body>
</html>
