@extends('layouts.main')

@section('content')
    <div class="container mx-auto px-4 py-8">
        <h2 class="text-2xl font-bold mb-3">Edit Type Product</h2>
        <form action="{{ route('typeproduct.update', $typeproduct->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $typeproduct->name }}" required>
            </div>
            <button type="submit" class="btn btn-primary mt-3">Update Type Product</button>
        </form>
    </div>
@endsection
