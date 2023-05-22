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

    public function ImagenesPaquetesHasMany()
    {
        return $this->hasMany(Paquete::class);
    }
}
