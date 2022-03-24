<?php

namespace App\Models;
use Alert;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\pinjam;

class anggota extends Model
{
    use HasFactory;

    protected $visible=['id_anggota','kode_anggota','nama_anggota','jk_anggota','jurusan_anggota','no_telp_anggota','alamat'];
    protected $fillable=['id_anggota','kode_anggota','nama_anggota','jk_anggota','jurusan_anggota','no_telp_anggota','alamat'];
    public $timestamps =true;

    public function pinjams()
    {
       return $this->hasMany('App\Models\pinjam','anggota_id');
     }
     public static function boot()
     {
         parent::boot();
         self::deleting(function($anggota){
             if($anggota->pinjams->count() > 0){
                 Alert::error('Gagal!','Data tidak bisa dihapus');
                 return false;
             }
         });
     }
}
