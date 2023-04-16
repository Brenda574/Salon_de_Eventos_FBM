<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Paquete;

class PaqueteController extends Controller
{
    public function index()
    {
        $paquetes = Paquete::all();
        return view('principal', compact('paquetes'));
    }

    public function create()
    {
        return view('Paquetes.create');
    }

    public function store(Request $request)
    {
        $nuevo = new Paquete();
        $nuevo->nombre = $request->input('nombre');
        $nuevo->capacidad = $request->input('capacidad');
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
        $paquete = Paquete::find($id);
        return view('Paquetes.edit', compact('paquete'));
    }

    public function update(Request $request, string $id)
    {
        $paquete = Paquete::find($id);
        $paquete->nombre = $request->input('nombre');
        $paquete->capacidad = $request->input('capacidad');
        $paquete->costo = $request->input('costo');
        $paquete->descripcion = $request->input('descripcion');
        $paquete->estatus = $request->input('estatus');
        $paquete->save();
        return redirect(route('paquete.show', $id));
    }

    public function destroy(string $id)
    {
        $paquete = Paquete::find($id);
        $paquete->delete();
        return redirect(route('sistema.gerente'));
    }
}
