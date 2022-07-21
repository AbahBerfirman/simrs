@extends('layouts.app')

@section('content')
<!-- Horizontal Form -->
<div class="card card-info">
    <div class="card-header">
        <h3 class="card-title">Tambah Data</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form method="POST" action="/data-kelurahan" class="form-horizontal" enctype="multipart/form-data">
        @csrf
        <div class="card-body">
            <div class="form-group row">
                <label for="nama_kelurahan" class="col-sm-2 col-form-label">Kelurahan</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="nama_kelurahan" name="nama_kelurahan" placeholder="Kelurahan" @error('nama_kelurahan') is-invalid @enderror autofocus value="{{ $kelurahan->nama_kelurahan }}" oninput="this.value = this.value.toUpperCase()" readonly>
                </div>
            </div>
            <div class="form-group row">
                <label for="nama_kecamatan" class="col-sm-2 col-form-label">Kecamatan</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="nama_kecamatan" name="nama_kecamatan" placeholder="Kecamatan" @error('nama_kecamatan') is-invalid @enderror autofocus value="{{ $kelurahan->nama_kecamatan }}" oninput="this.value = this.value.toUpperCase()" readonly>
                </div>
            </div>
            <div class="form-group row">
                <label for="nama_kota" class="col-sm-2 col-form-label">Kota / Kabupaten</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="nama_kota" name="nama_kota" placeholder="Kota / Kab" @error('nama_kota') is-invalid @enderror autofocus value="{{ $kelurahan->nama_kota }}" oninput="this.value = this.value.toUpperCase()" readonly>
                </div>
            </div>
        </div>
            <!-- /.card-body -->
        <div class="card-footer">
            <a href="{{ route('data-kelurahan.index') }}" class="btn btn-success"><i class="nav-icon fas fa-undo"></i> Back</a>
            <a href="{{ route('data-kelurahan.edit', $kelurahan) }}" class="btn btn-warning"><i class="nav-icon fas fa-edit"></i> Edit</a>
            <form action="{{ route('data-kelurahan.destroy', $kelurahan) }}" method="POST" class="d-inline">
                @method('delete')
                @csrf
                <button class="btn btn-danger border-0" onclick="return confirm('Are you sure?')"><i class="nav-icon fas fa-trash"></i> Delete</button>
            </form>
        </div>
        <!-- /.card-footer -->
    </form>
</div>
<!-- /.card -->
@endsection
