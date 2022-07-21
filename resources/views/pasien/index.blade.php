@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Data Pasien</h1>
</div>

@if (session()->has('success'))
    <div class="alert alert-success col-lg-8" role="alert">
        {{ session('success') }}
    </div>
@endif

<div class="table-responsive">
    <a href="{{ route('data-pasien.create') }}" class="btn btn-primary mb-3"><i class="nav-icon fas fa-plus"></i> Add</a>
    <table id="example1" class="table table-striped table-sm">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nama</th>
                <th scope="col">Jenis Kelamin</th>
                <th scope="col">Alamat</th>
                <th scope="col">Kelurahan</th>
                <th scope="col">Telepon</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pasien as $post)
                <tr>
                    <td>{{ $post->id }}</td>
                    <td>{{ $post->nama }}</td>
                    <td>{{ $post->jenis_kelamin }}</td>
                    <td>{{ $post->alamat }}</td>
                    <td>{{ $post->kelurahan->nama_kelurahan }}</td>
                    <td>{{ $post->no_telp }}</td>
                    <td>
                        <a href="{{ route('data-pasien.show', $post) }}" class="badge bg-info"><i class="nav-icon fas fa-eye"></i></span></a>
                        <a href="{{ route('data-pasien.edit', $post) }}" class="badge bg-warning"><i class="nav-icon fas fa-edit"></i></a>
                        <form action="{{ route('data-pasien.destroy', $post) }}" method="POST" class="d-inline">
                            @method('delete')
                            @csrf
                            <button class="badge bg-danger border-0" onclick="return confirm('Are you sure?')"><i class="nav-icon fas fa-trash"></i></button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
