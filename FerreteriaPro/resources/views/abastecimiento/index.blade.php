@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h2 class="text-center">📦 Panel de Abastecimiento</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    @if(isset($productos) && count($productos) > 0)
    <form method="POST" action="{{ route('abastecimiento.realizarCompra') }}">
        @csrf
        <table class="table table-bordered text-center">
            <thead class="thead-dark">
                <tr>
                    <th>✔️</th>
                    <th>Producto</th>
                    <th>Proveedor</th>
                    <th>Email Proveedor</th>
                    <th>Calificación</th>
                    <th>Precio</th>
                    <th>Cantidad</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($productos as $producto)
                    @php 
                        $proveedor = $producto->mejor_proveedor->proveedor ?? null;
                    @endphp
                    <tr>
                        <td>
                            @if($proveedor)
                                <input type="checkbox" name="productos[]" value="{{ $producto->id }}">
                                <input type="hidden" name="cantidades[{{ $producto->id }}]" value="{{ ceil($producto->inventario->cantidad_minima * 1.2) }}">
                                <input type="hidden" name="proveedores[{{ $producto->id }}]" value="{{ $proveedor->id }}">
                            @else
                                <span class="badge badge-warning">Sin proveedor disponible</span>
                            @endif
                        </td>
                        <td>{{ $producto->nombre }}</td>
                        <td>{{ $proveedor->nombre ?? 'Sin proveedor asignado' }}</td>
                        <td>{{ $proveedor->email ?? 'Sin email disponible' }}</td>
                        <td>
                            @if($producto->mejor_proveedor)
                                ⭐ {{ number_format($producto->mejor_proveedor->calificacion, 1) }}
                            @else
                                N/A
                            @endif
                        </td>
                        <td>
                            @if($producto->mejor_proveedor)
                                ${{ number_format($producto->mejor_proveedor->precio, 2) }}
                            @else
                                N/A
                            @endif
                        </td>
                        <td>{{ ceil($producto->inventario->cantidad_minima * 1.2) }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <button type="submit" class="btn btn-success btn-block">✅ Finalizar Compra</button>
    </form>
    @else
        <div class="alert alert-info">No hay productos que necesiten abastecimiento.</div>
    @endif
</div>

@if(session('correos_enviados'))
    <script>
        alert("Órdenes enviadas exitosamente a:\n\n{!! implode('\n', session('correos_enviados')) !!}");
    </script>
@endif

@endsection
