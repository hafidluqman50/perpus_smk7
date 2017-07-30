<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BukuModel as Buku;
use App\Models\KategoriBukuModel as KategoriBuku;
use App\Models\TransaksiBukuModel as TransaksiBuku;

class BukuController extends Controller
{
	public $buku;
	public $kategori_buku;
    public $transaksi;

    public function __construct(Buku $buku,KategoriBuku $kategori_buku,TransaksiBuku $transaksi)
    {
    	$this->buku = $buku;
    	$this->kategori_buku = $kategori_buku;
        $this->transaksi = $transaksi;
    }

    public function TambahBuku(Request $request)
    {
        if ($request->foto_buku!='') {
    		$foto_buku = $request->foto_buku;
    		$fileName  = date('Y-m-d').'_'.$foto_buku->getClientOriginalName();
    		$foto_buku->move(public_path('/admin-assets/foto_buku/'),$fileName);
        	$data_buku = [
    			'judul_buku'       => $request->judul_buku,
                'judul_slug'       => str_slug($request->judul_buku,"-"),
                'pengarang'        => $request->pengarang,
                'sn_penulis'       => $request->sn_penulis,
    			'penerbit'         => $request->penerbit,
                'tempat_terbit'    => $request->tempat_terbit,
    			'tahun_terbit'     => $request->tahun_terbit,
    			'id_kategori_buku' => $request->kategori_buku,
    			'stok_buku'        => $request->stok,
    			'foto_buku'        => $fileName,
                'keterangan'       => $request->keterangan,
                'tanggal_upload'   => date('Y-m-d'),
    			'created_at'       => date('Y-m-d H:i:s')
        	];
        }
        else {
            $data_buku = [
                'judul_buku'       => $request->judul_buku,
                'judul_slug'       => str_slug($request->judul_buku,"-"),
                'pengarang'        => $request->pengarang,
                'sn_penulis'       => $request->sn_penulis,
                'penerbit'         => $request->penerbit,
                'tempat_terbit'    => $request->tempat_terbit,
                'tahun_terbit'     => $request->tahun_terbit,
                'id_kategori_buku' => $request->kategori_buku,
                'stok_buku'        => $request->stok,
                'keterangan'       => $request->keterangan,
                'tanggal_upload'   => date('Y-m-d'),
                'created_at'       => date('Y-m-d H:i:s')
            ];
        }
    	$this->buku->create($data_buku);
    	if ($request->segment(2)=="petugas") {
			return redirect('/petugas/data-buku')->with('tmbh_buku','Buku Telah Terinput');
    	}
    	else if ($request->segment(2)=="admin") {
			return redirect('/admin/data-buku')->with('tmbh_buku','Buku Telah Terinput');
    	}
    }

    public function UpdateBuku($id_buku,Request $request)
    {
        if ($request->foto_buku!='') {
            $foto_buku = $this->buku->where('id_buku',$id_buku)->firstOrFail()->foto_buku;
            if (file_exists(public_path('/admin-assets/foto_buku/').$foto_buku)) {
                unlink(public_path('/admin-assets/foto_buku/').$foto_buku);
            }  
            $foto = $request->foto_buku;
            $fileName  = $foto->getClientOriginalName();
            $foto->move(public_path('/admin-assets/foto_buku/'),$fileName);
            $data_buku = [
                'judul_buku'       => $request->judul_buku,
                'judul_slug'       => str_slug($request->judul_buku,"-"),
                'pengarang'        => $request->pengarang,
                'sn_penulis'       => $request->sn_penulis,
                'penerbit'         => $request->penerbit,
                'tempat_terbit'    => $request->tempat_terbit,
                'tahun_terbit'     => $request->tahun_terbit,
                'id_kategori_buku' => $request->kategori_buku,
                'stok_buku'        => $request->stok,
                'foto_buku'        => $fileName,
                'keterangan'       => $request->keterangan,
                'created_at'       => date('Y-m-d H:i:s'),
                'updated_at'       => date('Y-m-d H:i:s'),
            ];
        }
        else {
            $data_buku = [
                'judul_buku'       => $request->judul_buku,
                'judul_slug'       => str_slug($request->judul_buku,"-"),
                'pengarang'        => $request->pengarang,
                'sn_penulis'       => $request->sn_penulis,
                'penerbit'         => $request->penerbit,
                'tempat_terbit'    => $request->tempat_terbit,
                'tahun_terbit'     => $request->tahun_terbit,
                'id_kategori_buku' => $request->kategori_buku,
                'stok_buku'        => $request->stok,
                'keterangan'       => $request->keterangan,
                'created_at'       => date('Y-m-d H:i:s'),
                'updated_at'       => date('Y-m-d H:i:s'),
            ];
        }
        $this->buku->where('id_buku',$id_buku)->update($data_buku);
    	if ($request->segment(2)=="petugas") {
			return redirect('/petugas/data-buku')->with('edt_buku','Buku Telah Terupdate');
    	}
    	else if ($request->segment(2)=="admin") {
			return redirect('/admin/data-buku')->with('edt_buku','Buku Telah Terupdate');
    	}
    }

    public function DeleteBuku(Request $request,$id_buku)
    {
    	$this->buku->where('id_buku',$id_buku)->delete();
    	if ($request->segment(2)=="petugas") {
    		return redirect('/petugas/data-buku')->with('dlt_buku','Buku Telah Terhapus');
    	}
    	else if ($request->segment(2)=="admin") {
    		return redirect('/admin/data-buku')->with('dlt_buku','Buku Telah Terhapus');
    	}
    }

