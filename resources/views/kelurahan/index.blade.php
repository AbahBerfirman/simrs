@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Data Kelurahan</h1>
</div>

@if (session()->has('success'))
    <div class="alert alert-success col-lg-8" role="alert">
        {{ session('success') }}
    </div>
@endif

<div class="table-responsive">
    <a href="{{ route('data-kelurahan.create') }}" class="btn btn-primary mb-3"><i class="nav-icon fas fa-plus"></i> Add</a>
    <table id="example1" class="table table-striped table-sm">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Kelurahan</th>
                <th scope="col">Kecamatan</th>
                <th scope="col">Kota</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($kelurahan as $post)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $post->nama_kelurahan }}</td>
                    <td>{{ $post->nama_kecamatan }}</td>
                    <td>{{ $post->nama_kota }}</td>
                    <td>
                        <a href="{{ route('data-kelurahan.show', $post) }}" class="badge bg-info"><i class="nav-icon fas fa-eye"></i></span></a>
                        <a href="{{ route('data-kelurahan.edit', $post) }}" class="badge bg-warning"><i class="nav-icon fas fa-edit"></i></a>
                        <form action="{{ route('data-kelurahan.destroy', $post) }}" method="POST" class="d-inline">
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
<script>
    $(function () {
        $("#example1").DataTable({
            "responsive": true, "lengthChange": false, "autoWidth": false,
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        $('#example2').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
        });
    });
</script>
@endsection
