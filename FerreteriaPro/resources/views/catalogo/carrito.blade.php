@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="card shadow-lg">
        <div class="card-header bg-primary text-white">
            <h1 class="my-0"><i class="fas fa-shopping-cart"></i> Carrito de Compras</h1>
        </div>
        <div class="card-body">
            @if(session('error'))
                <div class="alert alert-danger">{{ session('error') }}</div>
            @endif
            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif
            @if(!empty($carrito))
                <table class="table table-hover">
                    <thead class="thead-light">
                        <tr>
                            <th>Producto</th>
                            <th>Cantidad</th>
                            <th>Precio Unitario</th>
                            <th>Subtotal</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $total = 0; @endphp
                        @foreach($carrito as $id => $detalle)
                            @php $subtotal = $detalle['precio'] * $detalle['cantidad']; $total += $subtotal; @endphp
                            <tr>
                                <td>{{ $detalle['nombre'] }}</td>
                                <td>{{ $detalle['cantidad'] }}</td>
                                <td>{{ $detalle['precio'] }} €</td>
                                <td>{{ $subtotal }} €</td>
                            </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th colspan="3" class="text-right">Total</th>
                            <th>{{ $total }} €</th>
                        </tr>
                    </tfoot>
                </table>
                <div class="text-right">
                    <form action="{{ route('catalogo.comprar') }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-success"><i class="fas fa-check"></i> Comprar</button>
                    </form>
                </div>
            @else
                <p class="text-center">No hay productos en el carrito.</p>
            @endif
        </div>
    </div>
</div>
@endsection

<style>
    body {
        background-color: #f8f9fa;
    }

    .card {
        border-radius: 15px;
        overflow: hidden;
    }

    .card-header {
        border-bottom: none;
        border-top-left-radius: 15px;
        border-top-right-radius: 15px;
    }

    .table-hover tbody tr:hover {
        background-color: #f1f1f1;
    }

    .thead-light th {
        background-color: #f8f9fa;
        color: #343a40;
    }

    .btn-success {
        border-radius: 10px;
    }

    .btn-success:hover {
        background-color: #218838;
        border-color: #1e7e34;
    }
</style>
