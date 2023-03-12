<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ClienteController extends Controller
{
    public function inicioCliente() {
        return view('Cliente.cliente');
    }

    public function subeImagen(Request $imagen){
        dump($solicitud->all());
        /*$nombre=$imagen['archivo']['name'];
        $guardado=$imagen['archivo']['tmp_name'];*/

    }
}
