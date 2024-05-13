<!-- resources/views/clientes.blade.php -->
@extends('layouts.app')

@section('content')
    <h1>Administración de Clientes</h1>

    <h2>Listado de Clientes</h2>
    <a href="{{ route('clientes.create') }}">Crear Cliente</a>
    <ul>
        @forelse ($clientes as $cliente)
            <li>
                <strong>ID: {{ $cliente->id }}</strong>
                <p>Nombre: {{ $cliente->nombre }}</p>
                <p>Dirección: {{ $cliente->direccion }}</p>
                <p>Teléfono: {{ $cliente->telefono }}</p>
                <a href="{{ route('clientes.edit', $cliente->id) }}">Editar</a>
                <form action="{{ route('clientes.destroy', $cliente->id) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Eliminar</button>
                </form>
            </li>
        @empty
            <p>No hay clientes registrados.</p>
        @endforelse
    </ul>

    <h2>Crear Cliente</h2>
    <form action="{{ route('clientes.store') }}" method="post">
        @csrf
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre">
        <label for="direccion">Dirección:</label>
        <input type="text" name="direccion">
        <label for="telefono">Teléfono:</label>
        <input type="text" name="telefono">
        <button type="submit">Guardar</button>
    </form>
@endsection
