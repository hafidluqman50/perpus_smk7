<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BukuModel extends Model
{
    protected $table = 'buku';
    protected $guarded = [];
    protected $primaryKey = 'id_buku';
    // public function siswa()
    // {
    // 	return $this->belongsTo('App\Models\Siswa\SiswaModel','id_siswa');
    // }
    public function kategori()
    {
    	return $this->belongsTo('App\Models\KategoriBukuModel','id_kategori_buku');
    }
}
