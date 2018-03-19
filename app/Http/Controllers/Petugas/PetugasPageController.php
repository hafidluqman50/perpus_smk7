<?php

namespace App\Http\Controllers\Petugas;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Petugas\PetugasModel as Petugas;
use App\Models\Siswa\SiswaModel as Siswa;
use App\Models\TransaksiBukuModel as Transaksi;
use DB;
use Auth;

class PetugasPageController extends Controller
{
	// public function LoginForm()
	// {
	// 	return view('Pengurus.Petugas.page.login-form');
	// }

	public function ProfilePetugas($username)
	{
		$get   = Petugas::where('username',$username)->firstOrFail();
		$notif = Transaksi::cek_transaksi();
		return view('Pengurus.Petugas.page.profile',compact('get','notif'));
	}

	public function DashboardPetugas()
	{
		$petugas = Petugas::where('username',Auth::user()->username)->firstOrFail();
		$notif   = Transaksi::cek_transaksi();
		return view('Pengurus.Petugas.page.dashboard',compact('petugas','notif'));
	}

	// public function DataUser()
	// {
	// 	$data = Siswa::all();
 //        $notif = Transaksi::cek_transaksi();
	// 	return view('Pengurus.Petugas.page.data_user',compact('data','notif'));
	// }

	public function ShowBuku()
    {
        $bukus = DB::table('buku')
                    ->leftJoin('sub_kategori','buku.id_sub_ktg','=','sub_kategori.id_sub_ktg')
                    ->leftJoin('kategori_buku','sub_kategori.id_kategori_buku','=','kategori_buku.id_kategori_buku')
                    ->select('buku.*','sub_kategori.*','kategori_buku.*')
                    ->where('buku.status',1)
                    ->get();
        $notif = Transaksi::cek_transaksi();
    	return view('Pengurus.Buku.page.data_buku',compact('bukus','notif'));
    }

    public function RestApi() {
        $buku = Buku::all()->where('status',2);
        return response()->json($buku,200);
    }

    public function SimpanBuku()
    {
        $kategoris = Kategori::select('id_kategori_buku','nama_kategori')->get();
        $notif     = Transaksi::cek_transaksi();
        return view('Pengurus.Buku.page.tambah-data_buku',compact('kategoris','notif'));
    }

    public function ImportBuku()
    {
        $notif = Transaksi::cek_transaksi();
        return view('Pengurus.Buku.page.import-buku',compact('notif'));
    }

    public function EditBuku($id_buku)
    {
        $buku      = Buku::with('kategori')->where('id_buku',$id_buku)->firstOrFail();
        $kategoris = Kategori::select('id_kategori_buku','nama_kategori')->get();
        $notif     = Transaksi::cek_transaksi();
    	return view('Pengurus.Buku.page.edit-data_buku',compact('buku','kategoris','notif'));
    }

    public function DetailBuku($id_buku)
    {
        $buku = DB::table('buku')
                    ->join('sub_kategori','buku.id_sub_ktg','=','sub_kategori.id_sub_ktg')
                    ->join('kategori_buku','sub_kategori.id_kategori_buku','=','kategori_buku.id_kategori_buku')
                    ->select('buku.*','kategori_buku.*','sub_kategori.*')
                    ->first();
        $notif = Transaksi::cek_transaksi();
        return view('Pengurus.Buku.page.detail-data_buku',compact('buku','notif'));
    }

     public function ShowTransaksi()
    {
    	$transaksi = DB::table('transaksi_buku')
                     ->join('siswa','transaksi_buku.id_siswa','=','siswa.id_siswa')
                     ->join('kelas_siswa','siswa.id_kelas','=','kelas_siswa.id_kelas')
                     ->select('transaksi_buku.created_at','transaksi_buku.id_transaksi','transaksi_buku.ket','siswa.nama_siswa','siswa.nisn','kelas_siswa.nama_kelas')
                     ->orderBy('transaksi_buku.created_at','desc')
                     ->get();
        $notif = Transaksi::cek_transaksi();
    	return view('Pengurus.Buku.page.data_transaksi',compact('transaksi','notif'));
    }

    public function PinjamMultiForm()
    {
        $kelas = Kelas::all();
        $notif = Transaksi::cek_transaksi();
        return view('Pengurus.Buku.page.multi-form_pinjam',compact('kelas','notif'));
    }

    public function DetailTransaksi($id)
    {
        $transaksi = Transaksi::get_transaksi($id);
        $notif  = Transaksi::cek_transaksi();
        return view('Pengurus.Buku.page.detail-transaksi',compact('notif','transaksi'));
    }

