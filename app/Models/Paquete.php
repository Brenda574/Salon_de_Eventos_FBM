<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paquete extends Model
{
    use HasFactory;

    public function eventosHasMany()
    {
        return $this->hasMany('App\Models\Evento');
    }

    public function imagenesPaquetes()
    {
        return $this->hasMany(ImagenPaquete::class, 'paquete_id');
    }
}
