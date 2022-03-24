@extends('adminlte::page')

@section('title','Buku Baru')

@section('content_header')

<br>
@endsection


@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Input Buku Masuk</div>
                <div class="card-body">
                    <form action="{{route('buku.store')}}" method="post">
                        @csrf
                        
                        <div class="form-group">
                            <label for="">Judul Buku</label>
                            <input type="text" name="judul_buku"
                                class="form-control @error('judul_buku') is-invalid @enderror">
                            @error('judul_buku')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Penulis</label>
                            <input type="text" name="penulis_buku" 
                                class="form-control @error('penulis_buku') is-invalid @enderror">
                            @error('penulis_buku')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="">Penerbit</label>
                            <input type="text" name="penerbit_buku"
                                class="form-control @error('penerbit_buku') is-invalid @enderror">
                            @error('penerbit_buku')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="">Tahun Terbit</label>
                            <input type="numeric" name="tahun_penerbit"
                                class="form-control @error('tahun_penerbit') is-invalid @enderror">
                            @error('tahun_penerbit')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Stok</label>
                            <input type="numeric" name="stok"
                                class="form-control @error('stok') is-invalid @enderror">
                            @error('stok')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                            @error('judul_buku')

                            <span class="invalid-feedbaack" role="alert">
                                <strong>Isi Data Buku</strong>
                            </span>
                            @enderror
                        </div>
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
