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

        $imagen2 = new ImagenPaquete();
        $imagen2->ruta = "imagenes\boda2.jpg";
        $imagen2->nombre = "boda2.jpg";
        $paquete->imagenesPaquetes()->save($imagen2);

        $paquete = new Paquete();
        $paquete->nombre = "XV años";
        $paquete->capacidad_maxima = "200";
        $paquete->costo = "10000";
        $paquete->estatus = "Activo";
        $paquete->descripcion = "Paquete para XV años con servicios incluidos.";
        $paquete->save();

        $imagen1 = new ImagenPaquete();
        $imagen1->ruta = "imagenes\xv1.jpg";
        $imagen1->nombre = "xv1.jpg";
        $paquete->imagenesPaquetes()->save($imagen1);

        $imagen2 = new ImagenPaquete();
        $imagen2->ruta = "imagenes\xv2.jpg";
        $imagen2->nombre = "xv1.jpg";
        $paquete->imagenesPaquetes()->save($imagen2);

        $paquete = new Paquete();
        $paquete->nombre = "Fiesta infantil";
        $paquete->capacidad_maxima = "150";
        $paquete->costo = "5000";
        $paquete->estatus = "Activo";
        $paquete->descripcion = "Paquete de fiestas infantiles con servicios incluidos.";
        $paquete->save();

        $imagen1 = new ImagenPaquete();
        $imagen1->ruta = "imagenes\iesta_infantil_blog.jpg";
        $imagen1->nombre = "fiesta_infantil_blog.jpg";
        $paquete->imagenesPaquetes()->save($imagen1);

        $imagen2 = new ImagenPaquete();
        $imagen2->ruta = "imagenes\iesta.jpg";
        $imagen2->nombre = "fiesta.jpg";
        $paquete->imagenesPaquetes()->save($imagen2);

        $paquete = new Paquete();
        $paquete->nombre = "Bautizo";
        $paquete->capacidad_maxima = "100";
        $paquete->costo = "4000";
        $paquete->estatus = "Activo";
        $paquete->descripcion = "Paquete de bautizo con servicios incluidos.";
        $paquete->save();

        $imagen1 = new ImagenPaquete();
        $imagen1->ruta = "imagenes\bautizo.jpg";
        $imagen1->nombre = "bautizo.jpg";
        $paquete->imagenesPaquetes()->save($imagen1);

        $imagen2 = new ImagenPaquete();
        $imagen2->ruta = "imagenes\bautizo2.jpg";
        $imagen2->nombre = "bautizo2.jpg";
        $paquete->imagenesPaquetes()->save($imagen2);

        $paquete = new Paquete();
        $paquete->nombre = "Eventos empresariales";
        $paquete->capacidad_maxima = "150";
        $paquete->costo = "8000";
        $paquete->estatus = "Activo";
        $paquete->descripcion = "Paquete para eventos empresariales con servicios incluidos.";
        $paquete->save();

        $imagen1 = new ImagenPaquete();
        $imagen1->ruta = "imagenes\o-empresarial.jpg";
        $imagen1->nombre = "evento-empresarial.jpg";
        $paquete->imagenesPaquetes()->save($imagen1);

        $imagen2 = new ImagenPaquete();
        $imagen2->ruta = "imagenes\o.jpg";
        $imagen2->nombre = "evento.jpg";
        $paquete->imagenesPaquetes()->save($imagen2);

        $paquete = new Paquete();
        $paquete->nombre = "Baby Shower";
        $paquete->capacidad_maxima = "100";
        $paquete->costo = "9000";
        $paquete->estatus = "Activo";
        $paquete->descripcion = "Paquete para todo incluido para baby shower o revelación de sexo.";
        $paquete->save();

        $imagen1 = new ImagenPaquete();
        $imagen1->ruta = "imagenes\babyshower.jpg";
        $imagen1->nombre = "babyshower.jpg";
        $paquete->imagenesPaquetes()->save($imagen1);

        $imagen2 = new ImagenPaquete();
        $imagen2->ruta = "imagenes\baby.jpeg";
        $imagen2->nombre = "baby.jpeg";
        $paquete->imagenesPaquetes()->save($imagen2);
    }
}
