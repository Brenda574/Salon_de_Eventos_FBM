<?php

namespace App\Observers;

use App\Models\Evento;
use App\Models\Bitacora;
use Illuminate\Support\Facades\Auth;

class ObserverEvento
{
    protected $fillable = ['quien', 'que'];
    /**
     * Handle the Evento "created" event.
     */
    public function created(Evento $evento): void
    {
        $bitacora = new Bitacora();

        if (Auth::check()) {
            $bitacora->quien = Auth::user()->nombre;
        } else {
            $bitacora->quien = 'seeder';
        }
        $bitacora->que = "Se creó un nuevo evento " . $evento->nombre_evento;
        $bitacora->save();
    }

    /**
     * Handle the Evento "updated" event.
     */
    public function updated(Evento $evento): void
    {
        $bitacora = new Bitacora();

        if (Auth::check()) {
            $bitacora->quien = Auth::user()->nombre;
        } else {
            $bitacora->quien = 'seeder';
        }
        $bitacora->que = "Se actualizó el evento " . $evento->nombre_evento;
        $bitacora->save();

        if ($evento->isDirty('estatus')) {
            $bitacora = new Bitacora();

            if (Auth::check()) {
                $bitacora->quien = Auth::user()->nombre;
            } else {
                $bitacora->quien = 'seeder';
            }

            if ($evento->estatus == 'Confirmado') {
                $bitacora->que = 'Confirmó el evento: ' . $evento->nombre_evento;
                $bitacora->save();
            } elseif ($evento->estatus == 'SinConfirmar') {
                $bitacora->que = 'Rechazó el evento' . $evento->nombre_evento;
                $bitacora->save();
            }
        }
    }

    /**
     * Handle the Evento "deleted" event.
     */
    public function deleted(Evento $evento): void
    {
        $bitacora = new Bitacora();

        if (Auth::check()) {
            $bitacora->quien = Auth::user()->nombre;
        } else {
            $bitacora->quien = 'seeder';
        }
        $bitacora->que = "Se eliminó el evento " . $evento->nombre_evento;
        $bitacora->save();
    }

    /**
     * Handle the Evento "restored" event.
     */
    public function restored(Evento $evento): void
    {
        //
    }

    /**
     * Handle the Evento "force deleted" event.
     */
    public function forceDeleted(Evento $evento): void
    {
        //
    }
}
