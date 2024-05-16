@extends('layouts.app')

@section('content')
    <h1>Editar Proveedor</h1>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ route('proveedores.update', $proveedor->id) }}" method="POST">
        @csrf
        @method('PUT')
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" id="nombre" value="{{ $proveedor->nombre }}">
        <label for="direccion">Dirección:</label>
        <input type="text" name="direccion" id="direccion" value="{{ $proveedor->direccion }}">
        <label for="telefono">Teléfono:</label>
        <input type="text" name="telefono" id="telefono" value="{{ $proveedor->telefono }}">
        <button type="submit">Actualizar</button>
    </form>
@endsection
