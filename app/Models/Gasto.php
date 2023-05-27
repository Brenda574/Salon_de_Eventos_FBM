<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gasto extends Model
{
    use HasFactory;

    public function evento(){
        return $this->belonsTo('App\Models\Evento');
    }

    public function usuario(){
        return $this->belonsTo(Usuario::class, 'usuario_id');
    }
}