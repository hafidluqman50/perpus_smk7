<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BukuModel as Buku;
use App\Models\KategoriBukuModel as KategoriBuku;
use App\Models\TransaksiBukuModel as Transaksi;
use App\Models\Siswa\SiswaModel as Siswa;
use App\Models\DetailTransaksiModel as DetailTransaksi;
use App\History;
use App\Barcode;
use Auth;
use Excel;
use PDO;
use ZipArchive;
use DateTime;

class BukuController extends Controller
{
    protected $buku;
    protected $transaksi;
    protected $detail;
    protected $barcode;

    public function __construct(Buku $buku,Transaksi $transaksi,DetailTransaksi $detail,Barcode $barcode)
    {
        $this->buku      = $buku;
        $this->transaksi = $transaksi;
        $this->detail    = $detail;
        $this->barcode   = $barcode;       
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
    			'id_sub_ktg'       => $request->kategori_buku,
                'klasifikasi'      => $request->nomor_klasifikasi,
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
                'id_sub_ktg'       => $request->kategori_buku,
                'klasifikasi'      => $request->nomor_klasifikasi,
                'jumlah_eksemplar' => $request->jumlah_eksemplar,
                'stok_buku'        => $request->stok_buku,
                'keterangan'       => $request->keterangan,
                'tanggal_upload'   => date('Y-m-d'),
                'created_at'       => date('Y-m-d H:i:s')
            ];
        }
    	$this->buku->create($data_buku);
		$url = $request->segment(2);
        return redirect('/'.$url.'/data-buku')->with('tmbh_buku','Buku Telah Terinput');
    }

    public function ImportPost(Request $request, ZipArchive $zip) 
    {
        $file  = $request->import;
        $file2 = $request->zip;
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
                            'id_sub_ktg'       => $data->id_sub_ktg,
                            'klasifikasi'      => $data->nomor_klasifikasi,
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
            if (!empty($file2)) {   
                $zip->open($file2->getClientOriginalName(),ZipArchive::CREATE);
                $zip->extractTo(public_path('admin/foto_buku/'));
                $zip->close();
            }

        $url = $request->segment(2);
        return redirect('/'.$url.'/data-buku')->with('imprt','Berhasil Import Data');
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
                'id_sub_ktg'       => $request->kategori_buku,
                'klasifikasi'      => $request->nomor_klasifikasi,
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
                'id_sub_ktg'       => $request->kategori_buku,
                'klasifikasi'      => $request->nomor_klasifikasi,
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
            'slug_kategori'      => str_slug('-',$request->nama_kategori),
			'deskripsi_kategori' => $request->deskripsi
    	];
    	Kategori::create($data_kategori_buku);
    	if ($request->segment(2)=="petugas") {
			return redirect('/petugas/data-kategori-buku')->with('success','Buku Telah Terinput');
    	}
    	else if ($request->segment(2)=="admin") {
			return redirect('/admin/data-kategori-buku')->with('success','Buku Telah Terinput');
    	}
    }

    public function UpdateKategori($id_sub_ktg,Request $request)
    {
		$data_kategori_buku = [
			'nama_kategori'      => $request->nama_kategori,
            'slug_kategori'      => str_slug('-',$request->nama_kategori),
			'deskripsi_kategori' => $request->deskripsi
    	];
    	$this->buku->where('id_sub_ktg',$id_sub_ktg)->update($data_kategori_buku);
    	if ($request->segment(2)=="petugas") {
			return redirect('/petugas/data-kategori-buku')->with('success','Kategori Buku Telah Terupdate');
    	}
    	else if ($request->segment(2)=="admin") {
			return redirect('/admin/data-kategori-buku')->with('success','Kategori Buku Telah Terupdate');
    	}
    }

    public function DeleteKategori($id_kategori,Request $request)
    {
    	Kategori::where('id_sub_ktg',$id_kategori)->delete();
    	if ($request->segment(2)=="petugas") {
    		return redirect('/petugas/data-kategori')->with('dlt_ktgr','Berhasil Hapus Kategori');
    	}
    	else if ($request->segment(2)=="admin") {
    		return redirect('/admin/data-kategori')->with('dlt_ktgr','Berhasil Hapus Kategori');
    	}
    }

    public function InsertSubKategori()
    {
        $data_sub = [
            'id_kategori_buku' => $request->kategori,
            'nama_sub'         => $request->nama_sub,
            'slug_sub_ktg'    => str_slug('-',$request->nama_sub)
        ];
        SubKategori::create($data_sub);
        $path = $request->segment(2);
        return redirect('/'.$path.'/data-sub-kategori')->with('success','Berhasil Menambahkan Data');
    }

    public function UpdateSubKategori($id)
    {
        $data_sub = [
            'id_kategori_buku' => $request->kategori,
            'nama_sub'         => $request->nama_sub,
            'slug_sub_ktg'     => str_slug('-',$request->nama_sub)
        ];
        SubKategori::where('id_sub_ktg',$id)->firstOrFail()->update($data_sub);
        $path = $request->segment(2);
        return redirect('/'.$path.'/data-sub-kategori')->with('update','Berhasil Mengubah Data');
    }

    public function DeleteSubKategori($id)
    {
        SubKategori::where('id_sub_ktg',$id)->firstOrFail()->delete();
        $path = $request->segment(2);
        return redirect('/'.$path.'/data-sub-kategori')->with('delete','Berhasil Menghapus Data');
    }

    // CRUD TRANSAKSI //

    public function PinjamPost($id,Request $request) 
    {
        $cek           = $this->barcode->where('code_scanner',$request->barcode)->firstOrFail();
        $get_transaksi = $this->detail->where('id_detail_transaksi',$id)->firstOrFail();
        $path = $request->segment(2);
        if ($cek->id_buku != $get_transaksi->id_buku) {
            return redirect('/'.$path.'/atur-pinjaman/'.$id)->with('log','Maaf Buku Tidak Memiliki Barcode Ini');
        }
        else {
            $get_buku = $this->buku->where('id_buku',$cek->id_buku);
            $stok     = $get_buku->firstOrFail()->stok_buku;
            $kurang   = $stok - 1;
            $update   = $get_buku->firstOrFail()->update(['stok_buku'=>$kurang]);
            $this->detail->where('id_detail_transaksi',$id)->update(
                [   
                    'kode_buku'        => $cek->kode_buku,
                    'stok_pinjam'      => 1,
                    'status_transaksi' => 2,
                    'updated_at'       => date('Y-m-d H:i:s')
                ]);
            return redirect('/'.$path.'/lihat-transaksi/'.$get_transaksi->id_transaksi)->with('success','Berhasil Meminjamkan Buku');
        }
    }

    public function PinjamPostMulti(Request $request) 
    {
        $get_buku      = $this->buku->whereIn('id_buku',$request->buku)->get();
        $get_transaksi = $this->transaksi->where('id_siswa',$request->siswa)->get();
        $get_stok      = $get_buku->toArray();
        $input_buku    = $request->buku;
        $input_kode    = $request->kode_buku;

        if (count($get_transaksi) != 0) {
            $array = $get_transaksi->toArray();
            $transaksi = $array[0]['id_transaksi'];
        }

        else {
            $data_transaksi = [
                'id_siswa'   => $request->siswa,
                'ket'        => $request->ket,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ];
            $transaksi = $this->transaksi->insertGetId($data_transaksi);
        }

        foreach ($request->buku as $key => $data) {
            $pinjam[] = [
                'id_transaksi'        => $transaksi,
                'id_buku'             => $input_buku[$key],
                'kode_buku'           => $input_kode[$key],
                'stok_pinjam'         => 1,
                'tanggal_pinjam_buku' => $request->tgl_pnjm,
                'tanggal_jatuh_tempo' => $request->tgl_jth_tmpo,
                'status_transaksi'    => 2,
                'created_at'          => date('Y-m-d H:i:s'),
                'updated_at'          => date('Y-m-d H:i:s')
            ];
        }
        $this->detail->insert($pinjam);
        // END INSERT MULTIPLE ARRAY PINJAM //
        
        // UPDATE MULTIPLE ARRAY STOK BUKU //
        foreach ($get_stok as $data => $value) {
            $num = $data++;
            $stok[] = $value['stok_buku'] - 1;
            $buku = $request->buku;
            $this->buku->where('id_buku',$buku[$num])->firstOrFail()->update(['stok_buku'=>$stok[$num]]);
        }
        // END UPDATE MULTIPLE ARRAY STOK BUKU //
        
        $path = $request->segment(2);
        return redirect('/'.$path.'/lihat-transaksi/'.$transaksi)->with('success','Berhasil meminjam buku');
    }

    public function KembaliBuku(Request $request)
    {
        $get_transaksi  = $this->transaksi->where('id_siswa',$request->siswa)->firstOrFail();
        $id_transaksi   = $get_transaksi->id_transaksi;
        $get_transaksi2 = $this->detail->where('id_transaksi',$get_transaksi->id_transaksi)->whereIn('id_buku',$request->buku);
        $buku           = $request->buku;
        $kode_buku      = $request->kode_buku;
        foreach ($get_transaksi2->get() as $key => $value) {
            if ($request->kode_buku[$key] == $value->kode_buku && $value->status_transaksi==2) {
                $get_buku       = $this->buku->whereIn('id_buku',$request->buku)->get();
                $buku           = $get_buku->toArray();
                $input_buku     = $request->buku;
                $kembali = $this->buku->where('id_buku',$input_buku[$key])->firstOrFail()->update(['stok_buku'=>$buku[$key]['stok_buku']+1]);
                $denda = $this->HitungDenda($value->tanggal_jatuh_tempo,$request->tgl_kmbli);
                // dd($denda);
                $get_transaksi2->update(['tanggal_kembali'=>$request->tgl_kmbli,
                    'status_transaksi'=>2,
                    'denda'=>$denda,
                    'updated_at'=>date('Y-m-d H:i:s')
                ]);
            }
            elseif ($request->kode_buku[$key] != $value->kode_buku && $value->status_transaksi==2) 
            {
                $get_buku     = Barcode::whereIn('kode_buku',$kode_buku)->get();
                $buku_barcode = $get_buku->toArray();
                $array1 = ['status_transaksi' => 4,'updated_at'=>date('Y-m-d H:i:s')];
                $magic  = $this->detail->where('id_transaksi',$id_transaksi)->where('id_buku',$buku_barcode[$key]['id_buku'])->firstOrFail()->update($array1);
                $array2 = ['tanggal_kembali'=>$request->tgl_kmbli,'status_transaksi' => 3,'updated_at'=>date('Y-m-d H:i:s')];
                $magic2 = $this->detail->where('kode_buku',$kode_buku[$key])->firstOrFail()->update($array2);
            }
        }
        $path = $request->segment(2);
        return redirect('/'.$path.'/lihat-transaksi/'.$get_transaksi->id_transaksi);
    }

    public function PerpanjangPinjam($id,Request $request) {
        $get_detail  = $this->detail->where('id_detail_transaksi',$id)->firstOrFail();
        $tanggal     = $request->tanggal_pinjam;
        $tanggal_jth = $request->tanggal_jth_tmpo;
        $array       = ['tanggal_pinjam_buku'=>$tanggal,'tanggal_jatuh_tempo'=>$tanggal_jth];
        $update      = $get_detail->update($array);
        $path        = $request->segment(2);
        return redirect('/'.$path.'/lihat-transaksi/'.$get_detail->id_transaksi)->with('success','Berhasil Memperpanjang Pinjaman');
    }

    public function DeleteTransaksi($id,Request $request)
    {
        $get_buku = $this->buku;
        $get_detail = $this->detail->where('id_transaksi',$id)->get();
        foreach ($get_detail as $key => $value) {
            $buku     = $get_buku->where('id_buku',$value->id_buku)->firstOrFail();
            $stok     = $value->stok_pinjam + $buku['stok_buku'];
            $update   = $get_buku->where('id_buku',$value->id_buku)->firstOrFail()->update(['stok_buku'=>$stok]);
        }
        $delete = $this->transaksi->where('id_transaksi',$id)->firstOrFail()->delete();
        $path = $request->segment(2);
        return redirect('/'.$path.'/data-transaksi')->with('dlt_pnjm','Transaksi Buku Telah Terhapus');
    }

    public function DeleteDetailTransaksi($id_transaksi,$id_detail,Request $request)
    {
        $get_detail = $this->detail->where('id_detail_transaksi',$id_detail)->firstOrFail();
        $get_buku   = $this->buku->where('id_buku',$get_detail->id_buku)->firstOrFail();
        $stok       = $get_detail->stok_buku + $get_buku->stok_buku;
        $update     = $get_buku->update(['stok_buku'=>$stok]);
        $delete     = $get_detail->delete();
        $path       = $request->segment(2);
        return redirect('/'.$path.'/lihat-transaksi/'.$id_transaksi)->with('log','Berhasil Hapus Transaksi');
    }

    // END CRUD TRANSAKSI //

    public function InsertBarcode(Request $request) {
        $data_barcode = [
            'code_scanner' => $request->barcode,
            'kode_buku'    => $this->KodePinjam(100),
            'id_buku'      => $request->buku
        ];
        Barcode::create($data_barcode);
        $path = $request->segment(2);
        return redirect('/'.$path.'/data-barcode')->with('success','Berhasil Menambahkan Barcode');
    }

    public function UpdateBarcode($id_barcode,Request $request) {
        $buku    = $request->buku;
        $barcode = $request->barcode;
        $array   = ['id_buku'=>$buku,'code_scanner'=>$barcode];
        Barcode::where('id_barcode',$id_barcode)->firstOrFail()->update($array);
    }

    public function DeleteBarcode($id_barcode,Request $request) {
        Barcode::where('id_barcode',$id_barcode)->firstOrFail()->delete();
        $path = $request->segment(2);
        return redirect('/'.$path.'/data-barcode')->with('delete','Berhasil Hapus');
    }

    public function KodePinjam($kode)
    {
         $min_length= 0;
         $max_length = 100;
         $bigL = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
         $smallL = "abcdefghijklmnopqrstuvwxyz";
         $number = "0123456789";
         $bigB = str_shuffle($bigL);
         $smallS = str_shuffle($smallL);
         $numberS = str_shuffle($number);
         $subA = substr($bigB,0,5);
         $subB = substr($bigB,6,5);
         $subC = substr($bigB,10,5);
         $subD = substr($smallS,0,5);
         $subE = substr($smallS,6,5);
         $subF = substr($smallS,10,5);
         $subG = substr($numberS,0,5);
         $subH = substr($numberS,6,5);
         $subI = substr($numberS,10,5);
         $RandCode1 = str_shuffle($subA.$subD.$subB.$subF.$subC.$subE);
         $RandCode2 = str_shuffle($RandCode1);
         $RandCode = $RandCode1.$RandCode2;
         if ($kode>$min_length && $kode<$max_length) {
            $CodeEX = substr($RandCode,0,$kode);
         }
         else {
            $CodeEX = $RandCode;
         }
         return $CodeEX;
    }

    public function HitungDenda($tgl1,$tgl2)
    {
      $datetime1 = new DateTime($tgl1);
      $datetime2 = new DateTime($tgl2);
      // dd($datetime1);
      $difference = $datetime1->diff($datetime2);
      if ($difference->days % 3 == 0) {
            $sindam = $difference->days / 3;
            $denda = 15000 * $sindam;
            // return $sindam;
            // dd($sindam);
      }
      else {
        $difference->days / 3;
        $denda = 15000 * 3;
        return $denda;
      }
    }
}
