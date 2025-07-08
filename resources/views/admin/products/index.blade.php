<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Productos - Admin</title>
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            background-color: #f5f7fa;
            padding: 20px;
        }

        .container {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
            gap: 20px;
        }

        .card {
            background: #fff;
            padding: 20px;
            border-radius: 12px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
            transition: transform 0.2s ease;
        }

        .card:hover {
            transform: translateY(-5px);
        }

        .card img {
            width: 100%;
            height: 180px;
            object-fit: cover;
            border-radius: 8px;
        }

        .card h3 {
            margin: 10px 0 5px;
        }

        .actions {
            display: flex;
            justify-content: space-between;
            margin-top: 10px;
        }

        .actions form {
            display: inline;
        }

        .btn {
            padding: 5px 10px;
            border: none;
            background-color: #4f46e5;
            color: white;
            border-radius: 5px;
            text-decoration: none;
            cursor: pointer;
        }

        .btn.delete {
            background-color: #dc2626;
        }
    </style>
</head>
<body>
    <h1>📦 Productos (Panel Admin)</h1>

    <a class="btn" href="{{ route('admin.products.create') }}">➕ Agregar nuevo producto</a>

    <div class="container">
        @foreach ($products as $producto)
            <div class="card">
                @if($producto->image)
                    <img src="{{ asset('storage/' . $producto->image) }}" alt="{{ $producto->name }}">
                @else
                    <img src="https://via.placeholder.com/300x180.png?text=Sin+Imagen" alt="Sin imagen">
                @endif

                <h3>{{ $producto->name }}</h3>
                <p><strong>Precio:</strong> ${{ $producto->price }}</p>
                <p><strong>Stock:</strong> {{ $producto->stock }}</p>

                <div class="actions">
                    <a class="btn" href="{{ route('admin.products.edit', $producto->id) }}">✏️ Editar</a>

                    <form action="{{ route('admin.products.destroy', $producto->id) }}" method="POST" onsubmit="return confirm('¿Eliminar este producto?')">
                        @csrf
                        @method('DELETE')
                        <button class="btn delete" type="submit">🗑️ Eliminar</button>
                    </form>
                </div>
            </div>
        @endforeach
    </div>
</body>
</html>
