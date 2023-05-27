<?php

namespace Database\Seeders;

use App\Models\Evento;
use App\Models\Abono;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AbonoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $evento = Evento::where('nombre_evento', 'XV años de Brenda')->firstOrFail();
        $abono = new Abono();
        $abono->monto = 150;
        $abono->tipo_pago = "Efectivo";
        $abono->evento_id = $evento->id;
        $abono->save();

        $abono = new Abono();
        $abono->monto = 250;
        $abono->tipo_pago = "Efectivo";
        $abono->evento_id = $evento->id;
        $abono->save();

        $evento = Evento::where('nombre_evento', 'Fiesta Infaltil de Jose')->firstOrFail();
        $abono = new Abono();
        $abono->monto = 350;
        $abono->tipo_pago = "Efectivo";
        $abono->evento_id = $evento->id;
        $abono->save();

        $abono = new Abono();
        $abono->monto = 450;
        $abono->tipo_pago = "Efectivo";
        $abono->evento_id = $evento->id;
        $abono->save();

        $evento = Evento::where('nombre_evento', 'Bautizo de mi hija')->firstOrFail();
        $abono = new Abono();
        $abono->monto = 550;
        $abono->tipo_pago = "Efectivo";
        $abono->evento_id = $evento->id;
        $abono->save();

        $abono = new Abono();
        $abono->monto = 650;
        $abono->tipo_pago = "Efectivo";
        $abono->evento_id = $evento->id;
        $abono->save();

        $evento = Evento::where('nombre_evento', 'Fiesta de Juanito')->firstOrFail();
        $abono = new Abono();
        $abono->monto = 750;
        $abono->tipo_pago = "Efectivo";
        $abono->evento_id = $evento->id;
        $abono->save();

        $abono = new Abono();
        $abono->monto = 850;
        $abono->tipo_pago = "Efectivo";
        $abono->evento_id = $evento->id;
        $abono->save();
    }

}
