@extends('layouts.app')

@section('content')
    <h1>Lista de Detalles de Venta</h1>
    <a href="{{ route('venta_detalles.create') }}" class="btn btn-primary mb-3">Crear Detalle de Venta</a>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>ID Venta</th>
                <th>ID Producto</th>
                <th>Cantidad</th>
                <th>Precio Unitario</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($ventaDetalles as $ventaDetalle)
                <tr>
                    <td>{{ $ventaDetalle->id }}</td>
                    <td>{{ $ventaDetalle->id_venta }}</td>
                    <td>{{ $ventaDetalle->id_producto }}</td>
                    <td>{{ $ventaDetalle->cantidad }}</td>
                    <td>{{ $ventaDetalle->precio_unitario }}</td>
                    <td>
                        <a href="{{ route('venta_detalles.show', $ventaDetalle->id) }}" class="btn btn-info">Ver</a>
                        <a href="{{ route('venta_detalles.edit', $ventaDetalle->id) }}" class="btn btn-primary">Editar</a>
                        <form action="{{ route('venta_detalles.destroy', $ventaDetalle->id) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('¿Estás seguro de eliminar este detalle de venta?')">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection