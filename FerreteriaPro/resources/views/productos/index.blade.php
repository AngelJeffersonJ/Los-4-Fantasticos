@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <h1 class="mb-4">📦 Lista de Productos</h1>

        {{-- Botón para agregar un nuevo producto --}}
        <a href="{{ route('productos.create') }}" class="btn btn-primary mb-3">Crear Producto</a>

        {{-- Buscador --}}
        <input type="text" id="search" class="form-control mb-3" placeholder="Buscar producto por cualquier campo...">

        @if ($productos->isEmpty())
            <p class="alert alert-warning">No hay productos registrados.</p>
        @else
            <div class="table-responsive">
                <table class="table table-striped" id="productosTable">
                    <thead class="thead-dark">
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
                                <td>${{ number_format($producto->precio_unitario, 2) }}</td>
                                <td>
                                    @if($producto->stock <= 5)
                                        <span class="badge badge-danger">{{ $producto->stock }} (Bajo)</span>
                                    @else
                                        <span class="badge badge-success">{{ $producto->stock }}</span>
                                    @endif
                                </td>
                                <td>{{ $producto->categoria->nombre ?? 'N/A' }}</td>
                                <td>{{ $producto->proveedor->nombre ?? 'N/A' }}</td>
                                <td>
                                    <a href="{{ route('productos.show', $producto->id) }}" class="btn btn-info btn-sm">Ver</a>
                                    <a href="{{ route('productos.edit', $producto->id) }}" class="btn btn-primary btn-sm">Editar</a>

                                    <form action="{{ route('productos.destroy', $producto->id) }}" method="POST" class="d-inline delete-form">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                                    </form>

                                    <a href="{{ route('proveedores.sugerir', ['producto_id' => $producto->id]) }}" class="btn btn-warning btn-sm">Sugerir Proveedor</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </div>

    {{-- Script para búsqueda y confirmación de eliminación --}}
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            document.getElementById("search").addEventListener("keyup", function() {
                let value = this.value.toLowerCase();
                let rows = document.querySelectorAll("#productosTable tbody tr");

                rows.forEach(row => {
                    let match = [...row.children].some(td => td.innerText.toLowerCase().includes(value));
                    row.style.display = match ? "" : "none";
                });
            });

            document.querySelectorAll('.delete-form').forEach(form => {
                form.addEventListener('submit', function(event) {
                    event.preventDefault();
                    if (confirm('¿Estás seguro de que deseas eliminar este producto?')) {
                        this.submit();
                    }
                });
            });
        });
    </script>
@endsection
