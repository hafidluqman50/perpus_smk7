<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;

class TransaksiBukuModel extends Model
{
    protected $table = 'transaksi_buku';
    protected $guarded = [];
    protected $primaryKey = 'id_transaksi';
    
    public function transaksi()
    {
    	$this->belongsTo('App\Models\BukuModel','id_buku');
    }

    public static function cek_transaksi()
    {
    	return $get = DB::table('detail_transaksi')
    				  ->join('transaksi_buku','detail_transaksi.id_transaksi','=','transaksi_buku.id_transaksi')
    				  ->join('siswa','transaksi_buku.id_siswa','=','siswa.id_siswa')
    				  ->join('buku','detail_transaksi.id_buku','=','buku.id_buku')
    				  ->select('siswa.nama_siswa','buku.judul_buku','detail_transaksi.tanggal_pinjam_buku','detail_transaksi.id_detail_transaksi')
    				  ->orderBy('detail_transaksi.tanggal_pinjam_buku','asc')
    				  ->where('detail_transaksi.status_transaksi',1)
    				  ->get();
    }

    public static function get_transaksi($id) {
        $transaksi = DB::table('detail_transaksi')
                        ->join('transaksi_buku','detail_transaksi.id_transaksi','=','transaksi_buku.id_transaksi')
                        ->join('siswa','transaksi_buku.id_siswa','=','siswa.id_siswa')
                        ->join('kelas_siswa','siswa.id_kelas','=','kelas_siswa.id_kelas')
                        ->join('buku','detail_transaksi.id_buku','=','buku.id_buku')
                        ->join('sub_kategori','buku.id_sub_ktg','=','sub_kategori.id_sub_ktg')
                        ->join('kategori_buku','sub_kategori.id_kategori_buku','=','kategori_buku.id_kategori_buku')
                        ->select('buku.*','kelas_siswa.*','siswa.*','detail_transaksi.*','kategori_buku.*','sub_kategori.*')
                        ->where('detail_transaksi.id_detail_transaksi',$id)
                        ->first();
        return $transaksi;
    }

    public static function detail_transaksi($id) {
        return $detail = DB::table('detail_transaksi')
                         ->join('buku','detail_transaksi.id_buku','=','buku.id_buku')
                         ->join('transaksi_buku','detail_transaksi.id_transaksi','=','transaksi_buku.id_transaksi')
                         ->join('siswa','transaksi_buku.id_siswa','=','siswa.id_siswa')
                         ->join('kelas','siswa.id_kelas','=','kelas.id_kelas')
                         ->select('detail_transaksi.*','buku.*','siswa.*','kelas.*')
                         ->where('detail_transaksi.id_detail_transaksi',$id)
                         ->first();
    }
}
