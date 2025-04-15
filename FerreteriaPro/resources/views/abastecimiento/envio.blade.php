@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h2 class="text-center">📦 Estado de la compra</h2>
    
    <div class="card mt-4">
        <div class="card-body">
            <h4 class="card-title">{{ $historial->producto->nombre }}</h4>
            <p class="card-text">Proveedor: {{ $historial->proveedor->nombre }}</p>
            <p class="card-text">Cantidad: {{ $historial->cantidad }}</p>
            <p class="card-text">Precio: ${{ number_format($historial->precio, 2) }}</p>
            <p class="card-text">Fecha Envío: {{ \Carbon\Carbon::parse($historial->fecha_envio)->format('d-m-Y H:i') }}</p>

            <div class="progress my-4" style="height: 25px;">
                <div id="progress-bar" class="progress-bar progress-bar-striped progress-bar-animated bg-success" style="width: 0%">Preparando...</div>
            </div>

            <ul class="list-group">
                <li class="list-group-item" id="estado-preparacion">⏳ Preparando pedido...</li>
                <li class="list-group-item text-muted" id="estado-enviado">🚚 Pedido en camino</li>
                <li class="list-group-item text-muted" id="estado-entregado">✅ Pedido entregado</li>
            </ul>
        </div>
    </div>

    <a href="{{ route('abastecimiento.index') }}" class="btn btn-primary mt-4">🔙 Volver al panel de abastecimiento</a>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const progressBar = document.getElementById('progress-bar');
        const preparacion = document.getElementById('estado-preparacion');
        const enviado = document.getElementById('estado-enviado');
        const entregado = document.getElementById('estado-entregado');

        let progress = 0;
        let interval = setInterval(() => {
            progress += 33.3;

            if (progress >= 99.9) {
                progress = 100;
                progressBar.style.width = progress + '%';
                progressBar.textContent = 'Pedido Entregado';
                entregado.classList.remove('text-muted');
                entregado.classList.add('text-success');
                clearInterval(interval);
            } else if (progress >= 66.6) {
                progressBar.style.width = progress + '%';
                progressBar.textContent = 'Pedido en Camino';
                enviado.classList.remove('text-muted');
                enviado.classList.add('text-warning');
            } else {
                progressBar.style.width = progress + '%';
                progressBar.textContent = 'Preparando Pedido';
                preparacion.classList.remove('text-muted');
                preparacion.classList.add('text-info');
            }
        }, 3000); // cambia cada 3 segundos (simulado)
    });
</script>
@endsection
