<?php

namespace App\Observers;

use App\Models\Usuario;
use App\Models\Bitacora;
use Illuminate\Support\Facades\Auth;

class ObserverUsuario
{
    protected $fillable = ['quien', 'que'];
    /**
     * Handle the Usuario "created" event.
     */
    public function created(Usuario $usuario): void
    {
        $bitacora = new Bitacora();

        if (Auth::check()) {
            $bitacora->quien = Auth::user()->nombre;
        } else {
            $bitacora->quien = 'seeder';
        }
        $bitacora->que = "Se creo un nuevo usuario" . $usuario->nombre;
        $bitacora->save();
    }

    /**
     * Handle the Usuario "updated" event.
     */
    public function updated(Usuario $usuario): void
    {
        $bitacora = new Bitacora();

        if (Auth::check()) {
            $bitacora->quien = Auth::user()->nombre;
        } else {
            $bitacora->quien = 'seeder';
        }
        $bitacora->que = "Se actualizó al usuario" . $usuario->nombre;
        $bitacora->save();
    }

    /**
     * Handle the Usuario "deleted" event.
     */
    public function deleted(Usuario $usuario): void
    {
        $bitacora = new Bitacora();

        if (Auth::check()) {
            $bitacora->quien = Auth::user()->nombre;
        } else {
            $bitacora->quien = 'seeder';
        }
        $bitacora->que = "Se eliminó al usuario" . $usuario->nombre;
        $bitacora->save();
    }

    /**
     * Handle the Usuario "restored" event.
     */
    public function restored(Usuario $usuario): void
    {
        //
    }

    /**
     * Handle the Usuario "force deleted" event.
     */
    public function forceDeleted(Usuario $usuario): void
    {
        //
    }
}
