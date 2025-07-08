<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Agregar Producto</title>
    <style>
        body {
            background-color: #f3f4f6;
            font-family: 'Segoe UI', sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .card {
            background: white;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
            width: 500px;
        }

        .card h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        .form-group {
            margin-bottom: 15px;
        }

        label {
            display: block;
            margin-bottom: 5px;
            font-weight: 600;
        }

        input[type="text"],
        input[type="number"],
        textarea,
        input[type="file"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #cbd5e1;
            border-radius: 8px;
            background-color: #f9fafb;
            font-size: 14px;
        }

        textarea {
            resize: vertical;
        }

        button {
            background-color: #4f46e5;
            color: white;
            border: none;
            padding: 12px 20px;
            width: 100%;
            font-size: 16px;
            border-radius: 8px;
            cursor: pointer;
            transition: background-color 0.2s ease-in-out;
        }

        button:hover {
            background-color: #4338ca;
        }

        a.back {
            display: inline-block;
            margin-top: 10px;
            color: #4f46e5;
            text-decoration: none;
            font-size: 14px;
        }

        a.back:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="card">
        <h2>Agregar Producto</h2>

        <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="form-group">
                <label>Nombre del producto</label>
                <input type="text" name="name" required>
            </div>

            <div class="form-group">
                <label>Descripción</label>
                <textarea name="description" rows="3"></textarea>
            </div>

            <div class="form-group">
                <label>Precio ($)</label>
                <input type="number" name="price" step="0.01" required>
            </div>

            <div class="form-group">
                <label>Stock disponible</label>
                <input type="number" name="stock" required>
            </div>

            <div class="form-group">
                <label>Imagen del producto</label>
                <input type="file" name="image">
            </div>

            <button type="submit">Guardar producto</button>
        </form>

        <a class="back" href="{{ route('products.index') }}">← Volver al listado</a>
    </div>
</body>
</html>
