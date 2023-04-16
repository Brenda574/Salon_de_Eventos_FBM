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



        $evento = new Evento();
        $evento->nombre_evento = "XV años de Brenda";
        $evento->fecha = "2023/04/14";
        $evento->hora_inicio = "12:00:00";
        $evento->hora_final = "15:00:00";
        $evento->costo = "10000";
        $evento->estatus = "Confirmado";
        $evento->proposito = "Celebración de 15 años de Brenda, con 100 invitados";
        $evento->num_invitados = 300;
        $evento->usuario_id = $usuario->id;
        $evento->paquete_id = $paquete->id;


        if ($evento->num_invitados > $paquete->capacidad_maxima) {
            $evento->num_invitados = $paquete->capacidad_maxima;
        }

        $evento->save();



        $Manteleria = Servicio::where('id', '1')->first();
        $Mesero = Servicio::where('id', '2')->first();
        $Aire_acondicionado = Servicio::where('id', '4')->first();

        // Agregar los servicios al evento especificando los valores para la tabla intermedia
        $evento->servicios()->attach([$Manteleria->id, $Mesero->id, $Aire_acondicionado->id], ['usuario_id' => $usuario->id, 'paquete_id' => $paquete->id]);
    }
}
