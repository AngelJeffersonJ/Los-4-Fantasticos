@extends('layouts.app')

@section('content')
    <h1>Eliminar Inventario</h1>
    <p>¿Estás seguro de que deseas eliminar este inventario?</p>
    <form action="{{ route('inventarios.destroy', $inventario->id) }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger">Eliminar</button>
    </form>
@endsection