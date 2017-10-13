<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Petugas\PetugasModel as Petugas;
use App\Models\TransaksiBukuModel as Transaksi;
use DB;

class AdminPageController extends Controller
{
    public function DashboardAdmin()
    {
        $notif = DB::table('transaksi_buku')
                    ->join('buku','transaksi_buku.id_buku','=','buku.id_buku')
                    ->join('siswa','transaksi_buku.id_siswa','=','siswa.id_siswa')
                    ->select('transaksi_buku.*','buku.*','siswa.*')
                    ->where('status_pnjm',0)
                    ->get();
    	return view('Pengurus.Admin.page.dashboard',compact('notif'));
    }

    public function ShowPetugas()
    {
    	$data_petugas = Petugas::all();
        $notif = DB::table('transaksi_buku')
                    ->join('buku','transaksi_buku.id_buku','=','buku.id_buku')
                    ->join('siswa','transaksi_buku.id_siswa','=','siswa.id_siswa')
                    ->select('transaksi_buku.*','buku.*','siswa.*')
                    ->where('status_pnjm',0)
                    ->get();
    	return view('Pengurus.Admin.page.data_petugas',compact('data_petugas','notif'));
    }

    public function SimpanPetugas()
    {
        $notif = DB::table('transaksi_buku')
                    ->join('buku','transaksi_buku.id_buku','=','buku.id_buku')
                    ->join('siswa','transaksi_buku.id_siswa','=','siswa.id_siswa')
                    ->select('transaksi_buku.*','buku.*','siswa.*')
                    ->where('status_pnjm',0)
                    ->get();
        return view('Pengurus.Admin.page.tambah-data_petugas','notif');
    }

    public function EditPetugas($id_petugas)
    {
    	$data = Petugas::with('user')->where('id_petugas',$id_petugas)->firstOrFail();
        $notif = DB::table('transaksi_buku')
                    ->join('buku','transaksi_buku.id_buku','=','buku.id_buku')
                    ->join('siswa','transaksi_buku.id_siswa','=','siswa.id_siswa')
                    ->select('transaksi_buku.*','buku.*','siswa.*')
                    ->where('status_pnjm',0)
                    ->get();
    	return view('Pengurus.Admin.page.edit-data_petugas',compact('data','notif'));
    }

    public function ShowSiswa()
    {
        $siswa = DB::table('siswa')
                    ->join('kelas_siswa','siswa.id_kelas','=','kelas_siswa.id_kelas')
                    ->join('users','siswa.username','=','users.username')
                    ->select('siswa.*','kelas_siswa.nama_kelas','users.status')
                    ->get();
        $notif = DB::table('transaksi_buku')
                    ->join('buku','transaksi_buku.id_buku','=','buku.id_buku')
                    ->join('siswa','transaksi_buku.id_siswa','=','siswa.id_siswa')
                    ->select('transaksi_buku.*','buku.*','siswa.*')
                    ->where('status_pnjm',0)
                    ->get();
        return view('Pengurus.Siswa.page.data_siswa',compact('siswa','notif'));
    }

    public function DetailSiswa($id_siswa)
    {
        $notif = DB::table('transaksi_buku')
                    ->join('buku','transaksi_buku.id_buku','=','buku.id_buku')
                    ->join('siswa','transaksi_buku.id_siswa','=','siswa.id_siswa')
                    ->select('transaksi_buku.*','buku.*','siswa.*')
                    ->where('status_pnjm',0)
                    ->get();
        return view('Pengurus.Siswa.page.detail-data_siswa',compact('notif'));
    }
}
