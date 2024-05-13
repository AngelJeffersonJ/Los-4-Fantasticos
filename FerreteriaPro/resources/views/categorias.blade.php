<!-- resources/views/categorias.blade.php -->
@extends('layouts.app')

@section('content')
    <h1>Administración de Categorías</h1>

    <h2>Listado de Categorías</h2>
    <a href="{{ route('categorias.create') }}">Crear Categoría</a>
    <ul>
        @forelse ($categorias as $categoria)
            <li>
                <strong>ID: {{ $categoria->id }}</strong>
                <p>Nombre: {{ $categoria->nombre }}</p>
                <a href="{{ route('categorias.edit', $categoria->id) }}">Editar</a>
                <form action="{{ route('categorias.destroy', $categoria->id) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Eliminar</button>
                </form>
            </li>
        @empty
            <p>No hay categorías registradas.</p>
        @endforelse
    </ul>

    <h2>Crear Categoría</h2>
    <form action="{{ route('categorias.store') }}" method="post">
        @csrf
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre">
        <button type="submit">Guardar</button>
    </form>
@endsection
