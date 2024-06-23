@extends('layouts.main')

@section('content')
    <div class="container mx-auto px-4 py-8">
        <h2 class="text-2xl font-bold mb-3">Product Table</h2>
        <form action="{{ route('products.create') }}" method="GET" class="inline-block">
            @csrf
            <button type="submit" class="bg-yellow-500 text-white px-4 py-2 rounded-md">+ Add Product</button>
        </form>
        <div class="mt-4">
            <table class="min-w-full divide-y divide-gray-200">
                <thead>
                    <tr>
                        <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            ID
                        </th>
                        <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Nama Produk
                        </th>
                        <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Harga
                        </th>
                        <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Type
                        </th>
                        <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Deskripsi
                        </th>
                        <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Gambar
                        </th>
                        <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Aksi
                        </th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @foreach ($dataproducts as $data)


                        <tr>
                            <td class="px-4 py-2 whitespace-nowrap">{{ $data->id }}</td>
                            <td class="px-4 py-2 whitespace-nowrap">{{ $data->nama }}</td>
                            <td class="px-4 py-2 whitespace-nowrap">{{ $data->harga }}</td>
                            <td class="px-4 py-2 whitespace-nowrap">
                                @if ($data->typeProduct)
                                    {{ $data->typeProduct->name }}
                                @else
                                    Tipe tidak ditemukan
                                @endif
                            </td>


                            <td class="px-4 py-2 whitespace-nowrap">{{ $data->deskripsi }}</td>
                            <td class="px-4 py-2 whitespace-nowrap">
                                <img src="{{ asset('storage/gambar/' . $data->gambar) }}" alt="{{ $data->nama }}"
                                    width="100">
                            </td>
                            <td class="px-4 py-2 whitespace-nowrap">
                                <a href="{{ route('products.edit', $data->id) }}" class="text-blue-500 hover:underline mr-2">
                                    <i class="material-icons">edit</i> Edit
                                </a>
                                <form action="{{ route('products.destroy', $data->id) }}" method="POST" style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-500 hover:underline">
                                        <i class="material-icons">delete</i> Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
         <!-- Pagination Links -->
         <div class="mt-4">
            {{ $dataproducts->links() }}
        </div>
    </div>
@endsection
