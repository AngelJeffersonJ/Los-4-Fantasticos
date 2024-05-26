@extends('layouts.app')

@section('content')
<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img class="d-block w-100" src="https://via.placeholder.com/1200x400" alt="First slide">
            <div class="carousel-caption d-none d-md-block">
                <h5>Bienvenido a FerreteriaPro</h5>
                <p>Los mejores productos a los mejores precios</p>
            </div>
        </div>
        <div class="carousel-item">
            <img class="d-block w-100" src="https://via.placeholder.com/1200x400" alt="Second slide">
            <div class="carousel-caption d-none d-md-block">
                <h5>Calidad garantizada</h5>
                <p>Encuentra todo lo que necesitas para tus proyectos</p>
            </div>
        </div>
        <div class="carousel-item">
            <img class="d-block w-100" src="https://via.placeholder.com/1200x400" alt="Third slide">
            <div class="carousel-caption d-none d-md-block">
                <h5>Ofertas especiales</h5>
                <p>Descuentos en productos seleccionados</p>
            </div>
        </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Anterior</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Siguiente</span>
    </a>
</div>

<div class="container mt-4">
    @if(Auth::check() && Auth::user()->role->name == 'admin')
        <div class="admin-links">
            <h2>Admin Links</h2>
            <ul>
                <li><a href="{{ route('productos.index') }}">Productos</a></li>
                <li><a href="{{ route('categorias.index') }}">Categorías</a></li>
                <li><a href="{{ route('ventas.index') }}">Ventas</a></li>
                <li><a href="{{ route('venta_detalles.index') }}">Ventas Detalle</a></li>
                <li><a href="{{ route('proveedores.index') }}">Proveedores</a></li>
                <li><a href="{{ route('inventarios.index') }}">Inventarios</a></li>
                <li><a href="{{ route('clientes.index') }}">Clientes</a></li>
            </ul>
        </div>
    @endif
    <section class="featured-section">
        <h2>Productos Destacados</h2>
        <div class="row">
            @foreach($productos as $producto)
                <div class="col-md-4">
                    <div class="card mb-4">
                        <img src="https://via.placeholder.com/300" class="card-img-top" alt="{{ $producto->nombre }}">
                        <div class="card-body">
                            <h5 class="card-title">{{ $producto->nombre }}</h5>
                            <p class="card-text">{{ $producto->descripcion }}</p>
                            <p class="card-text"><strong>Precio:</strong> {{ $producto->precio_unitario }} €</p>
                            <p class="card-text"><strong>Categoría:</strong> {{ $producto->categoria_nombre }}</p>
                            <p class="card-text"><strong>Proveedor:</strong> {{ $producto->proveedor_nombre }}</p>
                            <p class="card-text"><strong>Stock:</strong> {{ $producto->stock ?? 'No disponible' }}</p>
                            <form action="{{ route('catalogo.agregar', $producto->id) }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-primary btn-block">Agregar al Carrito</button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </section>

    <section class="category-section">
        <h2>Categorías</h2>
        <div class="row">
            <!-- Aquí puedes agregar las categorías manualmente o dinámicamente -->
            <div class="col-md-4">
                <div class="card category-card">
                    <img src="https://via.placeholder.com/300" class="card-img-top" alt="Categoría 1">
                    <div class="card-body">
                        <h5 class="card-title">Categoría 1</h5>
                        <a href="#" class="btn btn-primary btn-block">Ver Productos</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card category-card">
                    <img src="https://via.placeholder.com/300" class="card-img-top" alt="Categoría 2">
                    <div class="card-body">
                        <h5 class="card-title">Categoría 2</h5>
                        <a href="#" class="btn btn-primary btn-block">Ver Productos</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card category-card">
                    <img src="https://via.placeholder.com/300" class="card-img-top" alt="Categoría 3">
                    <div class="card-body">
                        <h5 class="card-title">Categoría 3</h5>
                        <a href="#" class="btn btn-primary btn-block">Ver Productos</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
