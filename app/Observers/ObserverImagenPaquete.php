<?php

namespace App\Observers;

use App\Models\ImagenPaquete;
use App\Models\Paquete;
use Illuminate\Support\Facades\Auth;
use App\Models\Bitacora;

class ObserverImagenPaquete
{
    protected $fillable = ['quien', 'que'];
    /**
     * Handle the ImagenPaquete "created" event.
     */
    public function created(ImagenPaquete $imagenPaquete): void
    {
        $paquete = $imagenPaquete->paquete;
        $bitacora = new Bitacora();

        if (Auth::check()) {
            $bitacora->quien = Auth::user()->nombre;
        } else {
            $bitacora->quien = 'seeder';
        }
        $bitacora->que = "Se eliminó la imagen " . $imagenPaquete->nombre . " del paquete " . $paquete->nombre;
        $bitacora->save();
    }

    /**
     * Handle the ImagenPaquete "updated" event.
     */
    public function updated(ImagenPaquete $imagenPaquete): void
    {
    }

    /**
     * Handle the ImagenPaquete "deleted" event.
     */
    public function deleted(ImagenPaquete $imagenPaquete): void
    {
        $paquete = $imagenPaquete->paquete;
        $bitacora = new Bitacora();
        if (Auth::check()) {
            $bitacora->quien = Auth::user()->nombre;
        } else {
            $bitacora->quien = 'seeder';
        }
        $bitacora->que = "Se eliminó la imagen " . $imagenPaquete->nombre . " del paquete " . $paquete->nombre;
        $bitacora->save();
    }

    /**
     * Handle the ImagenPaquete "restored" event.
     */
    public function restored(ImagenPaquete $imagenPaquete): void
    {
        //
    }

    /**
     * Handle the ImagenPaquete "force deleted" event.
     */
    public function forceDeleted(ImagenPaquete $imagenPaquete): void
    {
        //
    }
}
