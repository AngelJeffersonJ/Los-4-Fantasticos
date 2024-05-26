@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2 class="text-center mb-4"><i class="fas fa-box"></i> Productos de {{ $category->nombre }}</h2>
    <div class="row">
        @foreach($products as $producto)
            <div class="col-md-4">
                <div class="card mb-4">
                    <img src="https://via.placeholder.com/300" class="card-img-top" alt="{{ $producto->nombre }}">
                    <div class="card-body">
                        <h5 class="card-title">{{ $producto->nombre }}</h5>
                        <p class="card-text">{{ $producto->descripcion }}</p>
                        <p class="card-text"><strong>Precio:</strong> {{ $producto->precio_unitario }} €</p>
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
</div>
@endsection
