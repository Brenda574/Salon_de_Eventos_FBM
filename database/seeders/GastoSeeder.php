<?php

namespace Database\Seeders;

use App\Models\Evento;
use App\Models\Gasto;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GastoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $evento = Evento::where('nombre_evento', 'XV años de Brenda')->firstOrFail();  
        $gasto = new Gasto();
        $gasto->monto = 30;
        $gasto->descripcion = "Servilletas";
        $gasto->evento_id = $evento->id;
        $gasto->usuario_id = $evento->usuario_id;
        $gasto->save();

        $evento = Evento::where('nombre_evento', 'Fiesta Infaltil de Jose')->firstOrFail();
        $gasto = new Gasto();
        $gasto->monto = 60;
        $gasto->descripcion = "Refrescos";
        $gasto->evento_id = $evento->id;
        $gasto->usuario_id = $evento->usuario_id;
        $gasto->save();

        $evento = Evento::where('nombre_evento', 'Bautizo de mi hija')->firstOrFail();
        $gasto = new Gasto();
        $gasto->monto = 90;
        $gasto->descripcion = "Botanas";
        $gasto->evento_id = $evento->id;
        $gasto->usuario_id = $evento->usuario_id;
        $gasto->save();

        $evento = Evento::where('nombre_evento', 'Fiesta de Juanito')->firstOrFail();
        $gasto = new Gasto();
        $gasto->monto = 120;
        $gasto->descripcion = "Bocina";
        $gasto->evento_id = $evento->id;
        $gasto->usuario_id = $evento->usuario_id;
        $gasto->save();
    }
}
