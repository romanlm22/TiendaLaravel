<nav class="navbar navbar-expand-lg navbar-dark navbar-custom px-4">
    
    <a class="navbar-brand" href="/">MiTienda</a>

    <!-- BOTÓN TOGGLE MOBILE -->
    <button class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#menu">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="menu">

        <!-- 🔽 CATEGORÍAS -->
        <ul class="navbar-nav me-3">

            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle text-white" href="#" data-bs-toggle="dropdown">
                    Categorías
                </a>

                <ul class="dropdown-menu">

                    <li><a class="dropdown-item" href="/categoria/1">Alergias</a></li>
                    <li><a class="dropdown-item" href="/categoria/2">Dolor</a></li>
                    <li><a class="dropdown-item" href="/categoria/3">Vitaminas</a></li>
                    <li><a class="dropdown-item" href="/categoria/4">Piel</a></li>
                    <li><a class="dropdown-item" href="/categoria/5">Higiene</a></li>

                </ul>
            </li>

        </ul>

        <!-- BUSCADOR -->
        <form class="d-flex mx-auto w-50">
            <input id="buscador" class="form-control" type="search" placeholder="Buscar productos...">
        </form>

        <!-- DERECHA -->
        <div class="d-flex gap-3 align-items-center">

            @if(!session('logueado'))

                <a href="/registros" class="btn btn-light">
                    <i class="bi bi-person"></i> Ingresar
                </a>

            @else

                <span class="text-white">
                    Hola, {{ session('usuario')['nombre'] ?? 'Usuario' }}
                </span>

                <a href="/logout" class="btn btn-danger">
                    Cerrar sesión
                </a>

            @endif

            <a href="/acercaNosotros" class="btn btn-light">Sobre Nosotros</a>

            <a href="/carrito" class="btn btn-light position-relative">
                <i class="bi bi-cart"></i>

                <span id="contadorCarrito"
                    class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                    0
                </span>
            </a>

        </div>

    </div>
</nav>