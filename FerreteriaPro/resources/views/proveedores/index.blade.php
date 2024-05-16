@extends('layouts.app')

@section('content')
    <h1>Listado de Proveedores</h1>
    @if ($proveedores->isEmpty())
        <p>No hay proveedores registrados.</p>
    @else
        <ul>
            @foreach ($proveedores as $proveedor)
                <li>{{ $proveedor->nombre }} - {{ $proveedor->direccion }} - {{ $proveedor->telefono }}</li>
            @endforeach
        </ul>
    @endif
@endsection