    public function LihatTransaksi($id_transaksi)
    {
        $lihat = DB::table('detail_transaksi')
                      ->join('transaksi_buku','detail_transaksi.id_transaksi','=','transaksi_buku.id_transaksi')
                      ->join('siswa','transaksi_buku.id_siswa','=','siswa.id_siswa')
                      ->join('buku','detail_transaksi.id_buku','=','buku.id_buku')
                      ->select('detail_transaksi.*','buku.judul_buku','siswa.nama_siswa')
                      ->where('detail_transaksi.id_transaksi',$id_transaksi)
                      ->orderBy('detail_transaksi.updated_at','desc')
                      ->get();
        $get_transaksi = Transaksi::where('id_transaksi',$id_transaksi)->firstOrFail();
        $siswa         = Siswa::with('kelas')->where('id_siswa',$get_transaksi->id_siswa)->firstOrFail();
        $notif         = Transaksi::cek_transaksi();
        return view('Pengurus.Buku.page.lihat-transaksi',compact('lihat','notif','siswa'));
    }

    public function PinjamSingleForm($id)
    {
        $transaksi = Transaksi::get_transaksi($id);
        $notif     = Transaksi::cek_transaksi();
        return view('Pengurus.Buku.page.single-form_pinjam',compact('transaksi','notif'));
    }

    // public function DetailPeminjaman($id_transaksi) {
    //     $transaksi = Transaksi::get_transaksi($id_transaksi);
    //     $notif     = Transaksi::cek_transaksi();
    //     return view('Pengurus.Buku.page.detail-data_peminjaman',compact('transaksi','notif'));
    // }

    public function PerpanjangPinjamPage($id)
    {
        $transaksi = Transaksi::get_transaksi($id);
        $notif     = Transaksi::cek_transaksi();
        return view('Pengurus.Buku.page.perpanjang-pinjam',compact('transaksi','notif'));
    }

    public function KembaliForm()
    {
        $kelas = Kelas::select('id_kelas','nama_kelas')->get();
        $notif = Transaksi::cek_transaksi();
        return view('Pengurus.Buku.page.kembali_form',compact('kelas','notif'));
    }

    public function DuaMinggu($tanggal)
    {
        $dua_minggu = date('Y-m-d', strtotime('+2 week', strtotime($tanggal)));
        return $dua_minggu;
    }

    public function DetailPengembalian($id_transaksi) 
    {
        $transaksi = DB::table('transaksi_buku')
                         ->join('siswa','transaksi_buku.id_siswa','=','siswa.id_siswa')
                         ->join('kelas_siswa','siswa.id_kelas','=','kelas_siswa.id_kelas')
                         ->join('buku','transaksi_buku.id_buku','=','buku.id_buku')
                         ->join('kategori_buku','buku.id_kategori_buku','=','kategori_buku.id_kategori_buku')
                         ->select('transaksi_buku.*','siswa.*','buku.*','kelas_siswa.nama_kelas','kategori_buku.*')
                         ->where('id_transaksi',$id_transaksi)
                         ->first();
        $notif = Transaksi::cek_transaksi();
        return view('Pengurus.Buku.page.detail-data_pengembalian',compact('transaksi','notif'));
    }

    public function Barcode() {
        $data_barcode = Barcode::with('buku')->get();
        $notif        = Transaksi::cek_transaksi();
        return view('Pengurus.Buku.page.barcode-page',compact('data_barcode','notif'));
    }

    public function AddFormBarcode() {
        $bukus = Buku::all();
        $notif = Transaksi::cek_transaksi();
        return view('Pengurus.Buku.page.tambah-data_barcode',compact('bukus','notif'));
    }

    // AJAX FUNCTION GET //
    public function GetSiswa($kelas)
    {
        $get_siswa = Siswa::where('id_kelas',$kelas)->get();
        foreach ($get_siswa as $siswa) {
            echo '<option value="'.$siswa->id_siswa.'">'.$siswa->nama_siswa.'</option>';
        }
    }

    public function GetSubKtg($kategori) {
        $get_sub = SubKategori::where('id_kategori_buku',$kategori)->get();
        foreach ($get_sub as $sub) {
            echo '<option value="'.$sub->id_sub_ktg.'">'.$sub->nama_sub.'</option>';
        }
    }

    public function GetBarcode($barcode) {
        $buku = DB::table('barcode_scan')
                       ->join('buku','barcode_scan.id_buku','=','buku.id_buku')
                       ->where('code_scanner',$barcode)
                       ->first();
        // dd($buku);
        echo '<option value="'.$buku->id_buku.'" selected>'.$buku->judul_buku.'</option>';
        echo "|";
        echo '<input type="hidden" name="kode_buku[]" value='.$buku->kode_buku.'>';
        // echo "Jagaw";
    }
    // END AJAX FUNCTION GET //
}
