<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Paquete;
use App\Models\Servicio;
use App\Models\ImagenPaquete;
use Illuminate\Support\Facades\Storage;

class PaqueteController extends Controller
{
    public function index()
    {
        $paquetes = Paquete::all();
        $servicios = Servicio::all();
        return view('principal', compact('paquetes', 'servicios'));
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
        //return redirect()->back()->with('alert', 'Oh no! No es posible editar el paquete.');
        return view('Paquetes.edit', compact('paquete'));
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
        $paquete = Paquete::find($id);
        $paquete->delete();
        return redirect(route('sistema.gerente'));
        //return redirect()->back()->with('alert', 'Oh no! No es posible eliminar el paquete ya que se encunetra en un evento activo.');
    }

    public function subirImgPaquete(Request $request, $idPaquete)
    {

        $paquete = Paquete::findOrFail($idPaquete);

        // Subir la imagen al disco público
        $imagen = $request->file('archivoPaquete');
        $nombreArchivo = $imagen->getClientOriginalName();
        $rutaImagen = $imagen->store('imagenes', 'publico');

        // Crear una nueva imagen asociada al evento
        $nuevaImagen = new ImagenPaquete();
        $nuevaImagen->ruta_imagen = $rutaImagen;
        $nuevaImagen->nombre = $nombreArchivo;

        $paquete->imagenes()->save($nuevaImagen);

        return redirect(route('paquete.create', ['cual' => $idPaquete]));
    }

    public function eliminarImgEliminar($id)
    {
        $imagen = ImagenPaquete::findOrFail($id);

        // Elimina la imagen de la base de datos
        $imagen->delete();

        // Elimina la imagen del disco público
        Storage::disk('publico')->delete($imagen->ruta_imagen);

        return redirect()->back();
    }
}
