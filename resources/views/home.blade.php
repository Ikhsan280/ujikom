@if(Auth::User()->hasRole('admin'))
    <script>
        window.location = "/admin/dashboard/";
    </script>
@elseif(Auth::User()->hasRole('pengguna'))
    <script>
        window.location = "petugas/dashboard/";
    </script>
@endif