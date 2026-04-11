
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Carrito</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="d-flex flex-column min-vh-100">

<nav class="navbar navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="/">Mi Sitio</a>
                <input type="text" id="buscador" class="form-control w-25" placeholder="Buscar...">
        <div>
            <a href="/contacto" class="btn btn-outline-light me-2">Contacto</a>
            <a href="/equipo" class="btn btn-outline-light me-2">Equipo</a>

            <!-- 🛒 carrito con contador -->
            <a href="/carrito" class="btn btn-warning">
                🛒 <span id="contadorCarrito">0</span>
            </a>
        </div>
    </div>
    
</nav>

<div class="container mt-5">

    <h1 class="text-center mb-5">Nuestro Equipo</h1>

    <div class="row">

        <!-- PERSONA 1 -->
        <div class="col-md-6 text-center">
            <div class="card shadow p-4">

                <img src="https://via.placeholder.com/200"
                     class="rounded-circle mx-auto mb-3"
                     alt="Foto perfil">

                <h4>Nombre Persona 1</h4>
                <p class="text-muted">Desarrollador Web</p>

                <p>
                    Breve descripción de la persona. Podés contar qué hace,
                    experiencia o habilidades.
                </p>

                <a href="#" class="btn btn-primary">Contacto</a>

            </div>
        </div>

        <!-- PERSONA 2 -->
        <div class="col-md-6 text-center">
            <div class="card shadow p-4">

                <img src="https://via.placeholder.com/200"
                     class="rounded-circle mx-auto mb-3"
                     alt="Foto perfil">

                <h4>Nombre Persona 2</h4>
                <p class="text-muted">Diseñador UI/UX</p>

                <p>
                    Otra descripción breve. Podés explicar su rol dentro del equipo
                    o lo que aporta al proyecto.
                </p>

                <a href="#" class="btn btn-success">Contacto</a>

            </div>
        </div>

    </div>

</div>

<!-- FOOTER -->
<footer class="bg-dark text-white text-center mt-auto p-4">
    Footer
</footer>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>


<!-- Bootstrap JS (IMPORTANTE para modal) -->



</body>
</html>