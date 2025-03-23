<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Nueva Orden de Compra | Ferreli</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            color: #333;
            padding: 20px;
        }
        .container {
            background-color: #ffffff;
            max-width: 600px;
            margin: auto;
            border-radius: 10px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.2);
            padding: 20px;
        }
        .header {
            border-bottom: 2px solid #007BFF;
            margin-bottom: 20px;
        }
        h1 {
            color: #007BFF;
            text-align: center;
        }
        ul {
            background-color: #f9f9f9;
            border-radius: 5px;
            padding: 15px;
        }
        li {
            margin-bottom: 10px;
        }
        .footer {
            margin-top: 30px;
            font-size: 0.9em;
            text-align: center;
            color: #777;
            border-top: 1px solid #ddd;
            padding-top: 10px;
        }
        .button {
            display: inline-block;
            background-color: #007BFF;
            color: #ffffff;
            padding: 10px 15px;
            text-decoration: none;
            border-radius: 5px;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>🛒 Nueva Orden de Compra</h1>
        </div>

        <p>Estimado/a <strong>{{ $proveedorData['nombre'] }}</strong>,</p>

        <p>Le notificamos que <strong>Ferreli</strong> ha generado una nueva orden de compra con los siguientes detalles:</p>

        <ul>
            <li><strong>Producto:</strong> {{ $producto->nombre }}</li>
            <li><strong>Descripción:</strong> {{ $producto->descripcion }}</li>
            <li><strong>Cantidad solicitada:</strong> {{ $cantidad }}</li>
        </ul>

        <p>Le solicitamos que confirme la recepción y procesamiento de esta orden a la brevedad posible.</p>

        <div style="text-align: center;">
            <a href="mailto:{{ env('MAIL_FROM_ADDRESS') }}" class="button">📧 Confirmar Orden</a>
        </div>

        <p>Gracias por ser parte de nuestra red de proveedores.</p>

        <div class="footer">
            Saludos cordiales,<br>
            <strong>Departamento de Abastecimiento</strong><br>
            <strong>Ferreli</strong>
        </div>
    </div>
</body>
</html>
