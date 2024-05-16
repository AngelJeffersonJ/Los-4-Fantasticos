@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Eliminar Categoría') }}</div>

                <div class="card-body">
                    <p>¿Estás seguro de que deseas eliminar esta categoría?</p>
                    <form method="POST" action="{{ route('categorias.destroy', $categoria->id) }}">
                        @csrf
                        @method('DELETE')

                        <button type="submit" class="btn btn-danger mr-2">
                            {{ __('Eliminar') }}
                        </button>
                        <a href="{{ route('categorias.index') }}" class="btn btn-secondary">Cancelar</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
