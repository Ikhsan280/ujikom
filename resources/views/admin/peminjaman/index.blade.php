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
                    <a href="{{route('peminjaman.create')}}" class="btn btn-sm btn-outline-primary float-right"><i>Tambah Peminjam</i></a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table" id="pinjam">
                            <thead>
                            <tr>
                                <th><i>ID Peminjam</i></th>
                                <th><i>Buku</i></th>
                                <th><i>Anggota</i></th>
                                <th><i>Tanggal Pinjam</i></th>
                                <th><i>Tanggal Kembali</i></th>
                                
                                <th><i>Action</i></th>


                            </tr>
                            </thead>
                            <tbody>
                            @php $no=1; @endphp
                            @foreach ($pinjam as $data)
                             <tr>
                                 <td>{{$no++}}</td>
                                 <td>{{$data->bukus->judul_buku}}</td>
                                 <td>{{$data->anggotas->nama_anggota}}</td>
                                 <td>{{$data->tanggal_pinjam}}</td>
                                 <td>{{$data->tanggal_kembali}}</td>

                                

                                 <td>
                                    <a href="{{route('peminjaman.edit',$data->id)}}" class="btn btn-outline-info">Edit</a>

                                     <form action="{{route('peminjaman.destroy',$data->id)}}" method="post">
                                        @method('delete')
                                        @csrf
                                        <button type="submit" class="btn btn-danger delete-confirm">Kembalikan</button>
                                        
                                    </form>
                                 </td>
                                 
                             </tr>
                            @endforeach
                            </tbody>
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
        $('#pinjam').DataTable();
    });
</script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="{{asset('js/sweetalert2.js')}}"></script>
<script>
    $(".delete-confirm").click(function (event) {
        var tanggal = '<?php echo date('d-m-Y'); ?>';
        var form = $(this).closest("form");
        var name = $(this).data("name");
        event.preventDefault();
        Swal.fire({
            title: "Apakah Kamu Yakin?",
            text: 'Buku Telah Dikembalikan tanggal '+ tanggal +'?',
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Ya, Sudah dikembalikan!",
            cancelButtonText: "Belum"
        }).then((result) => {
            if (result.isConfirmed) {
                form.submit();
            }
        });
    });
    </script>
@endsection

