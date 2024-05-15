@extends('layouts.app')

@section('content')
    <h1>Lista de Productos</h1>

    <a href="{{ route('productos.create') }}" class="btn btn-primary">Crear Producto</a>

    @if ($productos->isEmpty())
        <p>No hay productos registrados.</p>
    @else
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
    @endif
@endsection