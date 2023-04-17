<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evento extends Model
{
    use HasFactory;

    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'usuario_id');
    }

    public function paquete()
    {
        return $this->belongsTo('App\Models\Paquete');
    }

    public function abonos()
    {
        return $this->hasMany('App\Models\Abono');
    }

    protected $fillable = ['usuario_id', 'paquete_id'];

    public function servicios()
    {
        return $this->belongsToMany('App\Models\Servicio', 'eventos_servicios')
            ->withPivot('usuario_id', 'paquete_id')->withTimestamps();
    }
}
