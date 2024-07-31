@extends('layout.layout')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="mb-2">
                    <label for="">Nama Mahasiswa</label>
                    <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama"
                        value="{{$koperasi->nama}}" disabled>
                </div>
                <div class="card-header">Data koperasi
                    <a href="{{route('koperasi.index')}}" class="btn btn-sm btn-primary"
                        style="float: right">Kembali</a>
                </div>
                <div class="card-body">
                    <div class="mb-2">
                        <label for="">Jumlah</label>
                        <input type="text" class="form-control @error('jml') is-invalid @enderror" name="jml"
                            value="{{$koperasi->jml}}" disabled>
                    </div>
                    <div class="mb-2">
                        <label for="">Tanggal</label>
                        <input type="text" class="form-control @error('tgl') is-invalid @enderror" name="tgl"
                            value="{{$koperasi->tgl}}" disabled>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection