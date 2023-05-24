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

Route::get('/', [PaqueteController::class, 'index'])->name('principal');
Route::get('/Login', [SistemaController::class, 'login'])->name('login');
Route::get('/Logout', [SistemaController::class, 'logout'])->name('logout');
Route::post('/Acceder', [SistemaController::class, 'facceder'])->name('acceder');
Route::get('/Registrar', [SistemaController::class, 'registro'])->name('registro');

Route::get('/Empleado', [SistemaController::class, 'empleado'])->name('sistema.empleado')->middleware('auth');
Route::get('/Gerente', [SistemaController::class, 'gerente'])->name('sistema.gerente')->middleware('auth');
Route::get('/Cliente', [SistemaController::class, 'cliente'])->name('sistema.cliente')->middleware('auth');

Route::get('Empleado/Evento/Detalles/{cual?}', [EventoController::class, 'show'])->name('evento.show')->middleware('auth');
Route::get('/Evento/Detalles/{cual?}', [EventoController::class, 'showCliente'])->name('evento.showCliente')->middleware('auth');
Route::get('Gerente/Evento/Detalles/{cual?}', [EventoController::class, 'showGerente'])->name('evento.showGerente')->middleware('auth');
Route::get('/Evento/Editar/{cual?}', [EventoController::class, 'edit'])->name('evento.edit')->middleware('auth');
Route::put('/Evento/Editar/{cual?}', [EventoController::class, 'update'])->name('evento.update');
Route::get('/Evento/Crear', [EventoController::class, 'create'])->name('evento.create')->middleware('auth');
Route::post('Evento/Guardar', [EventoController::class, 'store'])->name('evento.store');
Route::delete('Evento/Borrar/{cual?}', [EventoController::class, 'destroy'])->name('evento.destroy');
Route::post('Empleado/evento/{idEvento}/subir-imagen', [EventoController::class, 'subirImagenEmpleado'])->name('subir_imagen_empleado');
Route::post('evento/{idEvento}/subir-imagen', [EventoController::class, 'subirImagen'])->name('subir_imagen');
Route::post('evento/{idEvento}/subir-abono', [EventoController::class, 'subirAbono'])->name('subir_abono');

Route::put('/Evento/autorizar/{cual?}', [EventoController::class, 'update_autorizar'])->name('evento.update.autorizar');
Route::put('/Evento/rechazar/{cual?}', [EventoController::class, 'update_rechazar'])->name('evento.update.rechazar');

Route::post('/eliminar-imagen/{id}', [EventoController::class, 'eliminar'])->name('eliminar_imagen');
Route::post('Eventos/eliminar-imagen/{id}', [EventoController::class, 'eliminarEmpleado'])->name('eliminar_imagen_empleado');

Route::get('/Paquete/Crear', [PaqueteController::class, 'create'])->name('paquete.create')->middleware('auth');
Route::get('/Paquete/Detalles/{cual?}', [PaqueteController::class, 'show'])->name('paquete.show')->middleware('auth');
Route::get('/Paquete/Editar/{cual?}', [PaqueteController::class, 'edit'])->name('paquete.edit')->middleware('auth');
Route::put('/Paquete/Editar/{cual?}', [PaqueteController::class, 'update'])->name('paquete.update');
Route::post('Paquete/Guardar', [PaqueteController::class, 'store'])->name('paquete.store');
Route::delete('Paquete/Borrar/{cual?}', [PaqueteController::class, 'destroy'])->name('paquete.destroy');

Route::post('Paquete/{idPaquete}/imagen', [PaqueteController::class, 'subirImagen'])->name('paquete.subirImg');
Route::post('/eliminar-img/{id}', [PaqueteController::class, 'eliminarImagen'])->name('paquete.eliminarImg');

Route::get('/Servicio/Crear', [ServicioController::class, 'create'])->name('servicio.create')->middleware('auth');
Route::get('/Servicio/Detalles/{cual?}', [ServicioController::class, 'show'])->name('servicio.show')->middleware('auth');
Route::get('/Servicio/Editar/{cual?}', [ServicioController::class, 'edit'])->name('servicio.edit')->middleware('auth');
Route::put('/Servicio/Editar/{cual?}', [ServicioController::class, 'update'])->name('servicio.update');
Route::post('Servicio/Guardar', [ServicioController::class, 'store'])->name('servicio.store');
Route::delete('Servicio/Borrar/{cual?}', [ServicioController::class, 'destroy'])->name('servicio.destroy');

Route::get('/Usuario/Crear', [UsuarioController::class, 'create'])->name('usuario.create')->middleware('auth');
Route::get('/Usuario/Detalles/{cual?}', [UsuarioController::class, 'show'])->name('usuario.show')->middleware('auth');
Route::get('/Usuario/Editar/{cual?}', [UsuarioController::class, 'edit'])->name('usuario.edit')->middleware('auth');
Route::put('/Usuario/Editar/{cual?}', [UsuarioController::class, 'update'])->name('usuario.update');
Route::post('Usuario/Guardar', [UsuarioController::class, 'store'])->name('usuario.store');
Route::post('Registrar/Guardar', [UsuarioController::class, 'registrar'])->name('usuario.registrar');
Route::delete('Usuario/Borrar/{cual?}', [UsuarioController::class, 'destroy'])->name('usuario.destroy');
