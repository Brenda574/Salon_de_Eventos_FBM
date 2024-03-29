<?php

use App\Http\Controllers\EventoController;
use App\Http\Controllers\PaqueteController;
use App\Http\Controllers\ServicioController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SistemaController;
use App\Http\Controllers\UsuarioController;
use Illuminate\Routing\Route as RoutingRoute;
use Monolog\Handler\RotatingFileHandler;
use App\Jobs\RechazoEvento;
use App\Jobs\AutorizarEvento;
use App\Models\Evento;
use App\Models\Usuario;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

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

Route::get('/', [PaqueteController::class, 'index'])->name('principal');

// GENERALES

Route::get('/Login', [SistemaController::class, 'login'])->name('login');
Route::get('/Logout', [SistemaController::class, 'logout'])->name('logout');
Route::post('/Acceder', [SistemaController::class, 'facceder'])->name('acceder');
Route::get('/Registrar', [SistemaController::class, 'registro'])->name('registro');

Route::get('/Empleado', [SistemaController::class, 'empleado'])->name('sistema.empleado')->middleware('auth');
Route::get('/Gerente', [SistemaController::class, 'gerente'])->name('sistema.gerente')->middleware('auth');
Route::get('/Cliente', [SistemaController::class, 'cliente'])->name('sistema.cliente')->middleware('auth');
Route::get('/Bitacora', [SistemaController::class, 'bitacora'])->name('sistema.bitacora')->middleware('auth');

// EVENTOS

Route::get('Empleado/Evento/Detalles/{cual?}', [EventoController::class, 'show'])->name('evento.show')->middleware('auth');
Route::get('Cliente/Evento/Detalles/{cual?}', [EventoController::class, 'showCliente'])->name('evento.showCliente')->middleware('auth');
Route::get('Gerente/Evento/Detalles/{cual?}', [EventoController::class, 'showGerente'])->name('evento.showGerente')->middleware('auth');

Route::get('/Evento/Crear', [EventoController::class, 'create'])->name('evento.create')->middleware('auth');
Route::post('Evento/Guardar', [EventoController::class, 'store'])->name('evento.store');
Route::get('/Evento/Editar/{cual?}', [EventoController::class, 'edit'])->name('evento.edit')->middleware('auth');
Route::put('/Evento/Editar/{cual?}', [EventoController::class, 'update'])->name('evento.update');
Route::delete('Evento/Borrar/{cual?}', [EventoController::class, 'destroy'])->name('evento.destroy');

Route::post('evento/{idEvento}/subir-gasto', [EventoController::class, 'subirGasto'])->name('subir_gasto');
Route::post('Eventos/eliminar-gasto/{id}', [EventoController::class, 'eliminarGasto'])->name('eliminar_gasto');
Route::put('Eventos/editar-gasto/{id}', [EventoController::class, 'editarGasto'])->name('editar_gasto');

Route::post('evento/{idEvento}/subir-imagen', [EventoController::class, 'subirImagen'])->name('subir_imagen');
Route::put('evento/{idEvento}/update-imagen', [EventoController::class, 'updateImagen'])->name('update_imagen');
Route::post('evento/{idEvento}/eliminar-imagen', [EventoController::class, 'eliminarImagen'])->name('eliminar_imagen');

Route::post('evento/{idEvento}/subir-abono', [EventoController::class, 'subirAbono'])->name('subir_abono');
Route::post('Eventos/eliminar-abono/{id}', [EventoController::class, 'eliminarAbono'])->name('eliminar_abono');

Route::put('Evento/autorizar/{cual?}', [EventoController::class, 'update_autorizar'])->name('evento.update.autorizar');

// PAQUETES

Route::get('/Paquete/Crear', [PaqueteController::class, 'create'])->name('paquete.create')->middleware('auth');
Route::get('/Paquete/Detalles/{cual?}', [PaqueteController::class, 'show'])->name('paquete.show')->middleware('auth');
Route::get('/Paquete/Editar/{cual?}', [PaqueteController::class, 'edit'])->name('paquete.edit')->middleware('auth');
Route::put('/Paquete/Editar/{cual?}', [PaqueteController::class, 'update'])->name('paquete.update');
Route::post('Paquete/Guardar', [PaqueteController::class, 'store'])->name('paquete.store');
Route::delete('Paquete/Borrar/{cual?}', [PaqueteController::class, 'destroy'])->name('paquete.destroy');

Route::post('Paquete/{idPaquete}/imagen', [PaqueteController::class, 'subirImagen'])->name('paquete.subirImg');
Route::delete('Paquete/eliminar-img/{id}', [PaqueteController::class, 'eliminarImagen'])->name('paquete.eliminarImg');

// SERVICIOS

Route::get('/Servicio/Crear', [ServicioController::class, 'create'])->name('servicio.create')->middleware('auth');
Route::get('/Servicio/Detalles/{cual?}', [ServicioController::class, 'show'])->name('servicio.show')->middleware('auth');
Route::get('/Servicio/Editar/{cual?}', [ServicioController::class, 'edit'])->name('servicio.edit')->middleware('auth');
Route::put('/Servicio/Editar/{cual?}', [ServicioController::class, 'update'])->name('servicio.update');
Route::post('Servicio/Guardar', [ServicioController::class, 'store'])->name('servicio.store');
Route::delete('Servicio/Borrar/{cual?}', [ServicioController::class, 'destroy'])->name('servicio.destroy');

Route::post('Servicio/{idServicio}/imagen', [ServicioController::class, 'editImagen'])->name('servicio.editImg');
Route::delete('Servicio/eliminar-img/{id}', [ServicioController::class, 'eliminarImg'])->name('servicio.eliminarImg');

// USUARIOS

Route::get('/Usuario/Crear', [UsuarioController::class, 'create'])->name('usuario.create')->middleware('auth');
Route::get('/Usuario/Detalles/{cual?}', [UsuarioController::class, 'show'])->name('usuario.show')->middleware('auth');
Route::get('/Usuario/Editar/{cual?}', [UsuarioController::class, 'edit'])->name('usuario.edit')->middleware('auth');
Route::put('/Usuario/Editar/{cual?}', [UsuarioController::class, 'update'])->name('usuario.update');
Route::post('Usuario/Guardar', [UsuarioController::class, 'store'])->name('usuario.store');
Route::post('Registrar/Guardar', [UsuarioController::class, 'registrar'])->name('usuario.registrar');
Route::delete('Usuario/Borrar/{cual?}', [UsuarioController::class, 'destroy'])->name('usuario.destroy');
