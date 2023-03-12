<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ServicioController extends Controller
{
    public function index()
    {
        //
    }

    public function create()
    {
        return view('Servicios.create');
    }

    public function store(Request $request)
    {
        //
    }

    // show(string $id)
    public function show()
    {
        return view('Servicios.show');
    }

    // edit(string $id)
    public function edit()
    {
        return view('Servicios.edit');
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
