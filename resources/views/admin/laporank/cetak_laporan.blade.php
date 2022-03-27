<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <center>
        <div class="card-body">
            <div class="table-responsive">
              
<br><br>
      <center>
                    <h2>LAPORAN PENGEMBALIAN</h2>
                </center>
        <center>
                <table class="table" border="1">
                    <thead>
                        <center>
                        <tr>
                            <th>No</th>
                            <th>Tanggal Pinjam</th> 
                            <th>Tanggal Pengembalian</th>
                            <th>Nama Buku</th>
                            <th>Nama Anggota</th>
                            <th>Denda</th>
                            </tr>
                        </center>
                    </thead>
                    
                        <tbody>
                        @php $no=1; @endphp
                        @foreach ($pengembalian as $data)
                            <center>
                                <td>{{$no++}}</td>
                                <td>{{$data->tanggal_peminjaman}}</td>
                                <td>{{$data->tanggal_pengembalian}}</td>
                                <td>{{$data->bukus->judul_buku}}</td>
                                <td>{{$data->anggotas->nama_anggota}}</td>
                                <td>{{$data->denda}}</td>
                                <td>
                            </center>
                            @endforeach
                        
            
                </table>

</center>
        <center>
            <script>
                window.print();
            </script>
            </center>
</body>

</html>