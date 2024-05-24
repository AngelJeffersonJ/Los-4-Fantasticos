@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <h1 class="mb-4">Eliminar Proveedor</h1>
        <div class="bg-light p-4 shadow-sm rounded">
            <p>¿Estás seguro de que deseas eliminar este proveedor?</p>
            <p><strong>Nombre:</strong> {{ $proveedor->nombre }}</p>
            <p><strong>Dirección:</strong> {{ $proveedor->direccion }}</p>
            <p><strong>Teléfono:</strong> {{ $proveedor->telefono }}</p>
            <form action="{{ route('proveedores.destroy', $proveedor->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Eliminar</button>
                <a href="{{ route('proveedores.index') }}" class="btn btn-secondary">Cancelar</a>
            </form>
        </div>
    </div>
@endsection
