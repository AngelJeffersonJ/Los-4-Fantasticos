@extends('layouts.app')

@section('content')
<style>
    body { font-family: 'Segoe UI', sans-serif; background-color: #f4f4f4; color: #333; }
    .container { display: flex; min-height: 90vh; }
    .sidebar { width: 330px; background-color: #2c3e50; color: #fff; padding: 20px; }
    .main-content { flex: 1; padding: 20px; background-color: #fff; overflow-y: auto; }

    .stats-bar { background-color: #34495e; padding: 10px; border-radius: 5px; margin-bottom: 15px; }
    .stats-bar div { margin-bottom: 5px; }

    .filter-btn { background-color: #2980b9; color: white; border: none; padding: 6px 10px; border-radius: 4px; margin: 5px 2px; cursor: pointer; }
    .filter-btn.active { background-color: #1abc9c; }

    .inbox-item { padding: 10px; border-bottom: 1px solid #3d5166; cursor: pointer; }
    .inbox-item:hover, .inbox-item.active { background-color: #3498db; }

    .product-title { font-size: 22px; border-bottom: 1px solid #ccc; padding-bottom: 10px; margin-bottom: 10px; }

    .customer-info, .supplier-section, .followup-section { background: #f9f9f9; padding: 10px; margin-bottom: 15px; border-radius: 5px; }

    .conversation { max-height: 250px; overflow-y: auto; border: 1px solid #ddd; padding: 10px; margin-bottom: 10px; border-radius: 5px; }
    .message { padding: 8px; margin-bottom: 8px; border-radius: 5px; }
    .customer-message { background-color: #e3f2fd; }
    .admin-message { background-color: #ecf0f1; text-align: right; }

    textarea, select, input { width: 100%; padding: 8px; margin: 5px 0; border-radius: 4px; border: 1px solid #ccc; }

    .btn { padding: 8px 12px; border: none; border-radius: 4px; margin: 5px 5px 5px 0; cursor: pointer; }
    .btn-success { background: #2ecc71; color: #fff; }
    .btn-primary { background: #3498db; color: #fff; }
    .btn-warning { background: #f39c12; color: #fff; }
    .btn-danger { background: #e74c3c; color: #fff; }

    .hidden { display: none; }
</style>

<div class="container">
    <div class="sidebar">
        <h3>Bandeja de Entrada</h3>
        <input type="text" id="searchInput" placeholder="Buscar mensaje...">
        <div class="stats-bar">
            <div><strong>Resueltos:</strong> <span id="resolvedCount">2</span></div>
            <div><strong>Prom. respuesta:</strong> <span>1h 45m</span></div>
            <div><strong>Satisfacción:</strong> <span>94%</span></div>
        </div>
        <div>
            <button class="filter-btn active" data-filter="all">Todos</button>
            <button class="filter-btn" data-filter="pregunta">Preguntas</button>
            <button class="filter-btn" data-filter="reclamo">Reclamos</button>
        </div>
        <div id="inboxList">
            <!-- Mensajes simulados -->
        </div>
    </div>

    <div class="main-content">
        <h2 class="product-title" id="productTitle">Selecciona un mensaje</h2>

        <div id="customerInfo" class="customer-info hidden">
            <p><strong>Cliente:</strong> <span id="customerName"></span></p>
            <p><strong>Última compra:</strong> <span id="lastPurchase"></span></p>
            <p><strong>Historial:</strong> <span id="purchaseHistory"></span></p>
        </div>

        <div class="conversation hidden" id="conversation"></div>

        <div id="responseArea" class="hidden">
            <textarea id="responseTextarea" placeholder="Escribe tu respuesta..."></textarea>
            <button class="btn btn-success" id="sendResponse">Responder</button>
            <button class="btn btn-warning" id="markResolved">Marcar como resuelto</button>
        </div>

        <div id="supplierSection" class="supplier-section hidden">
            <p><strong>Proveedor:</strong> <span id="supplierName">Materiales S.A.</span></p>
            <p><strong>Rating:</strong> 4.3 ⭐</p>
            <p><strong>Reportes:</strong> 2 reclamos</p>
            <button class="btn btn-danger" id="notifySupplier">Notificar proveedor</button>
        </div>

        <div class="followup-section">
            <h4>Seguimiento</h4>
            <select id="templateSelect">
                <option value="">-- Plantilla --</option>
                <option value="retraso">Pedido con retraso</option>
                <option value="defecto">Producto defectuoso</option>
                <option value="envio">Problema con envío</option>
            </select>
            <textarea id="followupNotes" placeholder="Notas internas..."></textarea>
            <button class="btn btn-primary" id="saveFollowup">Guardar</button>
        </div>
    </div>
</div>

<script>
    const messages = [
        {
            id: 1,
            cliente: 'Ana López',
            tipo: 'pregunta',
            producto: 'Taladro Bosch',
            mensaje: '¿Este modelo incluye brocas?',
            historial: '3 compras',
            fecha: '2024-03-02',
            respuesta: ['Sí, incluye 3 brocas.'],
        },
        {
            id: 2,
            cliente: 'Carlos Díaz',
            tipo: 'reclamo',
            producto: 'Martillo Stanley',
            mensaje: 'Me llegó rayado y sin etiqueta',
            historial: '1 compra',
            fecha: '2024-03-04',
            respuesta: ['Enviamos reemplazo.'],
        },
        {
            id: 3,
            cliente: 'María Gómez',
            tipo: 'pregunta',
            producto: 'Juego de llaves',
            mensaje: '¿Se puede recoger en tienda?',
            historial: '5 compras',
            fecha: '2024-03-07',
            respuesta: [],
        }
    ];

    const inboxList = document.getElementById("inboxList");
    const searchInput = document.getElementById("searchInput");
    const productTitle = document.getElementById("productTitle");
    const customerName = document.getElementById("customerName");
    const lastPurchase = document.getElementById("lastPurchase");
    const purchaseHistory = document.getElementById("purchaseHistory");
    const conversation = document.getElementById("conversation");
    const responseTextarea = document.getElementById("responseTextarea");

    const renderInbox = (filter = 'all', keyword = '') => {
        inboxList.innerHTML = '';
        messages.forEach(msg => {
            if ((filter === 'all' || msg.tipo === filter) && 
                (msg.cliente.toLowerCase().includes(keyword.toLowerCase()) || msg.producto.toLowerCase().includes(keyword.toLowerCase()))) {
                const div = document.createElement("div");
                div.className = "inbox-item";
                div.dataset.id = msg.id;
                div.innerHTML = `<strong>${msg.cliente}</strong> - <small>${msg.producto}</small>`;
                inboxList.appendChild(div);
            }
        });
    };

    let currentMessage = null;

    inboxList.addEventListener('click', e => {
        if (e.target.classList.contains('inbox-item')) {
            document.querySelectorAll('.inbox-item').forEach(item => item.classList.remove('active'));
            e.target.classList.add('active');

            const id = parseInt(e.target.dataset.id);
            currentMessage = messages.find(m => m.id === id);

            productTitle.textContent = currentMessage.producto;
            customerName.textContent = currentMessage.cliente;
            lastPurchase.textContent = currentMessage.fecha;
            purchaseHistory.textContent = currentMessage.historial;

            conversation.innerHTML = `<div class="message customer-message">${currentMessage.mensaje}</div>`;
            currentMessage.respuesta.forEach(resp => {
                conversation.innerHTML += `<div class="message admin-message">${resp}</div>`;
            });

            document.getElementById('customerInfo').classList.remove('hidden');
            document.getElementById('conversation').classList.remove('hidden');
            document.getElementById('responseArea').classList.remove('hidden');
            document.getElementById('supplierSection').classList.remove('hidden');
        }
    });

    document.getElementById("searchInput").addEventListener("keyup", e => {
        renderInbox(document.querySelector('.filter-btn.active').dataset.filter, e.target.value);
    });

    document.querySelectorAll('.filter-btn').forEach(btn => {
        btn.addEventListener('click', () => {
            document.querySelectorAll('.filter-btn').forEach(b => b.classList.remove('active'));
            btn.classList.add('active');
            renderInbox(btn.dataset.filter, searchInput.value);
        });
    });

    document.getElementById("sendResponse").addEventListener("click", () => {
        const msg = responseTextarea.value.trim();
        if (msg && currentMessage) {
            currentMessage.respuesta.push(msg);
            const div = document.createElement("div");
            div.className = "message admin-message";
            div.textContent = msg;
            conversation.appendChild(div);
            responseTextarea.value = '';
        }
    });

    document.getElementById("markResolved").addEventListener("click", () => {
        alert("✅ Mensaje marcado como resuelto.");
    });

    document.getElementById("notifySupplier").addEventListener("click", () => {
        alert("📩 Se ha notificado al proveedor.");
    });

    document.getElementById("saveFollowup").addEventListener("click", () => {
        alert("📋 Seguimiento guardado.");
    });

    // Inicializar
    renderInbox();
</script>
@endsection
