@extends('layouts.app')

@section('title', 'Detail Produk')

@section('content')
<div class="max-w-2xl mx-auto p-6 bg-white rounded-lg shadow mt-8">
    <h2 class="text-2xl font-bold mb-6">Detail Produk</h2>

    @if($product->image)
        <img src="{{ asset('storage/' . $product->image) }}" class="h-64 w-full object-cover rounded mb-4">
    @else
        <div class="h-64 bg-gray-300 flex items-center justify-center mb-4 rounded">
            No Image
        </div>
    @endif

    <div class="text-lg font-semibold mb-2">Nama: {{ $product->name }}</div>
    <div class="mb-2">Harga: Rp {{ number_format($product->price, 0, ',', '.') }}</div>
    <div class="mb-2">Stok: {{ $product->stock }}</div>

    <a href="{{ route('products.index') }}" class="mt-4 inline-block bg-blue-500 hover:bg-blue-700 text-white px-4 py-2 rounded">
        Kembali ke Daftar Produk
    </a>
</div>
@endsection
