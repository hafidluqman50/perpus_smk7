<?php

namespace App\Http\Controllers\Siswa;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Siswa\SiswaModel as Siswa;
use App\User;
use DB;

class SiswaController extends Controller
{
	protected $users;
	protected $siswa;

	public function __construct(User $users,Siswa $siswa)
	{
		$this->users = $users;
		$this->siswa = $siswa;
	}

	// public function RegisterSiswa(Request $request)
	// {
	// 	$data_login = [
	// 		'username'   => $request->username,
	// 		'password'   => bcrypt($request->password),
	// 		'level'      => 0,
	// 		'last_login' => date('Y-m-d H:i:s'),
	// 		'created_at' => date('Y-m-d H:i:s'),
	// 		'updated_at' => date('Y-m-d H:i:s')
	// 	];
	// 	$this->users->create($data_login);

	// 	$foto     = $request->foto_profile;
	// 	$fileName = date('Y-m-d').'_'.$foto->getClientOriginalName();
	// 	$foto->move(public_path('profile_siswa'),$fileName);
	// 	$data_siswa = [
	// 		'username'      => $request->username,
	// 		'nama_siswa'    => $request->nama_siswa,
	// 		'nisn'          => $request->nisn,
	// 		'jenis_kelamin' => $request->jenis_kelamin,
	// 		'kelas'         => $request->kelas,
	// 		'foto_profile'  => $fileName,
	// 		'created_at'    => date('Y-m-d H:i:s'),
	// 		'updated_at'    => date('Y-m-d H:i:s')
	// 	];
	// 	$this->siswa->create($data_siswa);

	// 	$id_siswa = $this->siswa->id_siswa;
	// 	\Auth::loginUsingId($id_siswa,true);
	// 	return redirect('/dashboard-siswa');
	// }

	public function UpdateProfile(Request $request,$id)
	{
		$unlink = $this->siswa->where('id_siswa',$id)->foto_profile;
		//=======================================//
		if ($request->foto_profile != '') {
			unlink(public_path('/admin-assets/profile_siswa/').$unlink);
			$foto     = $request->foto_profile;
			$fileName = date('Y-m-d H:i:s').'_'.getClientOriginalName();
			$foto->move(public_path('/admin-assets/profile_siswa/'),$fileName);
			$data_siswa = [
				'nama_siswa'    => $request->nama_siswa,
				'nisn'          => $request->nisn,
				'kelas'         => $request->kelas,
				'foto_profile'  => $fileName,
				'created_at'    => date('Y-m-d H:i:s'),
				'updated_at'    => date('Y-m-d H:i:s')
			];
		}
		else {
			$data_siswa = [
				'nama_siswa'    => $request->nama_siswa,
				'nisn'          => $request->nisn,
				'kelas'         => $request->kelas,
				'created_at'    => date('Y-m-d H:i:s'),
				'updated_at'    => date('Y-m-d H:i:s')
			];
		}
		//=======================================//

		//=======================================//
		if ($request->password!='') {
			$update_login = [
				'username'   => $request->username,
				'password'   => bcrypt($request->password),
				'created_at' => date('Y-m-d H:i:s'),
				'updated_at' => date('Y-m-d H:i:s')
			];
		}
		else {
			$update_login = [
				'username'   => $request->username,
				'created_at' => date('Y-m-d H:i:s'),
				'updated_at' => date('Y-m-d H:i:s')
			];	
		}
		//=======================================//
		$this->users->where('username',$username)->update($update_login);
		$this->siswa->where('username',$username)->update($data_siswa);
		return redirect('/dashboard-siswa');
	}
}
