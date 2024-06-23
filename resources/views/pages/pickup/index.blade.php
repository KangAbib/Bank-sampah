<!-- resources/views/pickup/index.blade.php -->
@extends('layouts.main')

@section('content')
    <div class="container">
        <h1 class="text-2xl font-bold mb-3">Data Pickup</h1>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Full Name</th>
                    <th>tipe Produk</th>
                    <th>Berat</th>
                    <th>Harga</th>
                    <th>Tanggal Penjemputan</th>
                    <th>Alamat</th>
                    <th>Catatan</th>
                </tr>
            </thead>
            <tbody>
                @foreach($pickup as $pickup)
                    <tr>
                        <td>{{ $pickup->id }}</td>
                        <td>{{ $pickup->fullname }}</td>
                        <td>{{ $pickup->tipe ? $pickup->typeProduct->name : 'N/A' }}</td>
                        <td>{{ $pickup->berat }}</td>
                        <td>{{ $pickup->harga }}</td>
                        <td>{{ $pickup->tanggal_penjemputan->format('Y-m-d') }}</td>
                        <td>{{ $pickup->alamat }}</td>
                        <td>{{ $pickup->catatan ?? 'N/A' }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
