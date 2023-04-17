<?php

namespace Database\Seeders;

use App\Models\Paquete;
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
        $paquete->ruta_imagen = "https://cdn0.bodas.com.mx/article-real-wedding/221/3_2/960/jpg/1150609.jpeg";
        $paquete->save();

        $paquete = new Paquete();
        $paquete->nombre = "XV años";
        $paquete->capacidad_maxima = "200";
        $paquete->costo = "10000";
        $paquete->estatus = "Activo";
        $paquete->descripcion = "Paquete para XV años con servicios incluidos.";
        $paquete->ruta_imagen = "https://cdn0.bodas.com.mx/vendor/2737/3_2/960/jpg/11411948-10155691402620562-8558719571658733083-o_5_252737-1561598289.jpeg";
        $paquete->save();

        $paquete = new Paquete();
        $paquete->nombre = "Fiesta infantil";
        $paquete->capacidad_maxima = "150";
        $paquete->costo = "5000";
        $paquete->estatus = "Activo";
        $paquete->descripcion = "Paquete de fiestas infantiles con servicios incluidos.";
        $paquete->ruta_imagen = "https://i.pinimg.com/564x/3f/1c/44/3f1c4449ff7e11746975075aac9b3e85.jpg";
        $paquete->save();

        $paquete = new Paquete();
        $paquete->nombre = "Bautizo";
        $paquete->capacidad_maxima = "100";
        $paquete->costo = "4000";
        $paquete->estatus = "Activo";
        $paquete->descripcion = "Paquete de bautizo con servicios incluidos.";
        $paquete->ruta_imagen = "https://www.tinaeventplanner.com/wp-content/uploads/2021/03/bautizo.jpeg";
        $paquete->save();

        $paquete = new Paquete();
        $paquete->nombre = "Eventos empresariales";
        $paquete->capacidad_maxima = "150";
        $paquete->costo = "8000";
        $paquete->estatus = "Activo";
        $paquete->descripcion = "Paquete para eventos empresariales con servicios incluidos.";
        $paquete->ruta_imagen = "http://elsauceeventos.com/wp-content/uploads/2018/01/empresariales-.jpg";
        $paquete->save();
    }
}
