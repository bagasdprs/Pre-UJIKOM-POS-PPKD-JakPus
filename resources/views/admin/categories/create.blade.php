@extends('layouts.app')

@section('title', 'Tambah Kategori')

@section('content')
<div class="max-w-2xl mx-auto p-6 bg-white rounded-lg shadow mt-8">
    <h2 class="text-2xl font-bold mb-6">Tambah Kategori</h2>

    <form action="{{ route('categories.store') }}" method="POST" class="space-y-5">
        @csrf

        <div>
            <label class="block mb-1 font-semibold">Nama Kategori</label>
            <input type="text" name="category_name" class="border w-full p-2 rounded focus:ring focus:border-blue-300" required>
        </div>

        <button type="submit" class="bg-blue-600 hover:bg-blue-800 text-white font-semibold px-6 py-2 rounded-lg">
            Simpan Kategori
        </button>
    </form>
</div>
@endsection
