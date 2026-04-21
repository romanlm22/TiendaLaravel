<?php

namespace App\Mail;

use Illuminate\Mail\Mailable;

class RegistroUsuario extends Mailable
{
    public $nombre;

    public function __construct($nombre = 'Usuario') 
    {
        $this->nombre = $nombre;
    }      

    public function build()
    {
        return $this->subject('Registro exitoso')
                    ->view('emails.registro');
    }
}