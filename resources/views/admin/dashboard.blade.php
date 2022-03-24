@extends('adminlte::page')

@section('title','Dashboard')

@section('content_header')

Beranda

@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">

        <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box mb-3">
                    <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-book"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Buku</span>
                        <span class="info-box-number">
                            {{$buku}} Buku
                        </span>

                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->

        <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box">
                    <span class="info-box-icon bg-info elevation-1"><i class="fas fa-user"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Anggota</span>
                        <span class="info-box-number">
                        {{ $anggota }} Anggota
                        </span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->

            <!-- fix for small devices only -->
            <div class="clearfix hidden-md-up"></div>

            <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box mb-3">
                    <span class="info-box-icon bg-success elevation-1"><i class="far fa-user"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">petugas</span>
                        <span class="info-box-number">
                            {{$users}} Petugas
                        </span>

                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->

            <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box mb-3">
                    <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-chart-bar"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Peminjam</span>
                        <span class="info-box-number">
                            {{$pinjam}} Pinjam
                        </span>

                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
           
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->
        </div>
    </div>

@endsection