function transformSelectedInputs() {

    var formData = {};

    var selectedInputs = document.getElementsByClassName('obj-enviar');

    for (var i = 0; i < selectedInputs.length; i++) {
        var input = selectedInputs[i];
        formData[input.name] = input.value;
    }

    document.getElementById('formData').value = formData; //JSON.stringify(formData); // JSON.parse(formData); 

    // Submit the form
    document.getElementById('myForm').submit();
}

const iniciarSesion = async () => {
    if (!localStorage.getItem('usuario')) {
        localStorage.setItem('usuario', JSON.stringify([
            {
                username: 0,
                password: 0,
                id: 0
            }
        ]));
    }
    const usuarioRegistrado = JSON.parse(localStorage.getItem('usuario'));

    var correo = document.getElementById('correo').value;
    var contrasena = document.getElementById('contra').value;

    const buscarClienteId = await fetch(`http://localhost/proyecto-frontend/public/clientes/buscar/${correo}`,
        {
            method: 'GET',
            headers: {
                'Content-Type': 'application/json'
            },
        }
    );
    const result = await buscarClienteId.text();
    console.log('result', result);

    if (result !== null) {
        const buscarClienteId = await fetch(`http://localhost/proyecto-frontend/public/clientes/buscarId/${parseInt(result)}`,
            {
                method: 'GET',
                headers: {
                    'Content-Type': 'application/json'
                },
            }
        );
        const resultado = await buscarClienteId.json();
        console.log('result', resultado);
        if (resultado) {
            usuarioRegistrado.splice(0, usuarioRegistrado.length, {
                username: resultado.username,
                password: contrasena,
                id: parseInt(result)
            });

            localStorage.setItem('usuario', JSON.stringify(usuarioRegistrado));

            const categorias = await fetch(`http://localhost/proyecto-frontend/public/categorias`,
                {
                    method: 'GET',
                    headers: {
                        'Content-Type': 'application/json'
                    },
                }
            );
        }

    }

}
