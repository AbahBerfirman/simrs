@extends('layouts.app')

@section('content')

    <!-- Horizontal Form -->
    <div class="card card-info">
        <div class="card-header">
            <h3 class="card-title">Edit Data</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form method="POST" action="/data-kelurahan/{{ $kelurahan->id }}" class="form-horizontal" enctype="multipart/form-data">
            @method('put')
            @csrf
            <div class="card-body">
                <div class="form-group row">
                    <label for="nama_kelurahan" class="col-sm-2 col-form-label">Kelurahan</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="nama_kelurahan" name="nama_kelurahan" placeholder="Kelurahan" @error('nama_kelurahan') is-invalid @enderror autofocus value="{{ old('nama_kelurahan', $kelurahan->nama_kelurahan) }}" oninput="this.value = this.value.toUpperCase()" required>

                        @error('nama_kelurahan')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label for="nama_kecamatan" class="col-sm-2 col-form-label">Kecamatan</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="nama_kecamatan" name="nama_kecamatan" placeholder="Kecamatan" @error('nama_kecamatan') is-invalid @enderror autofocus value="{{ old('nama_kecamatan', $kelurahan->nama_kecamatan) }}" oninput="this.value = this.value.toUpperCase()" required>

                        @error('nama_kecamatan')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label for="nama_kota" class="col-sm-2 col-form-label">Kota / Kabupaten</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="nama_kota" name="nama_kota" placeholder="Kota / Kab" @error('nama_kota') is-invalid @enderror autofocus value="{{ old('nama_kota', $kelurahan->nama_kota) }}" oninput="this.value = this.value.toUpperCase()" required>

                        @error('nama_kota')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
            </div>
                <!-- /.card-body -->
            <div class="card-footer">
                <button type="submit" class="btn btn-info">Simpan</button>
            </div>
            <!-- /.card-footer -->
        </form>
    </div>
    <!-- /.card -->
@endsection
