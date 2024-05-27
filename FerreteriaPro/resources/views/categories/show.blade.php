@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2 class="text-center mb-4"><i class="fas fa-box"></i> Productos de {{ $category->nombre }}</h2>
    <div class="row">
        @php
            $categoryImages = ['categoria1.jpg', 'categoria2.jpg', 'categoria3.jpg', 'categoria4.jpg', 'categoria5.jpg', 'categoria6.jpg'];
        @endphp
        @foreach($products as $index => $producto)
            <div class="col-md-4">
                <div class="card mb-4 shadow-sm">
                    <img src="{{ asset('images/' . $categoryImages[$index % count($categoryImages)]) }}" class="card-img-top" alt="{{ $producto->nombre }}">
                    <div class="card-body">
                        <h5 class="card-title">{{ $producto->nombre }}</h5>
                        <p class="card-text">{{ $producto->descripcion }}</p>
                        <p class="card-text"><strong>Precio:</strong> {{ $producto->precio_unitario }} €</p>
                        <p class="card-text"><strong>Proveedor:</strong> {{ $producto->proveedor_nombre }}</p>
                        <p class="card-text"><strong>Stock:</strong> {{ $producto->stock ?? 'No disponible' }}</p>
                        <form action="{{ route('catalogo.agregar', $producto->id) }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-primary btn-block"><i class="fas fa-cart-plus"></i> Agregar al Carrito</button>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection

<style>
    body {
        background-color: #f0f2f5;
    }

    .card {
        transition: transform 0.2s ease-in-out;
        border-radius: 15px;
        overflow: hidden;
    }

    .card:hover {
        transform: scale(1.05);
        box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
    }

    .card-img-top {
        border-top-left-radius: 15px;
        border-top-right-radius: 15px;
    }

    .btn-primary {
        background-color: #007bff;
        border-color: #007bff;
        transition: background-color 0.2s ease-in-out, transform 0.2s ease-in-out;
    }

    .btn-primary:hover {
        background-color: #0056b3;
        border-color: #0056b3;
        transform: scale(1.05);
    }

    .container {
        padding-top: 20px;
    }

    .text-center {
        color: #343a40;
    }
</style>
