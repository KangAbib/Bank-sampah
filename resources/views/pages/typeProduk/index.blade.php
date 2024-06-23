@extends('layouts.main')

@section('content')
    <div class="container mx-auto px-4 py-8">
        <h2 class="text-2xl font-bold mb-3">Type Product List</h2>
        <a href="{{ route('typeproduct.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded-md mb-4">Add New Type Product</a>
        <div class="mt-4">
            <table class="min-w-full divide-y divide-gray-200">
                <thead>
                    <tr>
                        <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID</th>
                        <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nama</th>
                        <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Created At</th>
                        <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th> <!-- Tambah kolom untuk actions -->
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @foreach ($typeProducts as $typeProduct)
                        <tr>
                            <td class="px-4 py-2 whitespace-nowrap">{{ $typeProduct->id }}</td>
                            <td class="px-4 py-2 whitespace-nowrap">{{ $typeProduct->name }}</td>
                            <td class="px-4 py-2 whitespace-nowrap">{{ $typeProduct->created_at }}</td>
                            <td class="px-4 py-2 whitespace-nowrap">
                                <a href="{{ route('typeproduct.edit', $typeProduct->id) }}" class="text-blue-500 hover:underline mr-2"><i class="material-icons">edit</i>Edit</a> <!-- Tautan edit -->
                                <form action="{{ route('typeproduct.destroy', $typeProduct->id) }}" method="POST" style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-500 hover:underline"><i class="material-icons">delete</i>Delete</button> <!-- Tombol delete -->
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
