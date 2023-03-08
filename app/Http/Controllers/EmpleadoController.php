<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EmpleadoController extends Controller
{
    public function inicio() {
        return view('Empleado.empleado');
    }

    public function detalles() {
        return view('Empleado.detalles');
    }
}
