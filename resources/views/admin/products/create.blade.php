<!-- resources/views/admin/products/create.blade.php -->

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Crear producto</title>
</head>
<body>
    <h1>Agregar nuevo producto</h1>

    <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <label>Nombre:</label>
        <input type="text" name="name"><br><br>

        <label>Descripción:</label><br>
        <textarea name="description"></textarea><br><br>

        <label>Precio:</label>
        <input type="number" name="price" step="0.01"><br><br>

        <label>Stock:</label>
        <input type="number" name="stock"><br><br>

        <label>Imagen:</label>
        <input type="file" name="image"><br><br>

        <button type="submit">Guardar</button>
    </form>
</body>
</html>
