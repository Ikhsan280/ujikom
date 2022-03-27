<?php

namespace App\Http\Controllers;
use App\Models\Buku;
use App\Models\Petugas;
use App\Models\Anggota;
use App\Models\Pinjam;
use App\Models\Pengembalian;
use Illuminate\Http\Request;

class PengembalianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kembali = Pengembalian::all();
        return view('admin.pengembalian.index', compact('kembali'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response.
     */
    public function create()
    {
        $buku = Buku::all();
        $anggota = Anggota::all();
        $pinjam  = Pinjam::all();
        $kembali = Pengembalian::all();
        return view('admin.pengembalian.create', compact('buku','anggota','pinjam','kembali'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            // 'id_peminjaman' => 'required',
            'tanggal_peminjaman' => 'required',
            'tanggal_pengembalian' => 'required',
            'buku_id' => 'required',
            'denda' => 'numeric',
            'anggota_id' => 'required',
          ]);
        $kembali = new Pengembalian;
        // $kembali->id_pengembalian = $request->id_pengembalian;
        $kembali->tanggal_peminjaman = $request->tanggal_peminjaman;
        $kembali->tanggal_pengembalian = $request->tanggal_pengembalian;
        $kembali->buku_id = $request->buku_id;
        $kembali->denda = $request->denda;
        $kembali->anggota_id = $request->anggota_id;

        $buku = Buku::find($kembali->buku_id);
        $buku->stok = $buku->stok + 1 ;
        $buku->save() ;
        $kembali->save() ;
        return redirect()->route('pengembalian.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\pengembalian  $pengembalian
     * @return \Illuminate\Http\Response.
     */
    public function show(pengembalian $pengembalian)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\pengembalian  $pengembalian
     * @return \Illuminate\Http\Response
     */
    public function edit(pengembalian $pengembalian)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\pengembalian  $pengembalian
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, pengembalian $pengembalian)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\pengembalian  $pengembalian
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $kembali = Pengembalian::findOrFail($id);
        $kembali->delete();
        return redirect()->route('pengembalian.index');
    }
}
