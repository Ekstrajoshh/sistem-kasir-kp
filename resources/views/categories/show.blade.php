@extends('layouts.app')

@section('content')
<div class="bg-white p-6 rounded-lg shadow-md max-w-md mx-auto">
    <h1 class="text-2xl font-bold mb-4 text-gray-800">Detail Kategori</h1>
    <div class="mb-4">
        <strong class="block text-sm font-medium text-gray-700">ID:</strong>
        <p class="text-gray-900">{{ $category->id }}</p>
    </div>
    <div class="mb-4">
        <strong class="block text-sm font-medium text-gray-700">Nama:</strong>
        <p class="text-gray-900">{{ $category->name }}</p>
    </div>
    <a href="{{ route('categories.index') }}" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">Kembali</a>
</div>
@endsection