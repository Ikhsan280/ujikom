<?php

namespace App\Http\Controllers;

use App\Models\anggota;
use Illuminate\Http\Request;
use Alert;
use Str;

class AnggotaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $anggota = Anggota::all();
        return view('admin.anggota.index', compact('anggota'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.anggota.create');

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
            // 'id' => 'required',
            // 'kode_anggota' => 'required',
            'nama_anggota' => 'required',
            'jk_anggota' => 'required ',
            'jurusan_anggota' => 'required',
            'no_telp_anggota' => 'required|numeric',
            'alamat' => 'required ',
        ]);
         $anggota = new anggota;
        // $anggota->id = $request->id;
        $anggota->kode_anggota = Str::random(4,5);
        $anggota->nama_anggota = $request->nama_anggota;
        $anggota->jk_anggota = $request->jk_anggota;
        $anggota->jurusan_anggota = $request->jurusan_anggota;
        $anggota->no_telp_anggota = $request->no_telp_anggota;
        $anggota->alamat = $request->alamat;
        $anggota->save();
        return redirect()->route('anggota.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\anggota  $anggota
     * @return \Illuminate\Http\Response
     */
    public function show($id )
    {
        $anggota = Anggota::findOrFail($id);
        return view('admin.anggota.index', compact('anggota'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\anggota  $anggota
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $anggota = Anggota::findOrFail($id);
        return view('admin.anggota.edit', compact('anggota'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\anggota  $anggota
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $request->validate([
            // 'id' => 'required',
            // 'kode_anggota' => 'required',
            'nama_anggota' => 'required',
            'jk_anggota' => 'required ',
            'jurusan_anggota' => 'required',
            'no_telp_anggota' => 'required|numeric',
            'alamat' => 'required ',
        ]);
        $anggota = Anggota::findOrFail($id);
        $anggota->kode_anggota = Str::random(4,5);
        $anggota->nama_anggota = $request->nama_anggota;
        $anggota->jk_anggota = $request->jk_anggota;
        $anggota->jurusan_anggota = $request->jurusan_anggota;
        $anggota->no_telp_anggota = $request->no_telp_anggota;
        $anggota->alamat = $request->alamat;
        Alert::success('data '.$anggota->nama_anggota.'Berhasil diubah');
        $anggota->save();
        return redirect()->route('anggota.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\anggota  $anggota
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(!Anggota::destroy($id)){
            return redirect()->back();
        }
        alert::success('Mantap','Data berhasil dihapus');
        return redirect()->route('anggota.index');
    }
}
