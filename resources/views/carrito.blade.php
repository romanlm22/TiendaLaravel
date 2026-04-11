<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Carrito</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="d-flex flex-column min-vh-100">

<div class="container mt-5">

    <h2>🛒 Carrito de compras</h2>

    <ul id="listaCarrito" class="list-group mt-3"></ul>

    <h4 class="mt-3">Total: $<span id="total">0</span></h4>

    <!-- BOTONES -->
    <button class="btn btn-danger mt-3" onclick="vaciar()">
        Vaciar carrito
    </button>

    <button class="btn btn-success mt-3 ms-2" data-bs-toggle="modal" data-bs-target="#modalCompra">
        Comprar
    </button>

</div>

<!-- MODAL -->
<div class="modal fade" id="modalCompra">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title">Finalizar compra</h5>
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

<!-- FOOTER -->
<footer class="bg-dark text-white text-center mt-auto p-4">
    Footer
</footer>

<!-- Bootstrap JS (IMPORTANTE para modal) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<script>

// PRODUCTOS
let productos = {
    1:{nombre:"Producto 1",precio:100},
    2:{nombre:"Producto 2",precio:150},
    3:{nombre:"Producto 3",precio:200},
    4:{nombre:"Producto 4",precio:250},
    5:{nombre:"Producto 5",precio:300},
    6:{nombre:"Producto 6",precio:350}
};

let carrito = JSON.parse(localStorage.getItem("carrito")) || [];
let lista = document.getElementById("listaCarrito");
let total = 0;

// RENDER
function render(){

    lista.innerHTML = "";
    total = 0;

    if(carrito.length === 0){
        lista.innerHTML = "<li class='list-group-item text-danger'>El carrito está vacío</li>";
        document.getElementById("total").innerText = 0;
        return;
    }

    carrito.forEach((id,index) => {
        let p = productos[id];
        total += p.precio;

        lista.innerHTML += `
        <li class="list-group-item d-flex justify-content-between">
            ${p.nombre} - $${p.precio}

            <button class="btn btn-danger btn-sm" onclick="eliminar(${index})">
                ❌
            </button>
        </li>
        `;
    });

    document.getElementById("total").innerText = total;
}

// ELIMINAR
function eliminar(index){
    carrito.splice(index,1);
    localStorage.setItem("carrito", JSON.stringify(carrito));
    render();
}

// VACIAR
function vaciar(){
    localStorage.removeItem("carrito");
    carrito = [];
    render();
}

// CARGAR PEDIDO EN MODAL
document.getElementById("modalCompra").addEventListener("show.bs.modal", function(){

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

// ENVIAR A WHATSAPP
document.getElementById("formCompra").addEventListener("submit", function(e){
    e.preventDefault();

    let nombre = document.getElementById("nombre").value;
    let email = document.getElementById("email").value;
    let pedido = document.getElementById("pedido").value;

    let mensaje = `Hola, quiero comprar:\n\n${pedido}\n\nNombre: ${nombre}\nEmail: ${email}`;

    // ⚠️ CAMBIAR ESTE NÚMERO
    let numero = "5493794142799";

    let url = `https://wa.me/${numero}?text=${encodeURIComponent(mensaje)}`;

    window.open(url, "_blank");
});

// INICIAL
render();

</script>

</body>
</html>