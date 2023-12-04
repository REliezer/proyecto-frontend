<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Productos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://kit.fontawesome.com/444ab6c87d.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{ asset('css/estilos-barra-navegacion.css') }}">
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    <link rel="stylesheet" href="{{ asset('css/categorias.css') }}">
    <link rel="stylesheet" href="{{ asset('css/carrito.css') }}">
    <link rel="stylesheet" href="{{ asset('css/productos-admin.css') }}">

    <script src="{{ asset('js/productos-admin.js') }}"></script>  
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

    <div class="centrar">
    <div class="p-4">
        <div class="card p-4" style="width: fit-content">
            <div class="card-body">
                        <form method="POST" action="{{ route('admin.guardar', [$idSubCategoria, $idCategoria]) }}">
                        @csrf
                        @method('POST')
                            <div class="centrar">
                            <div style="text-align: center">
                                <div class="titulo">
                                    <h3>Nuevo Producto</h3>
                                </div>
                            </div>
                            </div>
                            <br>
                            <div class="centrar mb-4">
                                <img id="imagenSubida" class="img-thumbnail" width="300px" height="250px" />
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="customFile">Imagen</label>
                                <input type="form-label" class="form-control" id="imagen" name="imagen" onchange="cargarImagen(event)" placeholder="URL de la imagen">
                            </div>
                            <div class="mb-3">
                                <label for="colFormLabelSm" class="form-label">Código de Serie</label>
                                <input class="form-control" name="codigoSerie">
                            </div>
                            <div class="mb-3">
                                <label for="colFormLabelSm" class="form-label">Nombre</label>
                                <input type="form-control" class="form-control" name="nombre">
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">Descripción</label>
                                <textarea type="form-control" class="form-control" name="descripcion"></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="colFormLabelSm" class="form-label">Precio por unidad</label>
                                <input type="form-control" class="form-control" name="precioUnidad">
                            </div>
                            <div class="mb-3">
                                <label for="colFormLabelSm" class="form-label" id="myDateInput">Fecha de publicación</label>
                                <input type="form-control" class="form-control" name="fechaPublicacion">
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">Reseñas</label>
                                <textarea type="form-control" class="form-control" name="resenas" rows="2" cols="60"></textarea>
                            </div>
                            <!--<div class="mb-4">
                                <label for="colFormLabelSm" class="form-label">Subcategoria</label>
                                <select class="form-select" aria-label="Default select example"  name="idSubCategoria">
                                    @foreach ($arr_body as $item)
                                    <option value="{{ $item->idSubCategory }}">{{ $item->description }}</option>
                                    @endforeach
                                </select>

                                https://t2.gstatic.com/licensed-image?q=tbn:ANd9GcQOO0X7mMnoYz-e9Zdc6Pe6Wz7Ow1DcvhEiaex5aSv6QJDoCtcooqA7UUbjrphvjlIc
                            </div>-->
                            <br>
                            <div class="centrar">
                                <button style="background-color: #3c75d7; color: #FFFFFF" type="submit" class="btn">CREAR PRODUCTO</button>
                            </div>
                        </form>
                
            </div>
        </div>
    </div>
    </div>
  
    <script src="{{ asset('js/main.js') }}"></script>
</body>
</html>