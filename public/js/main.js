let categoriasEncontradas;
let productos;
let compraRealizada = 0.00;
let contador = parseInt(localStorage.getItem('contador')) || 0;

const obtenerCategorias = async () => {
    //buscar categorias en la BD
    const buscarCategorias = await fetch(`http://localhost/proyecto-frontend/public/obtenerCategorias`,
        {
            method: 'GET',
            headers: {
                'Content-Type': 'application/json'
            },
        });
    categoriasEncontradas = await buscarCategorias.json();
}

const obtenerProductos = async () => {
    //buscar productos en la BD
    const buscarCategorias = await fetch(`http://localhost/proyecto-frontend/public/productos/all`,
        {
            method: 'GET',
            headers: {
                'Content-Type': 'application/json'
            },
        });
    productos = await buscarCategorias.json();
}

const cargarCategorias = async () => {
    //menu barra navegacion categorias
    if ((document.getElementById('categoriasMenu') !== null) && (categoriasEncontradas)) {
        document.getElementById('categoriasMenu').innerHTML = '';
        categoriasEncontradas.forEach(categoria => {
            document.getElementById('categoriasMenu').innerHTML +=
                `<li>
                    <a class="dropdown-item" href="http://localhost/proyecto-frontend/public/subcategorias/${categoria.idCategoria}">
                        ${categoria.descripcion}
                    </a>
                </li>`;
        });
    }
    //categorias landing page
    if ((document.getElementById('contenidoCategoria') !== null) && (categoriasEncontradas)) {
        document.getElementById('contenidoCategoria').innerHTML = '';
        categoriasEncontradas.forEach(categoria => {
            document.getElementById('contenidoCategoria').innerHTML +=
                `<div class="card" style="width: 12rem; height: 15rem; background-image: url('${categoria.imagen}');">
                <div class="card-body">
                    <a href="http://localhost/proyecto-frontend/public/subcategorias/${categoria.idCategoria}" class="btn btn-primary">
                        ${categoria.descripcion}
                    </a>
                </div>
            </div>`;
        });
    }
}

function mas(id) {
    var codigo = `cantidadProducto${id}`
    document.getElementById(codigo).value = parseInt(document.getElementById(codigo).value) + 1;
}

function menos(id) {
    var codigo = `cantidadProducto${id}`
    if (parseInt(document.getElementById(codigo).value) > 1) {
        document.getElementById(codigo).value = parseInt(document.getElementById(codigo).value) - 1;
    }

}

