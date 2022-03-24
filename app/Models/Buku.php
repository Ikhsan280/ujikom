<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Alert;
use App\Models\Pinjam;

class Buku extends Model
{
    use HasFactory;

    protected $visible=['id_buku','kode_buku','judul_buku','penulis_buku','penerbit_buku','stok'];
    protected $fillable=['id_buku','kode_buku','judul_buku','penulis_buku','penerbit_buku','stok'];
    public $timestamps =true;

    public function pinjam()
    {
        return $this->hasMany('App\Models\Pinjam','buku_id');
     }
     public static function boot()
    {
        parent::boot();
        self::deleting(function($buku){
            if($buku->pinjam->count() > 0){
                Alert::error('Gagal!','Data tidak bisa dihapus');
                return false;
            }
        });
    }

}
