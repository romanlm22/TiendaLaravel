@extends('layouts.app')

@section('title', 'Categoría')

@section('content')

<div class="container mt-4">

    <h2 class="text-center">Categoría {{$id ?? ''}}</h2>

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

document.querySelectorAll(".agregar-btn").forEach((btn, index) => {

    btn.addEventListener("click", function() {

        let id = "cat_" + (index + 1); // evita conflicto con main

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

actualizarContador();

</script>
@endsection
