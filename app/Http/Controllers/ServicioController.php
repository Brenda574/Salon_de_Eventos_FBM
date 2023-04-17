<?php

namespace App\Http\Controllers;

use App\Models\Servicio;
use App\Models\Evento;
use Illuminate\Http\Request;

class ServicioController extends Controller
{
    public function index()
    {
        //
    }

    public function create()
    {
        return view('Servicios.create');
    }

    public function store(Request $request)
    {
        $nuevo = new Servicio();
        $nuevo->nombre = $request->input('nombre');
        $nuevo->costo = $request->input('costo');
        $nuevo->descripcion = $request->input('descripcion');
        $nuevo->save();
        return redirect(route('sistema.gerente'));
    }

    public function show(string $id)
    {
        $servicio = Servicio::find($id);
        return view('Servicios.show', compact('servicio'));
    }

    public function edit(string $id)
    {
        $aux = False;
        $eventos = Evento::all();
        $servicio = Servicio::find($id);

        foreach ($eventos as $evento) {
            if ($evento->estatus == "SinConfirmar") {
                $servicios_eventos = $evento->servicios;
                foreach ($servicios_eventos as $serv) {
                    if ($serv->pivot->servicio_id == $servicio->id) {
                        $aux = true;
                        break;
                    }
                }
            }
        }

        if ($aux) {
            return redirect()->back()->with('alert', 'Oh no! No es posible editar el servicio.');
        } else {
            return view('Servicios.edit', compact('servicio'));
        }
    }

    public function update(Request $request, string $id)
    {
        $servicio = Servicio::find($id);
        $servicio->nombre = $request->input('nombre');
        $servicio->costo = $request->input('costo');
        $servicio->descripcion = $request->input('descripcion');
        $servicio->save();
        return redirect(route('servicio.show', $id));
    }

    public function destroy(string $id)
    {
        $aux = False;
        $eventos = Evento::all();
        $servicio = Servicio::find($id);

        foreach ($eventos as $evento) {
            $servicios_eventos = $evento->servicios;
            foreach ($servicios_eventos as $serv) {
                if ($serv->pivot->servicio_id == $servicio->id) {
                    $aux = true;
                    break;
                }
            }
        }

        if ($aux) {
            return redirect()->back()->with('alert', 'Oh no! No es posible eliminar el servicio.');
        } else {
            $servicio->delete();
            return redirect(route('sistema.gerente'));
        }
    }
}
