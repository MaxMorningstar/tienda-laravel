<!-- resources/views/admin/products/edit.blade.php -->

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar producto</title>

    <!-- Estilos Uiverse embebidos -->
    <style>
        body {
            font-family: sans-serif;
            background: #f1f5f9;
            padding: 40px;
        }

        h1 {
            text-align: center;
            color: #333;
        }

        form {
            max-width: 600px;
            margin: auto;
            background: #fff;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }

        .uiverse-input {
            position: relative;
            margin-bottom: 1.5rem;
        }

        .uiverse-input input,
        .uiverse-input textarea {
            width: 100%;
            padding: 10px;
            border: 2px solid #ccc;
            border-radius: 8px;
            outline: none;
            font-size: 16px;
            background: #fff;
        }

        .uiverse-input label {
            position: absolute;
            top: -10px;
            left: 12px;
            background: #fff;
            padding: 0 6px;
            font-size: 14px;
            color: #555;
        }

        button {
            width: 100%;
            background: #3b82f6;
            color: white;
            padding: 10px;
            font-size: 16px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            transition: background 0.3s ease;
        }

        button:hover {
            background: #2563eb;
        }

        .image-preview {
            text-align: center;
            margin-bottom: 1rem;
        }

        .image-preview img {
            max-width: 120px;
            border-radius: 6px;
        }
    </style>
</head>
<body>
    <h1>Editar producto</h1>

    <form action="{{ route('admin.products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="uiverse-input">
            <input type="text" name="name" value="{{ old('name', $product->name) }}" required>
            <label>Nombre del producto</label>
        </div>

        <div class="uiverse-input">
            <textarea name="description" rows="3">{{ old('description', $product->description) }}</textarea>
            <label>Descripción</label>
        </div>

        <div class="uiverse-input">
            <input type="number" name="price" value="{{ old('price', $product->price) }}" min="0" step="0.01" required>
            <label>Precio</label>
        </div>

        <div class="uiverse-input">
            <input type="number" name="stock" value="{{ old('stock', $product->stock) }}" min="0" required>
            <label>Stock</label>
        </div>

        <div class="image-preview">
            @if ($product->image)
                <p>Imagen actual:</p>
                <img src="{{ asset('storage/' . $product->image) }}" alt="Imagen actual">
            @else
                <p>No hay imagen subida.</p>
            @endif
        </div>

        <div class="uiverse-input">
            <input type="file" name="image">
            <label>Subir nueva imagen</label>
        </div>

        <button type="submit">Guardar cambios</button>
    </form>
</body>
</html>
