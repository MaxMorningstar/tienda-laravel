<!-- resources/views/admin/products/create.blade.php -->

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Agregar producto</title>

    <!-- Estilos Uiverse -->
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
            background: #10b981;
            color: white;
            padding: 10px;
            font-size: 16px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            transition: background 0.3s ease;
        }

        button:hover {
            background: #059669;
        }
    </style>
</head>
<body>
    <h1>Agregar nuevo producto</h1>

        @if ($errors->any())
    <div style="background: #fee2e2; color: #b91c1c; padding: 10px; margin-bottom: 20px; border-radius: 8px;">
        <strong>¡Error!</strong>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif


    <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="uiverse-input">
    <input type="text" name="name" id="name" value="{{ old('name') }}" required>
    <label for="name">Nombre del producto</label>
</div>


        <div class="uiverse-input">
    <textarea name="description" id="description" rows="3">{{ old('description') }}</textarea>
    <label for="description">Descripción</label>
</div>


        <div class="uiverse-input">
    <input type="number" name="price" id="price" value="{{ old('price') }}" min="0" step="0.01" required>
    <label for="price">Precio</label>
</div>


        <div class="uiverse-input">
    <input type="number" name="stock" id="stock" value="{{ old('stock') }}" min="0" required>
    <label for="stock">Stock</label>
</div>


       <div class="uiverse-input" style="position: relative;">
    <label for="image" style="display:block; margin-bottom: 6px; color: #555;">Subir imagen</label>
    <input type="file" name="image" id="image" accept=".jpg,.jpeg,.png" required>
</div>



        <button type="submit">Agregar producto</button>
    </form>
</body>
</html>
