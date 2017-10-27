<?php

namespace App\Http\Controllers\Siswa;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Siswa\SiswaModel as Siswa;
use App\Models\BukuModel as Buku;
use App\Models\TransaksiBukuModel as Transaksi;
use App\Models\SubKategoriModel as SubKategori;
use App\Models\KategoriBukuModel as Kategori;
use Auth;
use DB;

class SiswaPageController extends Controller
{
    // protected $sub;
    // protected $kategori;

    // public function __construct(SubKategori $sub,Kategori $kategori) {
    //     $this->sub      = $sub;
    //     $this->kategori = $kategori;
    // }

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

    public function Profile($user,Request $request)
    {
        if (Auth::user()->username != $request->segment(2)) {
            return view('Errors.not-profile');
        }
        else {
            $siswa     = Siswa::with('kelas')->where('username',$user)->firstOrFail();
            $cek       = DB::table('detail_transaksi')
                            ->join('transaksi_buku','detail_transaksi.id_transaksi','=','transaksi_buku.id_transaksi')
                            ->join('buku','detail_transaksi.id_buku','=','buku.id_buku')
                            ->join('sub_kategori','buku.id_sub_ktg','=','sub_kategori.id_sub_ktg')
                            ->join('kategori_buku','sub_kategori.id_kategori_buku','=','kategori_buku.id_kategori_buku')
                            ->select('detail_transaksi.*','buku.*','sub_kategori.*','kategori_buku.*')
                            ->where('transaksi_buku.id_siswa',$siswa->id_siswa)
                            ->whereIn('detail_transaksi.status_transaksi',[1,2])
                            ->get();
            // dd($cek);
        	return view('Main.page.profile',compact('siswa','cek'));   
        }
    }

    public function SuntingProfile($user,Request $request)
    {
        if (Auth::user()->username != $request->segment(2)) {
            return view('Errors.not-profile');
        }
        else {
            $siswa = Siswa::where('username',$user)->firstOrFail();
            return view('Main.page.sunting-profile',compact('siswa'));
        }
    }

    public function Buku()
    {
        $bukus = DB::table('buku')
                 ->join('sub_kategori','buku.id_sub_ktg','=','sub_kategori.id_sub_ktg')
                 ->join('kategori_buku','sub_kategori.id_kategori_buku','=','kategori_buku.id_kategori_buku')
                 ->select('buku.*','sub_kategori.nama_sub','sub_kategori.slug_sub_ktg','kategori_buku.nama_kategori','kategori_buku.slug_kategori')
                 ->get();
        $kategoris = Kategori::all();
        $sub_class = new SubKategori;
        if (Auth::check()) {
            $siswa     = Siswa::where('username',Auth::user()->username)->firstOrFail()->id_siswa;
            $cek       = DB::table('detail_transaksi')
                            ->join('transaksi_buku','detail_transaksi.id_transaksi','=','transaksi_buku.id_transaksi')
                            ->select('detail_transaksi.*')
                            ->where('transaksi_buku.id_siswa',$siswa)
                            ->whereIn('detail_transaksi.status_transaksi',[1,2,4])
                            ->get();
            // dd(count($cek));
            return view('Main.page.buku',compact('bukus','cek','kategoris','sub_class'));
        }
        else {
            return view('Main.page.buku',compact('bukus','kategoris','sub_class'));
        }
    }

    public function Kategori($slug)
    {
        $get    = DB::table('buku')
                ->join('sub_kategori','buku.id_sub_ktg','=','sub_kategori.id_sub_ktg')
                ->join('kategori_buku','sub_kategori.id_kategori_buku','=','kategori_buku.id_kategori_buku')
                ->select('buku.*','kategori_buku.*','sub_kategori.*')
                ->where('kategori_buku.slug_kategori',$slug);
        $bukus         = $get->get();
        if (count($bukus) > 0) {
            $nama_kategori = $get->first()->nama_kategori;
            $keterangan    = $get->first()->deskripsi_kategori;
        }
        else {
            $nama_kategori = '';
            $keterangan    = '';
        }
        // dd($get->first()->nama_kategori);
        $foto_kategori = $get->limit(4)->get();
        $kategoris     = Kategori::all();
        $sub_class     = new SubKategori;
        return view('Main.page.kategori',compact('bukus','nama_kategori','keterangan','kategoris','sub_class','foto_kategori'));
    }

    public function SubKategori($slug)
    {
        $get = DB::table('buku')
                ->join('sub_kategori','buku.id_sub_ktg','=','sub_kategori.id_sub_ktg')
                ->join('kategori_buku','sub_kategori.id_kategori_buku','=','kategori_buku.id_kategori_buku')
                ->select('buku.*','kategori_buku.*','sub_kategori.*')
                ->where('sub_kategori.slug_sub_ktg',$slug);
        $bukus     = $get->get();
        if (count($bukus) > 0) {
            $nama_sub   = $get->first()->nama_sub;
            $keterangan = $get->first()->deskripsi_sub;
        }
        else {
            $nama_sub   = '';
            $keterangan = '';
        }
        $foto_sub  = $get->limit(4)->get();
        $kategoris = Kategori::all();
        $sub_class = new SubKategori;
        return view('Main.page.sub-kategori',compact('bukus','nama_sub','keterangan','kategoris','sub_class','foto_sub'));   
    }

    public function Pinjam($slug)
    {
        $buku = Buku::where('judul_slug',$slug)->firstOrFail();
        $siswa = Siswa::with('kelas')->where('username',Auth::user()->username)->firstOrFail();
        $tanggal_pinjam = explode_tanggal(date('Y-m-d'));
        $tanggal_wajib_kembali = explode_tanggal(dua_minggu(date('Y-m-d')));
        // dd($tanggal_wajib_kembali);
        return view('Main.page.transaksi-buku',compact('buku','siswa','tanggal_pinjam','tanggal_wajib_kembali'));
    }

    public function PinjamDetail($id,$username)
    {
        $id_siswa = Siswa::where('username',$username)->firstOrFail()->id_siswa;
        $transaksi = DB::table('detail_transaksi')
                        ->join('transaksi_buku','detail_transaksi.id_transaksi','=','transaksi_buku.id_transaksi')
                        ->join('siswa','transaksi_buku.id_siswa','=','siswa.id_siswa')
                        ->join('buku','detail_transaksi.id_buku','=','buku.id_buku')
                        ->join('kelas_siswa','siswa.id_kelas','=','kelas_siswa.id_kelas')
                        ->select('detail_transaksi.*','siswa.*','buku.*','kelas_siswa.nama_kelas')
                        ->where('transaksi_buku.id_siswa',$id_siswa)
                        ->where('detail_transaksi.id_detail_transaksi',$id)
                        ->first();
        // dd($transaksi);
        $tanggal_pinjam = explode_tanggal($transaksi->tanggal_pinjam_buku);
        $tanggal_wajib_kembali = explode_tanggal($transaksi->tanggal_jatuh_tempo);
        return view('Main.page.pinjam-buku',compact('transaksi','tanggal_pinjam','tanggal_wajib_kembali'));
    }

    public function InfoBuku($slug)
    {
        $buku = Buku::where('judul_slug',$slug)->firstOrFail();
        return view('Main.page.detail-buku',compact('buku'));
    }
}
