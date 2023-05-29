<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gasto extends Model
{
    use HasFactory;

    public function evento(){
        return $this->belongsTo('App\Models\Evento');
    }

    public function usuario(){
        return $this->belongsTo(Usuario::class, 'usuario_id');
    }
}