@extends('layouts.app')

@section('content')
    <h1>Eliminar Producto</h1>
    <p><strong>ID:</strong> {{ $producto->id }}</p>
    <p><strong>Nombre:</strong> {{ $producto->nombre }}</p>
    <p><strong>Descripción:</strong> {{ $producto->descripcion }}</p>
    <p><strong>Precio Unitario:</strong> {{ $producto->precio_unitario }}</p>
    <p><strong>Stock:</strong> {{ $producto->stock }}</p>
    <form action="{{ route('productos.destroy', $producto->id) }}" method="POST">
        @csrf
        @method('DELETE')
        <p>¿Estás seguro de que quieres eliminar este producto?</p>
        <button type="submit" class="btn btn-danger">Eliminar</button>
    </form>
@endsection
