<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registro</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light" class="d-flex flex-column min-vh-100">

<!-- NAVBAR -->
<nav class="navbar navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="/">Mi Sitio</a>
        <div>
            <a href="/contacto" class="btn btn-outline-light">contacto</a>
            <a href="/equipo" class="btn btn-outline-light">Equipo</a>
        </div>
    </div>
</nav>

<!-- FORMULARIO -->
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">

            <div class="card shadow">
                <div class="card-header text-center bg-primary text-white">
                    <h4>Crear cuenta</h4>
                </div>

                <div class="card-body">

                    <form>

                        <!-- Nombre -->
                        <div class="mb-3">
                            <label class="form-label">Nombre completo</label>
                            <input type="text" class="form-control" placeholder="Tu nombre">
                        </div>

                        <!-- Email -->
                        <div class="mb-3">
                            <label class="form-label">Correo electrónico</label>
                            <input type="email" class="form-control" placeholder="ejemplo@email.com">
                        </div>

                        <!-- Password -->
                        <div class="mb-3">
                            <label class="form-label">Contraseña</label>
                            <input type="password" class="form-control" placeholder="********">
                        </div>

                        <!-- Confirmar -->
                        <div class="mb-3">
                            <label class="form-label">Confirmar contraseña</label>
                            <input type="password" class="form-control" placeholder="********">
                        </div>

                        <!-- Checkbox -->
                        <div class="mb-3 form-check">
                            <input type="checkbox" class="form-check-input">
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
                    <small>¿Ya tienes cuenta? <a href="#">Iniciar sesión</a></small>
                </div>

            </div>

        </div>
    </div>
</div>

<footer class="bg-dark text-white text-center mt auto p-4">
    <p>Síguenos en redes</p>
</footer>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>