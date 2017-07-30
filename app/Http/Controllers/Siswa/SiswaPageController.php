<?php

namespace App\Http\Controllers\Siswa;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Siswa\SiswaModel as Siswa;
use App\Models\BukuModel as Buku;
use Auth;
use DB;

class SiswaPageController extends Controller
{
    public function Page()
    {
        // $bulan = date('m');
        // $buku = Buku::limit(4)->whereIn('tanggal_upload',)->get();
    	if (Auth::check()) {
	    	$siswa = Siswa::where('username',Auth::user()->username)->firstOrFail();
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
    	$siswa = Siswa::where('username',$user)->firstOrFail();
    	return view('Main.page.profile',compact('siswa'));
    }

    public function SuntingProfile($user)
    {
        $siswa = Siswa::where('username',$user)->firstOrFail();
        return view('Main.page.sunting-profile',compact('siswa'));
    }

    public function Buku()
    {
        $bukus = DB::table('buku')
                    ->leftJoin('transaksi_buku','buku.id_buku','=','transaksi_buku.id_buku')
                    ->select('buku.judul_buku','buku.judul_slug','buku.foto_buku','transaksi_buku.status','transaksi_buku.id_transaksi')
                    ->orderBy('buku.judul_buku','asc')
                    ->get();
        return view('Main.page.buku',compact('bukus'));
    }

    public function InfoKategori()
    {
        return view('Main.page.detail-kategori');
    }

    public function Pinjam($slug)
    {
        $buku = Buku::where('judul_slug',$slug)->firstOrFail();
        $siswa = Siswa::where('username',Auth::user()->username)->firstOrFail();
        return view('Main.page.transaksi-buku',compact('buku','siswa'));
    }

    public function PinjamDetail($id_transaksi)
    {
        $transaksi = DB::table('transaksi_buku')
                        ->join('buku','transaksi_buku.id_buku','=','buku.id_buku')
                        ->join('siswa','transaksi_buku.id_siswa','=','siswa.id_siswa')
                        ->select('transaksi_buku.tanggal_pinjam_buku','transaksi_buku.tanggal_jatuh_tempo','buku.judul_buku','buku.foto_buku','siswa.nama_siswa','siswa.nisn','siswa.kelas')
                        ->where('id_transaksi',$id_transaksi)
                        ->first();
        return view('Main.page.pinjam-buku',compact('transaksi'));
    }

    public function InfoBuku($slug)
    {
        $buku = Buku::where('judul_slug',$slug)->firstOrFail();
        return view('Main.page.detail-buku',compact('buku'));
    }
}
