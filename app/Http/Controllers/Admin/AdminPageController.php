<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\BukuModel as Buku;
use App\Models\Petugas\PetugasModel as Petugas;
use App\Models\TransaksiBukuModel as Transaksi;
use App\Models\KategoriBukuModel as Kategori;
use App\Models\Siswa\SiswaModel as Siswa;
use App\Models\Siswa\KelasSiswa as Kelas;
use App\Models\SubKategoriModel as SubKategori;
use App\Barcode;
use Auth;
use DB;

class AdminPageController extends Controller
{   
    protected $transaksi;
    
    public function __construct(Transaksi $transaksi)
    {
        $this->transaksi = $transaksi;
    }

    public function DashboardAdmin()
    {
        $notif = $this->transaksi->cek_transaksi();
    	return view('Pengurus.Admin.page.dashboard',compact('notif'));
    }

    public function ShowPetugas()
    {
        $data_petugas = Petugas::all();
        $notif        = $this->transaksi->cek_transaksi();
    	return view('Pengurus.Admin.page.data_petugas',compact('data_petugas','notif'));
    }

    public function SimpanPetugas()
    {
        $notif = $this->transaksi->cek_transaksi();
        return view('Pengurus.Admin.page.tambah-data_petugas','notif');
    }

    public function EditPetugas($id_petugas)
    {
        $data  = Petugas::with('user')->where('id_petugas',$id_petugas)->firstOrFail();
        $notif = $this->transaksi->cek_transaksi();
    	return view('Pengurus.Admin.page.edit-data_petugas',compact('data','notif'));
    }

    public function ShowSiswa()
    {
        $siswa = DB::table('siswa')
                    ->join('kelas_siswa','siswa.id_kelas','=','kelas_siswa.id_kelas')
                    ->join('users','siswa.username','=','users.username')
                    ->select('siswa.*','kelas_siswa.nama_kelas','users.status')
                    ->get();
        $notif = $this->transaksi->cek_transaksi();
        return view('Pengurus.Siswa.page.data_siswa',compact('siswa','notif'));
    }

    public function DetailSiswa($id_siswa)
    {
        $notif = $this->transaksi->cek_transaksi();
        return view('Pengurus.Siswa.page.detail-data_siswa',compact('notif'));
    }

    public function ShowBuku()
    {
        $bukus = DB::table('buku')
                    ->leftJoin('sub_kategori','buku.id_sub_ktg','=','sub_kategori.id_sub_ktg')
                    ->leftJoin('kategori_buku','sub_kategori.id_kategori_buku','=','kategori_buku.id_kategori_buku')
                    ->select('buku.*','sub_kategori.*','kategori_buku.*')
                    ->where('buku.status',1)
                    ->get();
        $notif = $this->transaksi->cek_transaksi();
        return view('Pengurus.Buku.page.data_buku',compact('bukus','notif'));
    }

    public function RestApi() {
        $buku = Buku::all()->where('status',2);
        return response()->json($buku,200);
    }

    public function SimpanBuku()
    {
        $kategoris = Kategori::select('id_kategori_buku','nama_kategori')->get();
        $notif     = $this->transaksi->cek_transaksi();
        return view('Pengurus.Buku.page.tambah-data_buku',compact('kategoris','notif'));
    }

    public function ImportBuku()
    {
        $notif = $this->transaksi->cek_transaksi();
        return view('Pengurus.Buku.page.import-buku',compact('notif'));
    }

    public function EditBuku($id_buku)
    {
        $buku      = Buku::with('kategori')->where('id_buku',$id_buku)->firstOrFail();
        $kategoris = Kategori::select('id_kategori_buku','nama_kategori')->get();
        $notif     = $this->transaksi->cek_transaksi();
        return view('Pengurus.Buku.page.edit-data_buku',compact('buku','kategoris','notif'));
    }

    public function DetailBuku($id_buku)
    {
        $buku = DB::table('buku')
                    ->join('sub_kategori','buku.id_sub_ktg','=','sub_kategori.id_sub_ktg')
                    ->join('kategori_buku','sub_kategori.id_kategori_buku','=','kategori_buku.id_kategori_buku')
                    ->select('buku.*','kategori_buku.*','sub_kategori.*')
                    ->first();
        $notif = $this->transaksi->cek_transaksi();
        return view('Pengurus.Buku.page.detail-data_buku',compact('buku','notif'));
    }

    public function ShowKategori()
    {
        $kategoris = Kategori::all();
        $sub       = SubKategori::with('kategori')->get();
        $notif     = $this->transaksi->cek_transaksi();
        return view('Pengurus.Buku.page.data_kategori',compact('kategoris','sub','notif'));
    }

