@extends('layouts.app')

@section('title', 'Lista de Categorías')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">{{ __('Lista de Categorías') }}</div>

                <div class="card-body">
                    <a href="{{ route('categorias.create') }}" class="btn btn-primary mb-3">Crear Categoría</a>

                    @if ($categorias->isEmpty())
                        <div class="alert alert-warning">No hay categorías disponibles.</div>
                    @else
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nombre</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($categorias as $categoria)
                                    <tr>
                                        <td>{{ $categoria->id }}</td>
                                        <td>{{ $categoria->nombre }}</td>
                                        <td>
                                            <a href="{{ route('categorias.show', $categoria->id) }}" class="btn btn-info btn-sm">Ver</a>
                                            <a href="{{ route('categorias.edit', $categoria->id) }}" class="btn btn-warning btn-sm">Editar</a>
                                            <form action="{{ route('categorias.destroy', $categoria->id) }}" method="POST" style="display: inline-block;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de que deseas eliminar esta categoría?')">Eliminar</button>
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
