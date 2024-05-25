@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <img src="https://via.placeholder.com/300" class="img-fluid" alt="{{ $producto->nombre }}">
        </div>
        <div class="col-md-6">
            <h2>{{ $producto->nombre }}</h2>
            <p>{{ $producto->descripcion }}</p>
            <p><strong>Precio:</strong> {{ $producto->precio_unitario }} €</p>
            <p><strong>Categoría:</strong> {{ $producto->categoria_nombre }}</p>
            <p><strong>Proveedor:</strong> {{ $producto->proveedor_nombre }}</p>
            <p class="card-text"><strong>Stock:</strong> {{ $producto->stock ?? 'No disponible' }}</p>
            <form action="{{ route('catalogo.agregar', $producto->id) }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-primary">Agregar al Carrito</button>
            </form>
        </div>
    </div>
</div>
@endsection
