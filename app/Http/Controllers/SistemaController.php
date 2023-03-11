<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SistemaController extends Controller
{
    public function principal() {
        return view('principal');
    }

    public function login() {
        return view('login');
    }

    public function facceder(Request $acceso) {
        $usuario = $acceso->input('usuario');
        $password = $acceso->input('password');
        if ($usuario==$password && ($usuario=='Cliente' || $usuario=='Gerente' || $usuario=='Empleado')) {
            switch ($usuario) {
                case 'Cliente':
                    return redirect(route("iniCliente"));
                    break;
                case 'Gerente':
                    return redirect(route("iniGerente"));
                    break;
                case 'Empleado':
                    return redirect(route("iniEmpleado"));
                    break;
            }
        } else {
            return view("error");
        }
    }
}
