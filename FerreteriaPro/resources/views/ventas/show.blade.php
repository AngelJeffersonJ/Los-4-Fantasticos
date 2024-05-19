@extends('layouts.app')

@section('content')
    <h1>Detalles de Venta</h1>
    <p><strong>ID:</strong> {{ $venta->id }}</p>
    <p><strong>Fecha:</strong> {{ $venta->fecha }}</p>
    <p><strong>Cliente:</strong> {{ $venta->cliente->nombre }}</p>
    <a href="{{ route('ventas.index') }}" class="btn btn-primary">Volver</a>
@endsection