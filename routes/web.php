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
use App\Http\Controllers\ReportesController;
use App\Http\Controllers\ReportesTemporalesController;
use App\Http\Controllers\Remito;


/*Route::get('/', function () {
    return view('welcome');
});*/

//Route::get('/', [ImplanteController::class, 'index'])->name('index');
//Route::delete('/', [ImplanteController::class, 'destroy'])->name('implantes.destroy');
Route::resource('/', ImplanteController::class);
Route::resource('/Implantes', ImplanteController::class);
Route::resource('/Marcas', MarcaController::class);
Route::resource('/Modelos', ModeloController::class);
Route::resource('/Talles', TalleController::class);
Route::resource('/Clientes', ClienteController::class);
Route::resource('/Direcciones', DireccionClienteController::class);
Route::resource('/Egresos', EgresoStockController::class);
Route::resource('/Ingresos', IngresoStockController::class);
Route::resource('/EstadosEgreso', EstadoEgresoController::class);
Route::get('/Reportes', [ReportesController::class, 'cantModelos']);
Route::get('/ReportesMensuales', [ReportesController::class, 'ventasModelos']);

Route::get('/Remito/{egreso_id}', [Remito::class, 'index'])->name('Remito');

Route::get('/Remito/pdf/{egreso_id}', [Remito::class, 'pdf'])->name('Remito/pdf');

Route::get('/Terminos', function () {
    return view('terminos');
});
Route::get('/Preguntas', function () {
    return view('preguntas');
});
Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
