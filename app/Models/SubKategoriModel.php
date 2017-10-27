<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;

class SubKategoriModel extends Model
{
    protected $table = 'sub_kategori';
    protected $guarded = [];
    protected $primaryKey = 'id_sub_ktg';

    public function kategori() {
    	return $this->belongsTo('App\Models\KategoriBukuModel','id_kategori_buku');
    }

    public function get_sub($id) {
        $db = DB::table('sub_kategori')
                ->where('id_kategori_buku',$id)
                ->get();
        return $db;
    }

    public function num_rows_kategori($slug) {
    	$db = DB::table('buku')
    			->join('sub_kategori','buku.id_sub_ktg','=','sub_kategori.id_sub_ktg')
    			->join('kategori_buku','sub_kategori.id_kategori_buku','=','kategori_buku.id_kategori_buku')
    			->select('buku.*','kategori_buku.*')
    			->where('kategori_buku.slug_kategori',$slug)
    			->count();
    	return $db;
    }

    public function num_rows_sub($slug) {
    	$db = DB::table('buku')
    			->join('sub_kategori','buku.id_sub_ktg','=','sub_kategori.id_sub_ktg')
    			->join('kategori_buku','sub_kategori.id_kategori_buku','=','kategori_buku.id_kategori_buku')
    			->select('buku.*','sub_kategori.*')
    			->where('sub_kategori.slug_sub_ktg',$slug)
    			->count();
    	return $db;
    }
}
