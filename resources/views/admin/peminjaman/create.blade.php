@extends('adminlte::page')

@section('title','Petugas Baru')

@section('content_header')

<br>
@endsection


@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Data Peminjaman</div>
                <div class="card-body">
                    <form action="{{route('peminjaman.store')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                          
                            <div class="form-group">
                                <label for="">Tanggal Pinjam</label>
                                <input type="date" name="tanggal_pinjam"
                                    class="form-control @error('tanggal_pinjam') is-invalid @enderror">
                                @error('tanggal_pinjam')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="">Tanggal Kembali</label>
                                <input type="date" name="tanggal_kembali" 
                                    class="form-control @error('tanggal_kembali') is-invalid @enderror">
                                @error('tanggal_kembali')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                            <label for="">Nama Buku</label>
                            <select name="buku_id" class="form-control @error('buku_id') is-invalid @enderror" >
                                @foreach($buku as $data)
                                    <option value="{{$data->id}}">{{$data->judul_buku}}</option>
                                @endforeach
                            </select>
                            @error('buku_id')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                           

                            <label for="">Anggota</label>
                            <select name="anggota_id" class="form-control @error('anggota_id') is-invalid @enderror" >
                                @foreach($anggota as $data)
                                    <option value="{{$data->id}}">{{$data->nama_anggota}}</option>
                                @endforeach
                            </select>
                            @error('nama_anggota')
                            <span class="invalid-feedbaack" role="alert">
                                <strong>{{$message}}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Nama Petugas</label>
                            <select name="users_id" class="form-control @error('users_id') is-invalid @enderror" >
                                @foreach($pinjam as $data)
                                    <option value="{{$data->id}}">{{$data->name}}</option>
                                @endforeach
                            </select>
                            @error('buku_id')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        <div class="form-group right">
                            <button type="reset" class="btn btn-outline-danger">Reset</button>
                            <button type="submit" class="btn btn-outline-primary">Simpan</button>
                        </div>
                </div>
            </form>
            </div>
        </div>
    </div>
</div>
</div>

@endsection

@section('css')

@endsection

@section('js')

@endsection
