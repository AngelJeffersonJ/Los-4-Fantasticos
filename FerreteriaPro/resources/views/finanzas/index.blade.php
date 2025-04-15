@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h2 class="text-center text-primary mb-4">📊 Finanzas</h2>

    <div class="row">
        {{-- Columna izquierda: Botones --}}
        <div class="col-md-4">
            <h5><i class="fas fa-sliders-h"></i> Botones</h5>
            <button class="btn btn-outline-dark btn-block mb-2" onclick="mostrarSeccion('resumen')">Resumen Financiero del Mes</button>
            <button class="btn btn-outline-dark btn-block mb-2" onclick="mostrarSeccion('flujo')">Flujo de Efectivo</button>
            <button class="btn btn-outline-dark btn-block mb-2" onclick="mostrarSeccion('utilidad')">Utilidad por Producto</button>
            <button class="btn btn-outline-dark btn-block mb-2" onclick="mostrarSeccion('balance')">Balance entre Ventas y Compras</button>
        </div>

        {{-- Columna centro: Información dinámica --}}
        <div class="col-md-4">
            <h5 class="text-muted text-center">📋 Información</h5>
            <div id="info-financiera" class="bg-light p-3 rounded shadow-sm">
                <p class="text-center text-secondary">Selecciona una opción para ver la información.</p>
            </div>
        </div>

        {{-- Columna derecha: Botones de gráfica --}}
        <div class="col-md-4">
            <h5><i class="fas fa-chart-bar"></i> Botones</h5>
            <button class="btn btn-outline-primary btn-block mb-2" onclick="mostrarGrafica('grafica1')">Gráfica Ingresos vs Egresos</button>
            <button class="btn btn-outline-primary btn-block mb-2" onclick="mostrarGrafica('grafica2')">Productos con Mayor Utilidad</button>
            <button class="btn btn-outline-primary btn-block mb-2" onclick="mostrarGrafica('grafica3')">Tarjetas KPI</button>
        </div>
    </div>

    {{-- Gráficas --}}
    <div class="row mt-5">
        <div class="col-md-6">
            <canvas id="grafica1" class="grafica d-none"></canvas>
        </div>
        <div class="col-md-6">
            <canvas id="grafica2" class="grafica d-none"></canvas>
        </div>
    </div>

    {{-- Tarjetas KPI --}}
    <div class="row mt-5 grafica d-none" id="grafica3">
        <div class="col-md-4">
            <div class="card bg-success text-white text-center">
                <div class="card-body">
                    <h5>Ingresos Totales</h5>
                    <p>$25,000</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card bg-danger text-white text-center">
                <div class="card-body">
                    <h5>Egresos</h5>
                    <p>$10,000</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card bg-warning text-dark text-center">
                <div class="card-body">
                    <h5>Utilidad Neta</h5>
                    <p>$15,000</p>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- Scripts --}}
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    function mostrarSeccion(seccion) {
        let contenido = {
            resumen: "📌 Ingresos totales: $25,000<br>📌 Egresos: $10,000<br>📌 Utilidad neta: $15,000",
            flujo: "💰 Ingresos vs Egresos: $25,000 / $10,000<br>Saldo neto: $15,000",
            utilidad: "🛠️ Producto A: $5,000<br>🧰 Producto B: $4,000<br>🔧 Producto C: $6,000",
            balance: "📦 Ventas: $30,000<br>🧾 Compras: $22,000<br>📊 Diferencia: $8,000"
        };

        document.getElementById("info-financiera").innerHTML = contenido[seccion] || "Información no disponible";
    }

    function mostrarGrafica(id) {
        document.querySelectorAll(".grafica").forEach(el => el.classList.add("d-none"));
        document.getElementById(id).classList.remove("d-none");

        if (id === 'grafica1') {
            new Chart(document.getElementById("grafica1"), {
                type: 'bar',
                data: {
                    labels: ['Ingresos', 'Egresos'],
                    datasets: [{
                        label: 'Monto',
                        data: [25000, 10000],
                        backgroundColor: ['#28a745', '#dc3545']
                    }]
                }
            });
        }

        if (id === 'grafica2') {
            new Chart(document.getElementById("grafica2"), {
                type: 'pie',
                data: {
                    labels: ['Producto A', 'Producto B', 'Producto C'],
                    datasets: [{
                        data: [5000, 4000, 6000],
                        backgroundColor: ['#007bff', '#ffc107', '#17a2b8']
                    }]
                }
            });
        }
    }
</script>
@endsection
