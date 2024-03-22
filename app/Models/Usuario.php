<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Usuario extends Authenticatable
{
    use Notifiable;

    protected $table = 'usuusuario'; // Asegúrate de que esto coincida con el nombre de tu tabla en la base de datos.

    protected $fillable = [
        'strNombreUsuario', 
        'strContrasena',
    ];

    protected $hidden = [
        'strContrasena',
    ];

    // Especifica que 'strContrasena' es el campo de contraseña para este modelo
    public function getAuthPassword()
    {
        return $this->strContrasena;
    }
}
