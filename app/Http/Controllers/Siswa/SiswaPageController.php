<?php

namespace App\Http\Controllers\Siswa;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Siswa\SiswaModel as Siswa;
use App\Models\BukuModel as Buku;
use App\Models\TransaksiBukuModel as Transaksi;
use Auth;
use DB;

class SiswaPageController extends Controller
{
    public function Page()
    {
    	if (Auth::check()) {
	    	$siswa = Siswa::with('kelas')->where('username',Auth::user()->username)->firstOrFail();
	    	$explode = explode(" ",$siswa->nama_siswa);
	    	if ($explode[0]=="M.") {
	    		$nama_siswa = $explode[1];
	    	}
	    	else {
	    		$nama_siswa = $explode[0];
	    	}
	    	return view('Main.page.main-page',compact('siswa','nama_siswa'));
    	}
    	return view('Main.page.main-page');
    }

    public function Profile($user)
    {
        $siswa     = Siswa::with('kelas')->where('username',$user)->firstOrFail();
        $transaksi = DB::table('transaksi_buku')
                        ->join('buku','transaksi_buku.id_buku','=','buku.id_buku')
                        ->select('transaksi_buku.*','buku.judul_buku','buku.judul_slug','buku.foto_buku')
                        ->where('transaksi_buku.id_siswa',$siswa->id_siswa)
                        ->first();
    	return view('Main.page.profile',compact('siswa','transaksi'));
    }

    public function SuntingProfile($user)
    {
        $siswa = Siswa::where('username',$user)->firstOrFail();
        return view('Main.page.sunting-profile',compact('siswa'));
    }

    public function Buku()
    {
        $bukus = Buku::all();
        if (Auth::check()) {
            $siswa     = Siswa::where('username',Auth::user()->username)->firstOrFail()->id_siswa;
            $get_transaksi = Transaksi::where('id_siswa',$siswa)->get();
            if (count($get_transaksi) == 0) {
                $transaksi = [
                    'tanggal_pinjam_buku' => NULL
                ];
            }
            else {
                $transaksi = $get_transaksi->toArray();
            }
            // dd($transaksi);
            return view('Main.page.buku',compact('bukus','transaksi','get_transaksi'));
        }
        else {
            return view('Main.page.buku',compact('bukus'));
        }
    }

    public function InfoKategori($kategori)
    {
        $get_kategori = Kategori::with('kategori')->where('id_kategori_buku',$kategori)->get();
        return view('Main.page.kategori',compact('get_kategori'));
    }

    public function Pinjam($slug)
    {
        $buku = Buku::where('judul_slug',$slug)->firstOrFail();
        $siswa = Siswa::with('kelas')->where('username',Auth::user()->username)->firstOrFail();
        return view('Main.page.transaksi-buku',compact('buku','siswa'));
    }

    public function PinjamDetail($id_transaksi,$username)
    {
        $id_siswa = Siswa::where('username',$username)->firstOrFail()->id_siswa;
        $transaksi = DB::table('transaksi_buku')
                        ->join('buku','transaksi_buku.id_buku','=','buku.id_buku')
                        ->join('siswa','transaksi_buku.id_siswa','=','siswa.id_siswa')
                        ->join('kelas_siswa','siswa.id_kelas','=','kelas_siswa.id_kelas')
                        ->select('transaksi_buku.id_transaksi','transaksi_buku.tanggal_pinjam_buku','transaksi_buku.tanggal_jatuh_tempo','transaksi_buku.id_buku','transaksi_buku.status_pnjm','buku.judul_buku','buku.foto_buku','siswa.nama_siswa','siswa.nisn','kelas_siswa.nama_kelas')
                        ->where('id_transaksi',$id_transaksi)
                        ->where('transaksi_buku.id_siswa',$id_siswa)
                        ->first();
        return view('Main.page.pinjam-buku',compact('transaksi'));
    }

    public function InfoBuku($slug)
    {
        $buku = Buku::where('judul_slug',$slug)->firstOrFail();
        return view('Main.page.detail-buku',compact('buku'));
    }
}
