<?php

namespace App\Http\Controllers\Siswa;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Siswa\SiswaModel as Siswa;
use App\Models\BukuModel as Buku;
use App\Models\TransaksiBukuModel as Transaksi;
use App\Models\WishtlistBukuModel as Wishlist;
use App\Models\DetailTransaksiModel as DetailTransaksi;
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
	protected $detail;

	public function __construct(User $users,Siswa $siswa, Transaksi $transaksi,Wishlist $wishlist, Buku $buku,DetailTransaksi $detail)
	{
		$this->users = $users;
		$this->siswa = $siswa;
		$this->transaksi = $transaksi;
		$this->wishlist = $wishlist;
		$this->buku = $buku;
		$this->detail = $detail;
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

	public function UpdateProfile($username,Request $request)
	{
		if (Auth::user()->username != $request->segment(3)) {
			return view('Errors.not-profile');
		}
		else {
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
	}

	public function PinjamPost($id_buku,Request $request)
	{
			$get_siswa 	  	= $this->siswa->where('username',Auth::user()->username);
			$siswa          = $get_siswa->firstOrFail()->id_siswa;
			$get_transaksi  = $this->transaksi->where('id_siswa',$siswa)->get();
			$check          = $this->buku->where('id_buku',$id_buku)->firstOrFail()->stok_buku;
			$tanggal_pinjam = date('Y-m-d');
			$tanggal_wajib_kembali = dua_minggu($tanggal_pinjam);
			if ($check != 0) {
				if (count($get_transaksi) == 0) {
					$data_transaksi = [
						'id_siswa'   => $siswa,
						'ket'        => $request->ket,
						'created_at' => date('Y-m-d H:i:s')
					];	
					$id_transaksi = $this->transaksi->insertGetId($data_transaksi);
					
					$transaksi = [
						'id_transaksi'        => $id_transaksi,
						'id_buku'             => $id_buku,
						'tanggal_pinjam_buku' => $tanggal_pinjam,
						'tanggal_jatuh_tempo' => $tanggal_wajib_kembali,
						'status_transaksi'	  => 1,
						'created_at'	      => date('Y-m-d'),
						'updated_at'		  => date('Y-m-d')
					];
					$this->detail->create($transaksi);
				}
				else {
					$id_transaksi = $this->transaksi->where('id_siswa',$siswa)->firstOrFail()->id_transaksi;
					$transaksi = [
						'id_transaksi'        => $id_transaksi,
						'id_buku'             => $id_buku,
						'tanggal_pinjam_buku' => $tanggal_pinjam,
						'tanggal_jatuh_tempo' => $tanggal_wajib_kembali,
						'status_transaksi'	  => 1,
						'created_at'	      => date('Y-m-d H:i:s'),
						'updated_at'		  => date('Y-m-d H:i:s')
					];
					$this->detail->create($transaksi);
				}
			 $get_url = $this->transaksi->where('id_siswa',$siswa)->firstOrFail()->id_transaksi;
			 $url = $this->detail->where('id_transaksi',$get_url)->where('id_buku',$id_buku)->orderBy('updated_at','desc')->firstOrFail()->id_detail_transaksi;
			 return redirect('/buku/detail-pinjam/'.$url.'/'.Auth::user()->username)->with('pending','Silahkan Verifikasi Peminjaman Ke Perpustakaan');
			}
			else {
				return redirect('/buku')->with('log','Maaf Stok Buku Kosong');				
			}
	}

	public function BatalPinjam($id,Request $request) {
		$batal = [
				'tanggal_pinjam_buku' => NULL,
				'tanggal_jatuh_tempo' => NULL,
				'status_pnjm'         => 0,
			];
		$this->detail->where('id_detail_transaksi',$id)->update($batal);
		return redirect('/buku')->with('log','Buku Batal Pinjam');
	}

	public function Wishlist($buku,Request $request) {
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
