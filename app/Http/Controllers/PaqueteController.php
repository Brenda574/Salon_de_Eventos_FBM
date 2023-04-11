<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Paquete;

class PaqueteController extends Controller
{
    public function index()
    {
        $paquetes = Paquete::all();
        return view('principal', compact('paquetes'));
    }

    public function create()
    {
        return view('Paquetes.create');
    }

    public function store(Request $request)
    {
        //
    }

    // show(string $id)
    public function show()
    {
        return view('Paquetes.show');
    }

    // edit(string $id)
    public function edit()
    {
        return view('Paquetes.edit');
    }

    public function update(Request $request, string $id)
    {
        //
    }

    public function destroy(string $id)
    {
        //
    }
}
