<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ImplanteController;


/*Route::get('/', function () {
    return view('welcome');
});*/

//Route::get('/', [ImplanteController::class, 'index'])->name('index');
//Route::delete('/', [ImplanteController::class, 'destroy'])->name('implantes.destroy');
Route::resource('/', ImplanteController::class);

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
