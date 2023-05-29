<?php

namespace App\Observers;

use App\Models\Servicio;
use App\Models\Bitacora;
use Illuminate\Support\Facades\Auth;
use App\Models\ImagenServicio;

class ObserverImagenServicio
{
    /**
     * Handle the ImagenServicio "created" event.
     */
    public function created(ImagenServicio $imagenServicio): void
    {
        $servicio = $imagenServicio->Servicio;
        $bitacora = new Bitacora();

        if (Auth::check()) {
            $bitacora->quien = Auth::user()->nombre;
        } else {
            $bitacora->quien = 'seeder';
        }
        $bitacora->que = "Se agregó el servicio " . $imagenServicio->monto . "dentro del servicio " . $servicio->nombre;
        $bitacora->save();
    }

    /**
     * Handle the ImagenServicio "updated" event.
     */
    public function updated(ImagenServicio $imagenServicio): void
    {
        $servicio = $imagenServicio->Servicio;
        $bitacora = new Bitacora();

        if (Auth::check()) {
            $bitacora->quien = Auth::user()->nombre;
        } else {
            $bitacora->quien = 'seeder';
        }
        $bitacora->que = "Se actualizó el servicio " . $imagenServicio->monto . "dentro del servicio " . $servicio->nombre;
        $bitacora->save();
    }

    /**
     * Handle the ImagenServicio "deleted" event.
     */
    public function deleted(ImagenServicio $imagenServicio): void
    {
        $bitacora = new Bitacora();
        $servicio = $imagenServicio->Servicio;

        if (Auth::check()) {
            $bitacora->quien = Auth::user()->nombre;
        } else {
            $bitacora->quien = 'seeder';
        }
        $bitacora->que = "Se eliminó el servicio " . $imagenServicio->monto . "dentro del servicio " . $servicio->nombre;
        $bitacora->save();
    }

    /**
     * Handle the ImagenServicio "restored" event.
     */
    public function restored(ImagenServicio $imagenServicio): void
    {
        //
    }

    /**
     * Handle the ImagenServicio "force deleted" event.
     */
    public function forceDeleted(ImagenServicio $imagenServicio): void
    {
        //
    }
}
