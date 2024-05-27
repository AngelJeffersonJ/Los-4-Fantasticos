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
            <img class="d-block w-100" src="{{ asset('images/ferreteria1.jpg') }}" alt="First slide">
            <div class="carousel-caption d-none d-md-block">
                <h5>Bienvenido a FerreteriaPro</h5>
                <p>Los mejores productos a los mejores precios</p>
            </div>
        </div>
        <div class="carousel-item">
            <img class="d-block w-100" src="{{ asset('images/ferreteria2.jpg') }}" alt="Second slide">
            <div class="carousel-caption d-none d-md-block">
                <h5>Calidad garantizada</h5>
                <p>Encuentra todo lo que necesitas para tus proyectos</p>
            </div>
        </div>
        <div class="carousel-item">
            <img class="d-block w-100" src="{{ asset('images/ferreteria3.jpg') }}" alt="Third slide">
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
        <div class="admin-links mb-4">
            <h2 class="text-center"><i class="fas fa-tools"></i> Admin Links</h2>
            <ul class="text-center">
                <li><a href="{{ route('productos.index') }}" class="btn btn-outline-info">Productos</a></li>
                <li><a href="{{ route('categorias.index') }}" class="btn btn-outline-info">Categorías</a></li>
                <li><a href="{{ route('ventas.index') }}" class="btn btn-outline-info">Ventas</a></li>
                <li><a href="{{ route('venta_detalles.index') }}" class="btn btn-outline-info">Ventas Detalle</a></li>
                <li><a href="{{ route('proveedores.index') }}" class="btn btn-outline-info">Proveedores</a></li>
                <li><a href="{{ route('inventarios.index') }}" class="btn btn-outline-info">Inventarios</a></li>
                <li><a href="{{ route('clientes.index') }}" class="btn btn-outline-info">Clientes</a></li>
            </ul>
        </div>
    @endif
    <section class="featured-section">
        <h2 class="text-center mb-4"><i class="fas fa-star"></i> Productos Destacados</h2>
        <div class="row">
            @php
                $productImages = ['producto1.jpg', 'producto2.jpg', 'producto3.jpg', 'producto4.jpg', 'producto5.jpg', 'producto6.jpg'];
            @endphp
            @foreach($productos as $index => $producto)
                <div class="col-md-4">
                    <div class="card mb-4">
                        <img src="{{ asset('images/' . $productImages[$index % count($productImages)]) }}" class="card-img-top" alt="{{ $producto->nombre }}">
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
        <h2 class="text-center mb-4"><i class="fas fa-list"></i> Categorías</h2>
        <div class="row">
            @php
                $categoryImages = ['categoria1.jpg', 'categoria2.jpg', 'categoria3.jpg', 'categoria4.jpg', 'categoria5.jpg', 'categoria6.jpg'];
            @endphp
            @foreach($categories as $index => $category)
                <div class="col-md-4">
                    <div class="card category-card mb-4">
                        <img src="{{ asset('images/' . $categoryImages[$index % count($categoryImages)]) }}" class="card-img-top" alt="{{ $category->nombre }}">
                        <div class="card-body">
                            <h5 class="card-title">{{ $category->nombre }}</h5>
                            <a href="{{ route('categories.show', $category->id) }}" class="btn btn-primary btn-block">Ver Productos</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </section>
</div>
@endsection
