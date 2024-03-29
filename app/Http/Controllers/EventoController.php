<?php

namespace App\Http\Controllers;

use App\Jobs\AutorizarEvento;
use App\Jobs\RechazoEvento;
use Illuminate\Http\Request;
use App\Models\Usuario;
use App\Mail\ConfirmacionEventoMail;
use App\Mail\RechazoEventoMail;
use App\Models\Evento;
use App\Models\Servicio;
use App\Models\Paquete;
use App\Models\Abono;
use App\Models\Gasto;
use App\Models\Imagen;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Mail;

class EventoController extends Controller
{
    public function index()
    {
    }

    public function create()
    {
        $this->authorize('create', Evento::class);
        $paquetes = Paquete::all();
        $servicios = Servicio::all();
        return view('Eventos.create', ['paquetes' => $paquetes], ['servicios' => $servicios]);
    }

    public function store(Request $request)
    {
        $validacion = $request->validate([
            'nombre_evento' => 'required|unique:eventos,nombre_evento',
            'paquete_id' => 'required',
            'fecha' => 'required|date',
            'hora_inicio' => 'required',
            'hora_final' => 'required',
            'num_invitados' => 'required|integer',
            'proposito' => 'required'
        ]);
        $this->authorize('create', Evento::class);
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

        if ($nuevo->num_invitados > $paquete->capacidad_maxima) {       // Verifica que num de invitados no revase la capacidad max
            $nuevo->num_invitados = $paquete->capacidad_maxima;
        }

        $nuevo->save();

        if (is_null(json_decode($request->input('servicios_id')))) {
        } else {
            $serviciosIds = json_decode($request->input('servicios_id'));
            $servicios = Servicio::whereIn('id', $serviciosIds)->get();
            $nuevo->servicios()->attach($servicios, ['usuario_id' => $usuario->id, 'paquete_id' => $paquete->id]);
        }

        if (request()->expectsJson()) {
            return response()->json($nuevo);
        } else {
            return redirect()->route('sistema.cliente');
        }
    }

    public function show(string $id)
    {
        $this->authorize('view', Evento::find($id));
        $evento = Evento::find($id);
        $paquetes = Paquete::all();
        $servicios = Servicio::all();
        $abonos = Abono::all();
        return view('Eventos.show', compact('evento', 'paquetes', 'servicios', 'abonos'));
    }

    public function showCliente(string $id)
    {
        $this->authorize('viewCliente', Evento::find($id));
        $evento = Evento::find($id);
        $paquetes = Paquete::all();
        $servicios = Servicio::all();
        $abonos = Abono::all();
        return view('Eventos.showCliente', compact('evento', 'paquetes', 'servicios', 'abonos'));
    }

    public function showGerente(string $id)
    {
        $this->authorize('viewGerente', Evento::find($id));
        $evento = Evento::find($id);
        $paquetes = Paquete::all();
        $servicios = Servicio::all();
        $abonos = Abono::all();
        return view('Eventos.showGerente', compact('evento', 'paquetes', 'servicios', 'abonos'));
    }

    public function edit(string $id)
    {
        $this->authorize('update', Evento::find($id));
        $evento = Evento::find($id);
        $paquetes = Paquete::all();
        $servicios = Servicio::all();
        $serviciosSeleccionados = $evento->servicios->pluck('id')->toArray();
        return view('Eventos.edit', compact('evento', 'paquetes', 'servicios', 'serviciosSeleccionados'));
    }

