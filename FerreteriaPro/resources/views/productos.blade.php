<!-- resources/views/productos.blade.php -->
@extends('layouts.app')

@section('content')
    <h1>Administración de Productos</h1>

    <!-- Mostrar mensajes de éxito o error -->
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <!-- Mostrar formulario para crear un nuevo producto -->
    <h2>Crear Producto</h2>
    <form action="{{ route('productos.store') }}" method="post">
        @csrf
        <div>
            <label for="nombre">Nombre:</label>
            <input type="text" name="nombre" required>
        </div>
        <div>
            <label for="descripcion">Descripción:</label>
            <textarea name="descripcion"></textarea>
        </div>
        <div>
            <label for="precio_unitario">Precio Unitario:</label>
            <input type="number" name="precio_unitario" step="0.01" required>
        </div>
        <div>
            <label for="stock">Stock:</label>
            <input type="number" name="stock" required>
        </div>
        <div>
            <label for="id_categoria">Categoría:</label>
            <select name="id_categoria" required>
                @foreach ($categorias as $categoria)
                    <option value="{{ $categoria->id }}">{{ $categoria->nombre }}</option>
                @endforeach
            </select>
        </div>
        <div>
            <label for="id_proveedor">Proveedor:</label>
            <select name="id_proveedor" required>
                @foreach ($proveedores as $proveedor)
                    <option value="{{ $proveedor->id }}">{{ $proveedor->nombre }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit">Guardar</button>
    </form>

    <!-- Mostrar lista de productos -->
    <h2>Listado de Productos</h2>
    <ul>
        @forelse ($productos as $producto)
            <li>
                <strong>ID: {{ $producto->id }}</strong>
                <p>Nombre: {{ $producto->nombre }}</p>
                <p>Descripción: {{ $producto->descripcion }}</p>
                <p>Precio Unitario: ${{ $producto->precio_unitario }}</p>
                <p>Stock: {{ $producto->stock }}</p>
                <p>Categoría: {{ $producto->categoria->nombre }}</p>
                <p>Proveedor: {{ $producto->proveedor->nombre }}</p>
                <!-- Enlaces para editar y eliminar -->
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
@endsection
