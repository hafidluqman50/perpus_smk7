<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Models\Siswa\SiswaModel as Siswa;
use App\Models\Petugas\PetugasModel as Petugas;
use App\Models\BukuModel as Buku;
use Auth;

class AdminController extends Controller
{
    // public function admin(Request $request)
    // {
    // 	$users = new User;
    // 	$users->username = $request->username;
    // 	$users->password = bcrypt($request->password);
    // 	$users->level = 2;
    // 	$users->save();

    // 	$admin_id = $users->id;
    // 	Auth::loginUsingId($admin_id);
    // 	return redirect('/dashboard-admin');
    // } 

    public function TambahPetugas(Request $request)
    {
       $data_login = [
        'username' => $request->username,
        'password' => bcrypt($request->password),
        'level'    => 1,
        'status'   => 1,
       ];

       $data_petugas = [
        'username' => $request->username,
       ];

       User::create($data_login);
       Petugas::create($data_petugas);
       return redirect('/admin/data-petugas')->with('data_petugas','Sukses Menambahkan Data petugas');
    } 

    public function PengaturanAkun($username,Request $request)
    {
      $get_data = User::where('username',$username)->firstOrFail();
      // dd($get_data);
      if ($get_data->status==1) {
        $get_data->update(['status' => 0]);
        $path = $request->segment(1);
        return redirect('/'.$path.'/data-siswa')->with('log','Berhasil Non Aktifkan');
      }
      elseif ($get_data->status==0) {
        $get_data->update(['status' => 1]);
        $path = $request->segment(1);
        return redirect('/'.$path.'/data-siswa')->with('success','Berhasil Aktifkan Akun');
      }
    }
}
