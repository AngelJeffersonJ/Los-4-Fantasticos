@extends('layouts.app')

@section('content')
    <h1>Eliminar Proveedor</h1>
    <p>¿Estás seguro de que deseas eliminar este proveedor?</p>
    <p><strong>Nombre:</strong> {{ $proveedor->nombre }}</p>
    <p><strong>Dirección:</strong> {{ $proveedor->direccion }}</p>
    <p><strong>Teléfono:</strong> {{ $proveedor->telefono }}</p>
    <form action="{{ route('proveedores.destroy', $proveedor->id) }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit">Eliminar</button>
    </form>
@endsection
