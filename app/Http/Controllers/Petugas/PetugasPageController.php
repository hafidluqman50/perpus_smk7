<?php

namespace App\Http\Controllers\Petugas;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Petugas\PetugasModel as Petugas;
use App\Models\Siswa\SiswaModel as Siswa;
use App\Models\TransaksiBukuModel as Transaksi;
use Auth;

class PetugasPageController extends Controller
{

	// public function LoginForm()
	// {
	// 	return view('Pengurus.Petugas.page.login-form');
	// }

	public function ProfilePetugas($username)
	{
		$get = Petugas::where('username',$username)->firstOrFail();
        $notif = DB::table('transaksi_buku')
                    ->join('buku','transaksi_buku.id_buku','=','buku.id_buku')
                    ->join('siswa','transaksi_buku.id_siswa','=','siswa.id_siswa')
                    ->select('transaksi_buku.*','buku.*','siswa.*')
                    ->where('status_pnjm',0)
                    ->get();
		return view('Pengurus.Petugas.page.profile',compact('get','notif'));
	}

	public function DashboardPetugas()
	{
		$petugas = Petugas::where('username',Auth::user()->username)->firstOrFail();
        $notif = DB::table('transaksi_buku')
                    ->join('buku','transaksi_buku.id_buku','=','buku.id_buku')
                    ->join('siswa','transaksi_buku.id_siswa','=','siswa.id_siswa')
                    ->select('transaksi_buku.*','buku.*','siswa.*')
                    ->where('status_pnjm',0)
                    ->get();
		return view('Pengurus.Petugas.page.dashboard',compact('petugas','notif'));
	}

	public function DataUser()
	{
		$data = Siswa::all();
        $notif = DB::table('transaksi_buku')
                    ->join('buku','transaksi_buku.id_buku','=','buku.id_buku')
                    ->join('siswa','transaksi_buku.id_siswa','=','siswa.id_siswa')
                    ->select('transaksi_buku.*','buku.*','siswa.*')
                    ->where('status_pnjm',0)
                    ->get();
		return view('Pengurus.Petugas.page.data_user',compact('data','notif'));
	}
}
