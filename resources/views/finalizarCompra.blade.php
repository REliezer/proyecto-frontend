<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Finalizar Compra</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://kit.fontawesome.com/444ab6c87d.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{ asset('css/estilos-barra-navegacion.css') }}">
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    <link rel="stylesheet" href="{{ asset('css/categorias.css') }}">
    <link rel="stylesheet" href="{{ asset('css/carrito.css') }}">
    <link rel="stylesheet" href="{{ asset('css/productos.css') }}">
</head>

<body class="barra-navegacion">
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{ route('categorias.index') }}">SoftBytes</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <div class="input-group" style="margin: 0 15px;">
                    <button class="btn btn-outline-light dropdown-toggle" type="button" data-bs-toggle="dropdown"
                        aria-expanded="false">Categorias</button>
                    <ul class="dropdown-menu" id="categoriasMenu">

                    </ul>
                    <input type="text" class="form-control" placeholder="Buscar" aria-label="Buscar"
                        aria-describedby="button-addon2">
                    <button class="btn btn-outline-light" type="
                    button" id="button-addon2">
                        <i class="fa-solid fa-magnifying-glass fa-sm" style="color: #ffffff;"></i>
                    </button>
                </div>
                <div class="acciones">
                    <span class="fa-stack fa-layers fa-fw fa-1x" style="--fa-inverse: #F7EDE4;">
                        <i class="fa-solid fa-circle fa-stack-2x" style="color: #195E95;"></i>
                        <i class="fa-solid fa-cart-shopping fa-stack-1x fa-inverse" data-bs-toggle="offcanvas"
                            data-bs-target="#cestaCompra"></i>
                        <span id="numeroCompra">0</span>
                    </span>
                </div>
            </div>
        </div>
    </nav>
    <div class="contenedor">
        <div class="contenido">
            <div class="contenedor-producto">
                <div class="titulo">
                    <h2 class="text-start">Información de envio y de pago</h2>
                </div>
                <form method="" action="">
                    @csrf
                    @method('POST')
                    <div class="producto-contenido">
                        <div class="producto-compra">
                            <div id="productosComprados">

                            </div>
                        </div>
                        <div class="venta">
                            <div class="mb-3 row">
                                <label for="staticPrecio" class="col-sm-6 col-form-label"
                                    style="text-align: left;">Fecha</label>
                                <div class="col-sm-4">
                                    <input type="text" readonly class="form-control-plaintext" name="staticFecha"
                                        id="staticFecha" style="text-align: right;" value="">
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="staticPrecio" class="col-sm-8 col-form-label"
                                    style="text-align: left;">Total de Articulos Comprados</label>
                                <div class="col-sm-2">
                                    <input type="text" readonly class="form-control-plaintext" name="noArticulos"
                                        id="noArticulos" style="text-align: right;" value="">
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="staticPrecio" class="col-sm-4 col-form-label"
                                    style="text-align: left;">Subtotal</label>
                                <div class="col-sm-6">
                                    <input type="text" readonly class="form-control-plaintext" name="totalComprado"
                                        id="totalComprado" style="text-align: right;" value=" ">
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="staticPrecio" class="col-sm-4 col-form-label"
                                    style="text-align: left;">ISV</label>
                                <div class="col-sm-6">
                                    <input type="text" readonly class="form-control-plaintext" name="totalImpuesto"
                                        id="totalImpuesto" style="text-align: right;" value="">
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="staticPrecio" class="col-sm-4 col-form-label"
                                    style="text-align: left;">Total</label>
                                <div class="col-sm-6">
                                    <input type="text" readonly class="form-control-plaintext" name="totalAPagar"
                                        id="totalAPagar" style="text-align: right;" value="">
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="staticPrecio" class="col-sm-4 col-form-label"
                                    style="text-align: left;">Metodo de Pago</label>
                                <div class="col-sm-6">
                                    <select class="form-select" aria-label="Selecciona un metodo de pago"
                                        id="metodoPago">
                                        <option selected>Selecciona un metodo de pago</option>
                                        <option value="1">Efectivo</option>
                                        <option value="2">Tarjeta Debito/Credito</option>
                                    </select>
                                </div>
                            </div>
                            <div class="mb-3" id="divMetodoPago" style="display: none;">
                                <div class="mb-3 row">
                                    <label for="numeroTarjeta" class="col-sm-4 col-form-label"
                                        style="text-align: left;">Numero de Tarjeta</label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" id="numeroTarjeta" value="">
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="fechaVencimiento" class="col-sm-4 col-form-label"
                                        style="text-align: left;">Fecha de Vencimiento</label>
                                    <div class="col-sm-6">
                                        <input type="date" class="form-control" id="fechaVencimiento" value="">
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="cvc" class="col-sm-4 col-form-label"
                                        style="text-align: left;">CVC/CVV</label>
                                    <div class="col-sm-6">
                                        <input type="text" maxlength="3" class="form-control" id="cvc" value="">
                                    </div>
                                </div>
                            </div>
                            @extends('layout')
                            @section('content')
                            <div class="row text-center mb-3">
                                <div class="col-sm-6">
                                    <button type="button" class="btn btn-success" onclick="finalizarCompra()">
                                        Enviar
                                    </button>
                                </div>
                                <div class="col-sm-6">
                                    <a class="btn btn-primary" href="{{route('categorias.index')}}">Seguir Comprando</a>
                                </div>
                                
                            </div>
                            @endsection
                            @section('scripts')
                                <script>
                                    function finalizarCompra() {
                                        const datosLocalStorage = JSON.parse(localStorage.getItem('objetos'));
                                        const consumoActual = JSON.parse(localStorage.getItem('consumo'));
                                        const contadorFinal = JSON.parse(localStorage.getItem('contador'));
                                        const usuario = JSON.parse(localStorage.getItem('usuario'));

                                        if (datosLocalStorage && consumoActual) {
                                            fetch('{{ route('ventas.finalizar') }}', {
                                                method: 'POST',
                                                headers: {
                                                    'Content-Type': 'application/json',
                                                    'X-CSRF-TOKEN': '{{ csrf_token() }}', // Incluye el token CSRF
                                                },
                                                body: JSON.stringify({ objetos:datosLocalStorage,
                                                                        consumo:consumoActual,
                                                                        contador:contadorFinal,
                                                                        usuario:usuario
                                                                    }),
                                            })
                                                .then(response => {
                                                    if (!response.ok) {
                                                        throw new Error(`HTTP error! Status: ${response.status}`);
                                                    }
                                                    return response.json();
                                                })
                                                .then(data => {
                                                    console.log(data.mensaje);
                                                })
                                                .catch(error => {
                                                    console.error('Error:', error);

                                                    localStorage.removeItem('objetos');
                                                    localStorage.removeItem('consumo');
                                                    localStorage.removeItem('contador');
                                                    localStorage.removeItem('usuario');

                                                    console.log('localStorage borrado después de finalizar la compra.');
                                                });
                                        }else {
                                            console.log('Uno de los datos del localStorage no está disponible');
                                        }
                                    }
                                    
                                </script>
                                @endsection
                            
                        </div>
                    </div>
                </form>
            </div>

        </div>
    </div>

    <div class="offcanvas offcanvas-end" tabindex="-1" id="cestaCompra" aria-labelledby="cestaCompraLabel">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="cestaCompraLabel">Carrito de Compras</h5>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body barra-navegacion">
            <div class="fondo-linea">
                <div id="pedidos">

                </div>
                <form>
                    <div class="row">
                        <div class="col-4"></div>
                        <div class="col-4">
                            <label class="form-label cuentaCestaD">Subtotal:</label>
                        </div>
                        <div class="col-4">
                            <label class="form-label cuentaCestaT" id="totalCompra">Lps. 0.00</label>
                        </div>
                        <div class="col-4"></div>
                        <div class="col-4">
                            <label class="form-label cuentaCestaD">Impuesto:</label>
                        </div>
                        <div class="col-4">
                            <label class="form-label cuentaCestaT" id="impuestoCompra">Lps. 0.00</label>
                        </div>
                        <div class="col-4"></div>
                        <div class="col-4">
                            <label class="form-label cuentaCestaD">Total a Pagar</label>
                        </div>
                        <div class="col-4">
                            <label class="form-label cuentaCestaT" id="totalPagar">Lps. 0.00</label>
                        </div>
                    </div>

                    <div class="d-flex mb-2 mt-2" style="justify-content: center">
                        <a class="btn btn-danger texto-general boton" href="{{ route('productos.finalizar') }}"
                            onclick="calcularCompra()">Continuar
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="{{ asset('js/main.js') }}"></script>
</body>

</html>