    public function update(Request $request, string $id)
    {
        $validacion = $request->validate([
            'nombre_evento' => 'required',
            'paquete_id' => 'required',
            'fecha' => 'required|date',
            'hora_inicio' => 'required',
            'hora_final' => 'required',
            'num_invitados' => 'required|integer',
            'proposito' => 'required'
        ]);
        $this->authorize('update', Evento::find($id));
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

    public function update_autorizar(Request $request, string $id)
    {
        $this->authorize('updateAutorizar', Evento::find($id));
        $evento = Evento::find($id);
        $evento->estatus = $request->input('estatus');
        $evento->quien_autoriza = $request->input('gerente');
        $evento->save();

        if ($request->input('estatus') != "Confirmado") {
            $cliente = $evento->usuario;
            $gerente = Auth::user();
            $descripcion = $request->input('descripcion');
            if ($cliente && $gerente) {
                if ($evento->estatus == 'SinConfirmar') {
                    RechazoEvento::dispatch($cliente, $gerente, $evento, $descripcion);
                } elseif ($evento->estatus == 'Confirmado') {
                    AutorizarEvento::dispatch($cliente, $gerente, $evento);
                }
            }
        }

        return redirect(route('evento.showGerente', ['cual' => $id]));
    }

    public function destroy(string $id)
    {
        $this->authorize('delete', Evento::find($id));
        $evento = Evento::find($id);
        $evento->servicios()->detach();
        $evento->delete();
        return redirect(route('sistema.cliente'));
    }

    // IMAGENES

    public function subirImagen(Request $request, $idEvento)
    {
        $validacion = $request->validate([
            'archivo' => 'image',
            'descrip' => 'required'
        ]);
        $evento = Evento::findOrFail($idEvento);
        $archivo = $request->file('archivo');
        $nombreArchivo = $archivo->getClientOriginalName();
        $rutaImagen = $archivo->store('imagenes', 'publico');
        $descripcion = $request->input('descrip');

        $nuevaImagen = new Imagen();
        $nuevaImagen->ruta_imagen = $rutaImagen;
        $nuevaImagen->nombre = $nombreArchivo;
        $nuevaImagen->descripcion = $descripcion;
        $nuevaImagen->usuario_id = Auth::user()->id;

        $evento->imagenes()->save($nuevaImagen);

        if (Auth::user()->rol == "Empleado") {
            return redirect(route('evento.show', ['cual' => $idEvento]));
        } else {
            if (Auth::user()->rol == "Cliente") {
                return redirect(route('evento.showCliente', ['cual' => $idEvento]));
            } else {
                return redirect(route('evento.showGerente', ['cual' => $idEvento]));
            }
        }
    }

    public function updateImagen(Request $request, $id)
    {
        $this->authorize('update', Imagen::find($id));
        $img = Imagen::find($id);
        $img->descripcion = $request->input('descrip');
        $img->save();

        if (Auth::user()->rol == "Empleado") {
            return redirect(route('evento.show', ['cual' => $img->evento_id]));
        } else {
            if (Auth::user()->rol == "Cliente") {
                return redirect(route('evento.showCliente', ['cual' => $img->evento_id]));
            } else {
                return redirect(route('evento.showGerente', ['cual' => $img->evento_id]));
            }
        }
    }

    public function eliminarImagen($id)
    {
        $this->authorize('delete', Imagen::find($id));
        $imagen = Imagen::findOrFail($id);
        $imagen->delete();
        Storage::disk('publico')->delete($imagen->ruta_imagen);

        return redirect()->back();
    }

    // ABONOS

    public function subirAbono(Request $request, $idEvento)
    {
        $validacion = $request->validate([
            'monto' => 'required|decimal:2',
        ]);
        $this->authorize('updateAbono', Evento::find($idEvento));
        $evento = Evento::findOrFail($idEvento);
        $nuevoAbono = new Abono();
        $nuevoAbono->monto = $request->input('monto');
        $nuevoAbono->quien = Auth::user()->nombre;

        if ($nuevoAbono->monto > ($evento->costo - Abono::where('evento_id', $evento->id)->sum('monto'))) {
            $nuevoAbono->monto = $evento->costo - Abono::where('evento_id', $evento->id)->sum('monto');
        }

        $evento->abonos()->save($nuevoAbono);

        if (Auth::user()->rol == "Empleado") {
            return redirect(route('evento.show', ['cual' => $idEvento]));
        } else {
            return redirect(route('evento.showGerente', ['cual' => $idEvento]));
        }
    }

    public function eliminarAbono($id)
    {
        $abonito = Abono::findOrFail($id);
        $abonito->delete();
        return redirect()->back();
    }

    // GATOS

    public function subirGasto(Request $request, $idEvento)
    {
        $validacion = $request->validate([
            'monto' => 'required|decimal:2',
            'descripcion' => 'required'
        ]);
        $this->authorize('addGasto', Evento::find($idEvento));
        $evento = Evento::findOrFail($idEvento);
        $nuevoGasto = new Gasto();
        $nuevoGasto->monto = $request->input('monto');
        $nuevoGasto->descripcion = $request->input('descripcion');
        $nuevoGasto->usuario_id = Auth::user()->id;
        $evento->gastos()->save($nuevoGasto);
        return redirect(route('evento.showGerente', ['cual' => $idEvento]));
    }

    public function editarGasto(Request $request, $id)
    {
        $this->authorize('addGasto', Evento::find(Gasto::find($id)->evento_id));
        $gastito = Gasto::findOrFail($id);
        $gastito->monto = $request->input('cantidadGasto');
        $gastito->descripcion = $request->input('conceptoGasto');
        $gastito->save();
        return redirect()->back();
    }

    public function eliminarGasto($id)
    {
        $this->authorize('addGasto', Evento::find(Gasto::find($id)->evento_id));
        $gastito = Gasto::findOrFail($id);
        $gastito->delete();
        return redirect()->back();
    }
}
