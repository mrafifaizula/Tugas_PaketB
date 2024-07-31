@extends('layout.layout')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @if(session('success'))
            <div class="alert alert-success fade show" role="alert">
                {{ session('success') }}
            </div>
            @endif

            <div class="card border-secondary">
                <div class="card-header">Data mahasiswa
                    <a href="{{ route('mahasiswa.create') }}" class="btn btn-sm btn-primary" style="float: right">Tambah</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="datatable">
                            <thead>
                                <tr >
                                    <th>No</th>
                                    <th>Nim</th>
                                    <th>Nama</th>
                                    <th>Kelas</th>
                                    <th>Foto</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $no = 1; @endphp
                                @foreach ($mahasiswa as $item)
                                <tr align="center">
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $item->nim }}</td>
                                    <td>{{ $item->nama }}</td>
                                    <td>{{ $item->kelas }}</td>
                                    <td><img src="{{ asset('images/mahasiswa/' .$item->foto)}}"
                                            style="width: 120px; height: 100px;" alt="">
                                    </td>
                                    <td>
                                        <form action="{{ route('mahasiswa.destroy', $item->id) }}" method="post">
                                            @method('DELETE')
                                            @csrf
                                            <a href="{{ route('mahasiswa.edit', $item->id) }}"
                                                class="btn btn-sm btn-success">Edit</a>
                                            <a href="{{ route('mahasiswa.show', $item->id) }}"
                                                class="btn btn-sm btn-warning">Show</a>
                                            <button class="btn btn-sm btn-danger" type="submit"
                                                onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection