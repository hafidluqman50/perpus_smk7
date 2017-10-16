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
    public $petugas;
    public $users;
    public function __construct(Petugas $petugas, User $users)
    {
		    $this->petugas = $petugas;
        $this->users = $users;
    }
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
        'username' = $request->username,
        'password' = bcrypt($request->password),
        'level'    = 1
       ];

       $data_petugas = [
        'username' = $request->username,
       ];

       $this->users->create($data_login);
       $this->petugas->create($data_petugas);
       return redirect('/admin/data-petugas')->with('data_petugas','Sukses Menambahkan Data petugas');
    } 
}
