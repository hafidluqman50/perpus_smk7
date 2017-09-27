<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Petugas\PetugasModel as Petugas;
use DB;

class AdminPageController extends Controller
{
    public function DashboardAdmin()
    {
    	return view('Pengurus.Admin.page.dashboard');
    }

    public function ShowPetugas()
    {
    	$data_petugas = Petugas::all();
    	return view('Pengurus.Admin.page.data_petugas',compact('data_petugas'));
    }

    public function SimpanPetugas()
    {
        return view('Pengurus.Admin.page.tambah-data_petugas');
    }

    public function EditPetugas($id_petugas)
    {
    	$data = Petugas::with('user')->where('id_petugas',$id_petugas)->firstOrFail();
    	return view('Pengurus.Admin.page.edit-data_petugas',compact('data'));
    }

    public function ShowSiswa()
    {
        $siswa = DB::table('siswa')
                    ->join('kelas_siswa','siswa.id_kelas','=','kelas_siswa.id_kelas')
                    ->join('users','siswa.username','=','users.username')
                    ->select('siswa.*','kelas_siswa.nama_kelas','users.status')
                    ->get();
                    
        return view('Pengurus.Siswa.page.data_siswa',compact('siswa'));
    }
}
