<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuarioController;

Route::post('/registro', [UsuarioController::class, 'store']);

Route::get('/', function () {
    return view('welcome');
});

Route::get('/contacto', function () {
    return view('contacto');
});

Route::get('/equipo', function () {
    return view('equipo');
});

Route::get('/carrito', function () {
    return view('carrito');
});