@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Detalle de Categoría') }}</div>

                <div class="card-body">
                    <div class="form-group">
                        <label for="nombre">{{ __('Nombre') }}</label>
                        <input id="nombre" type="text" class="form-control" name="nombre" value="{{ $categoria->nombre }}" readonly>
                    </div>

                    <a href="{{ route('categorias.index') }}" class="btn btn-secondary">Volver</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
