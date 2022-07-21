@extends('layouts.app')

@section('content')

    <!-- Horizontal Form -->
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Tambah Data</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form method="POST" action="/data-pasien" class="form-horizontal" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
                {{-- <input type="hidden" name="id" id="id" value=""> --}}
                <div class="form-group row">
                    <label for="nama" class="col-sm-2 col-form-label">Nama Pasien</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama" @error('nama') is-invalid @enderror autofocus value="{{ old('nama') }}" oninput="this.value = this.value.toUpperCase()" required>

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
                        <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Alamat" @error('alamat') is-invalid @enderror autofocus value="{{ old('alamat') }}" oninput="this.value = this.value.toUpperCase()" required>

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
                        <input type="text" class="form-control" id="no_telp" name="no_telp" placeholder="Telepon" @error('no_telp') is-invalid @enderror autofocus value="{{ old('no_telp') }}" oninput="this.value = this.value.toUpperCase()" required>

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
                        <input type="text" class="form-control" id="rtrw" name="rtrw" placeholder="RT / RW" @error('rtrw') is-invalid @enderror autofocus value="{{ old('rtrw') }}" oninput="this.value = this.value.toUpperCase()" required>

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
                        <select class="form-control" name="kelurahan_id" required>
                            @foreach ($kelurahan as $lurah)
                                @if (old('kelurahan_id') == $lurah->id)
                                <option value="{{ $lurah->id }}" selected>{{ $lurah->nama_kelurahan }}</option>
                                @else
                                <option value="{{ $lurah->id }}">{{ $lurah->nama_kelurahan }}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="ttl" class="col-sm-2 col-form-label">Tanggal Lahir</label>
                    <div class="col-sm-10">
                        <input type="date" class="form-control" id="ttl" name="ttl" @error('ttl') is-invalid @enderror autofocus value="{{ old('ttl') }}" oninput="this.value = this.value.toUpperCase()" required>

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
                        <select name="jenis_kelamin" id="jenis_kelamin" class="form-control">
                            <option selected>-- Pilih --</option>
                            <option value="LAKI-LAKI">LAKI-LAKI</option>
                            <option value="PEREMPUAN">PEREMPUAN</option>
                        </select>
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
