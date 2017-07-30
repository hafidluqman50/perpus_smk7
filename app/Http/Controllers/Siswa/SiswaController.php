<?php

namespace App\Http\Controllers\Siswa;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Siswa\SiswaModel as Siswa;
use App\Models\TransaksiBukuModel as Transaksi;
use App\User;
use Auth;
use DB;

class SiswaController extends Controller
{
	protected $users;
	protected $siswa;
	protected $transaksi;

	public function __construct(User $users,Siswa $siswa, Transaksi $transaksi)
	{
		$this->users = $users;
		$this->siswa = $siswa;
		$this->transaksi = $transaksi;
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

	public function UpdateProfile(Request $request,$username)
	{
		//=======================================//
		if ($request->foto_profile != '') {
			$unlink = $this->siswa->where('username',$username)->firstOrFail()->foto_profile;
			if (file_exists(public_path('/admin-assets/profile_siswa/').$unlink)) {
            	unlink(public_path('/admin-assets/profile_siswa/').$unlink);
            }  
			$foto     = $request->foto_profile;
			$fileName = date('Y-m-d H:i:s').'_'.$foto->getClientOriginalName();
			$foto->move(public_path('/admin-assets/profile_siswa/'),$fileName);
			$data_siswa = [
				'nama_siswa'    => $request->nama_siswa,
				'nama_slug'		=> str_slug($request->nama_siswa,"-"),
				'nisn'          => $request->nisn,
				'email'			=> $request->email,
				'kelas'         => $request->kelas,
				'foto_profile'  => $fileName,
				'created_at'    => date('Y-m-d H:i:s'),
				'updated_at'    => date('Y-m-d H:i:s')
			];
		}
		else {
			$data_siswa = [
				'nama_siswa'    => $request->nama_siswa,
				'nama_slug'		=> str_slug($request->nama_siswa,"-"),
				'nisn'          => $request->nisn,
				'email'			=> $request->email,
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
		return redirect('/');
	}

	public function PinjamPost($id_buku,Request $request)
	{
		$id_siswa = $this->siswa
						 ->where('username',Auth::user()->username)
						 ->firstOrFail()
						 ->id_siswa;

		$check = $this->transaksi
					  ->where('id_buku',$id_buku)
					  ->where('id_siswa',$id_siswa);
		// dd($check->firstOrFail()->status);
		if (count($check->get()) == 0) {
			$data_pinjam = [
				'id_buku'             => $id_buku,
				'id_siswa'            => $id_siswa,
				'stok_pinjam'         => 1,
				'tanggal_pinjam_buku' => $request->tanggal_pinjam,
				'tanggal_jatuh_tempo' => $request->tanggal_harus_kembali,
				'status'			  => 0,
				'created_at'          => date('Y-m-d H:i:s')
			];
			$this->transaksi->create($data_pinjam);
			return redirect('/buku')->with('success','Buku Berhasil Dipinjam');
		}
		// elseif($check->firstOrFail()->status == '2') {
		// 	$data_pinjam = [
		// 		'status'			  => 0,
		// 		'tanggal_pinjam_buku' => $request->tanggal_pinjam,
		// 		'tanggal_jatuh_tempo' => $request->tanggal_harus_kembali,
		// 		'updated_at'		  => date('Y-m-d H:i:s')
		// 	];
		// 	$this->transaksi->where('id_buku',$id_buku)->update($data_pinjam);
		// 	return redirect('/buku')->with('success','Berhasil Meminjam Buku');
		// }
		// elseif($check->firstOrFail()->status == '1') {
		// 	return redirect('/buku')->with('log','Harap Kembalikan Buku');
		// }
	}

	// public function WishtlistBuku($buku,Request $request) {
	// 	if ($request->ajax()) {
			
	// 	}
	// }
}
