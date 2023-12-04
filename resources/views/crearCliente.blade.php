<!DOCTYPE html>
<html lang="en">
    <head>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>SoftBytes</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
        <script src="https://kit.fontawesome.com/444ab6c87d.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="{{ asset('css/main.css') }}">
        <link rel="stylesheet" href="{{ asset('css/categorias.css') }}">
        <link rel="stylesheet" href="{{ asset('css/crearcliente.css') }}">
        <link rel="stylesheet" href="{{ asset('css/estilos-barra-navegacion.css') }}">
        <link rel="stylesheet" href="{{ asset('css/carrito.css') }}">

        <script src="{{ asset('js/clientes.js') }}"></script>
    </head>
    <body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">SoftBytes</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <div class="input-group" style="margin: 0 15px;">
                    <button class="btn btn-outline-light dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">Categorias</button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">Categoria 1</a></li>
                        <li><a class="dropdown-item" href="#">Categoria 2</a></li>
                        <li><a class="dropdown-item" href="#">Categoria 3</a></li>
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
                        <span id="numeroCompra">3</span>
                    </span>
                </div>
            </div>
        </div>
    </nav>

    <div class="p-4 centrar border rounded">
        <div class="p-5 centrar border rounded">
        <div style="display-flex: column" class="form-ajustes">
            <div style="text-align: center">
                <div class="titulo">
                    <h3>Registrate en Softbytes</h3>
                </div>
                <p>Crea una cuenta gratis o <a href="{{ route('clientes.login') }}">Inicia Sesión</a></p>
            </div><br>
            <div class="contenedor mb-4">
                <div class="left-div">
                    <label for="colFormLabelSm" class="form-label">Nombre</label>
                    <input class="form-control obj-enviar" name="name">
                </div>
                <div class="right-div">
                    <label for="colFormLabelSm" class="form-label">Apellido</label>
                    <input class="form-control obj-enviar" name="lastName">
                </div>
            </div>
            <div style="display-flex: column">
                <div class="mb-4">
                    <label for="colFormLabelSm" class="form-label">Usuario</label>
                    <input class="form-control obj-enviar" name="username">
                </div>
                <div class="mb-4">
                    <label for="colFormLabelSm" class="form-label">Teléfono</label>
                    <input class="form-control obj-enviar" name="telephone">
                </div>
                <div class="mb-4">
                            <label for="colFormLabelSm" class="form-label">Correo electrónico</label>
                            <input type="email" class="form-control obj-enviar" name="email">
                </div>
                <div class="mb-4">
                    <label for="exampleInputPassword1" class="form-label">Contraseña</label>
                    <input type="password" class="form-control obj-enviar" name="password">
                </div>
                <div class="mb-4">
                    <label for="colFormLabelSm" class="form-label">Fecha de nacimiento</label>
                    <input class="form-control obj-enviar" name="dateofBirth">
                </div>
                <div class="mb-4">
                    <label for="colFormLabelSm" class="form-label">Preferencia de envío</label>
                    <select class="form-select obj-enviar" name="shippingPreference" aria-label="Default select example">
                        <option value="Entregar en la puerta">Entregar en la puerta</option>
                        <option value="Recoger en la oficina postal">Recoger en la oficina postal</option>
                        <option value="Dejar con un vecino">Dejar con un vecino</option>
                    </select>
                </div>
                <div class="mb-4">
                    <label for="colFormLabelSm" class="form-label">Si deseas que tu paquete lo reciba otra persona, por favor escribe su información de contacto</label>
                    <input class="form-control obj-enviar" name="contactInformation">
                </div>
                <form id="myForm"  method="POST" action="{{ route('clientes.guardar') }}" style="display-flex: column">

                @csrf
                @method('POST')
                    <input type="hidden" id="formData" name="formData">

                    <div class="mb-4">
                        <label for="colFormLabelSm" class="form-label">Ciudad</label>
                        <input class="form-control" name="ciudad">
                    </div>
                    <div class="mb-4">
                        <label for="colFormLabelSm" class="form-label">Dirección</label>
                        <input class="form-control" name="direccion">
                    </div>
                    <div class="mb-4">
                        <label for="colFormLabelSm" class="form-label">Zipcode</label>
                        <input class="form-control" name="zipCode">
                    </div>

                    <br>
                    <div class="centrar">
                        <button style="background-color: #3c75d7; color: #FFFFFF" type="submit" class="btn" onclick="transformSelectedInputs()">CREAR CUENTA</button>
                    </div>
                </form>
            </div>
        </div>
        </div>
    </div>

            <div class="offcanvas offcanvas-end" tabindex="-1" id="cestaCompra" aria-labelledby="cestaCompraLabel">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="cestaCompraLabel">Carrito de Compras</h5>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
            <div class="fondo-linea">
                <div id="pedidos">
                    <div class="tarjetaProducto fondo-blanco mb-2" id="div1">
                        <div class="productoO" id="nombreProductoO"> Producto 1</div>
                        <div class="imagenProductoO" id="imagen">
                            <img src="" width="60" height="60" alt="">
                        </div>
                        <div class="div3 cestaDescripcion" id="cantPrecioProducto">2 x Lps. 10.00</div>
                        <div class="subtotal">Subtotal</div>
                        <div class="div5 cestaDescripcion" id="subtotalPrecioO">Lps. 20.00</div>
                        <div class="icono" id="ePed1" onclick="eliminarPedido(1);"><i class="fa-regular fa-trash-can"></i></div>
                    </div>
                    <div class="tarjetaProducto fondo-blanco mb-2" id="div2">
                        <div class="productoO" id="nombreProductoO"> Producto 2</div>
                        <div class="imagenProductoO" id="imagen">
                            <img src="" width="60" height="60" alt="">
                        </div>
                        <div class="div3 cestaDescripcion" id="cantPrecioProducto">2 x Lps. 10.00</div>
                        <div class="subtotal">Subtotal</div>
                        <div class="div5 cestaDescripcion" id="subtotalPrecioO">Lps. 20.00</div>
                        <div class="icono" id="ePed1" onclick="eliminarPedido(2);"><i class="fa-regular fa-trash-can"></i></div>
                    </div>
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
                        <button type="button" class="btn btn-danger texto-general boton" data-bs-dismiss="offcanvas"
                            onclick="">Continuar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    </body>
</html>