<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sugerencias de Proveedores</title>
    <style>
        body { font-family: Arial, sans-serif; background-color: #f4f4f4; padding: 20px; }
        .container { background: white; padding: 20px; border-radius: 8px; max-width: 600px; margin: auto; }
        h2 { color: #333; }
        table { width: 100%; border-collapse: collapse; margin-top: 15px; }
        th, td { border: 1px solid #ddd; padding: 8px; text-align: center; }
        th { background-color: #007bff; color: white; }
        .footer { text-align: center; margin-top: 20px; font-size: 12px; color: #666; }
    </style>
</head>
<body>
    <div class="container">
        <h2>📢 Sugerencias de Proveedores</h2>
        <p>Estos son los proveedores recomendados según el precio y tiempo de entrega:</p>
        <table>
            <thead>
                <tr>
                    <th>Proveedor</th>
                    <th>Precio</th>
                    <th>Tiempo de Entrega</th>
                </tr>
            </thead>
            <tbody>
                @foreach($proveedores as $proveedor)
                    <tr>
                        <td>{{ $proveedor->nombre }}</td>
                        <td>${{ number_format($proveedor->precio, 2) }}</td>
                        <td>{{ $proveedor->tiempo_entrega }} días</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="footer">
            <p>Este correo fue enviado automáticamente desde Ferretería Proveedores.</p>
        </div>
    </div>
</body>
</html>
