<?php

namespace App\Http\Controllers\Siswa;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Siswa\SiswaModel as Siswa;
use App\Models\BukuModel as Buku;
use App\Models\TransaksiBukuModel as Transaksi;
use App\Models\WishtlistBukuModel as Wishlist;
use App\User;
use Auth;
use DB;

class SiswaController extends Controller
{
	protected $users;
	protected $siswa;
	protected $transaksi;
	protected $wishlist;
	protected $buku;

	public function __construct(User $users,Siswa $siswa, Transaksi $transaksi,Wishlist $wishlist, Buku $buku)
	{
		$this->users = $users;
		$this->siswa = $siswa;
		$this->transaksi = $transaksi;
		$this->wishlist = $wishlist;
		$this->buku = $buku;
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

			$check = $this->buku->where('id_buku',$id_buku)->firstOrFail()->stok_buku;

			if ($check != 0) {

			$stok_buku = $this->buku->where('id_buku',$id_buku)->firstOrFail()->stok_buku;
			$stok_pinjam = $stok_buku - 1;
			// dd($stok_pinjam);

			$data_pinjam = [
				'id_buku'             => $id_buku,
				'id_siswa'            => $id_siswa,
				'stok_pinjam'		  => 1,
				'status_pnjm'		  => 0,
				'created_at'          => date('Y-m-d H:i:s')
			];

			$this->transaksi->create($data_pinjam);
			 $this->buku->where('id_buku',$id_buku)->where('id_buku',$id_buku)->update(['stok_buku'=>$stok_pinjam]);
			$url = $this->transaksi->where('id_siswa',$id_siswa)->where('id_buku',$id_buku)->firstOrFail()->id_transaksi;
			return redirect('/buku/detail-pinjam/'.$url.'/'.Auth::user()->username)->with('pending','Silahkan Verifikasi Peminjaman Ke Perpustakaan');
			}
			else {
				return redirect('/buku')->with('log','Maaf Stok Buku Kosong');				
			}
		// if () {
		// 	
		// }
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

	public function BatalPinjam($id_transaksi,Request $request) {
		$get_transaksi = $this->transaksi->where('id_transaksi',$id_transaksi)->firstOrFail();
		$stok_pinjam = $get_transaksi->stok_pinjam;
		$get_buku = $this->buku->where('id_buku',$get_transaksi->id_buku)->firstOrFail();
		$stok_update = $stok_pinjam + $get_buku->stok_buku;
		$this->buku->where('id_buku',$get_transaksi->id_buku)->update(['stok_buku'=>$stok_update]);
		$this->transaksi->where('id_transaksi',$id_transaksi)->delete();
		return redirect('/buku')->with('log','Buku Batal Pinjam');
	}

	public function Wishlist($buku,Request $request) {
		// dd($buku);
		$get_buku  = Buku::where('id_buku',$buku)->firstOrFail();
		$get_siswa = $this->siswa->where('username',Auth::user()->username)->firstOrFail();
		$id_buku   = $get_buku->id_buku;
		$id_siswa  = $get_siswa->id_siswa;
		if ($request->ajax()) {
			$data_wish = [
				'id_siswa' => $id_siswa,
				'id_buku'  => $id_buku
			];
			// dd($data_wish);
			$this->wishlist->create($data_wish);
			return response()->json(true);
		}
		// else {
		// 	return redirect('/buku')->with('log','Maaf Gagal');
		// }
	}
}
