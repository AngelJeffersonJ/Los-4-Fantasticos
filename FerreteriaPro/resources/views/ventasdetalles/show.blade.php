@extends('layouts.app')

@section('content')
    <h1>Detalle de Venta</h1>
    <p><strong>ID:</strong> {{ $ventaDetalle->id }}</p>
    <p><strong>ID Venta:</strong> {{ $ventaDetalle->id_venta }}</p>
    <p><strong>ID Producto:</strong> {{ $ventaDetalle->id_producto }}</p>
    <p><strong>Cantidad:</strong> {{ $ventaDetalle->cantidad }}</p>
    <p><strong>Precio Unitario:</strong> {{ $ventaDetalle->precio_unitario }}</p>
    <a href="{{ route('venta_detalles.index') }}" class="btn btn-primary">Volver</a>
@endsection