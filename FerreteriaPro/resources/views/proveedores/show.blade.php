@extends('layouts.app')

@section('content')
    <h1>Detalles del Proveedor</h1>
    <p><strong>Nombre:</strong> {{ $proveedor->nombre }}</p>
    <p><strong>Dirección:</strong> {{ $proveedor->direccion }}</p>
    <p><strong>Teléfono:</strong> {{ $proveedor->telefono }}</p>
@endsection
