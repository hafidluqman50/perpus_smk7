<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Petugas\PetugasModel as Petugas;

class AdminPageController extends Controller
{
    public function DashboardAdmin()
    {
    	return view('Pengurus.Admin.page.dashboard');
    }

    public function ShowPetugas()
    {
    	$data = Petugas::with('user')->get();
    	return view('Pengurus.Admin.page.data_petugas',compact('data'));
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

    // public function ShowSiswa()
    // {
    //     $siswa = DB::table('transaksi_buku')
    //                 ->join
    // }
}
