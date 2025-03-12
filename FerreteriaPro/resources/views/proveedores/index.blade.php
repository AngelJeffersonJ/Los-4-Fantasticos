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
                    <div class="col-md-6">
                        <input type="email" name="correo" class="form-control" placeholder="Correo destinatario" required>
                    </div>
                    <div class="col-md-6">
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
                            <th>Nombre</th>
                            <th>Dirección</th>
                            <th>Teléfono</th>
                            <th>Precio</th>
                            <th>Tiempo de Entrega</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($proveedores as $proveedor)
                            <tr>
                                <td>{{ $proveedor->id }}</td>
                                <td>{{ $proveedor->nombre }}</td>
                                <td>{{ $proveedor->direccion }}</td>
                                <td>{{ $proveedor->telefono }}</td>
                                <td>${{ number_format($proveedor->precio, 2) }}</td>
                                <td>{{ $proveedor->tiempo_entrega }} días</td>
                                <td>
                                    {{-- Botón para ver historial --}}
                                    <a href="{{ route('proveedores.show', $proveedor->id) }}" class="btn btn-info btn-sm">Historial</a>

                                    {{-- Botón para editar --}}
                                    <a href="{{ route('proveedores.edit', $proveedor->id) }}" class="btn btn-primary btn-sm">Editar</a>

                                    {{-- Formulario para eliminar --}}
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

            {{-- Sección de Gráficos --}}
            <div class="row mt-5">
                <div class="col-md-6">
                    <h4 class="text-center">Precios de Proveedores</h4>
                    <canvas id="chartPrecios"></canvas>
                </div>
                <div class="col-md-6">
                    <h4 class="text-center">Tiempo de Entrega</h4>
                    <canvas id="chartTiempoEntrega"></canvas>
                </div>
            </div>
        @endif
    </div>

    {{-- Script para Chart.js y Búsqueda --}}
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // 📊 Datos para los gráficos
            let proveedores = @json($proveedores);
            let nombres = proveedores.map(p => p.nombre);
            let precios = proveedores.map(p => p.precio);
            let tiemposEntrega = proveedores.map(p => p.tiempo_entrega);

            // Verifica que haya datos antes de renderizar los gráficos
            if (proveedores.length > 0) {
                // 📊 Gráfico de Barras (Precios)
                new Chart(document.getElementById("chartPrecios"), {
                    type: "bar",
                    data: {
                        labels: nombres,
                        datasets: [{
                            label: "Precio",
                            data: precios,
                            backgroundColor: "rgba(54, 162, 235, 0.6)"
                        }]
                    },
                    options: { responsive: true }
                });

                // 📊 Gráfico de Líneas (Tiempo de Entrega)
                new Chart(document.getElementById("chartTiempoEntrega"), {
                    type: "line",
                    data: {
                        labels: nombres,
                        datasets: [{
                            label: "Tiempo de Entrega (días)",
                            data: tiemposEntrega,
                            borderColor: "rgba(255, 99, 132, 0.8)",
                            backgroundColor: "rgba(255, 99, 132, 0.3)",
                            fill: true
                        }]
                    },
                    options: { responsive: true }
                });
            }

            // 🔍 Búsqueda en la tabla
            document.getElementById("search").addEventListener("keyup", function() {
                let value = this.value.toLowerCase();
                let rows = document.querySelectorAll("#proveedoresTable tbody tr");

                rows.forEach(row => {
                    let match = [...row.children].some(td => td.innerText.toLowerCase().includes(value));
                    row.style.display = match ? "" : "none";
                });
            });

            // 🗑️ Confirmación de eliminación con JavaScript
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
