@extends('layouts.app')

@section('title', 'Registro')

@section('content')

<div class="container d-flex justify-content-center align-items-center flex-grow-1">

    <div class="col-md-6 col-lg-5">

        <div class="card shadow">

            <div class="card-header bg-primary text-white text-center">
                <h4>Crear cuenta</h4>
            </div>

            <div class="card-body">

                @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                <form method="POST" action="/registro">
                    @csrf

                    <input type="text" name="nombre" class="form-control mb-3" placeholder="Nombre" required>
                    <input type="email" name="email" class="form-control mb-3" placeholder="Email" required>
                    <input type="password" name="password" class="form-control mb-3" placeholder="Contraseña" required>
                    <input type="password" name="password_confirmation" class="form-control mb-3" placeholder="Confirmar" required>

                        <div class="mb-3 form-check">
                        <input type="checkbox" class="form-check-input" required>
                        <label class="form-check-label">Acepto los términos</label>
                        </div>
                        <div class="mb-3 form-check">
                        <input type="checkbox" class="form-check-input" required>
                        <label class="form-check-label">Recibir Promociones</label>
                        </div>

                    <button class="btn btn-success w-100">Registrarse</button>
                </form>

            </div>

            <div class="card-footer text-center">
                <small>¿Ya tenés cuenta? <a href="/login">Iniciar sesión</a></small>
            </div>

        </div>

    </div>

</div>

@endsection