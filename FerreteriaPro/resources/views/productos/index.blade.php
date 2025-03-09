@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Lista de Productos</h1>

    <a href="{{ route('productos.create') }}" class="btn btn-primary mb-3">Crear Producto</a>

    @if($productos->isEmpty())
        <p class="alert alert-warning">No hay productos registrados.</p>
    @else
        <div class="table-responsive">
            <table class="table table-striped">
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
                    @foreach($productos as $producto)
                        @php
                            // Definir color del stock
                            if ($producto->stock < 10) {
                                $stockClass = 'badge-danger';
                                $stockText = 'Bajo';
                            } elseif ($producto->stock < 30) {
                                $stockClass = 'badge-warning';
                                $stockText = 'Medio';
                            } else {
                                $stockClass = 'badge-success';
                                $stockText = 'Alto';
                            }
                        @endphp
                        <tr>
                            <td>{{ $producto->id }}</td>
                            <td>{{ $producto->nombre }}</td>
                            <td>{{ $producto->descripcion }}</td>
                            <td>${{ number_format($producto->precio_unitario, 2) }}</td>
                            <td>
                                <span class="badge {{ $stockClass }}">{{ $producto->stock }} ({{ $stockText }})</span>
                            </td>
                            <td>{{ optional($producto->categoria)->nombre ?? 'Sin Categoría' }}</td>
                            <td>{{ optional($producto->proveedor)->nombre ?? 'Sin Proveedor' }}</td>
                            <td>
                                <a href="{{ route('productos.show', $producto->id) }}" class="btn btn-info btn-sm">Ver</a>
                                <a href="{{ route('productos.edit', $producto->id) }}" class="btn btn-primary btn-sm">Editar</a>

                                <form action="{{ route('productos.destroy', $producto->id) }}" method="POST" style="display: inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de eliminar este producto?')">Eliminar</button>
                                </form>

                                {{-- Botón para sugerencia de proveedor --}}
                                <button class="btn btn-warning btn-sm sugerir-proveedor-btn" data-id="{{ $producto->id }}">
                                    Sugerir Proveedor
                                </button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
</div>

{{-- Script para AJAX en la sugerencia de proveedor --}}
<script>
    document.querySelectorAll('.sugerir-proveedor-btn').forEach(button => {
        button.addEventListener('click', async function() {
            let productoId = this.dataset.id;

            try {
                let response = await fetch(`/productos/sugerir-proveedor/${productoId}`);

                if (!response.ok) {
                    throw new Error(`Error en la solicitud: ${response.status}`);
                }

                let data = await response.json();

                alert(`Proveedor sugerido para ${data.producto}:\n` +
                      `- ${data.proveedor_sugerido}\n` +
                      `- Precio: $${data.precio}\n` +
                      `- Tiempo de entrega: ${data.tiempo_entrega} días.`);
            } catch (error) {
                console.error('Error:', error);
                alert('No se pudo obtener la sugerencia del proveedor.');
            }
        });
    });
</script>
@endsection

@push('styles')
    <!-- Incluye los archivos CSS de Bootstrap -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

    <!-- CSS personalizado -->
    <style>
        body {
            background-color: #f8f9fa;
        }
        .container {
            margin-top: 50px;
        }
        .btn-sm {
            font-size: 0.8rem;
            padding: 0.25rem 0.5rem;
        }
    </style>
@endpush
