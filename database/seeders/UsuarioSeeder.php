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
        $usuario->correo = "hugo@gmail.com";
        $usuario->clave = '$2y$10$fliUbhg40qWdwZRQpRRKFeW9/wR0q3sHItfzdkBz24Ry6ZRowySHO'; // cliente
        $usuario->rol = "Cliente";
        $usuario->save();

        $usuario = new Usuario();
        $usuario->nombre = "Paco";
        $usuario->usuario = "paco";
        $usuario->correo = "paco@gmail.com";
        $usuario->clave = '$2y$10$fliUbhg40qWdwZRQpRRKFeW9/wR0q3sHItfzdkBz24Ry6ZRowySHO'; // cliente
        $usuario->rol = "Cliente";
        $usuario->save();

        $usuario = new Usuario();
        $usuario->nombre = "Luis";
        $usuario->usuario = "luis";
        $usuario->correo = "luis@gmail.com";
        $usuario->clave = '$2y$10$fliUbhg40qWdwZRQpRRKFeW9/wR0q3sHItfzdkBz24Ry6ZRowySHO'; // cliente
        $usuario->rol = "Cliente";
        $usuario->save();

        $usuario = new Usuario();
        $usuario->nombre = "Carlos";
        $usuario->usuario = "carlos";
        $usuario->correo = "hugo@garden.gate.com";
        $usuario->clave = '$2y$10$gpbilt5gY9BZceFFjPpK8uqJ2aN0CeubIjB85bFcqPXMXtxlkdYPa'; // gerente
        $usuario->rol = "Gerente";
        $usuario->save();
    }
}
