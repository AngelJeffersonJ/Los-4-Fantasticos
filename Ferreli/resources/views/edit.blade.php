<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Producto</title>
</head>
<body>
    <h1>Editar Producto</h1>
    <form action="{{ route('productos.update', $producto) }}" method="post">
        @csrf
        @method('put')
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" id="nombre" value="{{ $producto->nombre }}" required><br>
        <label for="descripcion">Descripción:</label>
        <input type="text" name="descripcion" id="descripcion" value="{{ $producto->descripcion }}"><br>
        <label for="precio">Precio:</label>
        <input type="number" name="precio" id="precio" value="{{ $producto->precio }}" required><br>
        <button type="submit">Actualizar Producto</button>
    </form>
</body>
</html>
