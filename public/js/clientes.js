function transformSelectedInputs() {

    var formData = {};

    var selectedInputs = document.getElementsByClassName('obj-enviar');

    for (var i = 0; i < selectedInputs.length; i++) {
        var input = selectedInputs[i];
        formData[input.name] = input.value;
    }

    document.getElementById('formData').value =  formData; //JSON.stringify(formData); // JSON.parse(formData); 

    // Submit the form
    document.getElementById('myForm').submit();
}

const iniciarSesion = async () => {
    var correo = document.getElementById('correoElectronico').value;
    var contrasena = document.getElementById('contrasena').value;

    const myModal = new bootstrap.Modal(document.getElementById('modalLogin'), {
        keyboard: false
    })

    const buscarCliente = await fetch(`http://localhost:6060/clientes/${correo}`,
        {
            method: 'GET',
            headers: {
                'Content-Type': 'application/json'
            },
        }
    );
    const result = await buscarCliente.json();

    document.getElementById('modalPie').innerHTML = '';
    if ((result[0].correoElectronico === correo) && (result[0].contrasena === contrasena)) {
        console.log(`Bienvenido ${result[0].nombre}`);

        document.getElementById('modalMensaje').innerHTML =
            `<i class="fa-solid fa-circle-check fa-2x fa-pull-right" style="color: #316120"></i>
            Bienvenido ${nombreCorto(result)}`;

        document.getElementById('modalPie').innerHTML =
            `<button type="button" class="btn btn-success" data-bs-dismiss="modal" onclick="mostrarInicio()">Aceptar</button>`;

        clienteLogueado[clienteLogueado.length] = {
            "nombre": result[0].nombre,
            "apellidos": result[0].apellidos,
            "correoElectronico": result[0].correoElectronico,
        }
    } else {
        console.log('Usuario Incorrecto');
        document.getElementById('modalMensaje').innerHTML =
            `<i class="fa-solid fa-circle-exclamation fa-2x fa-pull-left" style="color: #A0333C"></i>
        ¡Correo Electronico o Contraseña incorrecto!`;

        document.getElementById('modalPie').innerHTML =
            `<button type="button" class="btn btn-danger" data-bs-dismiss="modal">Aceptar</button>`;
    }
    console.log(clienteLogueado[0]);
    conectado = true;
    inicio();
    document.getElementById('nombreCompletoFinal').value = `${clienteLogueado[0].nombre} ${clienteLogueado[0].apellidos}`;
    myModal.show();
}
