<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BukuModel as Buku;
use App\Models\TransaksiBukuModel as Transaksi;
use App\Models\KategoriBukuModel as Kategori;
use App\Models\Siswa\SiswaModel as Siswa;
use Auth;
use DB;

class BukuPageController extends Controller
{
    public function ShowBuku()
    {
        $bukus = Buku::with('kategori')->get();
    	return view('Pengurus.Buku.page.data_buku',compact('bukus'));
    }

    public function SimpanBuku()
    {
        $kategoris = Kategori::select('id_kategori_buku','nama_kategori')->get();
        return view('Pengurus.Buku.page.tambah-data_buku',compact('kategoris'));
    }

    public function ImportBuku()
    {
        return view('Pengurus.Buku.page.import-buku');
    }

    public function EditBuku($id_buku)
    {
    	$buku = Buku::with('kategori')->where('id_buku',$id_buku)->firstOrFail();
        $kategoris = Kategori::select('id_kategori_buku','nama_kategori')->get();
    	return view('Pengurus.Buku.page.edit-data_buku',compact('buku','kategoris'));
    }

    public function DetailBuku($id_buku)
    {
        $buku = Buku::with('kategori')->where('id_buku',$id_buku)->firstOrFail();
        return view('Pengurus.Buku.page.detail-data_buku',compact('buku'));
    }

    public function ShowKategori()
    {
        $kategoris = Kategori::all();
        return view('Pengurus.Buku.page.data_kategori',compact('kategoris'));
    }

    public function SimpanKategori()
    {
        return view('Pengurus.Buku.page.tambah-data_kategori');
    }

    // public function AturTransaksi($username)
    // {
    //     $siswa = Siswa::where('username',$username)->firstOrFail()->id_siswa;
    //     $get_transaksi = DB::table('transaksi_buku')
    //                     ->join('buku','transaksi_buku.id_buku','=','buku.id_buku')
    //                     ->join('siswa','transaksi_buku.id_siswa','=','siswa.id_siswa')
    //                     ->select('transaksi_buku.tanggal_pinjam_buku','transaksi_buku.tanggal_jatuh_tempo','buku.*','siswa.nama_siswa','siswa.nisn','siswa.email')
    //                     ->where('id_siswa',$siswa)
    //                     ->get(); 
    //     return view('Pengurus.Buku.page.transaksi',compact('get_transaksi'));
    // }

    public function DetailKategori($id_kategori_buku)
    {
        $kategori = Kategori::where('id_kategori_buku',$id_kategori_buku)->firstOrFail();
        return view('Pengurus.Buku.page.detail-data_kategori',compact('kategori'));
    }

    public function EditKategori($id_kategori_buku)
    {
        $kategori = Kategori::where('id_kategori_buku',$id_kategori_buku)->firstOrFail();
        return view('Pengurus.Buku.page.edit-data_kategori',compact('kategori'));
    }

    public function ShowPeminjaman()
    {
    	$transaksi = DB::table('transaksi_buku')
                     ->join('siswa','transaksi_buku.id_siswa','=','siswa.id_siswa')
                     ->join('buku','transaksi_buku.id_buku','=','buku.id_buku')
                     ->select('transaksi_buku.*','siswa.nisn','siswa.nama_siswa','buku.judul_buku')
                     ->get();
        // dd($transaksi);
    	return view('Pengurus.Buku.page.data_peminjaman',compact('transaksi'));
    }

    public function Pinjam()
    {
        $siswa = Siswa::select('id_siswa','nama_siswa')->get();
        $buku = Buku::select('id_buku','judul_buku')->get();
        return view('Pengurus.Buku.page.pinjam',compact('siswa','buku'));
    }

    public function EditPeminjaman($id_transaksi)
    {
        $buku = Buku::select('id_buku','judul_buku')->get();
        $siswa = Siswa::select('nama_siswa')->get();
    	$transaksi = Transaksi::where('id_transaksi',$id_transaksi)->firstOrFail();
    	return view('Pengurus.Buku.page.data_pengembalian',compact('transaksi','buku','siswa'));
    }

    public function ShowPengembalian()
    {
    	$transaksi = DB::table('transaksi_buku')
                     ->join('siswa','transaksi_buku.id_siswa','=','siswa.id_siswa')
                     ->join('buku','transaksi_buku.id_buku','=','buku.id_buku')
                     ->select('transaksi_buku.*','siswa.nisn','siswa.nama_siswa','buku.judul_buku')
                     ->get();
    	return view('Pengurus.Buku.page.data_pengembalian',compact('transaksi'));
    }

    public function Pengembalian($id_transaksi)
    {
        // $transaksi = Transaksi::with('transaksi')->where('id_transaksi',$id_transaksi)->get();
        $transaksi = DB::table('transaksi_buku')
                     ->join('siswa','transaksi_buku.id_siswa','=','siswa.id_siswa')
                     ->join('buku','transaksi_buku.id_buku','=','buku.id_buku')
                     ->select('transaksi_buku.*','siswa.nisn','siswa.nama_siswa','buku.judul_buku')
                     ->where('id_transaksi',$id_transaksi)
                     ->first();
        return view('Pengurus.Buku.page.kembalikan',compact('transaksi'));
    }

    public function DetailPengembalian($id_transaksi) 
    {
        $transaksi = DB::table('transaksi_buku')
                     ->join('siswa','transaksi_buku.id_siswa','=','siswa.id_siswa')
                     ->join('buku','transaksi_buku.id_buku','=','buku.id_buku')
                     ->select('transaksi_buku.*','siswa.*','buku.*')
                     ->where('id_transaksi',$id_transaksi)
                     ->first();
    }
    // public function DetailKembali($id_transaksi)
    // {
    //     $transaksi = DB::table('transaksi_buku')
    //                  ->join('siswa','transaksi_buku.id_siswa','=','siswa.id_siswa')
    //                  ->join('buku','transaksi_buku.id_buku','=','buku.id_buku')
    //                  ->select('transaksi_buku.*','siswa.nisn','siswa.nama_siswa','siswa.kelas','buku.judul_buku','buku.penerbit','buku.tahun_terbit')
    //                  ->where('id_transaksi',$id_transaksi)
    //                  ->first();
    //     return view('Pengurus.Buku.page.detail-data_pengembalian',compact('transaksi'));  
    // }
}
