@extends('adminlte::page')

@section('title','Peminjaman')

@section('content_header')

<br>
@endsection


@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    @include('layouts._flash')
                   <b>Buku Yang Sedang Dipinjam</b>
                    <a href="{{route('pengembalian.create')}}" class="btn btn-sm btn-outline-primary float-right"><i>kembalikan Buku</i></a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <tr>
                                <th>No</th>
                                <th>Tanggal Pinjam</th> 
                                <th>Tanggal Pengembalian</th>
                                <th>Nama Buku</th>
                                <th>Nama Anggota</th>
                                <th>Denda</th>
                                <th>Aksi</th>


                            </tr>
                            @php $no=1; @endphp
                            @foreach ($kembali as $data)
                             <tr>
                                 <td>{{$no++}}</td>
                                 <td>{{$data->tanggal_peminjaman}}</td>
                                 <td>{{$data->tanggal_pengembalian}}</td>
                                 <td>{{$data->bukus->judul_buku}}</td>
                                 <td>{{$data->anggotas->nama_anggota}}</td>

                                    <?php
                                        $datetime2 = strtotime($data->tanggal_pengembalian) ;
                                        $datenow = strtotime(date("Y-m-d"));
                                        $durasi = ($datetime2 - $datenow) / 86400 ;
                                    ?>
                                <th>
                                    @if ($durasi < 0)
                                        <?php $denda = abs($durasi) * 1000 ; ?>
                                        {{ $denda }}
                                    @else
                                        0
                                    @endif
                                </th>




                                 <td>
                                     <form action="{{route('pengembalian.destroy',$data->id)}}" method="post">
                                        @method('delete')
                                        @csrf
                                        <button type="submit" class="btn btn-outline-danger" onclick="return confirm('Apakah anda yakin mengembalikan')">Hapus</button>
                                        </form>
                                 </td>
                             </tr>
                            @endforeach
                        </table>
                    </div>
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
