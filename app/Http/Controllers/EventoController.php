<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Evento;
use App\Models\Servicio;
use App\Models\Paquete;
use Illuminate\Support\Facades\Auth;

class EventoController extends Controller
{
    public function index()
    {
        //
    }

    public function create()
    {
        $paquetes = Paquete::all();
        $servicios = Servicio::all();
        return view('Eventos.create', ['paquetes' => $paquetes], ['servicios' => $servicios]);
    }

    public function store(Request $request)
    {

        $usuario = Auth::user();
        $paquete = Paquete::find($request->input('paquete_id'));
        $nuevo = new Evento();
        $nuevo->nombre_evento = $request->input('nombre_evento');
        $nuevo->fecha = $request->input('fecha');
        $nuevo->hora_inicio = $request->input('hora_inicio');
        $nuevo->hora_final = $request->input('hora_final');
        //$nuevo->costo = $costoTotal;
        $nuevo->estatus = $request->input('estatus');
        $nuevo->proposito = $request->input('proposito');
        $nuevo->num_invitados = $request->input('costo');
        $nuevo->estatus = $request->input('estatus');
        $nuevo->usuario_id = $usuario->id;
        $nuevo->paquete_id = $paquete->id;
        $nuevo->save();
    }

    // show(string $id)
    public function show()
    {
        return view('Eventos.show');
    }

    // edit(string $id)
    public function edit()
    {
        return view('Eventos.edit');
    }

    public function update(Request $request, string $id)
    {
        //
    }

    public function destroy(string $id)
    {
        //
    }
}
