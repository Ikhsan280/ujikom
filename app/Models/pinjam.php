<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Alert;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class pinjam extends Model
{
    use HasFactory;

    protected $visible=['pinjam_id','id_peminjam','tanggal_pinjam','tanggal_kembali','buku_id','anggota_id','users_id'];
    protected $fillable=['pinjam_id','id_peminjam','tanggal_pinjam','tanggal_kembali','buku_id','anggota_id','users_id'];
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
    
    public function pengembalian()
    {
        // data dari model "book" bisa dimiliki oleh model "author"
        // melalui fk "authoe_id"
        return $this->belongsTo('App\Models\pengembalian','pengembalian_id');
    }
    public function users()
    {
        // data dari model "book" bisa dimiliki oleh model "author"
        // melalui fk "authoe_id"
        return $this->belongsTo('App\Models\User','users_id');

    }
    // public function boot()
    // {
    //     parent::boot();
    //     self::deleting(function($anggota){
    //         if($anggota->bukus->count()>0){
    //             Alert::error('failed','Data not deleted because buku have you');
    //             return false;
    //         }
    //     });
    // }

}
