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
            switch ($usuario) {
                case 'Cliente':
                    # code...
                    break;
                case 'Gerente':
                    # code...
                    break;
                case 'Empleado':
                    # code...
                    break;
                default:
                    # code...
                    break;
            }
            //return redirect(route("nopciones"));
        } else {
            return view("error");
        }
    }
}
