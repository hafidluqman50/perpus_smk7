<?php

namespace App\Http\Controllers\Petugas;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Petugas\PetugasModel as Petugas;
use App\User;
use Auth;

class PetugasController extends Controller
{
	protected $petugas;
	protected $users;

	public function __construct(Petugas $petugas,User $users)
	{
		$this->petugas = $petugas;
		$this->users   = $users;
	}

    public function UpdateProfile($username,Request $request)
    {
    	//================================//
    	if($request->foto_profile!='') {
			$foto     = $request->foto_profile;
			$fileName = date('Y-m-d').'_'.$foto->getClientOriginalName();
			$foto->move(public_path('/admin-assets/petugas_profile/'),$fileName);
	    	$data_petugas = [
				'username'      => Auth::user()->username,
				'nama_petugas'  => $request->get('nama_petugas'),
				'nip'           => $request->get('nip'),
				'jenis_kelamin' => $request->get('jenis_kelamin'),
				'foto_profile'  => $fileName,
				'created_at'    => date('Y-m-d H:i:s'),
				'updated_at'    => date('Y-m-d H:i:s')
	    	];
    	}
    	else {
    		$foto     = $request->foto_profile;
			$fileName = date('Y-m-d').'_'.$foto->getClientOriginalName();
			$foto->move(public_path('/admin-assets/petugas_profile/'),$fileName);
	    	$data_petugas = [
				'username'      => Auth::user()->username,
				'nama_petugas'  => $request->nama_petugas,
				'nip'           => $request->nip,
				'jenis_kelamin' => $request->jenis_kelamin,
				'foto_profile'  => $fileName,
				'created_at'    => date('Y-m-d H:i:s'),
				'updated_at'    => date('Y-m-d H:i:s')
	    	];
    	}
    	//=================================//
    	//=================================//
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
    	$this->users->where('username',$username)->update($update_login);
		$this->petugas->where('username',$username)->update($data_petugas);
		return redirect('/dashboard-petugas');	
    }

    public function DeleteUser($username)
    {
    	$delete = $this->users->where('username',$username)->delete();
    	return redirect('/data-user')->with('sukses','Sukses Menghapus');
    }
  //   public function RegisterPetugas(Request $request)
  //   {
  //   	$users = new User;
  //   	$users->username = $request->get('username');
  //   	$users->password = bcrypt($request->get('password'));
  //   	$users->level = 1;
  //   	$users->last_login = date('Y-m-d H:i:s');
  //   	$users->save();

  //   	$this->petugas->username = $users->username;
  //   	$this->petugas->save();
    	
  //   	$petugas_id = $users->id;
  //   	Auth::loginUsingId($petugas_id,true);
		// return redirect('/dashboard-petugas')->with('Sukses','Petugas Berhasil Di Tambahkan');
  //   }
}
