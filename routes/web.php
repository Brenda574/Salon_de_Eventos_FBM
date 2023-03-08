<?php

use App\Http\Controllers\EmpleadoController;
use App\Http\Controllers\ClienteController;
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


















