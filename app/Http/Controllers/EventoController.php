<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Evento;
use App\Models\Servicio;
use App\Models\Paquete;
use App\Models\Abono;
use App\Models\Imagen;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

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

        if ($nuevo->num_invitados > $paquete->capacidad_maxima) {
            $nuevo->num_invitados = $paquete->capacidad_maxima;
        }

        $nuevo->save();

        // Crear la relación entre el evento y los servicios
        $nuevo->servicios()->attach($servicios, ['usuario_id' => $usuario->id, 'paquete_id' => $paquete->id]);

        // Redireccionar a la página del evento creado
        return redirect()->route('sistema.cliente');
    }

    public function show(string $id)
    {
        $evento = Evento::find($id);
        $paquetes = Paquete::all();
        $servicios = Servicio::all();
        $abonos = Abono::all();
        return view('Eventos.show', compact('evento', 'paquetes', 'servicios', 'abonos'));
    }

    public function showCliente(string $id)
    {
        $evento = Evento::find($id);
        $paquetes = Paquete::all();
        $servicios = Servicio::all();
        $abonos = Abono::all();
        return view('Eventos.showCliente', compact('evento', 'paquetes', 'servicios', 'abonos'));
    }

    public function showGerente(string $id)
    {
        $evento = Evento::find($id);
        $paquetes = Paquete::all();
        $servicios = Servicio::all();
        $abonos = Abono::all();
        return view('Eventos.showGerente', compact('evento', 'paquetes', 'servicios', 'abonos'));
    }

    public function edit(string $id)
    {
        $evento = Evento::find($id);
        $paquetes = Paquete::all();
        $servicios = Servicio::all();
        $serviciosSeleccionados = $evento->servicios->pluck('id')->toArray();
        return view('Eventos.edit', compact('evento', 'paquetes', 'servicios', 'serviciosSeleccionados'));
    }

    public function update(Request $request, string $id)
    {
        $usuario = Auth::user();
        $paquete = Paquete::find($request->input('paquete_id'));

        $evento = Evento::find($id);
        $evento->nombre_evento = $request->input('nombre_evento');
        $evento->fecha = $request->input('fecha');
        $evento->hora_inicio = $request->input('hora_inicio');
        $evento->hora_final = $request->input('hora_final');
        $evento->costo = $request->input('total');
        $evento->proposito = $request->input('proposito');
        $evento->num_invitados = $request->input('num_invitados');
        $evento->estatus = $request->input('estatus');
        $evento->usuario_id = $usuario->id;
        $evento->paquete_id = $paquete->id;

        if ($evento->num_invitados > $paquete->capacidad_maxima) {
            $evento->num_invitados = $paquete->capacidad_maxima;
        }

        $evento->save();

        if (is_null(json_decode($request->input('servicios_id')))) {
        } else {
            $serviciosIds = json_decode($request->input('servicios_id'));
            $servicios = Servicio::whereIn('id', $serviciosIds)->get();
            $evento->servicios()->detach();
            $evento->servicios()->attach($servicios, ['usuario_id' => $usuario->id, 'paquete_id' => $paquete->id]);
        }

        return redirect()->route('sistema.cliente');
    }

    public function destroy(string $id)
    {
        $evento = Evento::find($id);
        $evento->servicios()->detach();
        $evento->delete();
        return redirect(route('sistema.cliente'));
    }

    public function subirImagen(Request $request, $idEvento)
    {
        $evento = Evento::findOrFail($idEvento);

        $archivos = $request->file('archivo');

        if (is_array($archivos)) {
            foreach ($archivos as $archivo) {
                if ($archivo->isValid()) {
                    $nombreArchivo = $archivo->getClientOriginalName();
                    $rutaImagen = $archivo->store('imagenes', 'publico');

                    $nuevaImagen = new Imagen();
                    $nuevaImagen->ruta_imagen = $rutaImagen;
                    $nuevaImagen->nombre = $nombreArchivo;

                    $evento->imagenes()->save($nuevaImagen);
                }
            }
        } else {
            // Solo se subió un archivo
            if ($archivos->isValid()) {
                $nombreArchivo = $archivos->getClientOriginalName();
                $rutaImagen = $archivos->store('imagenes', 'publico');

                $nuevaImagen = new Imagen();
                $nuevaImagen->ruta_imagen = $rutaImagen;
                $nuevaImagen->nombre = $nombreArchivo;

                $evento->imagenes()->save($nuevaImagen);
            }
        }

        return redirect(route('evento.showCliente', ['cual' => $idEvento]));
    }

    public function subirImagenEmpleado(Request $request, $idEvento)
    {

        $evento = Evento::findOrFail($idEvento);

        // Subir la imagen al disco público
        $imagen = $request->file('archivoEmpleado');
        $nombreArchivo = $imagen->getClientOriginalName();
        $rutaImagen = $imagen->store('imagenes', 'publico');

        // Crear una nueva imagen asociada al evento
        $nuevaImagen = new Imagen();
        $nuevaImagen->ruta_imagen = $rutaImagen;
        $nuevaImagen->nombre = $nombreArchivo;

        $evento->imagenes()->save($nuevaImagen);

        return redirect(route('evento.show', ['cual' => $idEvento]));
    }

    public function eliminar($id)
    {
        $imagen = Imagen::findOrFail($id);

        // Elimina la imagen de la base de datos
        $imagen->delete();

        // Elimina la imagen del disco público
        Storage::disk('publico')->delete($imagen->ruta_imagen);

        return redirect()->back();
    }

    public function eliminarEmpleado($id)
    {
        $imagen = Imagen::findOrFail($id);

        // Elimina la imagen de la base de datos
        $imagen->delete();

        // Elimina la imagen del disco público
        Storage::disk('publico')->delete($imagen->ruta_imagen);

        return redirect()->back();
    }

    public function mostrarGaleria($idEvento)
    {
        return redirect(route("sistema.cliente"));
    }








    public function subirAbono(Request $request, $idEvento)
    {
        $evento = Evento::findOrFail($idEvento);
        // 
        
        // Crear una nueva imagen asociada al evento
        $nuevoAbono = new Abono();
        $nuevoAbono->monto = $request->input('monto');

        $evento->abonos()->save($nuevoAbono);

        return redirect(route('evento.show', ['cual' => $idEvento]));
    }
    public function eliminarAbono($id)
    {
        $imagen = Imagen::findOrFail($id);

        // Elimina la imagen de la base de datos
        $imagen->delete();

        // Elimina la imagen del disco público
        Storage::disk('publico')->delete($imagen->ruta_imagen);

        return redirect()->back();
    }

    public function mostrarAbono($idEvento)
    {
        return redirect(route("sistema.cliente"));
    }
}
