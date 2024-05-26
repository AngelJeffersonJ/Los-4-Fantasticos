<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FerreteriaPro</title>
    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <!-- Animate CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    <style>
        .card {
            transition: transform 0.2s ease-in-out;
        }

        .card:hover {
            transform: scale(1.05);
        }

        .category-card img {
            transition: transform 0.2s ease-in-out;
        }

        .category-card img:hover {
            transform: scale(1.1);
        }

        .admin-links {
            margin-bottom: 20px;
        }

        .admin-links h2 {
            color: #17a2b8;
        }

        .admin-links ul {
            list-style: none;
            padding: 0;
        }

        .admin-links ul li {
            display: inline;
            margin-right: 10px;
        }

        .admin-links ul li a {
            color: #007bff;
            text-decoration: none;
        }

        .admin-links ul li a:hover {
            text-decoration: underline;
        }

        .carousel-item {
            height: 400px;
        }

        .carousel-item img {
            object-fit: cover;
            height: 100%;
        }

        footer {
            background-color: #343a40;
            color: white;
        }

        footer a {
            color: #ffc107;
        }

        footer a:hover {
            color: white;
            text-decoration: underline;
        }

        @media (max-width: 767px) {
            .navbar-nav {
                text-align: center;
            }

            .admin-links ul li {
                display: block;
                margin-bottom: 10px;
            }

            .carousel-item {
                height: 200px;
            }

            .category-card img {
                height: auto;
                width: 100%;
            }

            .card-img-top {
                height: auto;
                width: 100%;
            }
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="{{ url('/') }}">FerreteriaPro</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('catalogo.index') }}">Catálogo</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('catalogo.carrito') }}">Carrito</a>
                </li>
                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">Iniciar sesión</a>
                    </li>
                @else
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            {{ Auth::user()->name }}
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('user.perfil') }}">Perfil</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                Cerrar sesión
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
            </ul>
        </div>
    </nav>

    <div class="container mt-4">
        @yield('content')
    </div>

    <footer class="bg-dark text-white text-center text-lg-start mt-4">
        <div class="container p-4">
            <div class="row">
                <div class="col-lg-6 col-md-12 mb-4 mb-md-0">
                    <h5 class="text-uppercase"><i class="fas fa-tools"></i> FerreteriaPro</h5>
                    <p>Los mejores productos a los mejores precios para todos tus proyectos de construcción y remodelación.</p>
                </div>
                <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
                    <h5 class="text-uppercase"><i class="fas fa-link"></i> Enlaces útiles</h5>
                    <ul class="list-unstyled mb-0">
                        <li><a href="{{ route('catalogo.index') }}" class="text-white">Catálogo</a></li>
                        <li><a href="{{ route('catalogo.carrito') }}" class="text-white">Carrito</a></li>
                        <li><a href="{{ route('login') }}" class="text-white">Iniciar sesión</a></li>
                    </ul>
                </div>
                <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
                    <h5 class="text-uppercase"><i class="fas fa-envelope"></i> Contacto</h5>
                    <ul class="list-unstyled mb-0">
                        <li class="text-white">Teléfono: +1 234 567 890</li>
                        <li class="text-white">Email: info@ferreteriapro.com</li>
                        <li class="text-white">Dirección: Calle Falsa 123, Ciudad, País</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
            © 2023 FerreteriaPro - Todos los derechos reservados.
        </div>
    </footer>

    <!-- jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