    public function SimpanKategori()
    {
        $notif = $this->transaksi->cek_transaksi();
        return view('Pengurus.Buku.page.tambah-data_kategori','notif');
    }

    public function DetailKategori($id_kategori_buku)
    {
        $kategori = Kategori::where('id_kategori_buku',$id_kategori_buku)->firstOrFail();
        $notif    = $this->transaksi->cek_transaksi();
        return view('Pengurus.Buku.page.detail-data_kategori',compact('kategori','notif'));
    }

    public function EditKategori($id_kategori_buku)
    {
        $kategori = Kategori::where('id_kategori_buku',$id_kategori_buku)->firstOrFail();
        $notif    = $this->transaksi->cek_transaksi();
        return view('Pengurus.Buku.page.edit-data_kategori',compact('kategori','notif'));
    }

    public function ShowSubKategori()
    {
        $sub   = SubKategori::with('kategori')->get();
        $notif = $this->transaksi->cek_transaksi();
        return view('Pengurus.Buku.page.data_sub-kategori',compact('sub','notif'));
    }

    public function SimpanSubKategori()
    {
        $kategori = Kategori::all();
        $notif    = $this->transaksi->cek_transaksi();
        return view('Pengurus.Buku.page.tambah-data_sub',compact('kategori','notif'));
    }

    public function ShowTransaksi()
    {
        $transaksi = DB::table('transaksi_buku')
                     ->join('siswa','transaksi_buku.id_siswa','=','siswa.id_siswa')
                     ->join('kelas_siswa','siswa.id_kelas','=','kelas_siswa.id_kelas')
                     ->select('transaksi_buku.created_at','transaksi_buku.id_transaksi','transaksi_buku.ket','siswa.nama_siswa','siswa.nisn','kelas_siswa.nama_kelas')
                     ->orderBy('transaksi_buku.created_at','desc')
                     ->get();
        $notif = $this->transaksi->cek_transaksi();
        return view('Pengurus.Buku.page.data_transaksi',compact('transaksi','notif'));
    }

    public function PinjamMultiForm()
    {
        $kelas = Kelas::all();
        $notif = $this->transaksi->cek_transaksi();
        return view('Pengurus.Buku.page.multi-form_pinjam',compact('kelas','notif'));
    }

    public function DetailTransaksi($id)
    {
        $transaksi = $this->transaksi->get_transaksi($id);
        $notif  = $this->transaksi->cek_transaksi();
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
        $get_transaksi = $this->transaksi->where('id_transaksi',$id_transaksi)->firstOrFail();
        $siswa         = Siswa::with('kelas')->where('id_siswa',$get_transaksi->id_siswa)->firstOrFail();
        $notif         = $this->transaksi->cek_transaksi();
        return view('Pengurus.Buku.page.lihat-transaksi',compact('lihat','notif','siswa'));
    }

    public function PinjamSingleForm($id)
    {
        $transaksi = $this->transaksi->get_transaksi($id);
        $notif     = $this->transaksi->cek_transaksi();
        return view('Pengurus.Buku.page.single-form_pinjam',compact('transaksi','notif'));
    }

    // public function DetailPeminjaman($id_transaksi) {
    //     $transaksi = $this->transaksi->get_transaksi($id_transaksi);
    //     $notif     = $this->transaksi->cek_transaksi();
    //     return view('Pengurus.Buku.page.detail-data_peminjaman',compact('transaksi','notif'));
    // }

    public function PerpanjangPinjamPage($id)
    {
        $transaksi = $this->transaksi->get_transaksi($id);
        $notif     = $this->transaksi->cek_transaksi();
        return view('Pengurus.Buku.page.perpanjang-pinjam',compact('transaksi','notif'));
    }

    public function KembaliForm()
    {
        $kelas = Kelas::select('id_kelas','nama_kelas')->get();
        $notif = $this->transaksi->cek_transaksi();
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
        $notif = $this->transaksi->cek_transaksi();
        return view('Pengurus.Buku.page.detail-data_pengembalian',compact('transaksi','notif'));
    }

    public function Barcode() {
        $data_barcode = Barcode::with('buku')->get();
        $notif        = $this->transaksi->cek_transaksi();
        return view('Pengurus.Buku.page.barcode-page',compact('data_barcode','notif'));
    }

    public function AddFormBarcode() {
        $bukus = Buku::all();
        $notif = $this->transaksi->cek_transaksi();
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
