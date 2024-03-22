<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Estado; 
use App\Models\UserType; // Asegúrate de importar UserType
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $query = User::with(['estado', 'tipoUsuario']);

        if ($request->has('nombre') && $request->nombre != '') {
            $query->where('strNombreUsuario', 'like', '%' . $request->nombre . '%');
        }

            if ($request->has('estado') && $request->estado != '') {
                $query->whereHas('estado', function($q) use ($request) {
                $q->where('id', $request->estado);
            });
        }

        if ($request->has('tipo') && $request->tipo != '') {
            $query->whereHas('tipoUsuario', function($q) use ($request) {
                $q->where('id', $request->tipo);
            });
        }

        $users = $query->get();
        $estados = Estado::all();
        $tipos = UserType::all();

        return view('users.index', compact('users', 'estados', 'tipos'));
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        $estados = Estado::all();
        $tiposUsuarios = UserType::all();
        return view('users.edit', compact('user', 'estados', 'tiposUsuarios')); // Corregido el nombre de la vista
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $request->validate([
            'strNombreUsuario' => 'required|string|max:255',
            'idUsuCatEstado' => 'required|exists:usucatestado,id', // Corregido el nombre de la tabla
            'idUsuCatTipoUsuario' => 'required|exists:usucattipoestado,id', // Corregido el nombre de la tabla
        ]);

        $user->update([
            'strNombreUsuario' => $request->strNombreUsuario,
            'idUsuCatEstado' => $request->idUsuCatEstado,
            'idUsuCatTipoUsuario' => $request->idUsuCatTipoUsuario,
        ]);

        return redirect()->route('users.index', $id)->with('success', 'Usuario actualizado correctamente.');
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->route('users.index')->with('success', 'Usuario eliminado correctamente.');
    }
}
