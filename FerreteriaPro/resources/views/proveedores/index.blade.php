@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <h1 class="mb-4">Lista de Proveedores</h1>

        {{-- Botón para agregar un nuevo proveedor --}}
        <a href="{{ route('proveedores.create') }}" class="btn btn-primary mb-3">Agregar Proveedor</a>

        {{-- Buscador --}}
        <input type="text" id="search" class="form-control mb-3" placeholder="Buscar proveedor por cualquier campo...">

        {{-- Formulario para enviar sugerencias por correo --}}
        <div class="mb-3">
            <h4>📩 Enviar Sugerencias de Proveedores</h4>
            <form action="{{ route('proveedores.sugerir') }}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-md-4">
                        <input type="email" name="correo" class="form-control" placeholder="Correo destinatario" required>
                    </div>
                    <div class="col-md-4">
                        <select name="proveedor_id" class="form-control">
                            <option value="">Selecciona un proveedor</option>
                            @foreach ($proveedores as $proveedor)
                                <option value="{{ $proveedor->id }}">{{ $proveedor->nombre }} - {{ $proveedor->email }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-4">
                        <button type="submit" class="btn btn-warning">Enviar Sugerencias</button>
                    </div>
                </div>
            </form>
        </div>

        @if ($proveedores->isEmpty())
            <p class="alert alert-warning">No hay proveedores registrados.</p>
        @else
            <div class="table-responsive">
                <table class="table table-striped" id="proveedoresTable">
                    <thead class="thead-dark">
                        <tr>
                            <th>ID</th>
                            <th>Imagen</th>
                            <th>Nombre</th>
                            <th>Dirección</th>
                            <th>Teléfono</th>
                            <th>Email</th>
                            <th>Precio</th>
                            <th>Tiempo de Entrega</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($proveedores as $proveedor)
                            <tr>
                                <td>{{ $proveedor->id }}</td>
                                <td>
                                    <img src="https://source.unsplash.com/100x100/?store,business,vendor"
                                         alt="{{ $proveedor->nombre }}" width="50" class="rounded-circle">
                                </td>
                                <td>{{ $proveedor->nombre }}</td>
                                <td>{{ $proveedor->direccion }}</td>
                                <td>{{ $proveedor->telefono }}</td>
                                <td>{{ $proveedor->email }}</td>
                                <td>${{ number_format($proveedor->precio, 2) }}</td>
                                <td>{{ $proveedor->tiempo_entrega }} días</td>
                                <td>
                                    <a href="{{ route('proveedores.show', $proveedor->id) }}" class="btn btn-info btn-sm">Historial</a>
                                    <a href="{{ route('proveedores.edit', $proveedor->id) }}" class="btn btn-primary btn-sm">Editar</a>

                                    <form action="{{ route('proveedores.destroy', $proveedor->id) }}" method="POST" class="d-inline delete-form">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </div>

    {{-- Script para búsqueda y confirmación de eliminación --}}
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            document.getElementById("search").addEventListener("keyup", function() {
                let value = this.value.toLowerCase();
                let rows = document.querySelectorAll("#proveedoresTable tbody tr");

                rows.forEach(row => {
                    let match = [...row.children].some(td => td.innerText.toLowerCase().includes(value));
                    row.style.display = match ? "" : "none";
                });
            });

            document.querySelectorAll('.delete-form').forEach(form => {
                form.addEventListener('submit', function(event) {
                    event.preventDefault();
                    if (confirm('¿Estás seguro de que deseas eliminar este proveedor?')) {
                        this.submit();
                    }
                });
            });
        });
    </script>
@endsection
