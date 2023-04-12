<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Crypt;

class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Usuarios.create');
    }

    /**
     * Store a newly created resource in storage.
     */
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

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //return view('Usuarios.show');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $usuario = Usuario::find($id);
        return view('Usuarios.edit', compact('usuario'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $usuario = Usuario::find($id);
        $usuario->nombre = $request->input('nombre');
        $usuario->usuario = $request->input('usuario');
        $usuario->clave = Hash::make($request->input('clave'));
        $usuario->rol = $request->input('rol');
        $usuario->save();
        return redirect(route('sistema.gerente'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
