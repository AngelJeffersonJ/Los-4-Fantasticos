Vista combinada para Inventario: inventarios.blade.php

<!-- resources/views/inventarios.blade.php -->
@extends('layouts.app')

@section('content')
    <h1>Administración de Inventario</h1>

    <h2>Listado de Inventario</h2>
    <a href="{{ route('inventarios.create') }}">Crear Registro de Inventario</a>
    <ul>
        @forelse ($inventarios as $inventario)
            <li>
                <strong>ID: {{ $inventario->id }}</strong>
                <p>Producto ID: {{ $inventario->producto_id }}</p>
                <p>Cantidad: {{ $inventario->cantidad }}</p>
                <p>Tipo: {{ $inventario->tipo }}</p>
                <a href="{{ route('inventarios.edit', $inventario->id) }}">Editar</a>
                <form action="{{ route('inventarios.destroy', $inventario->id) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Eliminar</button>
                </form>
            </li>
        @empty
            <p>No hay registros de inventario.</p>
        @endforelse
    </ul>

    <h2>Crear Registro de Inventario</h2>
    <form action="{{ route('inventarios.store') }}" method="post">
        @csrf
        <label for="producto_id">Producto ID:</label>
        <input type="number" name="producto_id">
        <label for="cantidad">Cantidad:</label>
        <input type="number" name="cantidad">
        <label for="tipo">Tipo:</label>
        <select name="tipo">
            <option value="entrada">Entrada</option>
            <option value="salida">Salida</option>
        </select>
        <button type="submit">Guardar</button>
    </form>
@endsection