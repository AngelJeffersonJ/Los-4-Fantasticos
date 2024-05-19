@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">{{ __('Lista de Ventas') }}</div>

                <div class="card-body">
                    <a href="{{ route('ventas.create') }}" class="btn btn-primary mb-3">Crear Venta</a>
                    @if($ventas->isEmpty())
                        <p>No hay ventas registradas.</p>
                    @else
                        <table class="table table-striped">
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
                                            <a href="{{ route('ventas.show', $venta->id) }}" class="btn btn-info btn-sm">Ver</a>
                                            <a href="{{ route('ventas.edit', $venta->id) }}" class="btn btn-warning btn-sm">Editar</a>
                                            <form action="{{ route('ventas.destroy', $venta->id) }}" method="POST" style="display: inline-block;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de que deseas eliminar esta venta?')">Eliminar</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
