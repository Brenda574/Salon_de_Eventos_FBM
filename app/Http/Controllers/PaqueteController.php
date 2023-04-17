<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Paquete;
use App\Models\Servicio;
use App\Models\Evento;

class PaqueteController extends Controller
{
    public function index()
    {
        $paquetes = Paquete::all();
        $servicios = Servicio::all();
        return view('principal', compact('paquetes','servicios'));
    }

    public function create()
    {
        return view('Paquetes.create');
    }

    public function store(Request $request)
    {
        $nuevo = new Paquete();
        $nuevo->nombre = $request->input('nombre');
        $nuevo->capacidad_maxima = $request->input('capacidad');
        $nuevo->costo = $request->input('costo');
        $nuevo->descripcion = $request->input('descripcion');
        $nuevo->ruta_imagen = $request->input('ruta_img');
        $nuevo->estatus = $request->input('estatus');
        $nuevo->save();
        return redirect(route('sistema.gerente'));
    }

    public function show(string $id)
    {
        $paquete = Paquete::find($id);
        return view('Paquetes.show', compact('paquete'));
    }

    public function edit(string $id)
    {
        $aux = False;
        $eventos = Evento::all();
        $paquete = Paquete::find($id);
        foreach ($eventos as $evento) {
            if  ($evento->paquete_id == $paquete->id && $evento->estatus == "SinConfirmar") {
                $aux = True;
                break;
            }
        }
        if ($aux) {
            return redirect()->back()->with('alert', 'Oh no! No es posible editar el paquete.');
        } else {
            return view('Paquetes.edit', compact('paquete'));
        }
    }

    public function update(Request $request, string $id)
    {
        $paquete = Paquete::find($id);
        $paquete->nombre = $request->input('nombre');
        $paquete->capacidad_maxima = $request->input('capacidad');
        $paquete->costo = $request->input('costo');
        $paquete->descripcion = $request->input('descripcion');
        $paquete->estatus = $request->input('estatus');
        $paquete->save();
        return redirect(route('paquete.show', $id));
    }

    public function destroy(string $id)
    {
        $aux = False;
        $eventos = Evento::all();
        $paquete = Paquete::find($id);
        foreach ($eventos as $evento) {
            if  ($evento->paquete_id == $paquete->id) {
                $aux = True;
                break;
            }
        }
        if ($aux) {
            return redirect()->back()->with('alert', 'Oh no! No es posible eliminar el paquete ya que se encunetra en un evento activo.');
        } else {
            $paquete->delete();
            return redirect(route('sistema.gerente'));
        }
    }
}