const agregarCompra = async (idProducto) => {
    // Verificar y crear localStorage si no existen
    if (!localStorage.getItem('objetos')) {
        localStorage.setItem('objetos', JSON.stringify([]));
    }
    if (!localStorage.getItem('consumo')) {
        localStorage.setItem('consumo', JSON.stringify([
            {
                productosComprados: 0,
                subtotal: 0,
                impuesto: 0,
                total: 0
            }
        ]));
    }

    console.log('idProducto ', idProducto);

    var codigo = `cantidadProducto${idProducto}`;

    var cantidad = parseInt(document.getElementById(codigo).value);
    console.log('cantidad ', cantidad);

    // Obtener valores actuales de localStorage
    const productosComprados = JSON.parse(localStorage.getItem('objetos'));
    const consumo = JSON.parse(localStorage.getItem('consumo'));

    var subtotal = consumo[0].subtotal || 0.00;

    //buscar producto en la BD por codigoProducto
    const productoCategoria = await fetch(`http://localhost/proyecto-frontend/public/productos/buscar/${idProducto}`,
        {
            method: 'GET',
            headers: {
                'Content-Type': 'application/json'
            },
        });
    productoEncontrado = await productoCategoria.json();

    if (productoEncontrado) {
        console.log('productoEncontrado ', productoEncontrado);

        subtotal = (cantidad * productoEncontrado.precioUnidad).toFixed(2);
        document.getElementById('pedidos').innerHTML +=
            `<div class="tarjetaProducto fondo-blanco mb-2" id="div${idProducto}">
                <div class="productoO" id="nombreProductoO">${productoEncontrado.nombre}</div>
                <div class="imagenProductoO" id="imagen">
                    <img src="${productoEncontrado.imagen}" width="60" height="60" alt="${productoEncontrado.nombre}">
                </div>
                <div class="div3 cestaDescripcion" id="cantPrecioProducto">${cantidad} x ${(parseInt(productoEncontrado.precioUnidad)).toLocaleString('es', { style: 'currency', currency: 'Lps' })}</div>                
                <div class="subtotal">Subtotal</div>
                <div class="div5 cestaDescripcion" id="subtotalPrecioO">${subtotal.toLocaleString('es', { style: 'currency', currency: 'Lps' })}</div>
                <div class="icono" id="ePed${idProducto}" onclick="eliminarPedido(${idProducto});"><i class="fa-regular fa-trash-can"></i></div>
            </div>`;

        //cantidadTotalCompra = cantidadTotalCompra + cantidad;
        //compraRealizada = parseFloat(compraRealizada) + parseFloat(subtotal);;
        //console.log('compraRealizada ', compraRealizada);

        contador++;
        localStorage.setItem('contador', contador);

        // Actualizar valores en localStorage
        productosComprados.push({
            idProducto: idProducto,
            nombre: productoEncontrado.nombre,
            imagen: productoEncontrado.imagen,
            precioUnidad: productoEncontrado.precioUnidad,
            cantidad: cantidad
        });

        consumo.splice(0, consumo.length, {
            productosComprados: consumo[0].productosComprados + cantidad,
            subtotal: consumo[0].subtotal + (subtotal - (subtotal * 0.15)),
            impuesto: consumo[0].impuesto + (subtotal * 0.15),
            total: consumo[0].total + parseFloat(subtotal)
        });

        // Almacenar el array actualizado en localStorage
        localStorage.setItem('objetos', JSON.stringify(productosComprados));
        localStorage.setItem('consumo', JSON.stringify(consumo));

        //Actualizamos el DOM
        document.getElementById('totalCompra').innerHTML = `${(consumo[0].subtotal).toLocaleString('es', { style: 'currency', currency: 'Lps' })}`;
        document.getElementById('impuestoCompra').innerHTML = `${(consumo[0].impuesto).toLocaleString('es-ES', { style: 'currency', currency: 'Lps' })}`;
        document.getElementById('totalPagar').innerHTML = `${(consumo[0].total).toLocaleString('es', { style: 'currency', currency: 'Lps' })}`;
        document.getElementById('numeroCompra').innerHTML = contador;
        document.getElementById(codigo).value = 1;

        // Para recuperar los objetos almacenados
        const objetosRecuperados = JSON.parse(localStorage.getItem('objetos'));
        console.log(objetosRecuperados);
        const consumoActual = JSON.parse(localStorage.getItem('consumo'));
        console.log(consumoActual);

    }
}


function eliminarPedido(idProducto) {
    var divEliminar = `div${idProducto}`;
    var div = document.getElementById(divEliminar);
    div.parentNode.removeChild(div);

    const productosComprados = JSON.parse(localStorage.getItem('objetos'));
    const consumo = JSON.parse(localStorage.getItem('consumo'));

    productosComprados.forEach((pedido, index) => {
        if (pedido.idProducto == idProducto) {
            console.log('id ', idProducto);

            contador--;
            localStorage.setItem('contador', contador);

            var subtotal = parseFloat(pedido.cantidad) * parseFloat(pedido.precioUnidad);
            //Actualizamos el consumo
            consumo[0].productosComprados = consumo[0].productosComprados - parseFloat(pedido.cantidad);
            consumo[0].subtotal = consumo[0].subtotal - (parseFloat(subtotal) - (parseFloat(subtotal) * 0.15));
            consumo[0].impuesto = consumo[0].impuesto - (parseFloat(subtotal) * 0.15);
            consumo[0].total = consumo[0].total - parseFloat(subtotal);

            //eliminamos el pedido del localstore
            productosComprados.splice(index, 1);

            // Actualizar el localStorage con el nuevo array sin el pedido eliminado y los valores reducidos del consumo
            localStorage.setItem('objetos', JSON.stringify(productosComprados));
            localStorage.setItem('consumo', JSON.stringify(consumo));
        }
    });

    document.getElementById('totalCompra').innerHTML = `${(consumo[0].subtotal).toLocaleString('es', { style: 'currency', currency: 'Lps' })}`;
    document.getElementById('impuestoCompra').innerHTML = `${(consumo[0].impuesto).toLocaleString('es', { style: 'currency', currency: 'Lps' })}`;
    document.getElementById('totalPagar').innerHTML = (consumo[0].total).toLocaleString('es', { style: 'currency', currency: 'Lps' });
    document.getElementById('numeroCompra').innerHTML = localStorage.getItem('contador');;

    console.log(productosComprados);
    console.log(consumo);

}

