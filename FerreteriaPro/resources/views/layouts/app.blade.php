<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tu Aplicación</title>
    <!-- Agrega tus estilos CSS aquí -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style>
        body {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            background-color: #f8f9fa;
            font-family: 'Arial', sans-serif;
            margin: 0;
        }

        header {
            background-color: #007bff;
            color: #fff;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            padding: 10px 0;
        }

        .navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }

        .navbar-brand {
            font-size: 1.5rem;
            color: #fff;
            text-decoration: none;
        }

        .navbar-nav {
            list-style: none;
            display: flex;
            padding: 0;
            margin: 0;
        }

        .nav-item {
            margin-left: 20px;
        }

        .nav-link {
            color: #fff;
            text-decoration: none;
            font-size: 1rem;
            transition: color 0.3s;
        }

        .nav-link:hover {
            color: #d1e9ff;
        }

        .container {
            max-width: 900px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }

        main {
            flex: 1;
            padding: 20px 0;
        }

        footer {
            background-color: #343a40;
            color: #fff;
            padding: 20px 0;
            text-align: center;
            border-top: 1px solid #e9ecef;
            margin-top: auto;
        }

        .footer p {
            margin: 0;
            color: #ddd;
        }

        .btn-primary {
            background-color: #007bff;
            border: none;
            padding: 10px 20px;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        .btn-primary:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <header>
        <nav class="navbar">
            <a class="navbar-brand" href="#">Tu Aplicación</a>
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="#">Inicio</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Sobre nosotros</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Servicios</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Contacto</a>
                </li>
            </ul>
        </nav>
    </header>

    <main class="container">
        @yield('content')
    </main>

    <footer class="footer">
        <div class="container">
            <p>&copy; {{ date('Y') }} Tu Aplicación. Todos los derechos reservados.</p>
        </div>
    </footer>

    <!-- Agrega tus scripts JavaScript aquí -->
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
