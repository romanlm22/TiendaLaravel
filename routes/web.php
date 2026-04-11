<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuarioController;

// mostrar login
Route::get('/login', function () {
    return view('login');
});

// procesar login
Route::post('/login', [UsuarioController::class, 'login']);

Route::post('/registro', [UsuarioController::class, 'store']);

Route::get('/logout', function () {

    session()->forget('logueado');
    session()->forget('usuario');

    return redirect('/')->with('success', 'Sesión cerrada');
});

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

    if(!session('logueado')){
        return redirect('/login');
    }

    return view('carrito');
});