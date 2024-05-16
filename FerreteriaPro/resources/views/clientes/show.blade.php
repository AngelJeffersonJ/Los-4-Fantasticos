@extends('layouts.app')

@section('content')
    <h1>Detalles del Cliente</h1>
    <table class="table">
        <tbody>
            <tr>
                <th>ID</th>
                <td>{{ $cliente->id }}</td>
            </tr>
            <tr>
                <th>Nombre</th>
                <td>{{ $cliente->nombre }}</td>
            </tr>
            <tr>
                <th>Dirección</th>
                <td>{{ $cliente->direccion }}</td>
            </tr>
            <tr>
                <th>Teléfono</th>
                <td>{{ $cliente->telefono }}</td>
            </tr>
        </tbody>
    </table>
@endsection
