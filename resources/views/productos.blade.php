<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Producto Descripcion</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://kit.fontawesome.com/444ab6c87d.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{ asset('css/estilos-barra-navegacion.css') }}">
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    <link rel="stylesheet" href="{{ asset('css/subcategorias.css') }}">
    <link rel="stylesheet" href="{{ asset('css/productos.css') }}">
    <link rel="stylesheet" href="{{ asset('css/carrito.css') }}">
</head>

<body class="barra-navegacion">
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

    <div class="contenedor-principal">
        <div class="panel-izq">
            <div class="list-group">
                <a class="list-group-item list-group-item-action active" aria-current="true">SubCategorias
                </a>
                <a href="#" class="list-group-item list-group-item-action">Subcategoria 1</a>
                <a href="#" class="list-group-item list-group-item-action">Subcategoria 2</a>
                <a href="#" class="list-group-item list-group-item-action">Subcategoria 3</a>
                <a href="#" class="list-group-item list-group-item-action">Subcategoria 4</a>
            </div>
        </div>
        <div class="vr" style="margin: 25px 0"></div>
        <div class="contenedor-producto">
            <div class="titulo">
                <h2 class="text-start">Producto 1</h2>
            </div>
            <div class="producto-contenido">
                <div class="producto-imagen">
                    <img src="https://th-media.apjonlinecdn.com/catalog/product/cache/b3b166914d87ce343d4dc5ec5117b502/2/3/23c1_opp_maokong_27_shellwhite_t_nt_has_captaincrunchwireless_win11_coreset_front_camup_whitebg_intel.png" 
                    alt="...">
                    
                </div>
                <div class="producto-descripcion">
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Praesentium, id!</p>
                    <br>
                    <div class="mb-3 row">
                        <label for="staticPrecio" class="col-sm-2 col-form-label">Precio</label>
                        <div class="col-sm-10">
                            <input type="text" readonly class="form-control-plaintext" id="staticPrecio" value="Lps. 00.00">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="staticResena" class="col-sm-2 col-form-label">Reseñas</label>
                        <div class="col-sm-10">
                            <input type="text" readonly class="form-control-plaintext" id="staticResena" value="Lorem ipsum dolor sit amet consectetur adipisicing elit. Natus, ab!">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="panel-der">

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

    <script src="{{ asset('js/main.js') }}"></script>
</body>

</html>