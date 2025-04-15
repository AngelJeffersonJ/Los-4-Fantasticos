@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h2 class="text-center">📜 Historial de Abastecimientos</h2>

    @if($historiales->isEmpty())
        <div class="alert alert-info">No hay registros de abastecimiento aún.</div>
    @else
        <table class="table table-bordered text-center mt-4">
            <thead class="thead-dark">
                <tr>
                    <th>Producto</th>
                    <th>Proveedor</th>
                    <th>Cantidad</th>
                    <th>Precio</th>
                    <th>Fecha Envío</th>
                </tr>
            </thead>
            <tbody>
                @foreach($historiales as $h)
                    <tr>
                        <td>{{ $h->producto->nombre }}</td>
                        <td>{{ $h->proveedor->nombre }}</td>
                        <td>{{ $h->cantidad }}</td>
                        <td>${{ number_format($h->precio, 2) }}</td>
                        <td>{{ \Carbon\Carbon::parse($h->fecha_envio)->format('d-m-Y H:i') }}</td>
                        <td><a href="{{ route('abastecimiento.envio', $h->id) }}" class="btn btn-sm btn-success">📦 Ver Envío</a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
@endsection
