@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2>Perfil de Usuario</h2>
    <form action="{{ route('user.actualizarPerfil') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Nombre</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}">
        </div>
        <div class="form-group">
            <label for="email">Correo Electrónico</label>
            <input type="email" class="form-control" id="email" name="email" value="{{ $user->email }}">
        </div>
        <button type="submit" class="btn btn-primary">Actualizar Perfil</button>
    </form>
</div>
@endsection
