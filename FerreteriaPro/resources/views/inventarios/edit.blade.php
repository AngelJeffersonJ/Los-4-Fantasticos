@extends('layouts.app')

@section('content')
    <h1>Editar Inventario</h1>
    <form action="{{ route('inventarios.update', $inventario->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="id_producto" class="form-label">Producto</label>
            <select class="form-select" id="id_producto" name="id_producto">
                @foreach ($productos as $producto)
                    <option value="{{ $producto->id }}" @if ($producto->id == $inventario->id_producto) selected @endif>{{ $producto->nombre }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="cantidad_disponible" class="form-label">Cantidad Disponible</label>
            <input type="number" class="form-control" id="cantidad_disponible" name="cantidad_disponible" value="{{ $inventario->cantidad_disponible }}">
        </div>
        <div class="mb-3">
            <label for="cantidad_minima" class="form-label">Cantidad Mínima</label>
            <input type="number" class="form-control" id="cantidad_minima" name="cantidad_minima" value="{{ $inventario->cantidad_minima }}">
        </div>
        <div class="mb-3">
            <label for="cantidad_maxima" class="form-label">Cantidad Máxima</label>
            <input type="number" class="form-control" id="cantidad_maxima" name="cantidad_maxima" value="{{ $inventario->cantidad_maxima }}">
        </div>
        <button type="submit" class="btn btn-primary">Guardar Cambios</button>
    </form>
@endsection