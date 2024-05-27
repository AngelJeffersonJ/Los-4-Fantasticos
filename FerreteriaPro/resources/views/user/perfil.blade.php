@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="card shadow-lg">
        <div class="card-header bg-primary text-white">
            <h2 class="mb-0"><i class="fas fa-user"></i> Perfil de Usuario</h2>
        </div>
        <div class="card-body">
            <form action="{{ route('user.actualizarPerfil') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="name"><i class="fas fa-user-circle"></i> Nombre</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}" placeholder="Introduce tu nombre">
                </div>
                <div class="form-group">
                    <label for="email"><i class="fas fa-envelope"></i> Correo Electrónico</label>
                    <input type="email" class="form-control" id="email" name="email" value="{{ $user->email }}" placeholder="Introduce tu correo electrónico">
                </div>
                <button type="submit" class="btn btn-success mt-3"><i class="fas fa-save"></i> Actualizar Perfil</button>
            </form>
        </div>
    </div>
</div>
@endsection

<style>
    body {
        background-color: #f8f9fa;
    }

    .card {
        border-radius: 15px;
        overflow: hidden;
    }

    .card-header {
        border-bottom: none;
        border-top-left-radius: 15px;
        border-top-right-radius: 15px;
    }

    .form-group label {
        font-weight: bold;
    }

    .form-control {
        border-radius: 10px;
    }

    .btn {
        border-radius: 10px;
    }

    .btn-success {
        background-color: #28a745;
        border-color: #28a745;
    }

    .btn-success:hover {
        background-color: #218838;
        border-color: #1e7e34;
    }
</style>
