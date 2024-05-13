@extends('layouts.app')

@section('content')
    <h1>Administración de Productos</h1>

    <!-- Formulario de Creación -->
    <h2>Crear Producto</h2>
    <form action="{{ route('productos.store') }}" method="post">
        @csrf
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre">
        <label for="descripcion">Descripción:</label>
        <textarea name="descripcion"></textarea>
        <label for="precio_unitario">Precio Unitario:</label>
        <input type="number" name="precio_unitario">
        <label for="stock">Stock:</label>
        <input type="number" name="stock">
        <label for="id_categoria">ID Categoría:</label>
        <input type="number" name="id_categoria">
        <label for="id_proveedor">ID Proveedor:</label>
        <input type="number" name="id_proveedor">
        <button type="submit">Guardar</button>
    </form>

    <!-- Listado de Productos -->
    <h2>Listado de Productos</h2>
    <ul>
        @foreach ($productos as $producto)
            <li>
                <strong>ID: {{ $producto->id }}</strong>
                <p>Nombre: {{ $producto->nombre }}</p>
                <p>Descripción: {{ $producto->descripcion }}</p>
                <p>Precio Unitario: {{ $producto->precio_unitario }}</p>
                <p>Stock: {{ $producto->stock }}</p>
                <p>ID Categoría: {{ $producto->id_categoria }}</p>
                <p>ID Proveedor: {{ $producto->id_proveedor }}</p>
                <a href="{{ route('productos.edit', $producto->id) }}">Editar</a>
                <form action="{{ route('productos.destroy', $producto->id) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Eliminar</button>
                </form>
            </li>
        @endforeach
    </ul>
@endsection