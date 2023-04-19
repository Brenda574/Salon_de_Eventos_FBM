<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Evento;

class EventoController extends Controller
{
    public function index()
    {
        //
    }

    public function create()
    {
        return view('Eventos.create');
    }

    public function store(Request $request)
    {
        //
    }

    // show(string $id)
    public function show()
    {
        return view('Eventos.show');
    }

    // edit(string $id)
    public function edit()
    {
        return view('Eventos.edit');
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