const fecha = () => {
    if (document.getElementById('staticFecha') !== null) {
        // Obtener la fecha actual
        const fechaActual = new Date();

        // Formatear la fecha como una cadena (puedes personalizar el formato según tus necesidades)
        const fechaFormateada = fechaActual.toLocaleDateString();

        // Asignar la fecha al input
        document.getElementById('staticFecha').value = fechaFormateada;
    }
}

const carrito = () => {
    const objetosRecuperados = JSON.parse(localStorage.getItem('objetos'));
    const consumoActual = JSON.parse(localStorage.getItem('consumo'));
    if (objetosRecuperados) {
        objetosRecuperados.forEach(compras => {
            document.getElementById('pedidos').innerHTML +=
                `<div class="tarjetaProducto fondo-blanco mb-2" id="div${compras.idProducto}">
                    <div class="productoO" id="nombreProductoO">${compras.nombre}</div>
                    <div class="imagenProductoO" id="imagen">
                        <img src="${compras.imagen}" width="60" height="60" alt="${compras.nombre}">
                    </div>
                    <div class="div3 cestaDescripcion" id="cantPrecioProducto">${compras.cantidad} x ${(parseInt(compras.precioUnidad)).toLocaleString('es', { style: 'currency', currency: 'Lps' })}</div>                
                    <div class="subtotal">Subtotal</div>
                    <div class="div5 cestaDescripcion" id="subtotalPrecioO">${((compras.precioUnidad) * (compras.cantidad)).toLocaleString('es', { style: 'currency', currency: 'Lps' })}</div>
                    <div class="icono" id="ePed${compras.idProducto}" onclick="eliminarPedido(${compras.idProducto});"><i class="fa-regular fa-trash-can"></i></div>
                </div>`;
        });
    }

    const valor = localStorage.getItem('contador');
    if (valor) {
        document.getElementById('numeroCompra').innerHTML = localStorage.getItem('contador');
    } else {
        document.getElementById('numeroCompra').innerHTML = 0;
    }

    if (consumoActual) {
        document.getElementById('totalCompra').innerHTML = `${(consumoActual[0].subtotal).toLocaleString('es', { style: 'currency', currency: 'Lps' })}`;
        document.getElementById('impuestoCompra').innerHTML = `${(consumoActual[0].impuesto).toLocaleString('es', { style: 'currency', currency: 'Lps' })}`;
        document.getElementById('totalPagar').innerHTML = (consumoActual[0].total).toLocaleString('es', { style: 'currency', currency: 'Lps' });
    }

}

const metodoPago = () => {
    // Obtener el elemento select
    const metodoPagoSelect = document.getElementById('metodoPago');

    // Obtener el div que deseas mostrar/ocultar
    const divMetodoPago = document.getElementById('divMetodoPago');

    // Agregar un evento de cambio al elemento select
    metodoPagoSelect.addEventListener('change', function () {
        // Verificar si la opción seleccionada es la segunda opción (valor '2')
        if (metodoPagoSelect.value === '2') {
            // Mostrar el div si la opción es '2'
            divMetodoPago.style.display = 'block';
        } else {
            // Ocultar el div para cualquier otra opción
            divMetodoPago.style.display = 'none';
        }
    });
}

