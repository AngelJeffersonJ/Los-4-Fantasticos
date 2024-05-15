@extends('layouts.app')

@section('content')
    <h1>Detalles del Producto</h1>
    <p><strong>ID:</strong> {{ $producto->id }}</p>
    <p><strong>Nombre:</strong> {{ $producto->nombre }}</p>
    <p><strong>Descripción:</strong> {{ $producto->descripcion }}</p>
    <p><strong>Precio Unitario:</strong> {{ $producto->precio_unitario }}</p>
    <p><strong>Stock:</strong> {{ $producto->stock }}</p>
    <a href="{{ route('productos.edit', $producto->id) }}" class="btn btn-primary">Editar</a>
    <form action="{{ route('productos.destroy', $producto->id) }}" method="POST" style="display: inline;">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger">Eliminar</button>
    </form>
@endsection
