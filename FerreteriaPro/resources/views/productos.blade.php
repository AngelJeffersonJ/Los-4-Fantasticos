<!-- resources/views/productos.blade.php -->
@extends('layouts.app')

@section('content')
    <h1>Administración de Productos</h1>

    <h2>Listado de Productos</h2>
    <a href="{{ route('productos.create') }}">Crear Producto</a>
    <ul>
        @forelse ($productos as $producto)
            <li>
                <strong>ID: {{ $producto->id }}</strong>
                <p>Nombre: {{ $producto->nombre }}</p>
                <p>Descripción: {{ $producto->descripcion }}</p>
                <p>Precio Unitario: {{ $producto->precio_unitario }}</p>
                <p>Stock: {{ $producto->stock }}</p>
                <p>Categoría: {{ $producto->categoria->nombre }}</p>
                <p>Proveedor: {{ $producto->proveedor->nombre }}</p>
                <a href="{{ route('productos.edit', $producto->id) }}">Editar</a>
                <form action="{{ route('productos.destroy', $producto->id) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Eliminar</button>
                </form>
            </li>
        @empty
            <p>No hay productos registrados.</p>
        @endforelse
    </ul>

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
        <label for="id_categoria">Categoría:</label>
        <select name="id_categoria">
            @foreach ($categorias as $categoria)
                <option value="{{ $categoria->id }}">{{ $categoria->nombre }}</option>
            @endforeach
        </select>
        <label for="id_proveedor">Proveedor:</label>
        <select name="id_proveedor">
            @foreach ($proveedores as $proveedor)
                <option value="{{ $proveedor->id }}">{{ $proveedor->nombre }}</option>
            @endforeach
        </select>
        <button type="submit">Guardar</button>
    </form>
@endsection
