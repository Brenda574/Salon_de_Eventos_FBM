<?php

namespace App\Observers;

use App\Models\Servicio;
use App\Models\Bitacora;
use Illuminate\Support\Facades\Auth;

class ObserverServicio
{
    protected $fillable = ['quien', 'que'];
    /**
     * Handle the Servicio "created" event.
     */
    public function created(Servicio $servicio): void
    {
        $bitacora = new Bitacora();

        if (Auth::check()) {
            $bitacora->quien = Auth::user()->nombre;
        } else {
            $bitacora->quien = 'seeder';
        }
        $bitacora->que = "Se creó un nuevo servicio" . $servicio->nombre;
        $bitacora->save();
    }

    /**
     * Handle the Servicio "updated" event.
     */
    public function updated(Servicio $servicio): void
    {
        $bitacora = new Bitacora();

        if (Auth::check()) {
            $bitacora->quien = Auth::user()->nombre;
        } else {
            $bitacora->quien = 'seeder';
        }
        $bitacora->que = "Se actualizó el servicio" . $servicio->nombre;
        $bitacora->save();
    }

    /**
     * Handle the Servicio "deleted" event.
     */
    public function deleted(Servicio $servicio): void
    {
        $bitacora = new Bitacora();

        if (Auth::check()) {
            $bitacora->quien = Auth::user()->nombre;
        } else {
            $bitacora->quien = 'seeder';
        }
        $bitacora->que = "Se eliminó el servicio" . $servicio->nombre;
        $bitacora->save();
    }

    /**
     * Handle the Servicio "restored" event.
     */
    public function restored(Servicio $servicio): void
    {
        //
    }

    /**
     * Handle the Servicio "force deleted" event.
     */
    public function forceDeleted(Servicio $servicio): void
    {
        //
    }
}
