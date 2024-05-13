<!-- resources/views/proveedores.blade.php -->
@extends('layouts.app')

@section('content')
    <h1>Administración de Proveedores</h1>

    <h2>Listado de Proveedores</h2>
    <a href="{{ route('proveedores.create') }}">Crear Proveedor</a>
    <ul>
        @forelse ($proveedores as $proveedor)
            <li>
                <strong>ID: {{ $proveedor->id }}</strong>
                <p>Nombre: {{ $proveedor->nombre }}</p>
                <p>Dirección: {{ $proveedor->direccion }}</p>
                <p>Teléfono: {{ $proveedor->telefono }}</p>
                <a href="{{ route('proveedores.edit', $proveedor->id) }}">Editar</a>
                <form action="{{ route('proveedores.destroy', $proveedor->id) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Eliminar</button>
                </form>
            </li>
        @empty
            <p>No hay proveedores registrados.</p>
        @endforelse
    </ul>

    <h2>Crear Proveedor</h2>
    <form action="{{ route('proveedores.store') }}" method="post">
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
