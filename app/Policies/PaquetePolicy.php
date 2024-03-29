<?php

namespace App\Policies;

use App\Models\Paquete;
use App\Models\Usuario;
use App\Models\Evento;
use Illuminate\Auth\Access\Response;

class PaquetePolicy
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
    public function view(Usuario $usuario, Paquete $paquete): bool
    {
        if ($usuario->rol == "Gerente") {
            return true;
        } else {
            return false;
        }
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(Usuario $usuario): bool
    {
        if ($usuario->rol == "Gerente") {
            return true;
        } else {
            return false;
        }
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(Usuario $usuario, Paquete $paquete): bool
    {
        if ($usuario->rol == "Gerente") {
            $eventos = Evento::all();
            foreach ($eventos as $evento) {
                if  ($evento->paquete_id == $paquete->id and $evento->estatus == "SinConfirmar") {
                    return false;
                }
            }
            return true;
        } else {
            return false;
        }
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(Usuario $usuario, Paquete $paquete): bool
    {
        $eventos = Evento::all();
        foreach ($eventos as $evento) {
            if  ($evento->paquete_id == $paquete->id) {
                return false;
            }
        }
        return true;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(Usuario $usuario, Paquete $paquete): bool
    {
        return true;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(Usuario $usuario, Paquete $paquete): bool
    {
        return true;
    }
}
