<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Producto</title>
</head>
<body>
    <h1>Agregar Producto</h1>
    <form action="{{ route('productos.store') }}" method="post">
        @csrf
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" id="nombre" required><br>
        <label for="descripcion">Descripción:</label>
        <input type="text" name="descripcion" id="descripcion"><br>
        <label for="precio">Precio:</label>
        <input type="number" name="precio" id="precio" required><br>
        <button type="submit">Agregar Producto</button>
    </form>
</body>
</html>
