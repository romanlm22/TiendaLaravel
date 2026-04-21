@extends('layouts.app')

@section('title', 'Login')

@section('content')

<div class="container d-flex justify-content-center align-items-center flex-grow-1">

    <div class="col-md-4">
        <div class="card shadow">

            <div class="card-header bg-dark text-white text-center">
                <h4>Iniciar sesión</h4>
            </div>

            <div class="card-body">

                @if(session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif

                <form method="POST" action="/login">
                    @csrf

                    <input type="email" name="email" class="form-control mb-3" placeholder="Email" required>
                    <input type="password" name="password" class="form-control mb-3" placeholder="Contraseña" required>

                    <button class="btn btn-success w-100">Ingresar</button>
                </form>

            </div>

            <div class="card-footer text-center">
                <small>¿No tenés cuenta? <a href="/registros">Registrarme</a></small>
            </div>

        </div>
    </div>

</div>

@endsection