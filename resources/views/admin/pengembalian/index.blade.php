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
                   <b>Buku Yang Sudah dikembalikan</b>
                    <a href="{{route('pengembalian.create')}}" class="btn btn-sm btn-outline-primary float-right"><i>kembalikan Buku</i></a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table" id="kembali">
                            <thead>
                            <tr>
                                <th>No</th>
                                <th>Tanggal Pinjam</th> 
                                <th>Tanggal Pengembalian</th>
                                <th>Nama Buku</th>
                                <th>Nama Anggota</th>
                                    <th>Denda</th>
                                <th>Aksi</th>


                            </tr>
                        </thead>
                        <tbody>
                            @php $no=1; @endphp
                            @foreach ($kembali as $data)
                             <tr>
                                 <td>{{$no++}}</td>
                                 <td>{{$data->tanggal_peminjaman}}</td>
                                 <td>{{$data->tanggal_pengembalian}}</td>
                                 <td>{{$data->bukus->judul_buku}}</td>
                                 <td>{{$data->anggotas->nama_anggota}}</td>
                                 <td>{{$data->denda}}</td>
                                 <td>
                                     <form action="{{route('pengembalian.destroy',$data->id)}}" method="post">
                                        @method('delete')
                                        @csrf
                                        <button type="submit" class="btn btn-outline-danger" onclick="return confirm('Apakah anda yakin mengembalikan')">Hapus</button>
                                        </form>
                                 </td>
                             </tr>
                            </tbody>
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
<link rel="stylesheet" type="text/css" href="{{asset('DataTables/datatables.min.css')}}">

@endsection

@section('js')
<script  type="text/javascript" src="{{asset('DataTables/datatables.min.js')}}"> </script>
<script>
    $(document).ready(function(){
        $('#kembali').DataTable();
    });
</script>

@endsection