    public function TambahKategori(Request $request){
    	$data_kategori_buku = [
			'nama_kategori'      => $request->nama_kategori,
			'deskripsi_kategori' => $request->deskripsi
    	];
    	$this->kategori_buku->create($data_kategori_buku);
    	if ($request->segment(2)=="petugas") {
			return redirect('/petugas/data-kategori-buku')->with('success','Buku Telah Terinput');
    	}
    	else if ($request->segment(2)=="admin") {
			return redirect('/admin/data-kategori-buku')->with('success','Buku Telah Terinput');
    	}
    }

    public function UpdateKategori($id_kategori_buku,Request $request)
    {
		$data_kategori_buku = [
			'nama_kategori'      => $request->nama_kategori,
			'deskripsi_kategori' => $request->deskripsi
    	];
    	$this->buku->where('id_kategori_buku',$id_kategori_buku)->update($data_kategori_buku);
    	if ($request->segment(2)=="petugas") {
			return redirect('/petugas/data-kategori-buku')->with('success','Kategori Buku Telah Terupdate');
    	}
    	else if ($request->segment(2)=="admin") {
			return redirect('/admin/data-kategori-buku')->with('success','Kategori Buku Telah Terupdate');
    	}
    }

    public function DeleteKategori($id_kategori,Request $request)
    {
    	$this->kategori_buku->where('id_kategori_buku',$id_kategori)->delete();
    	if ($request->segment(2)=="petugas") {
    		return redirect('/petugas/data-kategori')->with('dlt_ktgr','Berhasil Hapus Kategori');
    	}
    	else if ($request->segment(2)=="admin") {
    		return redirect('/admin/data-kategori')->with('dlt_ktgr','Berhasil Hapus Kategori');
    	}
    }

    public function PinjamBuku(Request $request) 
    {
        $data_pinjam = [
            'id_buku'             => $request->buku,
            'id_siswa'            => $request->siswa,
            'stok_pinjam'         => $request->stok,
            'tanggal_pinjam_buku' => $request->tanggal_pinjam,
            'tanggal_jatuh_tempo' => $request->tanggal_jatuh_tempo,
            'created_at'          => date('Y-m-d H:i:s')
        ];

        $stok = $this->buku->where('id_buku',$request->buku)->firstOrFail()->stok_buku-1;
        $this->transaksi->create($data_pinjam);
        $this->buku->where('id_buku',$request->buku)->update(['stok_buku'=>$stok]);
        if ($request->segment(2)=="petugas") {
            return redirect('/petugas/data-peminjaman');
        }
        else if ($request->segment(2)=="admin") {
            return redirect('/admin/data-peminjaman');
        }
    }

    public function DeleteTransaksi($id_transaksi,Request $request)
    {
        $this->transaksi->where('id_transaksi',$id_transaksi)->delete();
        if ($request->segment(2)=="petugas") {
            return redirect('/petugas/data-peminjaman')->with('dlt_pnjm','Transaksi Buku Telah Terhapus');
        }
        elseif($request->segment(2)=="admin") {
            return redirect('/admin/data-peminjaman')->with('dlt_pnjm','Transaksi Buku Telah Terhapus');
        }
    }

    public function KembalikanBuku($id_transaksi,Request $request)
    {
        $get_transaksi = $this->transaksi->where('id_transaksi',$id_transaksi)->firstOrFail();
        $id_buku       = $get_transaksi->id_buku;
        $get_buku      = $this->buku->where('id_buku',$id_buku)->firstOrFail();
        $tgl_wajib     = $get_transaksi->tanggal_jatuh_tempo;
        $buku          = $get_transaksi->id_buku;
        $stok_pinjam   = $get_transaksi->stok_pinjam;
        $stok_buku     = $get_buku->stok_buku;
        $stok_kembali  = $stok_pinjam+$stok_buku;
        $tgl_kembali   = $request->tanggal_kembali;
        $denda         = $this->HitungDenda($tgl_wajib,$tgl_kembali);
        if ($request->status==1) {    
            $data_kembali = [
                'status'                  => $request->status,
                'updated_at'              => date('Y-m-d H:i:s')
            ];
        }
        else if($request->status==2) {
            $data_kembali = [
                'tanggal_kembalikan_buku' => $tgl_kembali,
                'status'                  => $request->status,
                'stok_pinjam'             => 0, 
                'denda'                   => $denda*10000,
                'updated_at'              => date('Y-m-d H:i:s')
            ];
        }
        $this->buku->where('id_buku',$id_buku)->update(['stok_buku'=>$stok_kembali]);
        $this->transaksi->where('id_transaksi',$id_transaksi)->update($data_kembali);
        if ($request->segment(2)=="petugas") {
            return redirect('/petugas/data-pengembalian');
        }
        else if ($request->segment(2)=="admin") {
            return redirect('/admin/data-pengembalian');
        }
    }

    public function HitungDenda($tgl1,$tgl2)
    {
        $detik = 24 * 3600;
        $tgl1  = strtotime($tgl1);
        $tgl2  = strtotime($tgl2);

        $minggu = 0;
        for ($i=$tgl1; $i < $tgl2; $i += $detik)
        {
            if (date('w', $i) == '0'){
                $minggu++;
            }
        }
        return $minggu;
    }
}
