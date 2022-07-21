@extends('layouts.app')

@section('content')
<!-- Horizontal Form -->
<div class="card card-info">
    <div class="card-header">
        <h3 class="card-title">Tambah Data</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form method="POST" action="/data-pasien" class="form-horizontal" enctype="multipart/form-data">
        @csrf
        <div class="card-body">

            <div class="form-group row">
                <label for="id" class="col-sm-2 col-form-label">#</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="id" name="id" @error('id') is-invalid @enderror autofocus value="{{ $pasien->id }}" oninput="this.value = this.value.toUpperCase()" readonly required>

                    @error('id')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <label for="nama" class="col-sm-2 col-form-label">Nama Pasien</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama" @error('nama') is-invalid @enderror autofocus value="{{ $pasien->nama }}" oninput="this.value = this.value.toUpperCase()" readonly required>

                    @error('nama')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Alamat" @error('alamat') is-invalid @enderror autofocus value="{{ $pasien->alamat }}" oninput="this.value = this.value.toUpperCase()" readonly required>

                    @error('alamat')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <label for="no_telp" class="col-sm-2 col-form-label">Telepon</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="no_telp" name="no_telp" placeholder="Telepon" @error('no_telp') is-invalid @enderror autofocus value="{{ $pasien->no_telp }}" oninput="this.value = this.value.toUpperCase()" readonly required>

                    @error('no_telp')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <label for="rtrw" class="col-sm-2 col-form-label">RT / RW</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="rtrw" name="rtrw" placeholder="RT / RW" @error('rtrw') is-invalid @enderror autofocus value="{{ $pasien->rtrw }}" oninput="this.value = this.value.toUpperCase()" readonly required>

                    @error('rtrw')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <label for="kelurahan" class="col-sm-2 col-form-label">Kelurahan</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="kelurahan_id" name="kelurahan_id" @error('kelurahan_id') is-invalid @enderror autofocus value="{{ $pasien->kelurahan->nama_kelurahan }}" oninput="this.value = this.value.toUpperCase()" readonly required>
                </div>
            </div>
            <div class="form-group row">
                <label for="ttl" class="col-sm-2 col-form-label">Tanggal Lahir</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="ttl" name="ttl" @error('ttl') is-invalid @enderror autofocus value="{{ $pasien->ttl->isoFormat('dddd, D MMMM Y') }}" oninput="this.value = this.value.toUpperCase()" readonly required>

                    @error('ttl')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <label for="jenis_kelamin" class="col-sm-2 col-form-label">Jenis Kelamin</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="jenis_kelamin" name="jenis_kelamin" @error('jenis_kelamin') is-invalid @enderror autofocus value="{{ $pasien->jenis_kelamin }}" oninput="this.value = this.value.toUpperCase()" readonly required>
                </div>
            </div>
        </div>
            <!-- /.card-body -->
        <div class="card-footer">
            <a href="{{ route('data-pasien.index') }}" class="btn btn-success"><i class="nav-icon fas fa-undo"></i> Back</a>
            <a href="{{ route('data-pasien.edit', $pasien) }}" class="btn btn-warning"><i class="nav-icon fas fa-edit"></i> Edit</a>
            <form action="{{ route('data-pasien.destroy', $pasien) }}" method="POST" class="d-inline">
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
