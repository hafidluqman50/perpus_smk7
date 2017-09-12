<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BukuModel as Buku;
use App\Models\KategoriBukuModel as KategoriBuku;
use App\Models\TransaksiBukuModel as TransaksiBuku;
use App\Models\Siswa\SiswaModel as Siswa;
use Auth;
use Excel;
use PDO;
use ZipArchive;

class BukuController extends Controller
{
	public $buku;
	public $kategori_buku;
    public $transaksi;
    public $siswa;

    public function __construct(Buku $buku,KategoriBuku $kategori_buku,TransaksiBuku $transaksi,Siswa $siswa)
    {
    	$this->buku = $buku;
    	$this->kategori_buku = $kategori_buku;
        $this->transaksi = $transaksi;
        $this->siswa = $siswa;
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
    			'jumlah_eksemplar' => $request->jumlah_eksemplar,
                'stok_buku'        => $request->stok_buku,
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
                'jumlah_eksemplar' => $request->jumlah_eksemplar,
                'stok_buku'        => $request->stok_buku,
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

    public function ImportPost(Request $request, ZipArchive $zip) 
    {
        $file  = $request->import;
        $file2 = $request->zip;
        $zip->open($file2->getClientOriginalName(),ZipArchive::CREATE);
        $zip->extractTo(public_path('admin/foto_buku/'));
        $zip->close();
        $xls = Excel::load($file,function($render){})->get();
            if (!empty($file)) {
                foreach ($xls as $data) {
                        $buku[] = [
                            'judul_buku'       => $data->judul_buku,
                            'judul_slug'       => str_slug($data->judul_buku,"-"),
                            'pengarang'        => $data->pengarang,
                            'sn_penulis'       => $data->sn_penulis,
                            'penerbit'         => $data->penerbit,
                            'tempat_terbit'    => $data->tempat_terbit,
                            'tahun_terbit'     => $data->tahun_terbit,
                            'id_kategori_buku' => $data->id_kategori_buku,
                            'jumlah_eksemplar' => $data->jumlah_eksemplar,
                            'stok_buku'        => $data->stok_buku,
                            'foto_buku'        => $data->foto_buku,
                            'keterangan'       => $data->keterangan,
                            'tanggal_upload'   => date('Y-m-d H:i:s'),
                            'created_at'       => date('Y-m-d H:i:s')
                        ];
                    }
                $this->buku->insert($buku);
            }
           
        if ($request->segment(2)=="petugas") {
            $path = '/petugas/data-buku';
        }
        elseif($request->segment(2)=="admin") {
            $path = '/admin/data-buku';
        }
        return redirect($path)->with('imprt','Berhasil Import Data');
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
                'jumlah_eksemplar' => $request->jumlah_eksemplar,
                'stok_buku'        => $request->stok_buku,
                'foto_buku'        => $fileName,
                'keterangan'       => $request->keterangan,
                'updated_at'       => date('Y-m-d H:i:s')
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
                'jumlah_eksemplar' => $request->jumlah_eksemplar,
                'stok_buku'        => $request->stok_buku,
                'keterangan'       => $request->keterangan,
                'updated_at'       => date('Y-m-d H:i:s')
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

    public function PinjamPost($id_transaksi,Request $request) 
    {
        $get_transaksi = $this->transaksi->where('id_transaksi',$id_transaksi)->firstOrFail();
        $get_buku      = $this->buku->where('id_buku',$get_transaksi->id_buku)->firstOrFail();
        $pinjam        = $request->status_pnjm;
        $get_transaksi->update(['status_pnjm'=>$pinjam]);
        $stok = $get_buku->stok_buku - 1;
        $get_buku->update(['stok_buku'=>$stok]);
        $path = $request->segment(2);
        return redirect('/'.$path.'/data-peminjaman')->with('success','Berhasil Meminjamkan Buku');
    }

    public function PinjamPostMulti(Request $request) 
    {
        $get_buku = $this->buku->whereIn('id_buku',$request->buku)->get();
        $get_stok = $get_buku->toArray();

        // INSERT MULTIPLE ARRAY PINJAM //
        foreach ($request->buku as $data) {
            $pinjam[] = [
                'id_buku'             => $data,
                'id_siswa'            => $request->siswa,
                'stok_pinjam'         => 1,
                'tanggal_pinjam_buku' => $request->tgl_pnjm,
                'tanggal_jatuh_tempo' => $request->tgl_jth_tmpo,
                'status_pnjm'         => 1,
                'created_at'          => date('Y-m-d H:i:s')
            ];
        }
        $this->transaksi->insert($pinjam);
        // END INSERT MULTIPLE ARRAY PINJAM //
        
        // UPDATE MULTIPLE ARRAY STOK BUKU
        foreach ($get_stok as $data => $value) {
            $num = $data++;
            $stok[] = $value['stok_buku'] - 1;
            $buku = $request->buku;
            $this->buku->where('id_buku',$buku[$num])->firstOrFail()->update(['stok_buku'=>$stok[$num]]);
        }
        // END UPDATE MULTIPLE ARRAY STOK BUKU //
        
        $path = $request->segment(2);
        return redirect('/'.$path.'/data-peminjaman')->with('success','Berhasil meminjam buku');
    }

    public function DeleteTransaksi($id_transaksi,Request $request)
    {
        $get_transaksi = $this->transaksi->where('id_transaksi',$id_transaksi)->firstOrFail();
        $get_stok = $get_transaksi->stok_pinjam;
        $id_buku = $get_transaksi->id_buku;
        $get_buku = $this->buku->where('id_buku',$id_buku)->firstOrFail();
        $stok = [
            'stok_buku'=>$get_buku->stok_buku + $get_stok,
            ];
        $get_buku->update($stok);
        $get_transaksi->delete();

        $path = $request->segment(2);
        return redirect('/'.$path.'/data-peminjaman')->with('dlt_pnjm','Transaksi Buku Telah Terhapus');
    }

    public function KembalikanBuku($id_transaksi,Request $request)
    {
        $transaksi = $this->transaksi->where('id_transaksi',$id_transaksi)->firstOrFail();
        $get_buku = $this->buku->where('id_buku',$transaksi->id_buku)->firstOrFail();
        $stok = $get_buku->stok_buku + $transaksi->stok_pinjam;
        // $denda = $this->HitungDenda($transaksi->tanggal_jatuh_tempo,$request->tgl_kmbli);
        $data = [
            'tanggal_kembali' => $request->tgl_kmbli,
            'status_kmbli'    => $request->status_kmbli
        ];
        $get_buku->update(['stok_buku'=>$stok]);
        $transaksi->update($data);
        $path = $request->segment(2);
        return redirect('/'.$path.'/data-pengembalian')->with('success','Berhasil Mengembalikan Buku');
    }

    public function KembalikanBukuMulti(Request $request)
    {
        $data = [
            'tanggal_kembali' => $request->tgl_kmbli,
            'status_kmbli'    => 1
        ];
        $id_siswa = $this->siswa->where('id_siswa',$request->siswa)->firstOrFail()->id_siswa;
        $this->transaksi->where('id_siswa',$id_siswa)->whereIn('id_buku',$request->buku)->update($data);
        $path = $request->segment(2);
        return redirect('/'.$path.'/data-pengembalian')->with('success','Berhasil Mengembalikan Buku');
    }

    public function KodePinjam()
    {
        // To Do List
    }

    public function HitungDenda($tgl1,$tgl2)
    {
        // $detik = 24 * 3600;
        // $tgl1  = strtotime($tgl1);
        // $tgl2  = strtotime($tgl2);

        // $minggu = 0;
        // for ($i=$tgl1; $i < $tgl2; $i += $detik)
        // {
        //     if (date('w', $i) == '0'){
        //         $minggu++;
        //     }
        // }
        // return $minggu;

    }
}
