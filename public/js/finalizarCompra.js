
const finalizarPedido = async () => {
    const productosComprados = JSON.parse(localStorage.getItem('objetos'));
    const consumoActual = JSON.parse(localStorage.getItem('consumo'));
    const contadorActual = JSON.parse(localStorage.getItem('contador'));


    // Obtener credenciales y codificarlas en base64
    const usuario = 'grod';
    const contraseña = '1234';
    const credencialesBase64 = btoa(`${usuario}:${contraseña}`);

    //crear el pedido
    var idCliente = 7;
    var total = consumoActual[0].total;

    let nuevoPedido = {
        amount: consumoActual[0].total
    }

    const nuevaOrden = await fetch(`http://localhost:8080/auth/order/crear?idCliente=${idCliente}`,
        //const nuevaOrden = await fetch(`http://localhost/proyecto-frontend/public/ventas/store/${total}`,

        {
            method: 'POST',
            headers: {
                'Authorization': `Basic ${credencialesBase64}`,
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(nuevoPedido),
        });
    const idPedido = await nuevaOrden.text();
    console.log('idPedido', idPedido);

}


const finalizar = () => {
    

}
