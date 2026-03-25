<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BancaController;
use App\Http\Controllers\TccController;

Route::get('/', function () {
    return view('welcome');
});
Route::resource('banca', BancaController::class);
Route::resource('tcc', TccController::class);

