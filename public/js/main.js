let cantidadTotalCompra = 0;
let compraRealizada = 0.00;
let contador = 0;
let detallePedido = [

];

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


function agregarCompra(id, codigoProducto){
    var codigo = `cantidadProducto${id}`
    var cantidad = parseInt(document.getElementById(codigo).value);
    var subtotal;
    
    //buscar producto en la BD por codigoProducto

    subtotal = cantidad * precio;
    document.getElementById('pedidos').innerHTML +=
        `<div class="tarjetaProducto fondo-blanco mb-2" id="div${contador}">
                <div class="productoO" id="nombreProductoO">nombre</div>
                <div class="imagenProductoO" id="imagen">
                    <img src="imagen}" width="60" height="60" alt="">
                </div>
                <div class="div3 cestaDescripcion" id="cantPrecioProducto">${cantidad} x ${(parseInt(precio)).toLocaleString('es', { style: 'currency', currency: 'Lps' })}</div>                
                <div class="subtotal">Subtotal</div>
                <div class="div5 cestaDescripcion" id="subtotalPrecioO">${subtotal.toLocaleString('es', { style: 'currency', currency: 'Lps' })}</div>
                <div class="icono" id="ePed${contador}" onclick="eliminarPedido(${contador});"><i class="fa-regular fa-trash-can"></i></div>
            </div>`;

    detallePedido[contador] = {
        "idProducto": productos.id ,
        "precioUnidad": (productos.precio).toFixed(2),
        "cantidad": cantidad
    }

    cantidadTotalCompra = cantidadTotalCompra + cantidad;
    compraRealizada = compraRealizada + (subtotal);
    contador++;

    document.getElementById('totalCompra').innerHTML = `${(compraRealizada - (compraRealizada * 0.15)).toLocaleString('es', { style: 'currency', currency: 'Lps' })}`;
    document.getElementById('impuestoCompra').innerHTML = `${((compraRealizada * 0.15)).toLocaleString('es', { style: 'currency', currency: 'Lps' })}`;
    document.getElementById('totalPagar').innerHTML = (compraRealizada).toLocaleString('es', { style: 'currency', currency: 'Lps' });
    document.getElementById('numeroCompra').innerHTML = contador;

    document.getElementById('noArticulos').innerHTML = cantidadTotalCompra;
    document.getElementById('totalCompraRealizada').innerHTML = (compraRealizada).toLocaleString('es', { style: 'currency', currency: 'Lps' });

    document.getElementById(codigo).value = 1;
}


function eliminarPedido(index){
    var divEliminar = `div${index}`;
    var div = document.getElementById(divEliminar);
    div.parentNode.removeChild(div);

    cantidadTotalCompra = cantidadTotalCompra - detallePedido[index].cantidad;
    compraRealizada = compraRealizada - (detallePedido[index].cantidad * detallePedido[index].precioProducto);
    contador --;

    document.getElementById('totalCompra').innerHTML = `${(compraRealizada - (compraRealizada * 0.15)).toLocaleString('es', { style: 'currency', currency: 'Lps' })}`;
    document.getElementById('impuestoCompra').innerHTML = `${((compraRealizada * 0.15)).toLocaleString('es', { style: 'currency', currency: 'Lps' })}`;
    document.getElementById('totalPagar').innerHTML = (compraRealizada + COMISION).toLocaleString('es', { style: 'currency', currency: 'Lps' });
    document.getElementById('numeroCompra').innerHTML = contador;

    document.getElementById('totalCompraRealizada').innerHTML = compraRealizada.toLocaleString('es', { style: 'currency', currency: 'Lps' });

    detallePedido.splice(index, 1);
    console.log(detallePedido);
}