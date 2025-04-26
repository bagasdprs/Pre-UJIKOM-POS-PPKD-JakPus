@extends('layouts.app')

@section('title', 'Edit Produk')

@section('content')
<div class="max-w-2xl mx-auto p-6 bg-white rounded-lg shadow mt-8">
    <h2 class="text-2xl font-bold mb-6">Edit Produk</h2>

    @if ($errors->any())
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-6">
            <ul class="list-disc pl-5">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

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
            <label class="block mb-1 font-semibold">Ganti Gambar Produk</label>
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
