<?php

use Illuminate\Support\Facades\Route;

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