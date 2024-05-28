@extends('layouts.app')

@section('title', 'Acceso Denegado')

@section('content')
<div class="container">
    <h1>Acceso Denegado</h1>
    <p>No tienes acceso a esta página.</p>
    <a href="{{ url('/') }}" class="btn btn-primary">Regresar al inicio</a>
</div>
@endsection
