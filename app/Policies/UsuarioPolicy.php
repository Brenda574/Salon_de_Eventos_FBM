<?php

namespace App\Policies;

use App\Models\Usuario;
use App\Models\Evento;
use Illuminate\Auth\Access\Response;

class UsuarioPolicy
{
    public function viewGerente(Usuario $usuario): bool
    {
        if ($usuario->rol == "Gerente") {
            return true;
        } else {
            return false;
        }
    }
    
    public function viewCliente(Usuario $usuario): bool
    {
        if ($usuario->rol == "Cliente") {
            return true;
        } else {
            return false;
        }
    }
    
    public function viewEmpleado(Usuario $usuario): bool
    {
        if ($usuario->rol == "Empleado") {
            return true;
        } else {
            return false;
        }
    }

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
    public function view(Usuario $now, Usuario $usuario): bool
    {
        if ($now->rol == "Gerente") {
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
    public function update(Usuario $now, Usuario $usuario): bool
    {
        if ($now->rol == "Gerente") {
            return true;
        } else {
            return false;
        }
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(Usuario $now, Usuario $usuario): bool
    {
        if ($now->rol == "Gerente") {
            $eventos = Evento::all();
            foreach ($eventos as $evento) {
                if  ($evento->usuario_id == $usuario->id) {
                    return false;
                }
            }
            return true;
        } else {
            return false;
        }
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(Usuario $now, Usuario $usuario): bool
    {
        return true;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(Usuario $now, Usuario $usuario): bool
    {
        return true;
    }
}
