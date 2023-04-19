<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Usuario;

class UsuarioSeeder extends Seeder
{
    public function run()
    {
        $usuario = new Usuario();
        $usuario->nombre = "Hugo";
        $usuario->usuario = "hugo";
        $usuario->clave = '$2y$10$fliUbhg40qWdwZRQpRRKFeW9/wR0q3sHItfzdkBz24Ry6ZRowySHO'; // cliente
        $usuario->rol = "Cliente";
        $usuario->save();

        $usuario = new Usuario();
        $usuario->nombre = "Paco";
        $usuario->usuario = "paco";
        $usuario->clave = '$2y$10$fliUbhg40qWdwZRQpRRKFeW9/wR0q3sHItfzdkBz24Ry6ZRowySHO'; // cliente
        $usuario->rol = "Cliente";
        $usuario->save();

        $usuario = new Usuario();
        $usuario->nombre = "Luis";
        $usuario->usuario = "luis";
        $usuario->clave = '$2y$10$fliUbhg40qWdwZRQpRRKFeW9/wR0q3sHItfzdkBz24Ry6ZRowySHO'; // cliente
        $usuario->rol = "Docente";
        $usuario->rol = "Cliente";
        $usuario->save();

        $usuario = new Usuario();
        $usuario->nombre = "Carlos";
        $usuario->usuario = "carlos";
        $usuario->clave = '$2y$10$gpbilt5gY9BZceFFjPpK8uqJ2aN0CeubIjB85bFcqPXMXtxlkdYPa'; // gerente
        $usuario->rol = "Gerente";
        $usuario->save();
    }
}
