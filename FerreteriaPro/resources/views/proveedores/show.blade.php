@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <h1 class="mb-4">Detalles del Proveedor</h1>
        <div class="bg-light p-4 shadow-sm rounded">
            <p><strong>Nombre:</strong> {{ $proveedor->nombre }}</p>
            <p><strong>Dirección:</strong> {{ $proveedor->direccion }}</p>
            <p><strong>Teléfono:</strong> {{ $proveedor->telefono }}</p>
            <a href="{{ route('proveedores.index') }}" class="btn btn-secondary">Regresar</a>
        </div>
    </div>
@endsection