const mostrarModal = (idProducto) => {
    // Obtener el elemento del modal y el contenido
    const modal = new bootstrap.Modal(document.getElementById('modalProducto'));
    const contenidoModal = document.getElementById('productoInformacion');
    const tituloModal = document.getElementById('modalProductoLabel');

    // Limpiar el contenido anterior
    contenidoModal.innerHTML = '';
    tituloModal.innerHTML = '';

    productos.forEach(producto => {
        if (producto.idProducto === idProducto) {
            tituloModal.innerHTML = producto.nombre;

            contenidoModal.innerHTML = 
        `<div class="mb-3 row">
            <label for="staticPrecio" class="col-sm-4 col-form-label"
                style="text-align: left;">Codigo de Serie</label>
            <div class="col-sm-6">
                <input type="text" readonly class="form-control-plaintext" id="staticCodigo" value="${producto.codigoSerie}">
            </div>
        </div>
        <div class="mb-3">
            <label for="staticPrecio" class="col-sm-4 col-form-label"
                style="text-align: left;">Descripcion</label>
                <textarea readonly class="form-control-plaintext" id="staticDescripcion" rows="4">${producto.descripcion}</textarea>
        </div>
        <div class="mb-3 row">
            <label for="staticPrecio" class="col-sm-4 col-form-label"
                style="text-align: left;">Fecha de Publicacion</label>
            <div class="col-sm-6">
                <input type="text" readonly class="form-control-plaintext" id="staticFecha" value="${producto.fechaPublicacion}">
            </div>
        </div>
        <div class="mb-3">
            <label for="staticPrecio" class="col-sm-4 col-form-label"
                style="text-align: left;">Reseña</label>
                <textarea readonly class="form-control-plaintext" id="staticResena" rows="4">${producto.reseñas}</textarea>
        </div>`;
        }
        
    });    
    
    // Abrir el modal
    modal.show();
}

const calcularCompra = () => {
    const objetosRecuperados = JSON.parse(localStorage.getItem('objetos'));
    const consumoActual = JSON.parse(localStorage.getItem('consumo'));
    var div = document.getElementById('productosComprados');

    if ((div !== null) && (objetosRecuperados)) {
        objetosRecuperados.forEach(compras => {
            div.innerHTML +=
                `<div class="tarjetaProducto fondo-blanco mb-2" id="div${compras.idProducto}">
                    <div class="productoO" id="nombreProductoC">${compras.nombre}</div>
                    <div class="imagenProductoO" id="imagenProductoC">
                        <img src="${compras.imagen}" width="60" height="60" alt="${compras.nombre}">
                    </div>
                    <div class="div3 cestaDescripcion" id="cantPrecioProductoC">${compras.cantidad} x ${(parseInt(compras.precioUnidad)).toLocaleString('es', { style: 'currency', currency: 'Lps' })}</div>                
                    <div class="subtotal">Subtotal</div>
                    <div class="div5 cestaDescripcion" id="subtotalPrecioC">${((compras.precioUnidad) * (compras.cantidad)).toLocaleString('es', { style: 'currency', currency: 'Lps' })}</div>
                    <div class="icono" id="ePed${compras.idProducto}" onclick="eliminarPedido(${compras.idProducto});"><i class="fa-regular fa-trash-can"></i></div>
                </div>`;
        });
    }
    
    document.getElementById('noArticulos').value = consumoActual[0].productosComprados || '0';

    if (consumoActual) {
        document.getElementById('totalComprado').value = (consumoActual[0].subtotal).toFixed(2);
        
        document.getElementById('totalImpuesto').value = (consumoActual[0].impuesto).toFixed(2);
        document.getElementById('totalAPagar').value = (consumoActual[0].total).toFixed(2);
    }
}

obtenerCategorias().then(() => {
    cargarCategorias();
});

obtenerProductos();
calcularCompra();

document.addEventListener('DOMContentLoaded', function () {
    carrito();
    fecha();
    metodoPago();

});
