@extends('layouts.app')

@section('content')
    <h1>Crear Detalle de Venta</h1>
    <form action="{{ route('venta_detalles.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="id_venta" class="form-label">ID Venta</label>
            <select class="form-control" id="id_venta" name="id_venta">
                @foreach ($ventas as $venta)
                    <option value="{{ $venta->id }}">{{ $venta->id }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="id_producto" class="form-label">ID Producto</label>
            <select class="form-control" id="id_producto" name="id_producto">
                @foreach ($productos as $producto)
                    <option value="{{ $producto->id }}">{{ $producto->id }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="cantidad" class="form-label">Cantidad</label>
            <input type="number" class="form-control" id="cantidad" name="cantidad">
        </div>
        <div class="mb-3">
            <label for="precio_unitario" class="form-label">Precio Unitario</label>
            <input type="text" class="form-control" id="precio_unitario" name="precio_unitario">
        </div>
        <button type="submit" class="btn btn-success">Crear Detalle de Venta</button>
    </form>
@endsection