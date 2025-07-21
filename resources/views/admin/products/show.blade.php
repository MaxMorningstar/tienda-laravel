<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Detalle del producto</title>
    <style>
        body {
            font-family: sans-serif;
            background-color: #f3f4f6;
            padding: 40px;
        }

        .container {
            max-width: 800px;
            margin: auto;
            background: white;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }

        img {
            max-width: 100%;
            border-radius: 8px;
            margin-bottom: 20px;
        }

        h1 {
            font-size: 28px;
            margin-bottom: 10px;
        }

        p {
            font-size: 18px;
            color: #444;
        }

        a {
            display: inline-block;
            margin-top: 20px;
            text-decoration: none;
            padding: 10px 20px;
            background: #3b82f6;
            color: white;
            border-radius: 8px;
        }

        a:hover {
            background: #2563eb;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>{{ $product->name }}</h1>

        @if ($product->image)
            <img src="{{ asset('imagenes/' . $product->image) }}" alt="{{ $product->name }}">
        @endif

        <p><strong>Descripción:</strong> {{ $product->description }}</p>
        <p><strong>Precio:</strong> ${{ number_format($product->price, 2) }}</p>
        <p><strong>Stock:</strong> {{ $product->stock }}</p>

        <a href="{{ route('admin.products.index') }}">← Volver al listado</a>
    </div>
</body>
</html>
