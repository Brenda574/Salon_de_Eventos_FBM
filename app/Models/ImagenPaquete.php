<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImagenPaquete extends Model
{
    use HasFactory;

    public function paquete()
    {
        return $this->belongsTo(Paquete::class);
    }
}
