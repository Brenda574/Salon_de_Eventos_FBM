<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GerenteController extends Controller
{
    public function inicio() {
        return view('Gerente.gerente');
    }
}
