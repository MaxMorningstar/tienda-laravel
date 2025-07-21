<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Listado de productos</title>
    <style>
        body {
            font-family: sans-serif;
            background-color: #f3f4f6;
            margin: 0;
            padding: 20px;
        }

        h1 {
            text-align: center;
            color: #111827;
        }

        .products-container {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(260px, 1fr));
            gap: 20px;
            margin-top: 40px;
        }

        .card {
            background-color: #fff;
            border-radius: 12px;
            padding: 20px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.08);
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .card img {
            max-width: 100%;
            height: 180px;
            object-fit: cover;
            border-radius: 8px;
            margin-bottom: 15px;
        }

        .card h3 {
            margin: 0;
            font-size: 20px;
            color: #111827;
        }

        .card p {
            font-size: 14px;
            color: #4b5563;
            margin: 4px 0;
        }

        .card .actions {
            display: flex;
            gap: 10px;
            margin-top: 15px;
        }

        .card .actions a,
        .card .actions form button {
            padding: 6px 12px;
            font-size: 14px;
            border: none;
            border-radius: 6px;
            text-decoration: none;
            cursor: pointer;
        }

        .btn-edit {
            background-color: #3b82f6;
            color: white;
        }

        .btn-delete {
            background-color: #ef4444;
            color: white;
        }

        .add-button {
            display: block;
            margin: 0 auto 30px auto;
            padding: 10px 20px;
            background-color: #10b981;
            color: white;
            font-weight: bold;
            border: none;
            border-radius: 8px;
            text-decoration: none;
            text-align: center;
            transition: background-color 0.2s ease;
        }

        .add-button:hover {
            background-color: #059669;
        }
    </style>
</head>
<body>
    <h1>Lista de productos</h1>

    <a href="{{ route('admin.products.create') }}" class="add-button">+ Agregar producto</a>

    <div class="products-container">
        @forelse ($products as $product)
            <div class="card">
                @if ($product->image)
                    <img src="{{ asset('imagenes/' . $product->image) }}" alt="{{ $product->name }}">  
                @else
                    <img src="https://via.placeholder.com/300x180.png?text=Sin+imagen" alt="Sin imagen">
                @endif

                <h3>{{ $product->name }}</h3>
                <p>Precio: ${{ number_format($product->price, 2) }}</p>
                <p>Stock: {{ $product->stock }}</p>

                <div class="actions">
                    <a href="{{ route('admin.products.edit', $product) }}" class="btn-edit">Editar</a>

                    <form action="{{ route('admin.products.destroy', $product) }}" method="POST" onsubmit="return confirm('¿Eliminar este producto?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn-delete">Eliminar</button>
                    </form>
                </div>
            </div>
        @empty
            <p>No hay productos registrados.</p>
        @endforelse
    </div>
</body>
</html>
