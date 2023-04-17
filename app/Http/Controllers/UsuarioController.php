<?php

namespace App\Http\Controllers;

use App\Models\Evento;
use Illuminate\Http\Request;
use App\Models\Usuario;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Crypt;

class UsuarioController extends Controller
{
    public function index()
    {
        //
    }

    public function create()
    {
        return view('Usuarios.create');
    }

    public function registrar(Request $request)
    {
        $nuevo = new Usuario();
        $nuevo->nombre = $request->input('nombre');
        $nuevo->usuario = $request->input('usuario');
        $nuevo->clave = Hash::make($request->input('clave'));
        $nuevo->rol = $request->input('rol');
        $nuevo->save();
        return redirect(route('login'));
    }

    public function store(Request $request)
    {
        $nuevo = new Usuario();
        $nuevo->nombre = $request->input('nombre');
        $nuevo->usuario = $request->input('usuario');
        $nuevo->clave = Hash::make($request->input('clave'));
        $nuevo->rol = $request->input('rol');
        $nuevo->save();
        return redirect(route('sistema.gerente'));
    }

    public function show(string $id)
    {
        $usuario = Usuario::find($id);
        return view('Usuarios.show', compact('usuario'));
    }

    public function edit($id)
    {
        $usuario = Usuario::find($id);
        return view('Usuarios.edit', compact('usuario'));
    }

    public function update(Request $request, $id)
    {
        $usuario = Usuario::find($id);
        $usuario->nombre = $request->input('nombre');
        $usuario->usuario = $request->input('usuario');
        if ($request->input('clave')) {
            $usuario->clave = Hash::make($request->input('clave'));
        }
        $usuario->rol = $request->input('rol');
        $usuario->save();
        return redirect(route('usuario.show', $id));
    }

    public function destroy(string $id)
    {
        $aux = False;
        $eventos = Evento::all();
        $usuario = Usuario::find($id);
        foreach ($eventos as $evento) {
            if  ($evento->usuario_id == $usuario->id) {
                $aux = True;
                break;
            }
        }
        $message="HOLA";
        if (!$aux) {
            $usuario->delete();
            return redirect(route('sistema.gerente'));
        } else {
            return redirect()->back() ->with('alert', 'Oh no! No es posible eliminar ya que el usuario tiene eventos activos.');
        }
    }
}
