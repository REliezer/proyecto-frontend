<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Landing Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    <link rel="stylesheet" href="{{ asset('css/categorias.css') }}">
    <script src="https://kit.fontawesome.com/444ab6c87d.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</head>

<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">SoftBytes</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">                
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Buscar" aria-label="Buscar" aria-describedby="button-addon2">
                    <button class="btn btn-outline-light" type="button" id="button-addon2">
                        <i class="fa-solid fa-magnifying-glass fa-sm" style="color: #ffffff;"></i>
                    </button>
                </div>
                <ul class="navbar-nav me-auto mb-2 mb-lg-0" style="margin-left: 15px;">                    
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Categorias
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Categoria 1</a></li>
                            <li><a class="dropdown-item" href="#">Categoria 2</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="#">Categoria 3</a></li>
                        </ul>
                    </li>
                </ul>
                <!--
                <form class="d-flex" role="search">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
                -->
                <div style="margin: 15px;">
                    <i class="fa-solid fa-cart-shopping" style="color: white;"></i>
                </div>
            </div>
        </div>
    </nav>
    <div class="contenedor">
        <div class="contenido">
            <div class="card" style="width: 12rem; height: 12rem;">
                <div class="imagen-categoria">
                    <img src="..." class="card-img-top" alt="...">
                </div>
                <div class="card-body">
                    <a href="#" class="btn btn-primary">Categoria 1</a>
                </div>
            </div>
            <div class="card" style="width: 12rem; height: 12rem;">
                <div class="imagen-categoria">
                    <img src="..." class="card-img-top" alt="...">
                </div>
                <div class="card-body">
                    <a href="#" class="btn btn-primary">Categoria 1</a>
                </div>
            </div>
            <div class="card" style="width: 12rem; height: 12rem;">
                <div class="imagen-categoria">
                    <img src="..." class="card-img-top" alt="...">
                </div>
                <div class="card-body">
                    <a href="#" class="btn btn-primary">Categoria 1</a>
                </div>
            </div>
            <div class="card" style="width: 12rem; height: 12rem;">
                <div class="imagen-categoria">
                    <img src="..." class="card-img-top" alt="...">
                </div>
                <div class="card-body">
                    <a href="#" class="btn btn-primary">Categoria 1</a>
                </div>
            </div>
            <div class="card" style="width: 12rem; height: 12rem;">
                <div class="imagen-categoria">
                    <img src="..." class="card-img-top" alt="...">
                </div>
                <div class="card-body">
                    <a href="#" class="btn btn-primary">Categoria 1</a>
                </div>
            </div>
        </div>
    </div>



</body>

</html>