<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://kit.fontawesome.com/444ab6c87d.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    <link rel="stylesheet" href="{{ asset('css/categorias.css') }}">
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
    <link rel="stylesheet" href="{{ asset('css/estilos-barra-navegacion.css') }}">
    <link rel="stylesheet" href="{{ asset('css/carrito.css') }}">
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
    <div class="p-4">
        <div class="centrar">
            <div class="container rounded p-4 border m-3" style="width: 40%; background-color: #FFFFFF">
                <form method="GET" action="{{ route('clientes.loginCorreo') }}">
                    @csrf
                    @method('GET')
                    <div class="centrar titulo">
                        <h3>Inicia Sesión</h3>
                    </div><br>
                    <div class="mb-4">
                        <label for="exampleInputPassword1" class="form-label">Correo electrónico</label>
                        <input type="email" class="form-control" name="correo" id="correo">
                    </div>
                    <div class="mb-4">
                        <label for="exampleInputPassword1" class="form-label">Contraseña</label>
                        <input type="password" class="form-control" name="contraseña" id="contra">
                    </div>
                    <div class="centrar">
                        <button style="background-color: #037BD4; color: #FFFFFF" type="submit" class="btn"
                            onclick="iniciarSesion()">INICIAR
                            SESIÓN</button>
                    </div>
                </form>
            </div>
        </div>

        <div class="centrar p-4">
            <div class="fs-6">¿Todavía no tienes una cuenta?</div>
            <div class="fs-6">Si aún no tienes una cuenta, completa tu datos y aprovecha las ofertas</div>
            <div><a href="{{ route('clientes.crear') }}">Crea una Cuenta</a></div>
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
    <script src="{{ asset('js/clientes.js') }}"></script>
</body>

</html>