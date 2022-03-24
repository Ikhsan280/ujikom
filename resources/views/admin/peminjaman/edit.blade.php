@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')

    Dashboard

@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Edit Peminjaman</div>
                    <div class="card-body">
                        @if ($errors->any())
                            <div class="alert alert-denger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                                <div>
                        @endif
                        <form action="{{ route('peminjaman.update', $pinjam->id) }}" method="post" accept="">
                            @csrf
                            @method('put')
                            <div class="col-md-12">
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
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="">Tanggal Pinjam</label>
                                        <input type="date" name="tanggal_pinjam" value="{{ $pinjam->tanggal_pinjam }}"
                                            class="form-control @error('tanggal_pinjam') is-invalid @enderror">
                                        @error('tanggal_pinjam')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="">Tanggal Kembali</label>
                                            <input type="date" name="tanggal_kembali" value="{{ $pinjam->tanggal_kembali }}"
                                                class="form-control @error('tanggal_kembali') is-invalid @enderror">
                                            @error('tanggal_kembali')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        

                                            <div class="form-group">
                                                <button type="reset" class="btn btn-outline-warning">Reset</button>
                                                <button type="submit" class="btn btn-outline-primary">Save</button>
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