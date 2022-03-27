@extends('adminlte::page')

@section('title','Tambah pengembalian')

@section('content_header')

<br>
@endsection


@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Input Data Pengembalian</div>
                <div class="card-body">
                   <form action="{{route('pengembalian.store')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="">Masukan Tanggal Pinjam</label>
                            <input type="date" name="tanggal_peminjaman" class="form-control @error('tanggal_peminjaman') is-invalid @enderror">
                             @error('tanggal_peminjaman')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Masukan Tanggal Pengembalian</label>
                            <input type="date" name="tanggal_pengembalian" class="form-control @error('tanggal_pengembalian') is-invalid @enderror">
                             @error('tanggal_pengembalian')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        
                       
                         <div class="form-group">
                            <label for="">Masukan Denda</label>
                            <input type="numeric" name="denda" class="form-control @error('denda') is-invalid @enderror">
                             @error('denda')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Masukan nama Buku</label>
                            <select name="buku_id" class="form-control @error('kode_buku') is-invalid @enderror">
                                @foreach($buku as $data)
                                <option value="{{$data->id}}">{{$data->judul_buku}}</option>
                                @endforeach
                            </select>
                            @error('kode_buku')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{$message}}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Masukan Nama Anggota</label>
                            <select name="anggota_id" class="form-control @error('nama_anggota') is-invalid @enderror">
                                @foreach($anggota as $data)
                                <option value="{{$data->id}}">{{$data->nama_anggota}}</option>
                                @endforeach
                            </select>
                           @error('nama_anggota')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>



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

@section('css')

@endsection

@section('js')

@endsection
