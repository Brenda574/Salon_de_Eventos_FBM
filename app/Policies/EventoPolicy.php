<?php

namespace App\Policies;

use App\Models\Evento;
use App\Models\Usuario;
use Illuminate\Auth\Access\Response;

class EventoPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(Usuario $usuario): bool
    {
        if ($usuario->rol == "Cliente") {
            return true;
        } else {
            return false;
        }
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(Usuario $usuario, Evento $evento): bool
    {
        if ($usuario->rol == "Empleado") {
            return true;
        } else {
            return false;
        }
    }

    public function viewCliente(Usuario $usuario, Evento $evento): bool
    {
        if ($usuario->rol == "Cliente" && $evento->usuario_id == $usuario->id) {
            if ($evento->estatus == "Confirmado" || $evento->estatus == "Pendiente") {
                return true;
            }
            return false;
        } else {
            return false;
        }
    }

    public function viewGerente(Usuario $usuario, Evento $evento): bool
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
        if ($usuario->rol == "Cliente") {
            return true;
        } else {
            return false;
        }
    }

    public function addFoto(Usuario $usuario, Evento $evento): bool
    {
        date_default_timezone_set('America/Mexico_City');
        $fechaActual = date('Y-m-d H:i:s');

        $AhoraFecha = date('Y-m-d H:i:s',strtotime('-1 hour',strtotime($fechaActual))); 
        $FechaInicio = date('Y-m-d H:i:s',strtotime($evento->fecha . " " . $evento->hora_inicio));
        $FechaFin = date('Y-m-d H:i:s',strtotime('+5 hour',strtotime($evento->fecha . " " . $evento->hora_inicio)));

        if ($usuario->rol == "Empleado") {
            if ($AhoraFecha >= $FechaInicio && $AhoraFecha <= $FechaFin) {
                return true;
            }
            return false;
        } else {
            return true;
        }
    }

    public function addGasto(Usuario $usuario, Evento $evento): bool
    {
        if ($usuario->rol == "Gerente") {
            if ($evento->quien_autoriza == $usuario->id) {
                return true;
            }
            return false;
        } else {
            return false;
        }
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(Usuario $usuario, Evento $evento): bool
    {
        if ($usuario->rol == "Cliente") {
            if ($evento->estatus == "SinConfirmar" && $evento->usuario_id == $usuario->id) {
                return true;
            }
            return false;
        } else {
            return false;
        }
    }

    public function updateAbono(Usuario $usuario, Evento $evento): bool
    {
        if ($usuario->rol == "Gerente" || $usuario->rol == "Empleado") {
            if ($evento->estatus == "Confirmado") {
                return true;
            }
            return false;
        } else {
            return false;
        }
    }

    public function updateAutorizar(Usuario $usuario, Evento $evento): bool
    {
        if ($usuario->rol == "Gerente") {
            if ($evento->estatus == "Pendiente") {
                return true;
            }
            return false;
        } else {
            return false;
        }
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(Usuario $usuario, Evento $evento): bool
    {
        if ($usuario->rol == "Cliente") {
            if ($evento->estatus == "SinConfirmar" && $evento->usuario_id == $usuario->id) {
                return true;
            }
            return false;
        } else {
            return false;
        }
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(Usuario $usuario, Evento $evento): bool
    {
        return true;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(Usuario $usuario, Evento $evento): bool
    {
        return true;
    }
    
}
