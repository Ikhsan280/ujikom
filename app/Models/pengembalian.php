<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pengembalian extends Model
{
    use HasFactory;

    protected $visible= ['id_pengembalian','tanggal_pinjam','denda','jumlah','buku_id','petugas_id','anggota_id'];
    protected $fillable=['id_pengembalian','tanggal_pinjam','denda','jumlah','buku_id','petugas_id','anggota_id'];
    public $timestamps =true;

    public function bukus()
    {
        // data dari model "book" bisa dimiliki oleh model "author"
        // melalui fk "authoe_id"
        return $this->belongsTo('App\Models\Buku','buku_id');
    }

    public function anggotas()
    {
        // data dari model "book" bisa dimiliki oleh model "author"
        // melalui fk "authoe_id"
        return $this->belongsTo('App\Models\Anggota','anggota_id');
    }
    // public function pinjams()
    // {
    //     // data dari model "book" bisa dimiliki oleh model "author"
    //     // melalui fk "authoe_id"
    //     return $this->hasMany('App\Models\petugas','pinjam_id');
    // }
}
