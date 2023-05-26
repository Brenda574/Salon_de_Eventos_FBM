<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;

class Usuario extends Authenticatable
{
    use HasFactory;

    public function eventosHasMany()
    {
        return $this->hasMany(Evento::class);
    }

    public function gastosHasMany()
    {
        return $this->hasMany(Gasto::class);
    }
}
