@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Administración de Productos</h1>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <h2>Listado de Productos</h2>
        <a href="{{ route('productos.create') }}" class="btn btn-primary">Crear Producto</a>
        <table class="table mt-3">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Descripción</th>
                    <th>Precio Unitario</th>
                    <th>Stock</th>
                    <th>Categoría</th>
                    <th>Proveedor</th>
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
                        <td>{{ $producto->categoria->nombre }}</td>
                        <td>{{ $producto->proveedor->nombre }}</td>
                        <td>
                            <a href="{{ route('productos.show', $producto->id) }}" class="btn btn-info">Ver</a>
                            <a href="{{ route('productos.edit', $producto->id) }}" class="btn btn-primary">Editar</a>
                            <form action="{{ route('productos.destroy', $producto->id) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('¿Estás seguro de eliminar este producto?')">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection