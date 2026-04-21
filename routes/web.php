<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuarioController;

Route::get('/', function () {
    return view('main');
});

Route::get('/login', function () {
    return view('login');
});

Route::post('/login', [UsuarioController::class, 'login']);

Route::get('/registros', function () {
    return view('registros');
});

Route::post('/registro', [UsuarioController::class, 'store']);

Route::get('/logout', function () {
    session()->forget('logueado');
    session()->forget('usuario');

    return redirect('/')->with('success', 'Sesión cerrada');
});

Route::get('/carrito', function () {
    if(!session('logueado')){
        return redirect('/login');
    }

    return view('carrito');
});

Route::get('/acercaNosotros', function () {
    return view('acercaNosotros');
});

Route::get('/categoria/{id}', function($id){
    return view('categoria', compact('id'));
});

Route::get('/producto/{id}', function($id){
    return view('producto', compact('id'));
});
