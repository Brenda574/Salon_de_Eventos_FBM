<?php

namespace App\Http\Controllers;

use App\Models\Servicio;
use App\Models\Evento;
use App\Models\Paquete;
use App\Models\ImagenServicio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
        $validacion = $request->validate([
            'nombre' => 'required|unique:servicios,nombre',
            'costo' => 'required|decimal:2',
            'descripcion' => 'required',
            'archivoServicio[]' => 'image'
        ]);
        $this->authorize('create', Servicio::class);
        $nuevo = new Servicio();
        $nuevo->nombre = $request->input('nombre');
        $nuevo->costo = $request->input('costo');
        $nuevo->descripcion = $request->input('descripcion');
        $nuevo->save();

        $ServicioId = $nuevo->id;

        $servicios = Servicio::find($ServicioId);

        $archivosS = $request->file('archivoServicio');

        if (is_array($archivosS)) {
            foreach ($archivosS as $archivoS) {
                if ($archivoS->isValid()) {
                    $nombreArchivo = $archivoS->getClientOriginalName();
                    $rutaImagen = $archivoS->store('imagenes', 'publico');

                    $nuevaImagen = new ImagenServicio();
                    $nuevaImagen->ruta = $rutaImagen;
                    $nuevaImagen->nombre = $nombreArchivo;

                    $servicios->imagenesServicios()->save($nuevaImagen);
                }
            }
        }
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
        $validacion = $request->validate([
            'nombre' => 'required',
            'costo' => 'required|decimal:2',
            'descripcion' => 'required',
        ]);
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

    public function editImagen(Request $request, $idServicio)
    {
        $validacion = $request->validate([
            'nom' => 'required',
            'cost' => 'required|decimal:2',
            'descript' => 'required',
            'archivoServicio[]' => 'image'
        ]);
        $servicio = Servicio::findOrFail($idServicio);


        $servicio->nombre = $request->input('nom');
        $servicio->costo = $request->input('cost');
        $servicio->descripcion = $request->input('descript');
        $servicio->save();

        $archivos = $request->file('archivoServicio');

        if (is_array($archivos)) {
            foreach ($archivos as $archivo) {
                if ($archivo->isValid()) {
                    $nombreArchivo = $archivo->getClientOriginalName();
                    $rutaImagen = $archivo->store('imagenes', 'publico');

                    $nuevaImagen = new ImagenServicio();
                    $nuevaImagen->ruta = $rutaImagen;
                    $nuevaImagen->nombre = $nombreArchivo;

                    $servicio->imagenesServicios()->save($nuevaImagen);
                }
            }
        }

        return redirect(route('servicio.edit', ['cual' => $idServicio]));
    }
    public function eliminarImg($id)
    {
        $imagen = ImagenServicio::findOrFail($id);
        $imagen->delete();
        Storage::disk('publico')->delete($imagen->ruta);
        return redirect()->back();
    }
}
