<?php

namespace App\Http\Controllers;

use Alert;
use App\Http\Controllers\Controller;
use App\Models\pinjam;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
    public function pinjam()
    {
        return view('admin.laporan.form');
    }

    public function reportPinjam(Request $request)
    {
        $start = $request->tanggalAwal;
        $end = $request->tanggalAkhir;
        if ($start > $end) {
            Alert::error('Oops', 'Maaf tanggal yang anda masukan tidak sesuai')->autoclose(2000);
            return back();

        } else {
            $pinjam = Pinjam::whereBetween('created_at', [$start, $end])->get();

            
            
         
            return view('admin.laporan.cetak_laporan', ['pinjam' => $pinjam]);
        }

    }
}