@extends('adminlte::page')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Edit Data Petugas</div>
                    <div class="card-body">
                        <form action="{{ route('petugas.update', $petugas->id) }}" method="post">
                            @csrf
                            @method('put')
                            <div class="form-group">
                                <label for="">Nama Petugas</label>
                                <input type="text" name="nama_petugas" value="{{ $petugas->nama_petugas }}"
                                    class="form-control @error('nama_petugas') is-invalid @enderror">
                                @error('nama_petugas')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="">Jabatan Petugas</label>
                                <input type="text" name="jabatan_petugas" value="{{ $petugas->jabatan_petugas }}"
                                    class="form-control @error('jabatan_petugas') is-invalid @enderror">
                                @error('jabatan_petugas')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="">No Telepon</label>
                                <input type="text" name="no_telp" value="{{ $petugas->no_telp }}"
                                    class="form-control @error('no_telp') is-invalid @enderror">
                                @error('no_telp')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="">Alamat</label>
                                <input type="text" name="alamat" value="{{ $petugas->alamat }}"
                                    class="form-control @error('alamat') is-invalid @enderror">
                                @error('alamat')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <button type="reset" class="btn btn-outline-warning">Reset</button>
                                <button type="submit" class="btn btn-outline-primary">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
