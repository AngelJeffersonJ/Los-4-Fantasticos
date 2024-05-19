@extends('layouts.app')

@section('content')
    <h1>Lista de Ventas</h1>
    <a href="{{ route('ventas.create') }}" class="btn btn-primary mb-3">Crear Venta</a>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Fecha</th>
                <th>Cliente</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($ventas as $venta)
                <tr>
                    <td>{{ $venta->id }}</td>
                    <td>{{ $venta->fecha }}</td>
                    <td>{{ $venta->cliente->nombre }}</td>
                    <td>
                        <a href="{{ route('ventas.show', $venta->id) }}" class="btn btn-info">Ver</a>
                        <a href="{{ route('ventas.edit', $venta->id) }}" class="btn btn-primary">Editar</a>
                        <form action="{{ route('ventas.destroy', $venta->id) }}" method="POST" style="display: inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection