<?php

namespace App\Observers;

use App\Models\Evento;
use App\Models\Bitacora;
use Illuminate\Support\Facades\Auth;
use App\Models\Gasto;

class ObserverGasto
{
    /**
     * Handle the Gasto "created" event.
     */
    public function created(Gasto $gasto): void
    {
        $evento = $gasto->evento;
        $bitacora = new Bitacora();

        if (Auth::check()) {
            $bitacora->quien = Auth::user()->nombre;
        } else {
            $bitacora->quien = 'seeder';
        }
        $bitacora->que = "Se creó un nuevo gasto de " . $gasto->monto . "dentro del evento " . $evento->nombre_evento;
        $bitacora->save();
    }

    /**
     * Handle the Gasto "updated" event.
     */
    public function updated(Gasto $gasto): void
    {
        $evento = $gasto->evento;
        $bitacora = new Bitacora();

        if (Auth::check()) {
            $bitacora->quien = Auth::user()->nombre;
        } else {
            $bitacora->quien = 'seeder';
        }
        $bitacora->que = "Se actualizo un gasto " . $gasto->monto . "dentro del evento " . $evento->nombre_evento;
        $bitacora->save();
    }

    /**
     * Handle the Gasto "deleted" event.
     */
    public function deleted(Gasto $gasto): void
    {
        $evento = $gasto->evento;
        $bitacora = new Bitacora();

        if (Auth::check()) {
            $bitacora->quien = Auth::user()->nombre;
        } else {
            $bitacora->quien = 'seeder';
        }
        $bitacora->que = "Se creó un nuevo gasto " . $gasto->monto . "dentro del evento " . $evento->nombre_evento;
        $bitacora->save();
    }

    /**
     * Handle the Gasto "restored" event.
     */
    public function restored(Gasto $gasto): void
    {
        //
    }

    /**
     * Handle the Gasto "force deleted" event.
     */
    public function forceDeleted(Gasto $gasto): void
    {
        //
    }
}
