@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="text-center mb-4">🧾 Gestión de Compras de Clientes</h2>

    @if($compras->isEmpty())
        <div class="alert alert-info text-center">No hay compras registradas.</div>
    @else
        <table class="table table-bordered table-hover">
            <thead class="thead-dark">
                <tr>
                    <th>Cliente</th>
                    <th>Producto</th>
                    <th>Cantidad</th>
                    <th>Total (€)</th>
                    <th>Fecha de Compra</th>
                </tr>
            </thead>
            <tbody>
                @foreach($compras as $compra)
                    <tr>
                        <td>{{ $compra->cliente }}</td>
                        <td>{{ $compra->producto }}</td>
                        <td>{{ $compra->cantidad }}</td>
                        <td>{{ number_format($compra->total, 2) }}</td>
                        <td>{{ \Carbon\Carbon::parse($compra->created_at)->format('d/m/Y H:i') }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
@endsection
