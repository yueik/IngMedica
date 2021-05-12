<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ImplanteController;
use App\Http\Controllers\MarcaController;
use App\Http\Controllers\ModeloController;
use App\Http\Controllers\TalleController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\DireccionClienteController;
use App\Http\Controllers\EgresoStockController;
use App\Http\Controllers\IngresoStockController;
use App\Http\Controllers\EstadoEgresoController;
use App\Http\Controllers\EstadoInsumoController;


/*Route::get('/', function () {
    return view('welcome');
});*/

//Route::get('/', [ImplanteController::class, 'index'])->name('index');
//Route::delete('/', [ImplanteController::class, 'destroy'])->name('implantes.destroy');
Route::resource('/Implantes', ImplanteController::class);
Route::resource('/Marcas', MarcaController::class);
Route::resource('/Modelos', ModeloController::class);
Route::resource('/Talles', TalleController::class);
Route::resource('/Clientes', ClienteController::class);
Route::resource('/Direcciones', DireccionClienteController::class);
Route::resource('/Egresos', EgresoStockController::class);
Route::resource('/Ingresos', IngresoStockController::class);
Route::resource('/EstadosEgreso', EstadoEgresoController::class);
Route::resource('/EstadosInsumo', EstadoInsumoController::class);

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
