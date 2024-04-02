<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de Productos</title>
</head>
<body>
    <h1>Listado de Productos</h1>
    <a href="{{ route('productos.create') }}">Agregar Producto</a>
    <table border="1">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Descripción</th>
                <th>Precio</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @forelse($productos as $producto)
                <tr>
                    <td>{{ $producto->nombre }}</td>
                    <td>{{ $producto->descripcion }}</td>
                    <td>{{ $producto->precio }}</td>
                    <td>
                        <a href="{{ route('productos.edit', $producto->id) }}">Editar</a>
                        <form action="{{ route('productos.destroy', $producto->id) }}" method="post">
                            @csrf
                            @method('delete')
                            <button type="submit">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4">No hay productos disponibles.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</body>
</html>
