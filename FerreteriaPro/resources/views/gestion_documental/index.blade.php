@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h2 class="text-center">📂 Gestión Documental</h2>

    <div class="row mt-4">
        <div class="col-md-3">
            <div class="list-group">
                <span class="list-group-item active">📁 Documentos Administrativos</span>
                <button class="list-group-item list-group-item-action" onclick="mostrarSeccion('compras')">Facturas de Compras</button>
                <button class="list-group-item list-group-item-action" onclick="mostrarSeccion('ventas')">Facturas de Ventas</button>
                <button class="list-group-item list-group-item-action" onclick="mostrarSeccion('empleados')">Contratos con Empleados</button>
                <button class="list-group-item list-group-item-action" onclick="mostrarSeccion('proveedores')">Contratos de Proveedores</button>
                <button class="list-group-item list-group-item-action" onclick="mostrarSeccion('terminos')">Política de Términos</button>
                <button class="list-group-item list-group-item-action" onclick="mostrarSeccion('privacidad')">Política de Privacidad</button>
            </div>
        </div>

        <div class="col-md-9">
            <div id="seccion-contenido">
                <h4 class="text-center text-muted">Seleccione una opción del menú para ver los documentos</h4>
            </div>
        </div>
    </div>
</div>

{{-- jsPDF CDN --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
<script>
    window.jsPDF = window.jspdf.jsPDF;

    function generarPDF(nombre) {
        const doc = new jsPDF();
        const fecha = new Date().toLocaleDateString();

        // Título
        doc.setFontSize(18);
        doc.text("FERRETERIA PRO - DOCUMENTO", 105, 20, null, null, 'center');

        // Línea separadora
        doc.setLineWidth(0.5);
        doc.line(20, 25, 190, 25);

        // Información principal
        doc.setFontSize(12);
        doc.text(`Documento: ${nombre}`, 20, 40);
        doc.text(`Fecha de emisión: ${fecha}`, 20, 48);
        doc.text("Estado: Aprobado", 20, 56);
        doc.text("Emitido por: Departamento Administrativo", 20, 64);

        // Tabla simulada de contenido
        doc.autoTable({
            startY: 75,
            head: [['Código', 'Descripción', 'Cantidad', 'Precio']],
            body: [
                ['P001', 'Martillo de acero', '2', '$120.00'],
                ['P002', 'Caja de tornillos', '5', '$75.00'],
                ['P003', 'Taladro eléctrico', '1', '$899.00']
            ],
            theme: 'striped'
        });

        // Firma
        doc.text("__________________________", 20, 240);
        doc.text("Firma Responsable", 20, 248);

        // Footer
        doc.setFontSize(10);
        doc.text("Generado automáticamente por FerreteriaPro", 105, 285, null, null, 'center');

        doc.save(`${nombre}.pdf`);
    }

    function mostrarSeccion(tipo) {
        let html = `
            <h4 class="text-center mb-4">📄 ${tipo.charAt(0).toUpperCase() + tipo.slice(1).replace('_', ' ')}</h4>
            <table class="table table-bordered table-striped text-center">
                <thead class="thead-dark">
                    <tr>
                        <th>Nombre</th>
                        <th>Fecha</th>
                        <th>Estado</th>
                        <th>Descargar</th>
                    </tr>
                </thead>
                <tbody>`;
        for (let i = 1; i <= 10; i++) {
            let nombre = `Documento_${tipo}_${i}`;
            html += `
                <tr>
                    <td>${nombre}</td>
                    <td>${new Date().toLocaleDateString()}</td>
                    <td>Aprobado</td>
                    <td><button class="btn btn-sm btn-success" onclick="generarPDF('${nombre}')">📥 Descargar</button></td>
                </tr>`;
        }
        html += `</tbody></table>`;
        document.getElementById("seccion-contenido").innerHTML = html;
    }
</script>

{{-- jsPDF AutoTable plugin --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.5.28/jspdf.plugin.autotable.min.js"></script>
@endsection
