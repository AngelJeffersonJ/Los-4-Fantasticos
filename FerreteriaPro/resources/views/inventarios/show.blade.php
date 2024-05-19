@extends('layouts.app')

@section('content')
    <h1>Detalles del Inventario</h1>
    <p><strong>ID:</strong> {{ $inventario->id }}</p>
    <p><strong>Producto:</strong> {{ $inventario->producto->nombre }}</p>
    <p><strong>Cantidad Disponible:</strong> {{ $inventario->cantidad_disponible }}</p>
    <p><strong>Cantidad Mínima:</strong> {{ $inventario->cantidad_minima }}</p>
    <p><strong>Cantidad Máxima:</strong> {{ $inventario->cantidad_maxima }}</p>
    <a href="{{ route('inventarios.index') }}" class="btn btn-primary">Regresar</a>
@endsection