<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\RegistroUsuario;

class UsuarioController extends Controller
{
    public function store(Request $request)
    {
        $nombre = $request->nombre;
        $email = $request->email;

        // 👉 ACÁ se envía el mail
        Mail::to($email)->send(new RegistroUsuario($nombre));

        return back()->with('success', 'Registro exitoso');
    }
}
