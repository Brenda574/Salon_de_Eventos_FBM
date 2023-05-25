<?php

namespace App\Observers;

use App\Models\Imagen;
use App\Models\Bitacora;
use App\Models\Evento;
use Illuminate\Support\Facades\Auth;

class ObserverImagen
{
    /**
     * Handle the Imagen "created" event.
     */
    public function created(Imagen $imagen): void
    {

        $bitacora = new Bitacora();

        if (Auth::check()) {
            $bitacora->quien = Auth::user()->nombre;
        } else {
            $bitacora->quien = 'seeder';
        }
        $bitacora->que = "Se subió nuevas imagenes " . $imagen->nombre;
        $bitacora->save();
    }

    /**
     * Handle the Imagen "updated" event.
     */
    public function updated(Imagen $imagen): void
    {
        $bitacora = new Bitacora();

        if (Auth::check()) {
            $bitacora->quien = Auth::user()->nombre;
        } else {
            $bitacora->quien = 'seeder';
        }
        $bitacora->que = "Se actualizó la descripción " . $imagen->nombre;
        $bitacora->save();
    }

    /**
     * Handle the Imagen "deleted" event.
     */
    public function deleted(Imagen $imagen): void
    {

        $bitacora = new Bitacora();

        if (Auth::check()) {
            $bitacora->quien = Auth::user()->nombre;
        } else {
            $bitacora->quien = 'seeder';
        }
        $bitacora->que = "Se eliminó la imagen " . $imagen->nombre .
            $bitacora->save();
    }

    /**
     * Handle the Imagen "restored" event.
     */
    public function restored(Imagen $imagen): void
    {
        //
    }

    /**
     * Handle the Imagen "force deleted" event.
     */
    public function forceDeleted(Imagen $imagen): void
    {
        //
    }
}
