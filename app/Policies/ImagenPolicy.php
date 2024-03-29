<?php

namespace App\Policies;

use App\Models\Imagen;
use App\Models\Usuario;
use App\Models\Evento;
use Illuminate\Auth\Access\Response;

class ImagenPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(Usuario $usuario): bool
    {
        return true;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(Usuario $usuario, Imagen $imagen): bool
    {
        return true;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(Usuario $usuario): bool
    {
        return true;
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(Usuario $usuario, Imagen $imagen): bool
    {
        if ($imagen->usuario_id == $usuario->id) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(Usuario $usuario, Imagen $imagen): bool
    {
        if ($usuario->rol == "Gerente") {
            $user = Usuario::find($imagen->usuario_id);
            if ($imagen->usuario_id == $usuario->id || $user->rol == "Empleado") {
                return true;
            } else {
                return false;
            }
        } else {
            if ($imagen->usuario_id == $usuario->id) {
                return true;
            } else {
                return false;
            }
        }
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(Usuario $usuario, Imagen $imagen): bool
    {
        return true;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(Usuario $usuario, Imagen $imagen): bool
    {
        return true;
    }
}
