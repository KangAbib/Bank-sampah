@extends('layouts.main')

@section('content')
    <div class="container">
        <h1 class="text-2xl font-bold mb-3">Data Pemesanan</h1>
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @elseif(session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Pelanggan</th>
                    <th>Produk</th>
                    <th>Harga</th>
                    <th>Tipe</th>
                    <th>Deskripsi</th>
                    <th>Gambar</th>
                    <th>Telepon</th>
                    <th>Kota</th>
                    <th>Alamat</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($pemesanan as $pemesan)
                    <tr>
                        <td>{{ $pemesan->id }}</td>
                        <td>{{ $pemesan->pelanggan->fullname ?? 'Nama Pelanggan Tidak Ditemukan' }}</td>
                        <td>{{ $pemesan->produk->nama ?? 'Nama Produk Tidak Ditemukan' }}</td>
                        <td>{{ $pemesan->harga }}</td>
                        <td>{{ $pemesan->tipe }}</td>
                        <td>{{ $pemesan->deskripsi }}</td>
                        <td><img src="{{ asset('storage/gambar/' . $pemesan->gambar) }}" alt="Gambar Produk"
                                style="width: 100px;"></td>
                        <td>{{ $pemesan->pelanggan->telepon ?? 'Telepon tidak ditemukan' }}</td>
                        <td>{{ $pemesan->pelanggan->kota ?? 'Kota tidak ditemukan' }}</td>
                        <td>{{ $pemesan->pelanggan->alamat ?? 'Alamat tidak ditemukan' }}</td>
                        <td>{{ $pemesan->status }}</td>
                        <td>
                            <form
                                action="{{ route('pemesanan.updateStatus', ['id' => $pemesan->id, 'status' => 'dikonfirmasi']) }}"
                                method="POST" style="display:inline;">
                                @csrf
                                @method('PUT')
                                <button type="submit" class="btn btn-success"><i class="fa fa-check"></i></button>
                            </form>
                            <form
                                action="{{ route('pemesanan.updateStatus', ['id' => $pemesan->id, 'status' => 'belum dikonfirmasi']) }}"
                                method="POST" style="display:inline;">
                                @csrf
                                @method('PUT')
                                <button type="submit" class="btn btn-danger"><i class="fa fa-times"></i></button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
