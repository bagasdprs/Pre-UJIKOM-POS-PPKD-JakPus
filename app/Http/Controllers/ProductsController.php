<?php

namespace App\Http\Controllers;

use App\Models\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductsController extends Controller
{

    public function index()
    {
        $title = "Data Products";
        $products = Products::all();
        return view('admin.products.index', compact('title', 'products'));
    }
    public function apiIndex()
    {
        $products = Products::all(); // Pastikan model Product sudah ada
        return response()->json($products);
    }

    public function create()
    {
        return view('admin.products.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|integer',
            'stock' => 'required|integer',
            'img' => 'nullable|image|mimes:jpeg,jpg,png,gif|max:2048',
        ]);

        $imgPath = null;
        if ($request->hasFile('img')) {
            $imgPath = $request->file('img')->store('products', 'public');
        }

        Products::create([
            'name' => $request->name,
            'price' => $request->price,
            'stock' => $request->stock,
            'img' => $imgPath,
        ]);

        return redirect()->route('products.index')->with('success', 'Product has been Added');
    }


    public function show($id)
    {
        $product = Products::findOrFail($id);
        return view('admin.products.show', compact('product'));
    }


    public function edit($id)
    {
        $product = Products::findOrFail($id);
        return view('admin.products.edit', compact('product'));
    }


    public function update(Request $request, $id)
    {
        $product = Products::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|integer',
            'stock' => 'required|integer',
            'img' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data = $request->only(['name', 'price', 'stock']);

        if ($request->hasFile('img')) {
            // Hapus gambar lama
            if ($product->image) {
                Storage::disk('public')->delete($product->image);
            }

            $data['img'] = $request->file('img')->store('products', 'public');
        }

        $product->update($data);

        return redirect()->route('products.index')->with('success', 'Produk Updated Success');
    }


    public function destroy($id)
    {
        $product = Products::findOrFail($id);

        if ($product->image) {
            Storage::disk('public')->delete($product->image);
        }

        $product->delete();

        return redirect()->route('products.index')->with('success', 'Produk berhasil dihapus');
    }
}
