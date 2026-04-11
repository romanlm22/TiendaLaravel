<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registro</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light d-flex flex-column min-vh-100">

<!-- NAVBAR -->
<nav class="navbar navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="/">Mi Sitio</a>
        <div>
            <a href="/contacto" class="btn btn-outline-light me-2">Contacto</a>
            <a href="/equipo" class="btn btn-outline-light">Equipo</a>
        </div>
    </div>
</nav>

<!-- CONTENIDO -->
<div class="container flex-grow-1 d-flex justify-content-center align-items-center">

    <div class="col-md-6 col-lg-5">

        <div class="card shadow">

            <div class="card-header bg-primary text-white text-center">
                <h4>Crear cuenta</h4>
            </div>

            <div class="card-body">

                <!-- MENSAJE -->
                @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                <!-- FORMULARIO -->
                <form method="POST" action="/registro">
                    @csrf

                    <!-- Nombre -->
                    <div class="mb-3">
                        <label class="form-label">Nombre completo</label>
                        <input type="text" name="nombre" class="form-control" placeholder="Tu nombre" required>
                    </div>

                    <!-- Email -->
                    <div class="mb-3">
                        <label class="form-label">Correo electrónico</label>
                        <input type="email" name="email" class="form-control" placeholder="ejemplo@email.com" required>
                    </div>

                    <!-- Password -->
                    <div class="mb-3">
                        <label class="form-label">Contraseña</label>
                        <input type="password" name="password" class="form-control" placeholder="********" required>
                    </div>

                    <!-- Confirmar -->
                    <div class="mb-3">
                        <label class="form-label">Confirmar contraseña</label>
                        <input type="password" name="password_confirmation" class="form-control" placeholder="********" required>
                    </div>

                    <!-- Checkbox -->
                    <div class="mb-3 form-check">
                        <input type="checkbox" class="form-check-input" required>
                        <label class="form-check-label">Acepto los términos</label>
                    </div>

                    <!-- Botón -->
                    <div class="d-grid">
                        <button type="submit" class="btn btn-success">
                            Registrarse
                        </button>
                    </div>

                </form>

            </div>

            <div class="card-footer text-center">
                <small>¿Ya tenés cuenta? <a href="/login">Iniciar sesión</a></small>
            </div>

        </div>

    </div>

</div>

<!-- FOOTER -->
<footer class="bg-dark text-white text-center mt-auto p-4">
    <p>Síguenos en redes</p>
</footer>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>