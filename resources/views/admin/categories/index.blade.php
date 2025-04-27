@extends('layouts.app')

@section('title', 'Daftar Kategori')

@section('content')
<div class="max-w-6xl mx-auto p-6 bg-white rounded-lg shadow mt-8">
    <h2 class="text-2xl font-bold mb-6">Daftar Kategori</h2>

    <a href="{{ route('categories.create') }}" class="bg-green-500 hover:bg-green-700 text-white font-semibold px-4 py-2 rounded mb-6 inline-block">
        + Tambah Kategori
    </a>

    <div class="overflow-x-auto">
        <table class="min-w-full bg-white border border-gray-200 rounded-lg shadow">
            <thead class="bg-gray-200">
                <tr>
                    <th class="py-3 px-6 text-left">ID</th>
                    <th class="py-3 px-6 text-left">Nama Kategori</th>
                    <th class="py-3 px-6 text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($datas as $data)
                <tr class="border-t">
                    <td class="py-3 px-6">{{ $data->id }}</td>
                    <td class="py-3 px-6">{{ $data->category_name }}</td>
                    <td class="py-3 px-6 flex justify-center gap-2">
                        <a href="{{ route('categories.edit', $data->id) }}" class="bg-yellow-500 hover:bg-yellow-700 text-white font-semibold px-4 py-2 rounded">
                            Edit
                        </a>
                        <form action="{{ route('categories.destroy', $data->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus kategori ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-600 hover:bg-red-800 text-white font-semibold px-4 py-2 rounded">
                                Hapus
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
