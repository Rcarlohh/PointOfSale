<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// Importa el modelo Estado
use App\Models\Estado;

class User extends Model implements AuthenticatableContract
{
    use Authenticatable, Notifiable, HasFactory;

    protected $table = 'usuusuario'; // Asegúrate de que coincida con el nombre de tu tabla

    protected $fillable = [
        'strNombreUsuario', 'strContrasena', 'idUsuCatTipoUsuario', 'idUsuCatEstado'
    ];

    // Relación con el estado
    public function estado()
    {
        return $this->belongsTo(Estado::class, 'idUsuCatEstado');
    }

    // Relación con el tipo de usuario
    public function tipoUsuario()
    {
        return $this->belongsTo(UserType::class, 'idUsuCatTipoUsuario');
    }

    public $timestamps = false;

}
