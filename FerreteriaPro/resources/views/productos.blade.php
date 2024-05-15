@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Productos</h1>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <!-- Mostrar formulario para crear un nuevo producto -->
        <div class="card">
            <div class="card-header">
                Crear Producto
            </div>
            <div class="card-body">
                <form action="{{ route('productos.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="nombre">Nombre:</label>
                        <input type="text" class="form-control" id="nombre" name="nombre">
                    </div>
                    <div class="form-group">
                        <label for="descripcion">Descripción:</label>
                        <textarea class="form-control" id="descripcion" name="descripcion"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="precio_unitario">Precio Unitario:</label>
                        <input type="text" class="form-control" id="precio_unitario" name="precio_unitario">
                    </div>
                    <div class="form-group">
                        <label for="stock">Stock:</label>
                        <input type="text" class="form-control" id="stock" name="stock">
                    </div>
                    <div class="form-group">
                        <label for="id_categoria">Categoría:</label>
                        <input type="text" class="form-control" id="id_categoria" name="id_categoria">
                    </div>
                    <div class="form-group">
                        <label for="id_proveedor">Proveedor:</label>
                        <input type="text" class="form-control" id="id_proveedor" name="id_proveedor">
                    </div>
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </form>
            </div>
        </div>

        <!-- Mostrar lista de productos -->
        <div class="card mt-4">
            <div class="card-header">
                Lista de Productos
            </div>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
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
                        @foreach($productos as $producto)
                            <tr>
                                <td>{{ $producto->nombre }}</td>
                                <td>{{ $producto->descripcion }}</td>
                                <td>{{ $producto->precio_unitario }}</td>
                                <td>{{ $producto->stock }}</td>
                                <td>{{ $producto->categoria->nombre }}</td>
                                <td>{{ $producto->proveedor->nombre }}</td>
                                <td>
                                    <a href="{{ route('productos.show', $producto->id) }}" class="btn btn-info btn-sm">Ver</a>
                                    <a href="{{ route('productos.edit', $producto->id) }}" class="btn btn-primary btn-sm">Editar</a>
                                    <form action="{{ route('productos.destroy', $producto->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
