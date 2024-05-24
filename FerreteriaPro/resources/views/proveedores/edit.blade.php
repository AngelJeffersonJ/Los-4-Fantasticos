@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <h1 class="mb-4">Editar Proveedor</h1>
        <form action="{{ route('proveedores.update', $proveedor->id) }}" method="POST" class="bg-light p-4 shadow-sm rounded">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre</label>
                <input type="text" class="form-control" id="nombre" name="nombre" value="{{ $proveedor->nombre }}" required>
            </div>
            <div class="mb-3">
                <label for="direccion" class="form-label">Dirección</label>
                <input type="text" class="form-control" id="direccion" name="direccion" value="{{ $proveedor->direccion }}" required>
            </div>
            <div class="mb-3">
                <label for="telefono" class="form-label">Teléfono</label>
                <input type="text" class="form-control" id="telefono" name="telefono" value="{{ $proveedor->telefono }}" required>
            </div>
            <button type="submit" class="btn btn-primary">Actualizar</button>
            <a href="{{ route('proveedores.index') }}" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
@endsection
