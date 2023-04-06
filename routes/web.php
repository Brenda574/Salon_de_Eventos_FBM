<?php

use App\Http\Controllers\EventoController;
use App\Http\Controllers\PaqueteController;
use App\Http\Controllers\ServicioController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SistemaController;
use App\Http\Controllers\UsuarioController;
use Illuminate\Routing\Route as RoutingRoute;
use Monolog\Handler\RotatingFileHandler;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [SistemaController::class, 'principal'])->name('principal');
Route::get('/Login', [SistemaController::class, 'login'])->name('login');
Route::get('/Logout', [SistemaController::class, 'logout'])->name('logout');
Route::post('/Acceder', [SistemaController::class, 'facceder'])->name('acceder');
Route::get('/Registrar', [SistemaController::class, 'registro'])->name('registro');

Route::get('/Empleado', [SistemaController::class, 'empleado'])->name('sistema.empleado');
Route::get('/Gerente', [SistemaController::class, 'gerente'])->name('sistema.gerente');
Route::get('/Cliente', [SistemaController::class, 'cliente'])->name('sistema.cliente');

Route::get('/Evento/Detalles', [EventoController::class, 'show'])->name('evento.show');
Route::get('/Evento/Editar', [EventoController::class, 'edit'])->name('evento.edit');
Route::get('/Evento/Crear', [EventoController::class, 'create'])->name('evento.create');

Route::get('/Paquete/Crear', [PaqueteController::class, 'create'])->name('paquete.create');
Route::get('/Paquete/Detalles', [PaqueteController::class, 'show'])->name('paquete.show');
Route::get('/Paquete/Editar', [PaqueteController::class, 'edit'])->name('paquete.edit');

Route::get('/Servicio/Crear', [ServicioController::class, 'create'])->name('servicio.create');
Route::get('/Servicio/Detalles', [ServicioController::class, 'show'])->name('servicio.show');
Route::get('/Servicio/Editar', [ServicioController::class, 'edit'])->name('servicio.edit');

Route::get('/Usuario/Crear', [UsuarioController::class, 'create'])->name('usuario.create');
Route::get('/Usuario/Detalles', [UsuarioController::class, 'show'])->name('usuario.show');
Route::get('/Usuario/Editar', [UsuarioController::class, 'edit'])->name('usuario.edit');
