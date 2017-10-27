<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TransaksiBukuModel as Transaksi;

class NotifikasiController extends Controller
{
    public function NotifikasiPetugas() {
    	$notif = Transaksi::cek_transaksi();
    	$count = count($notif);
    	$catatan = 'Anda Memiliki '.$count.' Pemberitahuan';
    	if ($count > 0) {
	    	foreach ($notif as $value) {
	    		$explode = explode(" ",$value->nama_siswa);
	    		if ($explode[0] == "M.") {
	    			$nama = $explode[1];
	    		}
	    		else {
	    			$nama = $explode[0];
	    		}
	    		$judul_buku = $value->judul_buku;
	    		$jagaw = '
	                    <li>
	                        <a href="/petugas/atur-pinjaman/'.$value->id_detail_transaksi.'">
	                            <span class="fa fa-user text-red"></span> '.$nama.' Ingin Pinjam Buku '.$judul_buku.'
	                        </a>
	                    </li>';	
	    	}
    	}
    	else {
    		$jagaw = '';
    	}
		$array = ['badges'=>$count,'catat'=>$catatan,'notif'=>$jagaw];
		echo json_encode($array);
    }

    public function NotifikasiAdmin() {
    	$notif = Transaksi::cek_transaksi();
    	$count = count($notif);
    	$catatan = 'Anda Memiliki '.$count.' Pemberitahuan';
    	if ($count > 0) {
	    	foreach ($notif as $value) {
	    		$explode = explode(" ",$value->nama_siswa);
	    		if ($explode[0] == "M.") {
	    			$nama = $explode[1];
	    		}
	    		else {
	    			$nama = $explode[0];
	    		}
	    		$judul_buku = $value->judul_buku;
	    		$jagaw = '
	                    <li>
	                        <a href="/admin/atur-pinjaman/'.$value->id_detail_transaksi.'">
	                            <span class="fa fa-user text-red"></span> '.$nama.' Ingin Pinjam Buku '.$judul_buku.'
	                        </a>
	                    </li>';	
	    	}
    	}
    	else {
    		$jagaw = '';
    	}
		$array = ['badges'=>$count,'catat'=>$catatan,'notif'=>$jagaw];
		echo json_encode($array);
    }
}
