<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Evento;
use App\Models\Servicio;
use App\Models\Paquete;
use App\Models\Abono;
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
        $serviciosIds = json_decode($request->input('servicios_id'));
        // Buscar los servicios en la base de datos
        $servicios = Servicio::whereIn('id', $serviciosIds)->get();
        $usuario = Auth::user();
        $paquete = Paquete::find($request->input('paquete_id'));
        $nuevo = new Evento();
        $nuevo->nombre_evento = $request->input('nombre_evento');
        $nuevo->fecha = $request->input('fecha');
        $nuevo->hora_inicio = $request->input('hora_inicio');
        $nuevo->hora_final = $request->input('hora_final');
        $nuevo->costo = $request->input('total');
        $nuevo->proposito = $request->input('proposito');
        $nuevo->num_invitados = $request->input('num_invitados');
        $nuevo->estatus = $request->input('estatus');
        $nuevo->usuario_id = $usuario->id;
        $nuevo->paquete_id = $paquete->id;
        $nuevo->save();


        // Crear la relación entre el evento y los servicios

        $nuevo->servicios()->attach($servicios, ['usuario_id' => $usuario->id, 'paquete_id' => $paquete->id]);

        // Redireccionar a la página del evento creado
        return redirect()->route('sistema.cliente');
    }

    public function show(string $id)
    {
        return view('Eventos.show');
    }

    public function showCliente(string $id)
    {
        $evento = Evento::find($id);
        $paquetes = Paquete::all();
        $servicios = Servicio::all();
        $abonos = Abono::all();
        return view('Eventos.showCliente', compact('evento', 'paquetes', 'servicios', 'abonos'));
    }

    public function edit(string $id)
    {
        $evento = Evento::find($id);
        $paquetes = Paquete::all();
        $servicios = Servicio::all();
        return view('Eventos.edit', compact('evento', 'paquetes', 'servicios'));
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
