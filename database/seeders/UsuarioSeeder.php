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
        $usuario->clave = '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi'; // password
        $usuario->rol = "Cliente";
        $usuario->save();

        $usuario = new Usuario();
        $usuario->nombre = "Paco";
        $usuario->usuario = "paco";
        $usuario->clave = '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi'; // password
        $usuario->rol = "Cliente";
        $usuario->save();

        $usuario = new Usuario();
        $usuario->nombre = "Luis";
        $usuario->usuario = "luis";
        $usuario->clave = '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi'; // password
        $usuario->rol = "Docente";
        $usuario->rol = "Cliente";
        $usuario->save();

        $usuario = new Usuario();
        $usuario->nombre = "Carlos";
        $usuario->usuario = "carlos";
        $usuario->clave = '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi'; // password
        $usuario->rol = "Gerente";
        $usuario->save();
    }
}
