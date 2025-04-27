@extends('layouts.app')

@section('title', 'Edit Produk')

@section('content')
<div class="max-w-2xl mx-auto p-6 bg-white rounded-lg shadow mt-8">
    <h2 class="text-2xl font-bold mb-6">Edit Produk</h2>

    <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data" class="space-y-5">
        @csrf
        @method('PUT')

        <div>
            <label class="block mb-1 font-semibold">Nama Produk</label>
            <input type="text" name="name" value="{{ $product->name }}" class="border w-full p-2 rounded focus:ring focus:border-blue-300" required>
        </div>

        <div>
            <label class="block mb-1 font-semibold">Harga</label>
            <input type="number" name="price" value="{{ $product->price }}" class="border w-full p-2 rounded focus:ring focus:border-blue-300" required>
        </div>

        <div>
            <label class="block mb-1 font-semibold">Stok</label>
            <input type="number" name="stock" value="{{ $product->stock }}" class="border w-full p-2 rounded focus:ring focus:border-blue-300" required>
        </div>

        <div>
            <label class="block mb-1 font-semibold">Kategori</label>
            <select name="category_id" class="border w-full p-2 rounded focus:ring focus:border-blue-300">
                <option value="">-- Pilih Kategori --</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ $product->category_id == $category->id ? 'selected' : '' }}>
                        {{ $category->category_name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div>
            <label class="block mb-1 font-semibold">Gambar Produk</label>
            <input type="file" name="image" class="border w-full p-2 rounded focus:ring focus:border-blue-300">
            @if($product->image)
                <img src="{{ asset('storage/'.$product->image) }}" class="h-32 mt-2 rounded">
            @endif
        </div>

        <button type="submit" class="bg-yellow-500 hover:bg-yellow-700 text-white font-semibold px-6 py-2 rounded-lg">
            Update Produk
        </button>
    </form>
</div>
@endsection
