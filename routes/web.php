<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ImplanteController;
use App\Http\Controllers\MarcaController;
use App\Http\Controllers\ModeloController;
use App\Http\Controllers\TalleController;


/*Route::get('/', function () {
    return view('welcome');
});*/

//Route::get('/', [ImplanteController::class, 'index'])->name('index');
//Route::delete('/', [ImplanteController::class, 'destroy'])->name('implantes.destroy');
Route::resource('/', ImplanteController::class);
Route::resource('/Marcas', MarcaController::class);
Route::resource('/Modelos', ModeloController::class);
Route::resource('/Talles', TalleController::class);

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
