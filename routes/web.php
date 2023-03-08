<?php

use App\Http\Controllers\EmpleadoController;
<<<<<<< HEAD
use App\Http\Controllers\ClienteController;
=======
use App\Http\Controllers\GerenteController;
>>>>>>> f5a6b2bfb8f66c90c7c4b2dc13a45ce03adb56ef
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SistemaController;


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
<<<<<<< HEAD


















=======
Route::get('/Detalles', [EmpleadoController::class, 'detalles'])->name('detEmpleado');

Route::get('/Gerente', [GerenteController::class, 'inicio'])->name('iniGerente');
>>>>>>> f5a6b2bfb8f66c90c7c4b2dc13a45ce03adb56ef
