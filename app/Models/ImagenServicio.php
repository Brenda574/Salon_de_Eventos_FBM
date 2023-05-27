<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImagenServicio extends Model
{
    use HasFactory;

    public function Servicio()
    {
        return $this->belongsTo(Servicio::class);
    }
}
