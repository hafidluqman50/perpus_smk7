<?php

namespace App\Http\Controllers\Petugas;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Petugas\PetugasModel as Petugas;
use App\Models\Siswa\SiswaModel as Siswa;
use Auth;

class PetugasPageController extends Controller
{

	public function LoginForm()
	{
		return view('Pengurus.Petugas.page.login-form');
	}

	public function ProfilePetugas($username)
	{
		$get = Petugas::where('username',$username)->firstOrFail();
		return view('Pengurus.Petugas.page.profile',compact('get'));
	}

	public function DashboardPetugas()
	{
		$petugas = Petugas::where('username',Auth::user()->username)->firstOrFail();
		return view('Pengurus.Petugas.page.dashboard',compact('petugas'));
	}

	public function DataUser()
	{
		$data = Siswa::all();
		return view('Pengurus.Petugas.page.data_user',compact('data'));
	}
}
