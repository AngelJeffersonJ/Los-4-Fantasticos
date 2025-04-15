@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2 class="text-center mb-4">Seguimiento de tu Pedido</h2>
    <div id="mapaSimulado" style="position: relative; width: 100%; height: 400px; background-color: #e9ecef; border: 2px dashed #ccc;">
        <div class="punto punto-inicio">📦<span>Bodega</span></div>
        <div class="punto punto-distribucion">🏬<span>Centro Distribución</span></div>
        <div class="punto punto-final">🏠<span>Tu Casa</span></div>
        <div id="camion" class="camion">🚚</div>
    </div>
    <div class="text-center mt-3" id="estado-envio">En camino al centro de distribución...</div>
</div>

<style>
#mapaSimulado {
    position: relative;
    padding-top: 30px;
}
.punto {
    position: absolute;
    transform: translateX(-50%);
    text-align: center;
}
.punto span {
    display: block;
    font-size: 12px;
    color: #555;
}
.punto-inicio { left: 10%; top: 80%; }
.punto-distribucion { left: 50%; top: 50%; }
.punto-final { left: 90%; top: 80%; }
.camion {
    position: absolute;
    top: 80%;
    left: 10%;
    font-size: 32px;
    animation: mover 10s linear forwards;
}
@keyframes mover {
    0% { left: 10%; top: 80%; }
    30% { left: 50%; top: 50%; }
    100% { left: 90%; top: 80%; }
}
</style>

<script>
    const estados = [
        "🕒 En camino al centro de distribución...",
        "📦 En centro de distribución (2 minutos)",
        "🚚 En camino a tu casa...",
        "✅ Entregado"
    ];

    let estadoIndex = 0;
    const estadoTexto = document.getElementById("estado-envio");

    const actualizarEstado = () => {
        if (estadoIndex < estados.length) {
            estadoTexto.innerText = estados[estadoIndex];
            estadoIndex++;
            setTimeout(actualizarEstado, 3000);
        }
    };
    actualizarEstado();
</script>
@endsection
