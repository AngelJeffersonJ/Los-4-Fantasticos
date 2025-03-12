@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <h1 class="mb-4">Detalles del Proveedor</h1>

        <div class="card shadow-sm p-4 mb-4">
            <h4>Información del Proveedor</h4>
            <p><strong>Nombre:</strong> {{ $proveedor->nombre }}</p>
            <p><strong>Dirección:</strong> {{ $proveedor->direccion }}</p>
            <p><strong>Teléfono:</strong> {{ $proveedor->telefono }}</p>
            <p><strong>Precio Actual:</strong> ${{ number_format($proveedor->precio, 2) }}</p>
            <p><strong>Tiempo de Entrega:</strong> {{ $proveedor->tiempo_entrega }} días</p>
        </div>

        {{-- Historial de Precios --}}
        <div class="card shadow-sm p-4">
            <h4>📜 Historial de Cambios de Precio</h4>

            @if ($historial->isEmpty())
                <p class="alert alert-info">No hay cambios de precio registrados.</p>
            @else
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Fecha de Cambio</th>
                            <th>Precio Anterior</th>
                            <th>Precio Nuevo</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($historial as $registro)
                            <tr>
                                <td>{{ $registro->fecha_cambio }}</td>
                                <td>${{ number_format($registro->precio_anterior, 2) }}</td>
                                <td>${{ number_format($registro->precio_nuevo, 2) }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        </div>

        <a href="{{ route('proveedores.index') }}" class="btn btn-secondary mt-3">Volver</a>
    </div>
@endsection
