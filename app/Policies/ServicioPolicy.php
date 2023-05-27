<?php

namespace App\Policies;

use App\Models\Servicio;
use App\Models\Usuario;
use App\Models\Evento;
use Illuminate\Auth\Access\Response;

class ServicioPolicy
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
    public function view(Usuario $usuario, Servicio $servicio): bool
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
    public function update(Usuario $usuario, Servicio $servicio): bool
    {
        if ($usuario->rol == "Gerente") {
            $eventos = Evento::all();
            foreach ($eventos as $evento) {
                if ($evento->estatus == "SinConfirmar") {
                    $servicios_eventos = $evento->servicios;
                    foreach ($servicios_eventos as $serv) {
                        if ($serv->pivot->servicio_id == $servicio->id) {
                            return false;
                        }
                    }
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
    public function delete(Usuario $usuario, Servicio $servicio): bool
    {
        if ($usuario->rol == "Gerente") {
            $eventos = Evento::all();
            foreach ($eventos as $evento) {
                $servicios_eventos = $evento->servicios;
                foreach ($servicios_eventos as $serv) {
                    if ($serv->pivot->servicio_id == $servicio->id) {
                        return false;
                    }
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
    public function restore(Usuario $usuario, Servicio $servicio): bool
    {
        return true;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(Usuario $usuario, Servicio $servicio): bool
    {
        return true;
    }
}
