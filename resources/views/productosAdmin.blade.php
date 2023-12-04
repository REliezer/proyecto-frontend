<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
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
    <link rel="stylesheet" href="{{ asset('css/productos.css') }}">
    <link rel="stylesheet" href="{{ asset('css/productos-admin.css') }}">
</head>
<body>
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

    <div class="centrar titulo m-5">
        <h3>{{$productos}}</h3>
    </div>

    <div class="m-4">
        <a href="{{ route('admin.crear', [$idCategoria, $idSubCategoria, $productos]) }}" class="btn" style="background-color: #037BD4; color: #FFFFFF"><i class="fa-solid fa-plus"></i> Agregar Producto</a>
    </div>
    
    <div class="centrar menu">
        @foreach ($arr_body as $item)
        <div class="card producto" style="width: 15rem; height: 35rem;">
            <div class="centrar mb-4 m-4">
                    <img src="{{$item->picture}}" class="card-img-top" style="width: 300px; height: 300px;"/>
            </div>
            <div class="card-body centrar producto" style="text-align: center; height: 25rem;">
                <div class="mb-3">
                    <h5>{{$item->name}}</h5>
                </div>
                <div class="mb-3">{{$item->unityPrice}}</div>
                <div class="mb-3">
                </div>
            </div>
        </div>
        @endforeach
    </div>
    
</body>
</html>