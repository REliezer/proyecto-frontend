<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Subcategorias</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://kit.fontawesome.com/444ab6c87d.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{ asset('css/estilos-barra-navegacion.css') }}">
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    <link rel="stylesheet" href="{{ asset('css/subcategorias.css') }}">
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
    <div class="contenedor-principal">
        <div class="panel-izq">
            <div class="list-group">
                <a class="list-group-item list-group-item-action active" aria-current="true">SubCategorias
                </a>
                @foreach ($subcategorias_body as $item)
                <a href="{{ route('subcategorias.productos',['nombreCategoria' => $nombreCategoria, 'nombreSubcategoria' => $item->description]) }}"
                    class="list-group-item list-group-item-action">
                    {{ $item->description }}
                </a>
                @endforeach
            </div>
        </div>
        <div class="vr" style="margin: 25px 0"></div>
        <div class="contenedor-producto">
            <div class="titulo">
                <h2 class="text-start">{{ $nombreCategoria }}</h2>
            </div>
            <div class="contenido">
                @forelse ($productosPaginados as $item)
                <div class="card border-primary shadow rounded">
                    <div style="text-align: center;">
                        <img src="{{ $item->picture}}" alt="imagen" class="card-img-top p-1" style="width: 85%;"
                        data-bs-toggle="modal" data-bs-target="#modalProducto" onclick="mostrarModal({{ $item->idProduct }})">
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">{{ $item->name}}</h5>
                        <span class="card-text d-inline-block text-truncate" style="max-width: 150px; max-height: 5em;">
                            {{ $item->description}}
                        </span>
                        <p class="card-text">Lps. {{ $item->unityPrice}}</p>
                    </div>
                    <div class="card-footer text-body-secondary">
                        <div class="row d-flex mb-3 row" style="justify-content: space-evenly">
                            <div class="col-4">
                                <button type="button" class="btn btn-outline-primary"
                                onclick="menos({{ $item->idProduct}});">
                                    <i class="fa-solid fa-circle-minus"></i>
                                </button>

                            </div>
                            <div class="col-4 m-0">
                                <input type="number" class="form-control" value="1"
                                    id="cantidadProducto{{ $item->idProduct}}">
                            </div>
                            <div class="col-4">
                                <button type="button" class="btn btn-outline-primary"
                                    onclick="mas({{ $item->idProduct}});">
                                    <i class="fa-solid fa-circle-plus"></i>
                                </button>
                            </div>
                        </div>
                        <div class="d-flex mb-2 mt-2" style="justify-content: center">
                            <a href="#" class="btn btn-primary" onclick="agregarCompra({{ $item->idProduct}});">
                                Añadir al carrito
                            </a>
                        </div>
                    </div>
                </div>
                @empty
                <div style="text-align: center;">
                    <img src="{{ asset('img/5203299.jpg') }}" alt="" style="width: 50%;">
                </div>
                @endforelse
                
            </div>
            <div class="d-flex justify-content-center">
                <ul class="pagination">
                    {{-- Anterior Page Link --}}
                    @if ($productosPaginados->onFirstPage())
                        <li class="page-item disabled" aria-disabled="true" aria-label="@lang('pagination.previous')">
                            <span class="page-link" aria-hidden="true">&lsaquo;</span>
                        </li>
                    @else
                        <li class="page-item">
                            <a class="page-link" href="{{ $productosPaginados->previousPageUrl() }}" rel="prev" aria-label="@lang('pagination.previous')">&lsaquo;</a>
                        </li>
                    @endif
            
                    {{-- Pagination Elements --}}
                    @foreach ($productosPaginados as $element)
                        {{-- "Three Dots" Separator --}}
                        @if (is_string($element))
                            <li class="page-item disabled" aria-disabled="true"><span class="page-link">{{ $element }}</span></li>
                        @endif
            
                        {{-- Array Of Links --}}
                        @if (is_array($element))
                            @foreach ($element as $page => $url)
                                @if ($page == $productosPaginados->currentPage())
                                    <li class="page-item active" aria-current="page"><span class="page-link">{{ $page }}</span></li>
                                @else
                                    <li class="page-item"><a class="page-link" href="{{ $url }}">{{ $page }}</a></li>
                                @endif
                            @endforeach
                        @endif
                    @endforeach
            
                    {{-- Siguiente Page Link --}}
                    @if ($productosPaginados->hasMorePages())
                        <li class="page-item">
                            <a class="page-link" href="{{ $productosPaginados->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')">&rsaquo;</a>
                        </li>
                    @else
                        <li class="page-item disabled" aria-disabled="true" aria-label="@lang('pagination.next')">
                            <span class="page-link" aria-hidden="true">&rsaquo;</span>
                        </li>
                    @endif
                </ul>
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

    <!-- Modal -->
    <div class="modal fade" id="modalProducto" tabindex="-1" aria-labelledby="modalProductoLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="modalProductoLabel">Producto Nombre</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body p-3" id="productoInformacion">
                    
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('js/main.js') }}"></script>
</body>

</html>