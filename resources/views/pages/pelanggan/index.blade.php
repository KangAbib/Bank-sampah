<!-- resources/views/pelanggan/index.blade.php -->
@extends('layouts.main')


@section('content')
    <div class="container">
        <h1 class="text-2xl font-bold mb-3">Data Pelanggan</h1>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Username</th>
                    <th>Full Name</th>
                    <th>Alamat</th>
                    <th>Telepon</th>
                    <th>Kota</th>
                </tr>
            </thead>
            <tbody>
                @foreach($pelanggan as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->username }}</td>
                        <td>{{ $item->fullname }}</td>
                        <td>{{ $item->alamat }}</td>
                        <td>{{ $item->telepon }}</td>
                        <td>{{ $item->kota }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
