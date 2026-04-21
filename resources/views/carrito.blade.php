@extends('layouts.app')

@section('title', 'Carrito')

@section('content')

<div class="container mt-5">

    <h2>🛒 Carrito de compras</h2>

    <ul id="listaCarrito" class="list-group mt-3"></ul>

    <h4 class="mt-3">Total: $<span id="total">0</span></h4>

    <button class="btn btn-danger mt-3" onclick="vaciar()">Vaciar carrito</button>

    <!-- BOTÓN COMPRA -->
    <button class="btn btn-success mt-3 ms-2" data-bs-toggle="modal" data-bs-target="#modalCompra">
        <i class="bi bi-whatsapp"></i> Comprar
    </button>

</div>

<!-- MODAL -->
<div class="modal fade" id="modalCompra">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title">Confirmar compra</h5>
                <button class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <div class="modal-body">

                <form id="formCompra">

                    <div class="mb-3">
                        <label>Nombre</label>
                        <input type="text" id="nombre" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label>Email</label>
                        <input type="email" id="email" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label>Pedido</label>
                        <textarea id="pedido" class="form-control" readonly></textarea>
                    </div>

                    <button type="submit" class="btn btn-success w-100">
                        Enviar por WhatsApp
                    </button>

                </form>

            </div>

        </div>
    </div>
</div>

@endsection


@section('scripts')
<script>

// PRODUCTOS (simulación)
let productos = {
    1:{nombre:"Zapatillas Nike",precio:25000},
    2:{nombre:"Remera Adidas",precio:12000}
};

let carrito = JSON.parse(localStorage.getItem("carrito")) || [];
let lista = document.getElementById("listaCarrito");
let total = 0;

// CONTADOR NAVBAR
function actualizarContador(){
    let contador = document.getElementById("contadorCarrito");
    if(contador){
        contador.innerText = carrito.length;
    }
}

// RENDER
function render(){

    lista.innerHTML = "";
    total = 0;

    if(carrito.length === 0){
        lista.innerHTML = "<li class='list-group-item text-danger'>Carrito vacío</li>";
        document.getElementById("total").innerText = 0;
        actualizarContador();
        return;
    }

    carrito.forEach((id,index) => {

        let p = productos[id];
        total += p.precio;

        lista.innerHTML += `
        <li class="list-group-item d-flex justify-content-between align-items-center">
            ${p.nombre} - $${p.precio}

            <button class="btn btn-danger btn-sm" onclick="eliminar(${index})">
                ❌
            </button>
        </li>
        `;
    });

    document.getElementById("total").innerText = total;
    actualizarContador();
}

// ELIMINAR
function eliminar(index){
    carrito.splice(index,1);
    localStorage.setItem("carrito", JSON.stringify(carrito));
    render();
}

// VACIAR
function vaciar(){
    carrito = [];
    localStorage.removeItem("carrito");
    render();
}

// CARGAR PEDIDO EN MODAL
document.getElementById("modalCompra")?.addEventListener("show.bs.modal", function(){

    if(carrito.length === 0){
        document.getElementById("pedido").value = "Carrito vacío";
        return;
    }

    let texto = "";

    carrito.forEach(id => {
        let p = productos[id];
        texto += `${p.nombre} - $${p.precio}\n`;
    });

    texto += `\nTOTAL: $${total}`;

    document.getElementById("pedido").value = texto;
});

// ENVIAR WHATSAPP
document.getElementById("formCompra")?.addEventListener("submit", function(e){
    e.preventDefault();

    let nombre = document.getElementById("nombre").value;
    let email = document.getElementById("email").value;
    let pedido = document.getElementById("pedido").value;

    let mensaje = `🛒 Pedido Web\n\n${pedido}\n\n👤 Nombre: ${nombre}\n📧 Email: ${email}`;

    // 🔴 CAMBIÁ POR TU NÚMERO
    let numero = "5493794126408";

    let url = `https://wa.me/${numero}?text=${encodeURIComponent(mensaje)}`;

    window.open(url, "_blank");
});

// INIT
render();

</script>
@endsection