@extends('layouts.app')

@section('content')
<div class="container text-center">
    <h2 class="text-info">🛠 Panel de Rutas de Entrega</h2>
    <p class="text-muted">Vista de múltiples envíos con lógica de tránsito y llegada.</p>

    <div class="mapa-admin mt-4 position-relative">
        <div class="linea-ruta ruta1"></div>
        <div class="linea-ruta ruta2"></div>

        <div class="punto p1">🏢<span>Almacén A</span></div>
        <div class="punto p2">🏪<span>Centro B</span></div>
        <div class="punto p3">🏠<span>Cliente</span></div>

        <div class="punto p4">🏢<span>Almacén X</span></div>
        <div class="punto p5">📦<span>Centro Y</span></div>
        <div class="punto p6">🏡<span>Cliente</span></div>

        <div class="camion camion1">🚛</div>
        <div class="camion camion2">🚚</div>
    </div>
</div>

<style>
.mapa-admin {
    width: 100%;
    height: 240px;
    background-color: #f8f9fa;
    border: 2px dashed #17a2b8;
    border-radius: 10px;
    position: relative;
}

.linea-ruta {
    position: absolute;
    height: 5px;
    background-color: #17a2b8;
    border-radius: 2px;
}

.ruta1 { top: 80px; left: 10%; width: 80%; }
.ruta2 { top: 160px; left: 10%; width: 80%; }

.punto {
    position: absolute;
    font-size: 22px;
    text-align: center;
    z-index: 3;
}

.punto span {
    display: block;
    font-size: 11px;
    color: #333;
}

.p1 { top: 50px; left: 10%; }
.p2 { top: 50px; left: 45%; }
.p3 { top: 50px; left: 80%; }

.p4 { top: 130px; left: 10%; }
.p5 { top: 130px; left: 45%; }
.p6 { top: 130px; left: 80%; }

.camion {
    position: absolute;
    font-size: 26px;
    z-index: 4;
}

.camion1 {
    top: 68px;
    left: 10%;
    animation: anim1 8s ease-in-out infinite;
}

.camion2 {
    top: 148px;
    left: 80%;
    animation: anim2 10s ease-in-out infinite;
}

@keyframes anim1 {
    0% { left: 10%; }
    30% { left: 45%; }
    60% { left: 80%; }
    100% { left: 10%; }
}

@keyframes anim2 {
    0% { left: 80%; }
    40% { left: 45%; }
    80% { left: 10%; }
    100% { left: 80%; }
}
</style>
@endsection
