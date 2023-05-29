<?php

namespace App\Observers;

use App\Models\Abono;
use App\Models\Evento;
use App\Models\Bitacora;
use Illuminate\Support\Facades\Auth;

class ObserverAbono
{
    protected $fillable = ['quien', 'que'];
    /**
     * Handle the Abono "created" event.
     */
    public function created(Abono $abono,): void
    {
        $evento = $abono->evento;
        $bitacora = new Bitacora();

        if (Auth::check()) {
            $bitacora->quien = Auth::user()->nombre;
        } else {
            $bitacora->quien = 'seeder';
        }
        $bitacora->que = "Se creó un nuevo abono " . $abono->nombre . "dentro del evento " . $evento->nombre_evento;
        $bitacora->save();
    }

    /**
     * Handle the Abono "updated" event.
     */
    public function updated(): void
    {
    }

    /**
     * Handle the Abono "deleted" event.
     */
    public function deleted(Abono $abono): void
    {
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
