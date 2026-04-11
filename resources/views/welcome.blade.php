<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Mi Tienda</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="d-flex flex-column min-vh-100 bg-light">

<!-- NAVBAR -->
<nav class="navbar navbar-dark bg-dark">
    <div class="container d-flex justify-content-between">

        <a class="navbar-brand" href="/">Mi Sitio</a>

        <!-- BUSCADOR -->
        <input type="text" id="buscador" class="form-control w-25" placeholder="Buscar...">

        <div>
            @if(session('logueado'))
                    <a href="/logout" class="btn btn-danger">Cerrar sesión</a>
                @else
                    <a href="/contacto" class="btn btn-outline-light">Contacto</a>
            @endif

            <a href="/equipo" class="btn btn-outline-light me-2">Equipo</a>

            <a href="/carrito" class="btn btn-warning">
                🛒 <span id="contadorCarrito">0</span>
            </a>
        </div>

    </div>
</nav>

@if(session('success'))
    <div class="alert alert-success m-3">
        {{ session('success') }}
    </div>
@endif

<!-- CARRUSEL -->
<div class="container mt-4">
    <div id="carrusel" class="carousel slide" data-bs-ride="carousel">

        <div class="carousel-indicators">
            <button data-bs-target="#carrusel" data-bs-slide-to="0" class="active"></button>
            <button data-bs-target="#carrusel" data-bs-slide-to="1"></button>
            <button data-bs-target="#carrusel" data-bs-slide-to="2"></button>
        </div>

        <div class="carousel-inner rounded">
            <div class="carousel-item active">
                <img src="https://picsum.photos/1200/400?1" class="d-block w-100">
            </div>
            <div class="carousel-item">
                <img src="https://picsum.photos/1200/400?2" class="d-block w-100">
            </div>
            <div class="carousel-item">
                <img src="https://picsum.photos/1200/400?3" class="d-block w-100">
            </div>
        </div>

        <button class="carousel-control-prev" data-bs-target="#carrusel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon"></span>
        </button>

        <button class="carousel-control-next" data-bs-target="#carrusel" data-bs-slide="next">
            <span class="carousel-control-next-icon"></span>
        </button>

    </div>
</div>

<!-- PRODUCTOS -->
<div class="container mt-5">
    <h2 class="text-center mb-4">Productos Destacados</h2>
    <div class="row" id="listaProductos"></div>
</div>

<!-- FOOTER -->
<footer class="bg-dark text-white text-center mt-auto p-4">
    Footer
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<script>

// PRODUCTOS
let productos = [
    {id:1,nombre:"Producto 1",precio:100},
    {id:2,nombre:"Producto 2",precio:150},
    {id:3,nombre:"Producto 3",precio:200},
    {id:4,nombre:"Producto 4",precio:250},
    {id:5,nombre:"Producto 5",precio:300},
    {id:6,nombre:"Producto 6",precio:350}
];

let contenedor = document.getElementById("listaProductos");

// MOSTRAR PRODUCTOS
function mostrarProductos(lista){
    contenedor.innerHTML = "";

    lista.forEach(p => {

        contenedor.innerHTML += `
        <div class="col-md-4 mb-4">
            <div class="card h-100 text-center shadow">

                <img src="https://via.placeholder.com/300" class="card-img-top">

                <div class="card-body">
                    <h5>${p.nombre}</h5>

                    <h4 class="text-success fw-bold">$${p.precio}</h4>

                    <button id="btn-${p.id}" 
                        class="btn btn-success mt-2"
                        onclick="agregar(${p.id})">
                        Agregar al carrito
                    </button>
                </div>

            </div>
        </div>
        `;
    });

    //actualizarBotones();
}

mostrarProductos(productos);

// AGREGAR AL CARRITO
function agregar(id){

    let carrito = JSON.parse(localStorage.getItem("carrito")) || [];
    carrito.push(id);
    localStorage.setItem("carrito", JSON.stringify(carrito));

    actualizarContador();

    // 🔥 efecto visual
    let btn = document.getElementById("btn-" + id);

    if(btn){
        btn.classList.remove("btn-success");
        btn.classList.add("btn-secondary");
        btn.innerText = "Agregado";

        setTimeout(() => {
            btn.classList.remove("btn-secondary");
            btn.classList.add("btn-success");
            btn.innerText = "Agregar al carrito";
        }, 500); // medio segundo
    }
}

// CONTADOR NAVBAR
function actualizarContador(){
    let carrito = JSON.parse(localStorage.getItem("carrito")) || [];
    document.getElementById("contadorCarrito").innerText = carrito.length;
}

// 🔥 CAMBIAR COLOR DEL BOTÓN SI YA ESTÁ EN CARRITO
function actualizarBotones(){
    let carrito = JSON.parse(localStorage.getItem("carrito")) || [];

    carrito.forEach(id => {
        let btn = document.getElementById("btn-" + id);

        if(btn){
            btn.classList.remove("btn-success");
            btn.classList.add("btn-secondary");
            btn.innerText = "Agregado";
            btn.disabled = true;
        }
    });
}

// BUSCADOR
document.getElementById("buscador").addEventListener("keyup", function(){

    let texto = this.value.toLowerCase();

    let filtrados = productos.filter(p =>
        p.nombre.toLowerCase().includes(texto)
    );

    mostrarProductos(filtrados);
});

// INICIAL
actualizarContador();

</script>

</body>
</html>