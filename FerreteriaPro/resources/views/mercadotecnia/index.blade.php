@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2 class="text-center text-primary">📈 Panel de Mercadotecnia</h2>

    <div class="row">
        {{-- Botones con Listados --}}
        <div class="col-md-6">
            <h4 class="text-secondary">📋 Información</h4>
            <button class="btn btn-outline-info btn-block mb-2" onclick="mostrarInfo('resumen')">Resumen de campañas activas</button>
            <button class="btn btn-outline-info btn-block mb-2" onclick="mostrarInfo('efectividad')">Efectividad de campañas</button>
            <button class="btn btn-outline-info btn-block mb-2" onclick="mostrarInfo('productos')">Productos más vendidos</button>
            <button class="btn btn-outline-info btn-block mb-2" onclick="mostrarInfo('clientes')">Clientes frecuentes</button>
            <button class="btn btn-outline-info btn-block mb-2" onclick="mostrarInfo('tipos')">Clientes por tipo</button>

            <div id="info-panel" class="mt-3 border rounded p-3 bg-light" style="min-height: 180px;">
                <strong>Selecciona una opción para mostrar la información aquí.</strong>
            </div>
        </div>

        {{-- Botones con Gráficos --}}
        <div class="col-md-6">
            <h4 class="text-secondary">📊 Gráficas</h4>
            <button class="btn btn-outline-success btn-block mb-2" onclick="mostrarGrafica('grafico1')">Productos vendidos</button>
            <button class="btn btn-outline-success btn-block mb-2" onclick="mostrarGrafica('grafico2')">Ventas por campaña</button>
            <button class="btn btn-outline-success btn-block mb-2" onclick="mostrarGrafica('grafico3')">Tabla de clientes top</button>
            <button class="btn btn-outline-success btn-block mb-2" onclick="mostrarGrafica('grafico4')">Línea de tiempo campañas</button>

            <canvas id="grafico-canvas" class="mt-3" style="width:100%;max-height:300px;"></canvas>
        </div>
    </div>

    {{-- Tabla Simulada --}}
    <div class="mt-5">
        <h4 class="text-center">🧾 Tabla de Clientes Top</h4>
        <table class="table table-bordered table-striped text-center">
            <thead class="thead-dark">
                <tr>
                    <th>#</th>
                    <th>Nombre</th>
                    <th>Tipo de Cliente</th>
                    <th>Total Compras</th>
                    <th>Última Compra</th>
                </tr>
            </thead>
            <tbody>
                <tr><td>1</td><td>Juan Pérez</td><td>Frecuente</td><td>$2,500.00</td><td>2025-04-01</td></tr>
                <tr><td>2</td><td>María López</td><td>Corporativo</td><td>$4,320.00</td><td>2025-04-03</td></tr>
                <tr><td>3</td><td>Carlos Ruiz</td><td>Frecuente</td><td>$1,980.00</td><td>2025-03-30</td></tr>
                <tr><td>4</td><td>Laura Sánchez</td><td>Nuevo</td><td>$900.00</td><td>2025-04-06</td></tr>
            </tbody>
        </table>
    </div>
</div>

{{-- ChartJS --}}
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    function mostrarInfo(tipo) {
        let info = {
            resumen: `
                <ul>
                    <li>Campaña Primavera: del 1 al 15 de abril</li>
                    <li>Campaña Verano: del 20 de abril al 5 de mayo</li>
                    <li>Objetivo: aumentar tráfico web</li>
                </ul>`,
            efectividad: `
                <ul>
                    <li>Primavera: 35% conversión</li>
                    <li>Verano: 28% conversión</li>
                    <li>Invierno: 15% conversión</li>
                </ul>`,
            productos: `
                <ul>
                    <li>Martillo Pro</li>
                    <li>Taladro Bosch 500w</li>
                    <li>Llave ajustable 12"</li>
                </ul>`,
            clientes: `
                <ul>
                    <li>Juan Pérez - 5 compras</li>
                    <li>María López - 4 compras</li>
                    <li>Pedro Jiménez - 3 compras</li>
                </ul>`,
            tipos: `
                <ul>
                    <li>Frecuentes: 15</li>
                    <li>Corporativos: 3</li>
                    <li>Ocasionales: 10</li>
                </ul>`
        };

        document.getElementById("info-panel").innerHTML = info[tipo];
    }

    let chart;

    function mostrarGrafica(tipo) {
        const ctx = document.getElementById('grafico-canvas').getContext('2d');
        if (chart) chart.destroy();

        let config = {};

        if (tipo === 'grafico1') {
            config = {
                type: 'bar',
                data: {
                    labels: ['Taladro', 'Martillo', 'Llave', 'Sierra'],
                    datasets: [{
                        label: 'Unidades Vendidas',
                        data: [120, 90, 75, 60],
                        backgroundColor: 'rgba(75, 192, 192, 0.6)'
                    }]
                }
            };
        } else if (tipo === 'grafico2') {
            config = {
                type: 'bar',
                data: {
                    labels: ['Primavera', 'Verano', 'Invierno'],
                    datasets: [{
                        label: 'Ventas ($)',
                        data: [5000, 4300, 2900],
                        backgroundColor: 'rgba(255, 159, 64, 0.6)'
                    }]
                }
            };
        } else if (tipo === 'grafico3') {
            config = {
                type: 'bar',
                data: {
                    labels: ['Juan', 'María', 'Carlos', 'Laura'],
                    datasets: [{
                        label: 'Total Compras ($)',
                        data: [2500, 4320, 1980, 900],
                        backgroundColor: 'rgba(153, 102, 255, 0.6)'
                    }]
                }
            };
        } else if (tipo === 'grafico4') {
            config = {
                type: 'bar',
                data: {
                    labels: ['1 Abr', '5 Abr', '10 Abr', '15 Abr', '20 Abr'],
                    datasets: [{
                        label: 'Ventas por día',
                        data: [300, 500, 700, 400, 600],
                        backgroundColor: 'rgba(255, 99, 132, 0.6)'
                    }]
                }
            };
        }

        chart = new Chart(ctx, config);
    }
</script>
@endsection
