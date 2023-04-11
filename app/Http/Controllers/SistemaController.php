<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;
use Exception;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

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

        $encontrado = Usuario::where('usuario',$usuario)->first();

        if (is_null($encontrado)) {
            return view("error");
        } else {
            $password_bd = $encontrado->clave;
            $coincide = Hash::check($password,$password_bd);

            if ($coincide) {
                Auth::login($encontrado);
                $rol_bd = $encontrado->rol;
                switch ($rol_bd) {
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
    }
    
    public function logout(Request $solicitud) {
        Auth::logout();
        return redirect('/');
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
