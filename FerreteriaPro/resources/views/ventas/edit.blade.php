@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Editar Venta') }}</div>

                <div class="card-body">
                    <form action="{{ route('ventas.update', $venta->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="fecha" class="form-label">Fecha</label>
                            <input type="date" class="form-control" id="fecha" name="fecha" value="{{ old('fecha', $venta->fecha) }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="id_cliente" class="form-label">Cliente</label>
                            <select class="form-select" id="id_cliente" name="id_cliente" required>
                                <option value="" disabled>Seleccione un cliente</option>
                                @foreach ($clientes as $cliente)
                                    <option value="{{ $cliente->id }}" {{ $cliente->id == $venta->id_cliente ? 'selected' : '' }}>{{ $cliente->nombre }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="text-end">
                            <button type="submit" class="btn btn-primary">Actualizar Venta</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
