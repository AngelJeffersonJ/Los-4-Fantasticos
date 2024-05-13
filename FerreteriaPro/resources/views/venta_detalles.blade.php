<!-- resources/views/venta_detalles.blade.php -->
@extends('layouts.app')

@section('content')
    <h1>Administración de Detalles de Venta</h1>

    <h2>Listado de Detalles de Venta</h2>
    <a href="{{ route('venta_detalles.create') }}">Crear Detalle de Venta</a>
    <ul>
        @forelse ($detalles as $detalle)
            <li>
                <strong>ID: {{ $detalle->id }}</strong>
                <p>Venta ID: {{ $detalle->venta_id }}</p>
                <p>Producto ID: {{ $detalle->producto_id }}</p>
                <p>Cantidad: {{ $detalle->cantidad }}</p>
                <p>Precio Unitario: {{ $detalle->precio_unitario }}</p>
                <a href="{{ route('venta_detalles.edit', $detalle->id) }}">Editar</a>
                <form action="{{ route('venta_detalles.destroy', $detalle->id) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Eliminar</button>
                </form>
            </li>
        @empty
            <p>No hay detalles de venta registrados.</p>
        @endforelse
    </ul>

    <h2>Crear Detalle de Venta</h2>
    <form action="{{ route('venta_detalles.store') }}" method="post">
        @csrf
        <label for="venta_id">Venta ID:</label>
        <input type="number" name="venta_id">
        <label for="producto_id">Producto ID:</label>
        <input type="number" name="producto_id">
        <label for="cantidad">Cantidad:</label>
        <input type="number" name="cantidad">
        <label for="precio_unitario">Precio Unitario:</label>
        <input type="number" name="precio_unitario">
        <button type="submit">Guardar</button>
    </form>
@endsection