@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="card shadow-lg animate__animated animate__fadeIn">
        <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
            <h1 class="my-0"><i class="fas fa-shopping-cart"></i> Carrito de Compras</h1>
            <a href="{{ route('catalogo.index') }}" class="btn btn-warning btn-sm"><i class="fas fa-arrow-left"></i> Seguir comprando</a>
        </div>
        <div class="card-body bg-light">
            @if(session('error'))
                <div class="alert alert-danger">{{ session('error') }}</div>
            @endif
            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            @if(!empty($carrito))
                <table class="table table-hover table-bordered">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col"><i class="fas fa-box-open"></i> Producto</th>
                            <th scope="col"><i class="fas fa-sort-numeric-up"></i> Cantidad</th>
                            <th scope="col"><i class="fas fa-euro-sign"></i> Precio Unitario</th>
                            <th scope="col"><i class="fas fa-calculator"></i> Subtotal</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $total = 0; @endphp
                        @foreach($carrito as $id => $detalle)
                            @php
                                $subtotal = $detalle['precio'] * $detalle['cantidad'];
                                $total += $subtotal;
                            @endphp
                            <tr class="bg-white">
                                <td class="align-middle"><strong>{{ $detalle['nombre'] }}</strong></td>
                                <td class="align-middle">{{ $detalle['cantidad'] }}</td>
                                <td class="align-middle">{{ number_format($detalle['precio'], 2) }} €</td>
                                <td class="align-middle text-success"><strong>{{ number_format($subtotal, 2) }} €</strong></td>
                            </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr class="bg-warning text-dark font-weight-bold">
                            <td colspan="3" class="text-right">Total:</td>
                            <td>{{ number_format($total, 2) }} €</td>
                        </tr>
                    </tfoot>
                </table>

                <div class="text-right mt-4">
                    <form action="{{ route('catalogo.comprar') }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-success btn-lg">
                            <i class="fas fa-check-circle"></i> Confirmar y Comprar
                        </button>
                    </form>
                </div>
            @else
                <div class="alert alert-info text-center">
                    <i class="fas fa-info-circle"></i> Tu carrito está vacío. <a href="{{ route('catalogo.index') }}">¡Explora el catálogo!</a>
                </div>
            @endif
        </div>
    </div>
</div>
@endsection

@push('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
@endpush

<style>
    .card {
        border-radius: 20px;
    }

    .card-header {
        border-top-left-radius: 20px;
        border-top-right-radius: 20px;
        font-size: 1.2rem;
    }

    .table th, .table td {
        vertical-align: middle !important;
    }

    .table-hover tbody tr:hover {
        background-color: #eef8ff;
    }

    .btn-success {
        border-radius: 12px;
        padding: 10px 30px;
        font-size: 1.1rem;
    }

    .btn-warning {
        border-radius: 12px;
    }
</style>
