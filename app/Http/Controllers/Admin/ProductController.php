<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('admin.products.index', compact('products'));
    }

    public function create()
    {
        return view('admin.products.create');
    }

    
 public function store(Request $request)
{
    $validated = $request->validate([
        'name' => 'required|string|max:100',
        'description' => 'nullable|string',
        'price' => 'required|numeric|min:0',
        'stock' => 'required|integer|min:0',
        'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
    ]);

    // Procesar imagen si existe
    if ($request->hasFile('image') && $request->file('image')->isValid()) {
        $filename = time() . '_' . $request->file('image')->getClientOriginalName();
        $path = public_path('imagenes');

        // Creamos la carpeta si no existe
        if (!file_exists($path)) {
            mkdir($path, 0777, true);
        }

        $request->file('image')->move($path, $filename);
        $validated['image'] = $filename;
    }

    $product = Product::create($validated);

    if (!$product) {
        return back()->with('error', 'No se pudo guardar el producto.')->withInput();
    }

    return redirect()->route('admin.products.index')->with('success', 'Producto creado correctamente');
}


    public function edit(Product $product)
    {
        return view('admin.products.edit', compact('product'));
    }

    public function update(Request $request, Product $product)
    {
        $validated = $request->validate([
            'name'        => 'required|string|max:100',
            'description' => 'nullable|string',
            'price'       => 'required|numeric|min:0',
            'stock'       => 'required|integer|min:0',
            'image'       => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        if ($request->hasFile('image')) {
            // elimina la imagen previa si existe
            if ($product->image && Storage::disk('public')->exists($product->image)) {
                Storage::disk('public')->delete($product->image);
            }
            $validated['image'] = $request->file('image')->store('products', 'public');
        }

        $product->update($validated);

        return redirect()->route('admin.products.index')
                         ->with('success', 'Producto actualizado correctamente');
    }

    public function destroy(Product $product)
    {
        // elimina la imagen si existe
        if ($product->image && Storage::disk('public')->exists($product->image)) {
            Storage::disk('public')->delete($product->image);
        }

        $product->delete();

        return redirect()->route('admin.products.index')
                         ->with('success', 'Producto eliminado correctamente');
    }
}
