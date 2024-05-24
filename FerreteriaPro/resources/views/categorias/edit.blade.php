
@extends('layouts.app')

@section('title', 'Editar Categoría')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Editar Categoría') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('categorias.update', $categoria->id) }}">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label for="nombre">{{ __('Nombre') }}</label>
                            <input id="nombre" type="text" class="form-control @error('nombre') is-invalid @enderror" name="nombre" value="{{ old('nombre', $categoria->nombre) }}" required autocomplete="nombre" autofocus>

                            @error('nombre')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary mt-3">
                            {{ __('Actualizar Categoría') }}
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
