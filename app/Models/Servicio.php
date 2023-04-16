<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Servicio extends Model
{
    public function eventos()
    {
        return $this->belongsToMany(Evento::class, 'eventos_servicios')->withPivot('usuario_id', 'paquete_id');
    }
}
