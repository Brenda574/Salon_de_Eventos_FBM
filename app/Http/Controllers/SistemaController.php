<?php

namespace App\Http\Controllers;

use App\Models\Paquete;
use App\Models\Servicio;
use Illuminate\Http\Request;
use App\Models\Usuario;
use App\Models\Evento;
use App\Models\Imagen;
use App\Models\Bitacora;
use Exception;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class SistemaController extends Controller
{
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

        $encontrado = Usuario::where('usuario', $usuario)->first();

        if (is_null($encontrado)) {
            return view("error");
        } else {
            $password_bd = $encontrado->clave;
            $coincide = Hash::check($password, $password_bd);
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

    public function logout(Request $solicitud)
    {
        Auth::logout();
        return redirect('/');
    }


    public function empleado()
    {
        $this->authorize('viewEmpleado', Usuario::class);
        $eventos = Evento::all();
        return view('Sistema.empleado', compact('eventos'));
    }

    public function gerente()
    {
        $this->authorize('viewGerente', Usuario::class);
        $paquetes = Paquete::all();
        $usuarios = Usuario::all();
        $servicios = Servicio::all();
        $eventos = Evento::all();
        return view('Sistema.gerente', compact('usuarios', 'paquetes', 'servicios', 'eventos'));
    }

    public function cliente()
    {
        $this->authorize('viewCliente', Usuario::class);
        $eventos = Evento::where('usuario_id', Auth::user()->id)->get();
        $paquetes = Paquete::all();
        $servicios = Servicio::all();
        $imagenesEvento = Imagen::all();
        return view('Sistema.cliente', compact('eventos', 'paquetes', 'servicios', 'imagenesEvento'));
    }

    public function bitacora()
    {
        $registrosBitacora = Bitacora::all();
        //$this->authorize('viewCliente', Usuario::class);
        return view('Sistema.bitacora')->with('registrosBitacora', $registrosBitacora);;
    }
}
