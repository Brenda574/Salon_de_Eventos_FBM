<?php

namespace Database\Seeders;

use App\Models\Evento;
use App\Models\Paquete;
use App\Models\Usuario;
use App\Models\Servicio;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EventoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $usuario = Usuario::where('nombre', 'Paco')->firstOrFail();
        $paquete = Paquete::where('nombre', 'XV años')->firstOrFail();

        $serviciosIds = Servicio::all()->pluck('id');
        $servicios = Servicio::whereIn('id', $serviciosIds)->get();

        $totalServicios = $servicios->sum('costo');

        $evento = new Evento();
        $evento->nombre_evento = "XV años de Brenda";
        $evento->fecha = "2023/04/24";
        $evento->hora_inicio = "15:00:00";
        $evento->hora_final = "20:00:00";
        $evento->estatus = "Confirmado";
        $evento->proposito = "Celebración de 15 años de Brenda, con 100 invitados";
        $evento->num_invitados = 100;
        $evento->costo = $paquete->costo + $totalServicios;
        $evento->usuario_id = $usuario->id;
        $evento->paquete_id = $paquete->id;


        if ($evento->num_invitados > $paquete->capacidad_maxima) {
            $evento->num_invitados = $paquete->capacidad_maxima;
        }

        $evento->save();

        // Agregar los servicios al evento especificando los valores para la tabla intermedia
        $evento->servicios()->attach($serviciosIds, ['usuario_id' => $usuario->id, 'paquete_id' => $paquete->id]);

        $usuario = Usuario::where('nombre', 'Hugo')->firstOrFail();
        $paquete = Paquete::where('nombre', 'Fiesta infantil')->firstOrFail();

        $serviciosIds = [1, 2, 4, 7];
        $servicios = Servicio::whereIn('id', $serviciosIds)->get();

        $totalServicios = $servicios->sum('costo');

        $evento = new Evento();
        $evento->nombre_evento = "Fiesta Infaltil de Jose";
        $evento->fecha = "2023/04/27";
        $evento->hora_inicio = "14:00:00";
        $evento->hora_final = "17:00:00";
        $evento->estatus = "Confirmado";
        $evento->proposito = "Celebración de 5 años de Jose, con 80 invitados";
        $evento->num_invitados = 80;
        $evento->costo = $paquete->costo + $totalServicios;
        $evento->usuario_id = $usuario->id;
        $evento->paquete_id = $paquete->id;


        if ($evento->num_invitados > $paquete->capacidad_maxima) {
            $evento->num_invitados = $paquete->capacidad_maxima;
        }

        $evento->save();

        // Agregar los servicios al evento especificando los valores para la tabla intermedia
        $evento->servicios()->attach($serviciosIds, ['usuario_id' => $usuario->id, 'paquete_id' => $paquete->id]);



        $usuario = Usuario::where('nombre', 'Luis')->firstOrFail();
        $paquete = Paquete::where('nombre', 'Bautizo')->firstOrFail();

        $serviciosIds = [1, 2, 8];
        $servicios = Servicio::whereIn('id', $serviciosIds)->get();

        $totalServicios = $servicios->sum('costo');

        $evento = new Evento();
        $evento->nombre_evento = "Bautizo de mi hija";
        $evento->fecha = "2023/05/02";
        $evento->hora_inicio = "11:00:00";
        $evento->hora_final = "13:00:00";
        $evento->estatus = "Confirmado";
        $evento->proposito = "Celebración del bautizo de mi hija Lucia, con 60 invitados";
        $evento->num_invitados = 60;
        $evento->costo = $paquete->costo + $totalServicios;
        $evento->usuario_id = $usuario->id;
        $evento->paquete_id = $paquete->id;


        if ($evento->num_invitados > $paquete->capacidad_maxima) {
            $evento->num_invitados = $paquete->capacidad_maxima;
        }

        $evento->save();

        // Agregar los servicios al evento especificando los valores para la tabla intermedia
        $evento->servicios()->attach($serviciosIds, ['usuario_id' => $usuario->id, 'paquete_id' => $paquete->id]);


        $usuario = Usuario::where('nombre', 'Paco')->firstOrFail();
        $paquete = Paquete::where('nombre', 'Fiesta infantil')->firstOrFail();

        $serviciosIds = [1, 3, 4, 5, 7];
        $servicios = Servicio::whereIn('id', $serviciosIds)->get();

        $totalServicios = $servicios->sum('costo');

        $evento = new Evento();
        $evento->nombre_evento = "Fiesta de Juanito";
        $evento->fecha = "2023/05/24";
        $evento->hora_inicio = "16:00:00";
        $evento->hora_final = "19:00:00";
        $evento->estatus = "Confirmado";
        $evento->proposito = "Fiesta de cumpleaños infantil de Juanito con tematica de Spider-Man";
        $evento->num_invitados = 150;
        $evento->costo = $paquete->costo + $totalServicios;
        $evento->usuario_id = $usuario->id;
        $evento->paquete_id = $paquete->id;


        if ($evento->num_invitados > $paquete->capacidad_maxima) {
            $evento->num_invitados = $paquete->capacidad_maxima;
        }

        $evento->save();

        // Agregar los servicios al evento especificando los valores para la tabla intermedia
        $evento->servicios()->attach($serviciosIds, ['usuario_id' => $usuario->id, 'paquete_id' => $paquete->id]);


        $usuario = Usuario::where('nombre', 'Luis')->firstOrFail();
        $paquete = Paquete::where('nombre', 'Eventos empresariales')->firstOrFail();

        $serviciosIds = [1, 2, 3, 4, 5, 7,];
        $servicios = Servicio::whereIn('id', $serviciosIds)->get();

        $totalServicios = $servicios->sum('costo');

        $evento = new Evento();
        $evento->nombre_evento = "Evento de SmartTouch";
        $evento->fecha = "2023/06/01";
        $evento->hora_inicio = "17:00:00";
        $evento->hora_final = "21:00:00";
        $evento->estatus = "Confirmado";
        $evento->proposito = "Inaguración de la empresa";
        $evento->num_invitados = 150;
        $evento->costo = $paquete->costo + $totalServicios;
        $evento->usuario_id = $usuario->id;
        $evento->paquete_id = $paquete->id;


        if ($evento->num_invitados > $paquete->capacidad_maxima) {
            $evento->num_invitados = $paquete->capacidad_maxima;
        }

        $evento->save();

        // Agregar los servicios al evento especificando los valores para la tabla intermedia
        $evento->servicios()->attach($serviciosIds, ['usuario_id' => $usuario->id, 'paquete_id' => $paquete->id]);
    }
}
