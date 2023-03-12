<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SistemaController extends Controller
{
    public function principal()
    {
        return view('principal');
    }

    public function login()
    {
        return view('login');
    }

    public function registro()
    {
        return view('registro');
    }

    public function facceder(Request $acceso)
    {
        $usuario = $acceso->input('usuario');
        $password = $acceso->input('password');
        if ($usuario == $password && ($usuario == 'Cliente' || $usuario == 'Gerente' || $usuario == 'Empleado')) {
            switch ($usuario) {
                case 'Cliente':
                    return redirect(route("sistema.cliente"));
                    break;
                case 'Gerente':
                    return redirect(route("sistema.gerente"));
                    break;
                case 'Empleado':
                    return redirect(route("sistema.empleado"));
                    break;
            }
        } else {
            return view("error");
        }
    }

    public function gerente()
    {
        return view('Sistema.gerente');
    }

    public function empleado()
    {
        return view('Sistema.empleado');
    }

    public function cliente()
    {
        return view('Sistema.cliente');
    }
}
