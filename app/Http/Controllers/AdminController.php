<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function dashboard()
    {
        $buku = DB::table('bukus')->count();
        $anggota = DB::table('anggotas')->count();
        $petugas = DB::table('petugas')->count();
        $users = DB::table('users')->count();
        $pinjam = DB::table('pinjams')->count();

        return view('admin.dashboard', compact('buku','anggota','petugas','pinjam','users'));
    }

    public function dashboardUser()
    {
        $buku = DB::table('bukus')->count();
        $anggota = DB::table('anggotas')->count();
        $pinjam = DB::table('pinjams')->count();
        return view('petugas.dashboard', compact('buku','anggota','pinjam'));
    }

    // public function laporan()
    // {
    //     $pengguna = Pengguna::with('users')->get();
    //     $kegiatan = Kegiatan::all();
    //     $laporan = DB::table('users')->where('role', 'Account User')->get();
    //     return view('layouts.admin.laporan', compact('pengguna','kegiatan','laporan'));
    // }

}