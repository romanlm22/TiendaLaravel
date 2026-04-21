@extends('layouts.app')

@section('title', 'Tienda')

@section('content')

<div class="container mt-4">

    <div class="row">
        
        <div class="col-md-6">
            <div id="carouselIzq" class="carousel slide" data-bs-ride="carousel" data-bs-interval="3000">

                <div class="carousel-indicators">
                    <button data-bs-target="#carouselIzq" data-bs-slide-to="0" class="active"></button>
                    <button data-bs-target="#carouselIzq" data-bs-slide-to="1"></button>
                    <button data-bs-target="#carouselIzq" data-bs-slide-to="2"></button>
                </div>

                <div class="carousel-inner rounded">
                    <div class="carousel-item active">
                        <img src="https://picsum.photos/600/300?1" class="w-100">
                    </div>
                    <div class="carousel-item">
                        <img src="https://picsum.photos/600/300?2" class="w-100">
                    </div>
                    <div class="carousel-item">
                        <img src="https://picsum.photos/600/300?3" class="w-100">
                    </div>
                </div>

                <button class="carousel-control-prev" data-bs-target="#carouselIzq" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon"></span>
                </button>

                <button class="carousel-control-next" data-bs-target="#carouselIzq" data-bs-slide="next">
                    <span class="carousel-control-next-icon"></span>
                </button>

            </div>
        </div>

        <div class="col-md-6">
            <div id="carouselDer" class="carousel slide" data-bs-ride="carousel" data-bs-interval="3000">

                <div class="carousel-indicators">
                    <button data-bs-target="#carouselDer" data-bs-slide-to="0" class="active"></button>
                    <button data-bs-target="#carouselDer" data-bs-slide-to="1"></button>
                    <button data-bs-target="#carouselDer" data-bs-slide-to="2"></button>
                </div>

                <div class="carousel-inner rounded">
                    <div class="carousel-item active">
                        <img src="https://picsum.photos/600/300?4" class="w-100">
                    </div>
                    <div class="carousel-item">
                        <img src="https://picsum.photos/600/300?5" class="w-100">
                    </div>
                    <div class="carousel-item">
                        <img src="https://picsum.photos/600/300?6" class="w-100">
                    </div>
                </div>

                <button class="carousel-control-prev" data-bs-target="#carouselDer" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon"></span>
                </button>

                <button class="carousel-control-next" data-bs-target="#carouselDer" data-bs-slide="next">
                    <span class="carousel-control-next-icon"></span>
                </button>

            </div>
        </div>

    </div>

    <h3 class="text-center mt-5">Categorías</h3>

    <div class="d-flex justify-content-center flex-wrap gap-4 mt-4">
        @for($i=1; $i<=5; $i++)
        <a href="/categoria/{{$i}}" class="text-center text-decoration-none">
            <div class="categoria-circle">
                <img src="https://picsum.photos/100?{{$i}}">
            </div>
            <p class="mt-2 text-dark">Categoría {{$i}}</p>
        </a>
        @endfor
    </div>

    <h3 class="text-center mt-5">Productos</h3>

    <div class="row mt-4">
        @for($i=1; $i<=6; $i++)
        <div class="col-md-4 mb-4 producto" data-id="{{$i}}" data-nombre="producto {{$i}}">
            <div class="card shadow-sm text-center">

                <a href="/producto/{{$i}}" class="text-decoration-none text-dark">
                    <img src="https://picsum.photos/300/200?random={{$i}}">
                </a>

                <div class="card-body">
                    <a href="/producto/{{$i}}" class="text-decoration-none text-dark">
                        <h5>Producto {{$i}}</h5>
                    </a>

                    <p>${{1000 * $i}}</p>

                    <button class="btn btn-success agregar-btn">
                        Agregar al carrito
                    </button>
                </div>

            </div>
        </div>
        @endfor
    </div>

<h3 class="text-center mt-5">Ofertas</h3>

<div class="d-flex align-items-center mt-4">
    <span class="flecha" onclick="scrollOfertas(-1)">❮</span>

    <div class="ofertas-scroll flex-grow-1">
        @for($i=1; $i<=8; $i++)
        <div class="card oferta-card producto text-center shadow-sm" data-id="of{{$i}}" data-nombre="oferta {{$i}}">

            <a href="/producto/{{$i}}" class="text-decoration-none text-dark">
                <img src="https://picsum.photos/200/150?random={{$i}}">
            </a>

            <div class="card-body">
                <a href="/producto/{{$i}}" class="text-decoration-none text-dark">
                    <h6>Oferta {{$i}}</h6>
                </a>

                <p>${{800 * $i}}</p>

                <button class="btn btn-success agregar-btn">
                    Agregar al carrito
                </button>
            </div>

        </div>
        @endfor
    </div>

    <span class="flecha" onclick="scrollOfertas(1)">❯</span>
</div>

    <div class="marcas mt-5 mb-5">
        <div class="marcas-track">
            <img src="https://picsum.photos/150/80?1">
            <img src="https://picsum.photos/150/80?2">
            <img src="https://picsum.photos/150/80?3">
            <img src="https://picsum.photos/150/80?4">
            <img src="https://picsum.photos/150/80?5">

            <img src="https://picsum.photos/150/80?1">
            <img src="https://picsum.photos/150/80?2">
        </div>
    </div>

</div>

@endsection

@section('scripts')
<script>

document.getElementById("buscador")?.addEventListener("keyup", function() {
    let filtro = this.value.toLowerCase();

    document.querySelectorAll(".producto").forEach(p => {
        let nombre = p.getAttribute("data-nombre");
        p.style.display = nombre.includes(filtro) ? "block" : "none";
    });
});

function actualizarContador(){
    let carrito = JSON.parse(localStorage.getItem("carrito")) || [];
    let contador = document.getElementById("contadorCarrito");

    if(contador){
        contador.innerText = carrito.length;
        contador.classList.add("scale");
        setTimeout(() => contador.classList.remove("scale"), 200);
    }
}

document.querySelectorAll(".agregar-btn").forEach((btn) => {

    btn.addEventListener("click", function() {

        let card = this.closest('.producto');
        let id = card.dataset.id;

        let carrito = JSON.parse(localStorage.getItem("carrito")) || [];

        carrito.push(id);

        localStorage.setItem("carrito", JSON.stringify(carrito));

        this.textContent = "✔ Agregado";
        this.classList.add("agregado");

        setTimeout(() => {
            this.textContent = "Agregar al carrito";
            this.classList.remove("agregado");
        }, 1000);

        actualizarContador();
    });

});

function scrollOfertas(dir){
    document.querySelector(".ofertas-scroll")
    .scrollBy({left:dir*300,behavior:'smooth'});
}

actualizarContador();

</script>
@endsection
