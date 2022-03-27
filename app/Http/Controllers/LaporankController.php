<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Alert;
use App\Http\Controllers\Controller;
use App\Models\pengembalian;


class LaporankController extends Controller
{
    public function pengembalian()
    {
        return view('admin.laporank.form');
    }

    public function reportPengembalian(Request $request)
    {
        $start = $request->tanggalAwal;
        $end = $request->tanggalAkhir;
        if ($start > $end) {
            Alert::error('Oops', 'Maaf tanggal yang anda masukan tidak sesuai')->autoclose(2000);
            return back();

        } else {
            $kembali = pengembalian::whereBetween('created_at', [$start, $end])->get();

            
            
         
            return view('admin.laporank.cetak_laporan', ['pengembalian' => $kembali]);
        }

    }
}
