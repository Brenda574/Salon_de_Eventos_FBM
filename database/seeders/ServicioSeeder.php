<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Servicio;

class ServicioSeeder extends Seeder
{
    public function run(): void
    {
        $servicio = new Servicio();
        $servicio->nombre = "Mantelería";
        $servicio->costo = '250';
        $servicio->descripcion = "Servicio de manteleria con diseños exclusivos.";
        $servicio->save();
        
        $servicio = new Servicio();
        $servicio->nombre = "Meseros";
        $servicio->costo = '300';
        $servicio->descripcion = "Servicio de 15 meseros preparados.";
        $servicio->save();
        
        $servicio = new Servicio();
        $servicio->nombre = "Aire acondicionado";
        $servicio->costo = '150';
        $servicio->descripcion = "Serivicio de climatizacion en el salon.";
        $servicio->save();
        
        $servicio = new Servicio();
        $servicio->nombre = "Musica";
        $servicio->costo = '300';
        $servicio->descripcion = "Servicio de musica a elección del usuario.";
        $servicio->save();
        
        $servicio = new Servicio();
        $servicio->nombre = "Banquete";
        $servicio->costo = '2500';
        $servicio->descripcion = "Servicio de banquete a elección del usuario.";
        $servicio->save();
        
        $servicio = new Servicio();
        $servicio->nombre = "Jardin y capilla";
        $servicio->costo = "500";
        $servicio->descripcion = "Servicio de jardin y capilla para bodas.";
        $servicio->save();
        
        $servicio = new Servicio();
        $servicio->nombre = "Mobiliario y decoración";
        $servicio->costo = "600";
        $servicio->descripcion = "Sillas, mesas e inmobiliario necesario para el evento.";
        $servicio->save();
        
        $servicio = new Servicio();
        $servicio->nombre = "Fotograria";
        $servicio->costo = "1200";
        $servicio->descripcion = "Fotografo profesional para el evento completo.";
        $servicio->save();
    }
}
