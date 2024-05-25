@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="my-4">Carrito de Compras</h1>
    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    @if(!empty($carrito))
        <table class="table table-bordered">
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
                    <th colspan="3">Total</th>
                    <th>{{ $total }} €</th>
                </tr>
            </tfoot>
        </table>
        <form action="{{ route('catalogo.comprar') }}" method="POST">
            @csrf
            <button type="submit" class="btn btn-success">Comprar</button>
        </form>
    @else
        <p>No hay productos en el carrito.</p>
    @endif
</div>
@endsection
