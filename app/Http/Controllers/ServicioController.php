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
        $this->authorize('create', Servicio::class);
        return view('Servicios.create');
    }

    public function store(Request $request)
    {
        $this->authorize('create', Servicio::class);
        $nuevo = new Servicio();
        $nuevo->nombre = $request->input('nombre');
        $nuevo->costo = $request->input('costo');
        $nuevo->descripcion = $request->input('descripcion');
        $nuevo->save();
        return redirect(route('sistema.gerente'));
    }

    public function show(string $id)
    {
        $this->authorize('view', Servicio::find($id));
        $servicio = Servicio::find($id);
        return view('Servicios.show', compact('servicio'));
    }

    public function edit(string $id)
    {
        $this->authorize('update', Servicio::find($id));
        $servicio = Servicio::find($id);
        return view('Servicios.edit', compact('servicio'));
    }

    public function update(Request $request, string $id)
    {
        $this->authorize('update', Servicio::find($id));
        $servicio = Servicio::find($id);
        $servicio->nombre = $request->input('nombre');
        $servicio->costo = $request->input('costo');
        $servicio->descripcion = $request->input('descripcion');
        $servicio->save();
        return redirect(route('servicio.show', $id));
    }

    public function destroy(string $id)
    {
        $servicio = Servicio::find($id);
        $servicio->delete();
        return redirect(route('sistema.gerente'));
    }
}
