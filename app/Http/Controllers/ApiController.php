<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Paquete;
use App\Models\Evento;
use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Sanctum\PersonalAccessToken;

class ApiController extends Controller
{
    public function paquetes()
    {
        $paquetes = Paquete::all();

        return response()->json([
            'paquetes' => $paquetes
        ]);
    }

    public function login(Request $request)
    {
        $usuario1 = $request->usuario;
        $usuario = Usuario::where('usuario', $usuario1)->first();

        if (is_null($usuario)) {
            return response()->json([
                'res' => false,
                'message' => 'No se va',

            ], 400);
        } else {
            $password_bd = $usuario->clave;
            $encontrado = Hash::check($request->clave, $password_bd);

            if ($encontrado) {
                Auth::login($usuario);
                $token = $usuario->createToken('token', ['create']);
                $accessToken = $token->plainTextToken;
                $expiresAt = now()->addMinutes(20);
                $personalAccessToken = PersonalAccessToken::findToken($accessToken);
                $personalAccessToken->forceFill([
                    'expires_at' => $expiresAt,
                    'abilities' => ['create']
                ])->save();

                $rol_bd = $usuario->rol;
                switch ($rol_bd) {
                    case 'Cliente':
                        $eventos = Evento::where('usuario_id', $usuario->id)->get();
                        break;
                    case 'Gerente':
                        $eventos = Evento::all();
                        break;
                    case 'Empleado':
                        $eventos = Evento::where('Confirmado', true)->get();
                        break;
                }

                return response()->json([
                    'res' => true,
                    'token' =>  $accessToken,
                    'expira' => $expiresAt,
                    'eventos' => $eventos,
                    'message' => 'Hola'
                ], 200);
            } else {
                var_dump($usuario);
                var_dump($request->clave); // Imprime el valor de $request->clave
                var_dump($usuario->clave);
                return response()->json([
                    'res' => false,
                    'message' => 'Usuario o contraseña incorrectos',

                ], 400);
            }
        }
    }
}
