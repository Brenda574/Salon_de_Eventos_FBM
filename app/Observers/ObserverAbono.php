<?php

namespace App\Observers;

use App\Models\Abono;
use App\Models\Bitacora;
use Illuminate\Support\Facades\Auth;

class ObserverAbono
{
    /**
     * Handle the Abono "created" event.
     */
    public function created(Abono $abono): void
    {
        $bitacora = new Bitacora();

        if (Auth::check()) {
            $bitacora->quien = Auth::user()->nombre;
        } else {
            $bitacora->quien = 'seeder';
        }
        $bitacora->que = "Se creó un nuevo abono " . $abono->nombre;
        $bitacora->save();
    }

    /**
     * Handle the Abono "updated" event.
     */
    public function updated(Abono $abono): void
    {
        $bitacora = new Bitacora();

        if (Auth::check()) {
            $bitacora->quien = Auth::user()->nombre;
        } else {
            $bitacora->quien = 'seeder';
        }
        $bitacora->que = "Se actualizó el abono" . $abono->nombre;
        $bitacora->save();
    }

    /**
     * Handle the Abono "deleted" event.
     */
    public function deleted(Abono $abono): void
    {
        $bitacora = new Bitacora();

        if (Auth::check()) {
            $bitacora->quien = Auth::user()->nombre;
        } else {
            $bitacora->quien = 'seeder';
        }
        $bitacora->que = "Se eliminó el abono" . $abono->nombre;
        $bitacora->save();
    }

    /**
     * Handle the Abono "restored" event.
     */
    public function restored(Abono $abono): void
    {
        //
    }

    /**
     * Handle the Abono "force deleted" event.
     */
    public function forceDeleted(Abono $abono): void
    {
        //
    }
}
