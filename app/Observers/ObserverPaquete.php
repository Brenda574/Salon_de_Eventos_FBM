<?php

namespace App\Observers;

use Illuminate\Support\Facades\Auth;
use App\Models\Paquete;
use App\Models\Bitacora;

class ObserverPaquete
{
    protected $fillable = ['quien', 'que'];
    /**
     * Handle the Paquete "created" event.
     */
    public function created(Paquete $paquete): void
    {
        $bitacora = new Bitacora();

        if (Auth::check()) {
            $bitacora->quien = Auth::user()->nombre;
        } else {
            $bitacora->quien = 'seeder';
        }
        $bitacora->que = "Se creo un nuevo paquete " . $paquete->nombre;
        $bitacora->save();
    }

    /**
     * Handle the Paquete "updated" event.
     */
    public function updated(Paquete $paquete): void
    {
        $bitacora = new Bitacora();

        if (Auth::check()) {
            $bitacora->quien = Auth::user()->nombre;
        } else {
            $bitacora->quien = 'seeder';
        }
        $bitacora->que = "Se actualizó el paquete " . $paquete->nombre;
        $bitacora->save();
    }

    /**
     * Handle the Paquete "deleted" event.
     */
    public function deleted(Paquete $paquete): void
    {
        $bitacora = new Bitacora();

        if (Auth::check()) {
            $bitacora->quien = Auth::user()->nombre;
        } else {
            $bitacora->quien = 'seeder';
        }
        $bitacora->que = "Se eliminó el paquete " . $paquete->nombre;
        $bitacora->save();
    }

    /**
     * Handle the Paquete "restored" event.
     */
    public function restored(Paquete $paquete): void
    {
        //
    }

    /**
     * Handle the Paquete "force deleted" event.
     */
    public function forceDeleted(Paquete $paquete): void
    {
        //
    }
}
