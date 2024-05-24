
@extends('layouts.app')

@section('title', 'Detalles del Cliente')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Detalles del Cliente') }}</div>

                <div class="card-body">
                    <table class="table table-bordered">
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
                    </table>
                    <a href="{{ route('clientes.index') }}" class="btn btn-secondary mt-3">Volver</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
