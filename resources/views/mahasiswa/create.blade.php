@extends('layout.layout')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Data mahasiswa
                    <a href="{{ route('mahasiswa.index') }}" class="btn btn-sm btn-primary" style="float: right">Kembali</a>
                </div>
                <div class="card-body">
                    <form action="{{ route('mahasiswa.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="mb-2">
                                <label for="nama">Nama</label>
                                <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama">
                                @error('nama')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="col">
                                <div class="mb-2">
                                    <label for="nim">NIM</label>
                                    <input type="text" class="form-control @error('nim') is-invalid @enderror"
                                        name="nim">
                                    @error('nim')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="mb-2">
                                    <label for="kelas">Kelas</label>
                                    <input type="text" class="form-control @error('kelas') is-invalid @enderror"
                                        name="kelas">
                                    @error('kelas')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col">
                                <div class="mb-2">
                                    <label for="jk">Jenis Kelamin</label>
                                    <select name="jk" class="form-control select @error('jk') is-invalid @enderror">
                                        <option value="">Jenis Kelamin</option>
                                        <option value="1">Laki Laki</option>
                                        <option value="2">Perempuan</option>
                                    </select>
                                    @error('jk')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="mb-2">
                                    <label for="agama">Agama</label>
                                    <select name="agama" class="form-control select @error('agama') is-invalid @enderror">
                                        <option value="">Agama</option>
                                        <option value="Islam">Islam</option>
                                        <option value="Hindu">Hindu</option>
                                        <option value="Buddha">Buddha</option>
                                        <option value="Kristen">Kristen</option>
                                    </select>
                                    @error('agama')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        
                        <div class="mb-2">
                            <label for="foto">foto</label>
                            <input type="file" name="foto" class="form-control @error('foto') is-invalid @enderror">
                            @error('foto')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="mb-2">
                            <label for="alamat">alamat mahasiswa</label>
                            <textarea class="form-control @error('alamat') is-invalid @enderror"
                                name="alamat"></textarea>
                            @error('alamat')
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