@extends('layouts.app')

@section('title', 'Daftar Produk')

@section('content')
<div class="max-w-6xl mx-auto p-6 bg-white rounded-lg shadow mt-8">
    <h2 class="text-2xl font-bold mb-6">Daftar Produk</h2>

    <a href="{{ route('products.create') }}" class="bg-green-500 hover:bg-green-700 text-white font-semibold px-4 py-2 rounded mb-6 inline-block">
        + Tambah Produk
    </a>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        @foreach($products as $product)
        <div class="border rounded-lg p-4 shadow hover:shadow-lg transition">
            @if($product->image)
                <img src="{{ asset('storage/' . $product->image) }}" class="h-48 w-full object-cover rounded mb-4">
            @else
                <div class="h-48 bg-gray-300 flex items-center justify-center mb-4 rounded">
                    No Image
                </div>
            @endif

            <div class="text-lg font-semibold">{{ $product->name }}</div>
            <div>Harga: Rp {{ number_format($product->price, 0, ',', '.') }}</div>
            <div>Stok: {{ $product->stock }}</div>

            <div class="flex gap-2 mt-4">
                <a href="{{ route('products.show', $product->id) }}" class="bg-blue-500 hover:bg-blue-700 text-white px-4 py-2 rounded">
                    Detail
                </a>
                <a href="{{ route('products.edit', $product->id) }}" class="bg-yellow-500 hover:bg-yellow-700 text-white px-4 py-2 rounded">
                    Edit
                </a>

                <form id="delete-form-{{ $product->id }}" action="{{ route('products.destroy', $product->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="button" onclick="deleteConfirmation({{ $product->id }})" class="bg-red-600 hover:bg-red-800 text-white px-4 py-2 rounded">
                        Hapus
                    </button>
                </form>
            </div>
        </div>
        @endforeach
    </div>
</div>

<script>
    function deleteConfirmation(id) {
        Swal.fire({
            title: 'Yakin ingin menghapus?',
            text: "Data produk akan dihapus permanen!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Ya, hapus!',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('delete-form-' + id).submit();
            }
        });
    }
</script>
@endsection
