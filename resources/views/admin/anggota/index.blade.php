@extends('adminlte::page')

@section('title','Data Anggota')

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
                   <b>Data Anggota</b>
                    <a href="{{route('anggota.create')}}" class="btn btn-sm btn-outline-primary float-right"><i>Tambah Angggota</i></a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table" id="anggota">

                            <thead>
                            <tr>
                                <th><i>Id Anggota</i></th>
                                <th><i>Kode Anggota</i></th>
                                <th><i>Nama Anggota</i></th>
                                <th><i>Jenis Kelamin</i></th>
                                <th><i>Jurusan Anggota</i></th>
                                <th><i>No Telepon</i></th>
                                <th><i>Alamat</i></th>
                                <th><i>Aksi</i></th>


                            </tr>
                            </thead>
                            <tbody>
                            @php $no=1; @endphp
                            @foreach ($anggota as $data)
                             <tr>
                                 <td>{{$no++}}</td>
                                 <td>{{$data->kode_anggota}}</td>
                                 <td>{{$data->nama_anggota}}</td>
                                 <td>{{$data->jk_anggota}}</td>
                                 <td>{{$data->jurusan_anggota}}</td>
                                 <td>{{$data->no_telp_anggota}}</td>
                                 <td>{{$data->alamat}}</td>



                                 <td>
                                     <form action="{{route('anggota.destroy',$data->id)}}" method="post">
                                        @method('delete')
                                        @csrf
                                        <a href="{{route('anggota.edit',$data->id)}}" class="btn btn-outline-info">Edit</a>
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

@section('css')
    <link rel="stylesheet" type="text/css" href="{{asset('DataTables/datatables.min.css')}}">
    
@endsection

@section('js')
<script  type="text/javascript" src="{{asset('DataTables/datatables.min.js')}}"> </script>
<script>
    $(document).ready(function(){
        $('#anggota').DataTable();
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
