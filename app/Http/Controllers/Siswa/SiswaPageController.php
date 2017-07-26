<?php

namespace App\Http\Controllers\Siswa;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Siswa\SiswaModel as Siswa;
use App\Models\BukuModel as Buku;
use Auth;

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
        return view('Main.page.buku');
    }

    public function InfoKategori()
    {
        return view('Main.page.detail-kategori');
    }

    public function InfoBuku()
    {
        return view('Main.page.info-buku');
    }
}
