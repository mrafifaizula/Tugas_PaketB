
@extends('layout.layout')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Data koperasi
                    <a href="{{ route('koperasi.index') }}" class="btn btn-sm btn-primary"
                        style="float: right">Kembali</a>
                </div>
                <div class="card-body">
                    <form action="{{ route('koperasi.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-2">
                            <label for="">ID Mahasiswa</label>
                            <select name="id_mhs" class="form-control @error('koperasi') is-invalid @enderror">
                                <option value="">Mahasiswa</option>
                                @foreach ($mahasiswa as $data)
                                <option value="{{$data->id}}">{{$data->nama}}</option>
                                @endforeach
                            </select>
                            @error('tgl')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message}}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="mb-2">
                            <label for="jml">jml</label>
                            <input type="text" class="form-control @error('jml') is-invalid @enderror" name="jml">
                            @error('jml')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        
                        <div class="mb-2">
                            <label for="tgl">tgl</label>
                            <input type="date" class="form-control @error('tgl') is-invalid @enderror" name="tgl" >
                            @error('tgl')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="mb-2">
                            <button class="btn btn-sm btn-success" type="submit">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection