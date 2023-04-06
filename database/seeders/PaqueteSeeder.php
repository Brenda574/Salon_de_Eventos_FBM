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
        $paquete->capacidad = "150 a 200";
        $paquete->costo = "10000";
        $paquete->descripcion = "Paquete para bodas, con servicios completos.";
        $paquete->ruta_imagen = "https://cdn0.bodas.com.mx/article-real-wedding/221/3_2/960/jpg/1150609.jpeg";
        $paquete->save();

        $paquete = new Paquete();
        $paquete->nombre = "XV años";
        $paquete->capacidad = "150 a 200";
        $paquete->costo = "10000";
        $paquete->descripcion = "Paquete para XV años con servicios incluidos.";
        $paquete->ruta_imagen = "https://cdn0.bodas.com.mx/vendor/2737/3_2/960/jpg/11411948-10155691402620562-8558719571658733083-o_5_252737-1561598289.jpeg";
        $paquete->save();

        $paquete = new Paquete();
        $paquete->nombre = "Fiesta infantil";
        $paquete->capacidad = "150 a 200";
        $paquete->costo = "10000";
        $paquete->descripcion = "Paquete de fiestas infantiles con servicios incluidos.";
        $paquete->ruta_imagen = "https://www.google.com/url?sa=i&url=https%3A%2F%2Fwww.craftologia.com%2Ftips%2Ftips-de-fiestas%2Fdecoracion-para-fiestas%2Fideas-para-fiesta-de-dia-del-nino&psig=AOvVaw02CRLfLHz_5GYhHrfDPEEL&ust=1680843027635000&source=images&cd=vfe&ved=0CBAQjRxqFwoTCKijzq66lP4CFQAAAAAdAAAAABAE";
        $paquete->save();

        $paquete = new Paquete();
        $paquete->nombre = "Bautizo";
        $paquete->capacidad = "150 a 200";
        $paquete->costo = "10000";
        $paquete->descripcion = "Paquete de bautizo con servicios incluidos.";
        $paquete->ruta_imagen = "https://www.google.com/url?sa=i&url=https%3A%2F%2Fwww.tinaeventplanner.com%2Fcomo-organizar-un-bautizo-6-pasos-a-seguir%2F&psig=AOvVaw0yqTd91aln3iaCpu06jYh2&ust=1680842939754000&source=images&cd=vfe&ved=0CBAQjRxqFwoTCIiB0IS6lP4CFQAAAAAdAAAAABAE";
        $paquete->save();

        $paquete = new Paquete();
        $paquete->nombre = "Eventos empresariales";
        $paquete->capacidad = "100 a 150";
        $paquete->costo = "8000";
        $paquete->descripcion = "Paquete para eventos empresariales con servicios incluidos.";
        $paquete->ruta_imagen = "http://elsauceeventos.com/wp-content/uploads/2018/01/empresariales-.jpg";
        $paquete->save();
    }
}
