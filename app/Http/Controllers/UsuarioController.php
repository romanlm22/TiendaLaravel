<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\RegistroUsuario;

class UsuarioController extends Controller
{
    public function store(Request $request)
    {
    // guardar usuario en sesión
    session([
        'usuario' => [
            'email' => $request->email,
            'password' => $request->password
        ]
    ]);
    return back()->with('success', 'Usuario registrado correctamente');
    }

    public function login(Request $request)
    {
    $usuario = session('usuario');
    // si no hay usuario registrado
    if(!$usuario){
        return back()->with('error', 'Primero debes registrarte');
    }
    // validar datos
    if(
        $request->email == $usuario['email'] &&
        $request->password == $usuario['password']
    ){
        session(['logueado' => true]);

        return redirect('/')->with('success', 'Login exitoso');
    }
    return back()->with('error', 'Email o contraseña incorrectos');
    }


}
