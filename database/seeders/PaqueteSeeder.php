<?php

namespace Database\Seeders;

use App\Models\Paquete;
use App\Models\ImagenPaquete;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PaqueteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $paquete = new Paquete();
        $paquete->nombre = "Bodas";
        $paquete->capacidad_maxima = "200";
        $paquete->costo = "10000";
        $paquete->estatus = "Activo";
        $paquete->descripcion = "Paquete para bodas, con servicios completos.";
        $paquete->save();
        $imagen1 = new ImagenPaquete();
        $imagen1->ruta = "imagenes\bodas-en-domingo.png";
        $imagen1->nombre = "bodas-en-domingo.png";
        $paquete->imagenesPaquetes()->save($imagen1);


        $paquete = new Paquete();
        $paquete->nombre = "XV años";
        $paquete->capacidad_maxima = "200";
        $paquete->costo = "10000";
        $paquete->estatus = "Activo";
        $paquete->descripcion = "Paquete para XV años con servicios incluidos.";
        $paquete->save();

        $paquete = new Paquete();
        $paquete->nombre = "Fiesta infantil";
        $paquete->capacidad_maxima = "150";
        $paquete->costo = "5000";
        $paquete->estatus = "Activo";
        $paquete->descripcion = "Paquete de fiestas infantiles con servicios incluidos.";
        $paquete->save();

        $paquete = new Paquete();
        $paquete->nombre = "Bautizo";
        $paquete->capacidad_maxima = "100";
        $paquete->costo = "4000";
        $paquete->estatus = "Activo";
        $paquete->descripcion = "Paquete de bautizo con servicios incluidos.";
        $paquete->save();

        $paquete = new Paquete();
        $paquete->nombre = "Eventos empresariales";
        $paquete->capacidad_maxima = "150";
        $paquete->costo = "8000";
        $paquete->estatus = "Activo";
        $paquete->descripcion = "Paquete para eventos empresariales con servicios incluidos.";
        $paquete->save();
    }
}
