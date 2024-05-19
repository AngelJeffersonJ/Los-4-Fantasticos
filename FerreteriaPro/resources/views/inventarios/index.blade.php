@extends('layouts.app')

@section('content')
    <h1>Inventarios</h1>
    <a href="{{ route('inventarios.create') }}" class="btn btn-primary mb-3">Crear Nuevo Inventario</a>

    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Producto</th>
                <th>Cantidad Disponible</th>
                <th>Cantidad Mínima</th>
                <th>Cantidad Máxima</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($inventarios as $inventario)
                <tr>
                    <td>{{ $inventario->id }}</td>
                    <td>{{ $inventario->producto->nombre }}</td>
                    <td>{{ $inventario->cantidad_disponible }}</td>
                    <td>{{ $inventario->cantidad_minima }}</td>
                    <td>{{ $inventario->cantidad_maxima }}</td>
                    <td>
                        <a href="{{ route('inventarios.show', $inventario->id) }}" class="btn btn-info">Ver</a>
                        <a href="{{ route('inventarios.edit', $inventario->id) }}" class="btn btn-warning">Editar</a>
                        <form action="{{ route('inventarios.destroy', $inventario->id) }}" method="POST" style="display: inline-block;">
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