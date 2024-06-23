@extends('layouts.main')

@section('content')
    <div class="container">
        <h2 class="mt-4 mb-3">Add Product</h2>
        <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="nama">Nama Produk</label>
                        <input type="text" class="form-control" id="nama" name="nama" required>
                    </div>
                    <div class="form-group">
                        <label for="harga">Harga</label>
                        <input type="text" class="form-control" id="harga" name="harga" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="tipe">Type</label>
                        <select class="form-control" id="tipe" name="tipe" required>
                            @foreach ($types as $type)
                                <option value="{{ $type->id }}">{{ $type->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="deskripsi">Deskripsi</label>
                        <textarea class="form-control" id="deskripsi" name="deskripsi" rows="3" required></textarea>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="gambar">Gambar</label>
                <div class="custom-file">
                    <input type="file" class="custom-file-input" id="gambar" name="gambar" accept="image/*" required>
                    <label class="custom-file-label" for="gambar">Pilih Gambar...</label>
                </div>
            </div>

            <button type="submit" class="btn btn-primary">
                <i class="fas fa-plus-circle mr-2"></i> Tambah
            </button>
        </form>
    </div>
@endsection
