<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BukuModel as Buku;
use App\Models\TransaksiBukuModel as Transaksi;
use App\Models\KategoriBukuModel as Kategori;
use App\Models\Siswa\SiswaModel as Siswa;
use App\Models\Siswa\KelasSiswa as Kelas;
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
                     ->select('transaksi_buku.*','siswa.*','buku.*')
                     ->get();
    	return view('Pengurus.Buku.page.data_peminjaman',compact('transaksi'));
    }

    public function PinjamMultiForm()
    {
        $kelas = Kelas::all();
        $buku = Buku::select('id_buku','judul_buku')->get();
        return view('Pengurus.Buku.page.pinjam',compact('kelas','buku'));
    }

    public function EditPeminjaman($id_transaksi)
    {
        $buku = Buku::select('id_buku','judul_buku')->get();
        $siswa = Siswa::select('id_siswa')->get();
    	$transaksi = Transaksi::where('id_transaksi',$id_transaksi)->firstOrFail();
    	return view('Pengurus.Buku.page.data_pengembalian',compact('transaksi','buku','siswa'));
    }

    public function ShowPengembalian()
    {
    	$transaksi = DB::table('transaksi_buku')
                     ->join('siswa','transaksi_buku.id_siswa','=','siswa.id_siswa')
                     ->join('buku','transaksi_buku.id_buku','=','buku.id_buku')
                     ->select('transaksi_buku.*','siswa.nisn','siswa.nama_siswa','buku.judul_buku')
                     ->where('status_pnjm',1)
                     ->get();
        return view('Pengurus.Buku.page.data_pengembalian',compact('transaksi'));
    }

    public function DuaMinggu($tanggal) 
    {
        $dua_minggu = date('Y-m-d', strtotime('+2 week', strtotime($tanggal)));
        return $dua_minggu;
    }

    public function PinjamSingleForm($id_transaksi)
    {
        $transaksi = DB::table('transaksi_buku')
                        ->join('siswa','transaksi_buku.id_siswa','=','siswa.id_siswa')
                        ->join('kelas_siswa','siswa.id_kelas','=','kelas_siswa.id_kelas')
                        ->join('buku','transaksi_buku.id_buku','=','buku.id_buku')
                        ->join('kategori_buku','buku.id_kategori_buku','=','kategori_buku.id_kategori_buku')
                        ->select('transaksi_buku.*','siswa.*','kelas_siswa.nama_kelas','buku.*','kategori_buku.*')
                        ->where('id_transaksi',$id_transaksi)
                        ->first();
        $minggu = $this->DuaMinggu(date('Y-m-d'));
        return view('Pengurus.Buku.page.transaksi',compact('transaksi','minggu'));
    }

    public function PengembalianMultiForm()
    {
        $kelas = Kelas::select('id_kelas','nama_kelas')->get();
        return view('Pengurus.Buku.page.multi-form-kembali',compact('kelas'));
    }

    public function PengembalianSingleForm($id_transaksi)
    {
            $transaksi = DB::table('transaksi_buku')
                         ->join('siswa','transaksi_buku.id_siswa','=','siswa.id_siswa')
                         ->join('kelas_siswa','siswa.id_kelas','=','kelas_siswa.id_kelas')
                         ->join('buku','transaksi_buku.id_buku','=','buku.id_buku')
                         ->join('kategori_buku','buku.id_kategori_buku','=','kategori_buku.id_kategori_buku')
                         ->select('transaksi_buku.*','siswa.*','buku.*','kelas_siswa.nama_kelas','kategori_buku.*')
                         ->where('id_transaksi',$id_transaksi)
                         ->first();
            return view('Pengurus.Buku.page.single-form-kembali',compact('transaksi'));
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

    // AJAX FUNCTION GET //
    public function GetSiswa($kelas)
    {
        $get_siswa = Siswa::where('id_kelas',$kelas)->get();
        foreach ($get_siswa as $siswa) {
            echo '<option value="'.$siswa->id_siswa.'">'.$siswa->nama_siswa.'</option>';
        }
    }

    public function GetBuku($id_siswa) {
        $get_transaksi = DB::table('transaksi_buku')
                            ->join('buku','transaksi_buku.id_buku','=','buku.id_buku')
                            ->select('buku.id_buku','buku.judul_buku')
                            ->where('id_siswa',$id_siswa)
                            ->get();
        foreach ($get_transaksi as $transaksi) {
            echo '<option value="'.$transaksi->id_buku.'">'.$transaksi->judul_buku.'</option>';
        }
    }
    // END AJAX FUNCTION GET //
} 

