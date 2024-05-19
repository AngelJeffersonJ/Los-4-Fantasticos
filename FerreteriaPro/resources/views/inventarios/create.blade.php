@extends('layouts.app')

@section('content')
    <h1>Crear Nuevo Inventario</h1>
    <form action="{{ route('inventarios.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="id_producto" class="form-label">Producto</label>
            <select name="id_producto" id="id_producto" class="form-select">
                @foreach ($productos as $producto)
                    <option value="{{ $producto->id }}">{{ $producto->nombre }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="cantidad_disponible" class="form-label">Cantidad Disponible</label>
            <input type="number" class="form-control" id="cantidad_disponible" name="cantidad_disponible">
        </div>
        <div class="mb-3">
            <label for="cantidad_minima" class="form-label">Cantidad Mínima</label>
            <input type="number" class="form-control" id="cantidad_minima" name="cantidad_minima">
        </div>
        <div class="mb-3">
            <label for="cantidad_maxima" class="form-label">Cantidad Máxima</label>
            <input type="number" class="form-control" id="cantidad_maxima" name="cantidad_maxima">
        </div>
        <button type="submit" class="btn btn-primary">Crear Inventario</button>
    </form>
@endsection