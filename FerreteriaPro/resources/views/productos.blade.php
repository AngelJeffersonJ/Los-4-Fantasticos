@extends('layouts.app')

@section('content')
    <h1>Administración de Productos</h1>

    <!-- Botón para crear nuevo producto -->
    <a href="{{ route('productos.create') }}" class="btn btn-primary">Crear Producto</a>

    <!-- Tabla para mostrar listado de productos -->
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Descripción</th>
                <th>Precio Unitario</th>
                <th>Stock</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($productos as $producto)
            <tr>
                <td>{{ $producto->id }}</td>
                <td>{{ $producto->nombre }}</td>
                <td>{{ $producto->descripcion }}</td>
                <td>{{ $producto->precio_unitario }}</td>
                <td>{{ $producto->stock }}</td>
                <td>
                    <!-- Enlaces para ver, editar y eliminar producto -->
                    <a href="{{ route('productos.show', $producto->id) }}" class="btn btn-info">Ver</a>
                    <a href="{{ route('productos.edit', $producto->id) }}" class="btn btn-primary">Editar</a>
                    <form action="{{ route('productos.destroy', $producto->id) }}" method="POST" style="display: inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Eliminar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection
