<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SubKategoriModel extends Model
{
    protected $table = 'sub_kategori';
    protected $guarded = [];
    protected $primaryKey = 'id_sub_ktg';

    public function kategori() {
    	return $this->belongsTo('App\Models\KategoriBukuModel','id_kategori_buku');
    }
}
