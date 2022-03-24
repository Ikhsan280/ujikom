@extends('adminlte::page')

@section('title','Data Buku')

@section('content_header')

<br>
@endsection
@section('css')
    <link rel="stylesheet" type="text/css" href="{{asset('DataTables/datatables.min.css')}}">
    
@endsection

@section('js')
<script  type="text/javascript" src="{{asset('DataTables/datatables.min.js')}}"> </script>
<script>
    $(document).ready(function(){
        $('#buku').DataTable();
    });
</script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="{{asset('js/sweetalert2.js')}}"></script>
<script>
    $(".delete-confirm").click(function (event) {
        var form = $(this).closest("form");
        var name = $(this).data("name");
        event.preventDefault();
        Swal.fire({
            title: "Apakah Kamu Yakin?",
            text: "Data ini akan dihapus",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Ya, Saya Yakin!",
            cancelButtonText: "Batal"
        }).then((result) => {
            if (result.isConfirmed) {
                form.submit();
            }
        });
    });
    </script>
@endsection



@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    @include('layouts._flash')
                   <b>Data Buku</b>
                    <a href="{{route('buku.create')}}" class="btn btn-sm btn-outline-primary float-right"><i>Tambah Buku</i></a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table" id="buku" >
                            <thead>
                            <tr>
                                <th><i>Id Buku</i></th>
                                <th><i>Kode Buku</i></th>
                                <th><i>Judul Buku</i></th>
                                <th><i>Penulis Buku</i></th>
                                <th><i>Penerbit Buku</i></th>
                                <th><i>Tahun Terbit</i></th>
                                <th><i>Stok</i></th>
                                <th><i>Aksi</i></th>


                            </tr>
                            </thead>
                            <tbody>
                            @php $no=1; @endphp
                            @foreach ($buku as $data) 
                            <tr>
                                 <td>{{$no++}}</td>
                                 <td>{{$data->kode_buku}}</td>
                                 <td>{{$data->judul_buku}}</td>
                                 <td>{{$data->penulis_buku}}</td>
                                 <td>{{$data->penerbit_buku}}</td>
                                 <td>{{$data->tahun_penerbit}}</td>
                                 <td>{{$data->stok}}</td>





                                 <td>
                                     <form action="{{route('buku.destroy',$data->id)}}" method="post">
                                        @method('delete')
                                        @csrf
                                        <a href="{{route('buku.edit',$data->id)}}" class="btn btn-outline-info">Edit</a>
                                        <button type="submit" class="btn btn-danger delete-confirm">Delete</button>
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


