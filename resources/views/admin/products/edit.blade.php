<!-- resources/views/admin/products/edit.blade.php -->

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar producto</title>
</head>
<body>
    <h1>Editar producto</h1>

    <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <label>Nombre:</label>
        <input type="text" name="name" value="{{ $product->name }}"><br><br>

        <label>Descripción:</label><br>
        <textarea name="description">{{ $product->description }}</textarea><br><br>

        <label>Precio:</label>
        <input type="number" name="price" step="0.01" value="{{ $product->price }}"><br><br>

        <label>Stock:</label>
        <input type="number" name="stock" value="{{ $product->stock }}"><br><br>

        <label>Imagen (opcional):</label>
        <input type="file" name="image"><br><br>

        <button type="submit">Actualizar</button>
    </form>
</body>
</html>
