<!-- resources/views/ventas.blade.php -->
@extends('layouts.app')

@section('content')
    <h1>Administración de Ventas</h1>

    <h2>Listado de Ventas</h2>
    <a href="{{ route('ventas.create') }}">Crear Venta</a>
    <ul>
        @forelse ($ventas as $venta)
            <li>
                <strong>ID: {{ $venta->id }}</strong>
                <p>Cliente: {{ $venta->cliente->nombre }}</p>
                <p>Total: {{ $venta->total }}</p>
                <a href="{{ route('ventas.edit', $venta->id) }}">Editar</a>
                <form action="{{ route('ventas.destroy', $venta->id) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Eliminar</button>
                </form>
            </li>
        @empty
            <p>No hay ventas registradas.</p>
        @endforelse
    </ul>

    <h2>Crear Venta</h2>
    <form action="{{ route('ventas.store') }}" method="post">
        @csrf
        <label for="cliente_id">Cliente:</label>
        <select name="cliente_id">
            @foreach ($clientes as $cliente)
                <option value="{{ $cliente->id }}">{{ $cliente->nombre }}</option>
            @endforeach
        </select>
        <label for="productos">Productos:</label>
        <div>
            @foreach ($productos as $producto)
                <label for="producto_{{ $producto->id }}">{{ $producto->nombre }}</label>
                <input type="number" name="productos[{{ $producto->id }}][cantidad]" placeholder="Cantidad">
                <input type="number" name="productos[{{ $producto->id }}][precio_unitario]" placeholder="Precio Unitario">
            @endforeach
        </div>
        <button type="submit">Guardar</button>
    </form>
@endsection