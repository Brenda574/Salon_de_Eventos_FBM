<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SistemaController extends Controller
{
    public function login() {
        return view('login');
    }

    public function acceder(Request $acceso) {
        $usuario = $acceso->input('usuario');
        $password = $acceso->input('password');
        if ($usuario==$password && ($usuario=='Cliente' || $usuario=='Gerente' || $usuario=='Empleado')) {
            return view("principal");
            /*switch ($usuario) {
                case 'Cliente':
                    return view("principal");
                    break;
                case 'Gerente':
                    return view("principal");
                    break;
                case 'Empleado':
                    return view("principal");
                    break;
            }*/
        } else {
            return view("error");
        }
    }
}
