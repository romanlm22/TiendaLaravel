<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\RegistroUsuario;

class UsuarioController extends Controller
{
    
        public function store(Request $request)
    {
    
        $usuario = [
        'email'    => $request->email,
        'password' => $request->password,
        ];

    
        session(['usuario' => $usuario]);


        Mail::to($usuario['email'])->send(new RegistroUsuario());

    return back()->with('success', 'Usuario registrado correctamente');
    }


    public function login(Request $request)
    {
    $usuario = session('usuario');
   
    if(!$usuario){
        return back()->with('error', 'Primero debes registrarte');
    }
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