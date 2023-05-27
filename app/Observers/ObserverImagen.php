<?php

namespace App\Observers;

use App\Models\Imagen;
use App\Models\Bitacora;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class ObserverImagen
{
    protected $fillable = ['quien', 'que'];
    /**
     * Handle the Imagen "created" event.
     */
    public function created(Imagen $imagen): void
    {
        $evento = $imagen->evento;
        $bitacora = new Bitacora();

        if (Auth::check()) {
            $bitacora->quien = Auth::user()->nombre;
        } else {
            $bitacora->quien = 'seeder';
        }
        $bitacora->que = "Se subió una nueva imagen " . $imagen->nombre . " al evento " . $evento->nombre_evento;
        $bitacora->save();
    }

    /**
     * Handle the Imagen "updated" event.
     */
    public function updated(Imagen $imagen): void
    {
        $evento = $imagen->evento;
        $bitacora = new Bitacora();

        if (Auth::check()) {
            $bitacora->quien = Auth::user()->nombre;
        } else {
            $bitacora->quien = 'seeder';
        }
        $bitacora->que = "Se actualizó la descripción de " . $imagen->nombre . " al evento " . $evento->nombre_evento;
        $bitacora->save();
    }

    /**
     * Handle the Imagen "deleted" event.
     */
    public function deleted(Imagen $imagen): void
    {
        $evento = $imagen->evento;
        $bitacora = new Bitacora();

        if (Auth::check()) {
            $bitacora->quien = Auth::user()->nombre;
        } else {
            $bitacora->quien = 'seeder';
        }
        $bitacora->que = "Se eliminó la imagen " . $imagen->nombre . " al evento " . $evento->nombre;
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
