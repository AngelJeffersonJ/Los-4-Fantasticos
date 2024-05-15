@extends('layouts.app')

@section('content')
    <h1>Lista de Productos</h1>
    <a href="{{ route('productos.index') }}" class="btn btn-primary mb-3">Refrescar</a>
    <form action="{{ route('productos.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre</label>
            <input type="text" class="form-control" id="nombre" name="nombre">
        </div>
        <div class="mb-3">
            <label for="descripcion" class="form-label">Descripción</label>
            <textarea class="form-control" id="descripcion" name="descripcion"></textarea>
        </div>
        <div class="mb-3">
            <label for="precio_unitario" class="form-label">Precio Unitario</label>
            <input type="text" class="form-control" id="precio_unitario" name="precio_unitario">
        </div>
        <div class="mb-3">
            <label for="stock" class="form-label">Stock</label>
            <input type="number" class="form-control" id="stock" name="stock">
        </div>
        <div class="mb-3">
            <label for="id_categoria" class="form-label">Categoría</label>
            <select class="form-select" id="id_categoria" name="id_categoria">
                @foreach ($categorias as $categoria)
                    <option value="{{ $categoria->id }}">{{ $categoria->nombre }}</option>
                @endforeach
<<<<<<< HEAD
            </tbody>
        </table>
    @endif
@endsection
=======
            </select>
        </div>
        <div class="mb-3">
            <label for="id_proveedor" class="form-label">Proveedor</label>
            <select class="form-select" id="id_proveedor" name="id_proveedor">
                @foreach ($proveedores as $proveedor)
                    <option value="{{ $proveedor->id }}">{{ $proveedor->nombre }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-success">Crear Producto</button>
    </form>

    <h2>Lista de Productos</h2>
    <table class="table">
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
            @forelse ($productos as $producto)
                <tr>
                    <td>{{ $producto->id }}</td>
                    <td>{{ $producto->nombre }}</td>
                    <td>{{ $producto->descripcion }}</td>
                    <td>{{ $producto->precio_unitario }}</td>
                    <td>{{ $producto->stock }}</td>
                    <td>{{ $producto->categoria->nombre }}</td>
                    <td>{{ $producto->proveedor->nombre }}</td>
                    <td>
                        <form action="{{ route('productos.destroy', $producto->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="8">No hay productos registrados.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
@endsection
>>>>>>> 226be879cedf1eec9af39716c6b47fdd339612c1
