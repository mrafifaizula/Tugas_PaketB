@extends('layout.layout')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            @if(session('success'))
            <div class="alert alert-success fade show" role="alert">
                {{ session('success') }}
            </div>
            @endif

            <div class="card border-secondary">
                <div class="card-header">Data koperasi
                    <a href="{{ route('koperasi.create') }}" class="btn btn-sm btn-primary"
                        style="float: right">Tambah</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="datatable">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Jumlah</th>
                                    <th>Tanggal</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $no = 1; @endphp
                                @foreach ($koperasi as $item)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $item->mahasiswa->nama }}</td>
                                    <td>{{ $item->jml }}</td>
                                    <td>{{ $item->tgl }}</td>
                                    <td>{{ $item->id_mhs }}</td>
                                    <td align="center">
                                        <form action="{{ route('koperasi.destroy', $item->id) }}" method="post">
                                            @method('DELETE')
                                            @csrf
                                            <a href="{{ route('koperasi.edit', $item->id) }}"
                                                class="btn btn-sm btn-success">Edit</a>
                                            <a href="{{ route('koperasi.show', $item->id) }}"
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