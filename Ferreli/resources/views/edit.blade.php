<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Producto</title>
</head>
<body>
    <h1>Editar Producto</h1>
    
    @if ($errors->any())
        <div>
            <strong>¡Ups! Hubo algunos problemas con tus datos:</strong>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    
    <form action="{{ route('productos.update', $producto) }}" method="POST">
        @csrf
        @method('PUT')
        
        <div>
            <label for="nombre">Nombre:</label>
            <input type="text" id="nombre" name="nombre" value="{{ old('nombre', $producto->nombre) }}">
        </div>
        
        <div>
            <label for="descripcion">Descripción:</label>
            <textarea id="descripcion" name="descripcion">{{ old('descripcion', $producto->descripcion) }}</textarea>
        </div>
        
        <div>
            <label for="precio">Precio:</label>
            <input type="number" id="precio" name="precio" value="{{ old('precio', $producto->precio) }}">
        </div>
        
        <button type="submit">Guardar Cambios</button>
    </form>
</body>
</html>
