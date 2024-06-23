@extends('layouts.main')

@section('content')
    <div class="container">
        <h2 class="mt-4 mb-3">Update Product</h2>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <h1>{{ $product->id }}</h1>
            <div class="form-group">
                <label for="productName">Nama Produk</label>
                <input type="text" class="form-control" id="productName" name="nama" value="{{ $product->nama }}" required>
            </div>
            <div class="form-group">
                <label for="price">Harga</label>
                <input type="text" class="form-control" id="price" name="harga" value="{{ $product->harga }}" required>
            </div>
            <div class="form-group">
                <label for="type">Type</label>
                <select class="form-control" id="type" name="tipe" required>
                    @foreach ($types as $type)
                        <option value="{{ $type->id }}" {{ $product->tipe == $type->id ? 'selected' : '' }}>{{ $type->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="description">Deskripsi</label>
                <textarea class="form-control" id="description" name="deskripsi" rows="3" required>{{ $product->deskripsi }}</textarea>
            </div>
            <div class="form-group">
                <label for="image">Gambar</label>
                <input type="file" class="form-control-file" id="image" name="gambar" accept="image/*">
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
@endsection
