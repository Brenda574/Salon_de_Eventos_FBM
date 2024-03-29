<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Paquete;
use App\Models\ImagenPaquete;
use App\Models\ImagenServicio;
use App\Models\Servicio;
use Illuminate\Support\Facades\Storage;

class PaqueteController extends Controller
{
    public function index()
    {
        $paquetes = Paquete::all();
        $servicios = Servicio::all();
        $imagenesServicios = ImagenServicio::all();
        return view('principal', compact('paquetes', 'servicios', 'imagenesServicios'));
    }

    public function create()
    {
        $this->authorize('create', Paquete::class);
        return view('Paquetes.create');
    }

    public function store(Request $request)
    {
        $validacion = $request->validate([
            'nombre' => 'required|unique:paquetes,nombre',
            'capacidad' => 'required|integer',
            'costo' => 'required|decimal:2',
            'descripcion' => 'required',
            'archivoPaquete[]' => 'image'
        ]);
        $this->authorize('create', Paquete::class);
        $nuevo = new Paquete();
        $nuevo->nombre = $request->input('nombre');
        $nuevo->capacidad_maxima = $request->input('capacidad');
        $nuevo->costo = $request->input('costo');
        $nuevo->descripcion = $request->input('descripcion');
        $nuevo->estatus = $request->input('estatus');
        $nuevo->save();
        $paqueteId = $nuevo->id;

        $paquete = Paquete::find($paqueteId);
        $imagenes = $request->file('archivoPaquete');

        if (is_array($imagenes)) {
            foreach ($imagenes as $imagen) {
                if ($imagen->isValid()) {
                    $nombreArchivo = $imagen->getClientOriginalName();
                    $rutaImagen = $imagen->store('imagenes', 'publico');

                    // Crear una nueva imagen asociada al paquete
                    $nuevaImagen = new ImagenPaquete();
                    $nuevaImagen->ruta = $rutaImagen;
                    $nuevaImagen->nombre = $nombreArchivo;

                    $paquete->imagenesPaquetes()->save($nuevaImagen);
                }
            }
        }
        return redirect(route('sistema.gerente'));
    }

    public function show(string $id)
    {
        $this->authorize('view', Paquete::find($id));
        $paquete = Paquete::find($id);
        return view('Paquetes.show', compact('paquete'));
    }

    public function edit(string $id)
    {
        $this->authorize('update', Paquete::find($id));
        $paquete = Paquete::find($id);
        //return redirect()->back()->with('alert', 'Oh no! No es posible editar el paquete.');
        return view('Paquetes.edit', compact('paquete'));
    }

    public function update(Request $request, string $id)
    {
        $validacion = $request->validate([
            'nombre' => 'required',
            'capacidad' => 'required|integer',
            'costo' => 'required|numeric',
            'descripcion' => 'required'
        ]);
        $this->authorize('update', Paquete::find($id));
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
        $this->authorize('delete', Paquete::find($id));
        $paquete = Paquete::find($id);
        $paquete->delete();
        return redirect(route('sistema.gerente'));
        //return redirect()->back()->with('alert', 'Oh no! No es posible eliminar el paquete ya que se encunetra en un evento activo.');
    }

    public function subirImagen(Request $request, $idPaquete)
    {
        $validacion = $request->validate([
            'nombre2' => 'required',
            'capacidadMax' => 'required|integer',
            'costo2' => 'required|numeric',
            'descripcion2' => 'required',
            'archivo[]' => 'image'
        ]);
        $paquete = Paquete::findOrFail($idPaquete);


        $paquete->nombre = $request->input('nombre2');
        $paquete->capacidad_maxima = $request->input('capacidadMax');
        $paquete->costo = $request->input('costo2');
        $paquete->descripcion = $request->input('descripcion2');
        $paquete->estatus = $request->input('estatus2');
        $paquete->save();

        $archivos = $request->file('archivo');

        if (is_array($archivos)) {
            foreach ($archivos as $archivo) {
                if ($archivo->isValid()) {
                    $nombreArchivo = $archivo->getClientOriginalName();
                    $rutaImagen = $archivo->store('imagenes', 'publico');

                    $nuevaImagen = new ImagenPaquete();
                    $nuevaImagen->ruta = $rutaImagen;
                    $nuevaImagen->nombre = $nombreArchivo;

                    $paquete->imagenesPaquetes()->save($nuevaImagen);
                }
            }
        }

        return redirect(route('paquete.edit', ['cual' => $idPaquete]));
    }

    public function eliminarImagen($id)
    {
        $imagen = ImagenPaquete::findOrFail($id);
        $imagen->delete();
        Storage::disk('publico')->delete($imagen->ruta);
        return redirect()->back();
    }
}
