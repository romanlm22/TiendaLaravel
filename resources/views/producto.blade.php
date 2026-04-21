@extends('layouts.app')

@section('title', 'Producto')

@section('content')

<div class="container mt-5">

    <div class="row">

        <div class="col-md-6">
            <img src="https://picsum.photos/500/400?random={{$id}}" class="w-100 rounded">
        </div>

        <div class="col-md-6">

            <h2>Producto {{$id}}</h2>

            <p class="text-muted">
                Descripción del producto {{$id}}. 
                Este es un ejemplo de descripción más larga tipo ecommerce.
            </p>

            <h4 class="text-success">${{1000 * $id}}</h4>

            <button id="btnAgregar" class="btn btn-success mt-3">
                Agregar al carrito
            </button>

        </div>

    </div>

</div>

@endsection

@section('scripts')
<script>

function actualizarContador(){
    let carrito = JSON.parse(localStorage.getItem("carrito")) || [];
    let contador = document.getElementById("contadorCarrito");

    if(contador){
        contador.innerText = carrito.length;
    }
}

document.getElementById("btnAgregar").addEventListener("click", function(){

    let id = "prod_{{$id}}";

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

actualizarContador();

</script>
@endsection
