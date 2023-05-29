<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Servicio extends Model
{
    use HasFactory;
    public function eventos()
    {
        return $this->belongsToMany(Evento::class, 'eventos_servicios')->withPivot('usuario_id', 'paquete_id');
    }

    public function imagenesServicios()
    {
        return $this->hasMany(ImagenServicio::class, 'servicio_id');
    }
}
