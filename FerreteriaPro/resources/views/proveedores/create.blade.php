@extends('layouts.app')

@section('content')
    <h1>Crear Proveedor</h1>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ route('proveedores.store') }}" method="POST">
        @csrf
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" id="nombre">
        <label for="direccion">Dirección:</label>
        <input type="text" name="direccion" id="direccion">
        <label for="telefono">Teléfono:</label>
        <input type="text" name="telefono" id="telefono">
        <button type="submit">Guardar</button>
    </form>
@endsection
