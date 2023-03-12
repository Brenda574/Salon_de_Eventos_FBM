<?php

use App\Http\Controllers\EmpleadoController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\PaqueteController;
use App\Http\Controllers\ServicioController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SistemaController;
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
Route::post('/Acceder', [SistemaController::class, 'facceder'])->name('acceder');

Route::get('/Empleado', [EmpleadoController::class, 'inicio'])->name('iniEmpleado');
Route::get('/Empleado/Detalles', [EmpleadoController::class, 'detalles'])->name('detEmpleado');

Route::get('/Cliente', [ClienteController::class, 'inicioCliente'])->name('iniCliente');

Route::get('/Gerente', [SistemaController::class, 'gerente'])->name('sistema.gerente');

Route::get('/Paquete/Crear', [PaqueteController::class, 'create'])->name('paquete.create');
Route::get('/Paquete/Detalles', [PaqueteController::class, 'show'])->name('paquete.show');
Route::get('/Paquete/Editar', [PaqueteController::class, 'edit'])->name('paquete.edit');

Route::get('/registrar', [SistemaController::class, 'registro'])->name('registro');

Route::get('/Servicio/Crear', [ServicioController::class, 'create'])->name('servicio.create');
Route::get('/Servicio/Detalles', [ServicioController::class, 'show'])->name('servicio.show');
Route::get('/Servicio/Editar', [ServicioController::class, 'edit'])->name('servicio.edit');
