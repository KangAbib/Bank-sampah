@extends('layouts.main')

@section('content')
    <div class="container mx-auto px-4 py-8">
        <h2 class="text-2xl font-bold mb-3">Add New Type Product</h2>
        <form action="{{ route('typeproduct.store') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label for="name" class="block text-sm font-medium text-gray-700">Nama</label>
                <input type="text" name="name" id="name" class="form-input mt-1 block w-full" required>
            </div>
            <div class="mt-4">
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md">Tambah Type Product</button>
            </div>
        </form>
    </div>
@endsection
