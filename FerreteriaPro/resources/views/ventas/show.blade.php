@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Detalles de Venta') }}</div>

                <div class="card-body">
                    <p><strong>ID:</strong> {{ $venta->id }}</p>
                    <p><strong>Fecha:</strong> {{ $venta->fecha }}</p>
                    <p><strong>Cliente:</strong> {{ $venta->cliente->nombre }}</p>
                    <div class="text-end">
                        <a href="{{ route('ventas.index') }}" class="btn btn-primary">Volver</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
