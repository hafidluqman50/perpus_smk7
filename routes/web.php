<?php

/*
|--------------------------------------------------------------------------
| Web Route
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route Main Page //
Route::get('/',['uses'=>'Siswa\SiswaPageController@Page','as'=>'index-main-page']);
Route::get('/buku',['uses'=>'Siswa\SiswaPageController@Buku','as'=>'all-buku-page']);
Route::get('/buku/kategori/{slug}',['uses'=>'Siswa\SiswaPageController@Kategori','as'=>'kategori-main-page']);
Route::get('/buku/kategori/sub/{slug}',['uses'=>'Siswa\SiswaPageController@SubKategori','as'=>'sub-main-page']);
// End Route Main Page //

// API Routing //
Route::group(['middleware'=>'api','prefix'=>'api'],function(){
	Route::get('/json',['uses'=>'BukuPageController@RestApi']);
});
// End API Routing //

// Ajax Request //
Route::group(['middleware'=>'AjaxRequest'],function(){
	Route::get('/siswa/{kelas}',['uses'=>'BukuPageController@GetSiswa','as'=>'get-siswa-name']);
	Route::get('/siswa/buku/pinjam/{id}',['uses'=>'BukuPageController@GetBuku','as'=>'get-buku-siswa']);
	Route::get('/barcode/buku/{barcode}',['uses'=>'BukuPageController@GetBarcode','as'=>'get-barcode-buku']);
	Route::get('/buku/get/kategori/{kategori}',['uses'=>'BukuPageController@GetSubKtg','as'=>'get-sub-ktg']);
	Route::get('/dua-minggu/{tanggal}',['uses'=>'BukuPageController@DuaMinggu','as'=>'get-dua-minggu']);
	Route::get('/notifikasi/petugas',['uses'=>'NotifikasiController@NotifikasiPetugas','as'=>'notifikasi-petugas-cek']);
	Route::get('/notifikasi/admin',['uses'=>'NotifikasiController@NotifikasiAdmin','as'=>'notifikasi-admin-cek']);
});
// End Ajax Request //

Route::group(['middleware'=>'hasSiswa'],function(){
	Route::get('/profile/{user}',['uses'=>'Siswa\SiswaPageController@Profile','as'=>'profile-siswa-page']);
	Route::get('/sunting-profile/{user}',['uses'=>'Siswa\SiswaPageController@SuntingProfile','as'=>'sunting-profile-page']);
	Route::post('/update/profile/{username}',['uses'=>'Siswa\SiswaController@UpdateProfile','as'=>'update-siswa-profile']);
	Route::get('/buku/pinjam/{slug}',['uses'=>'Siswa\SiswaPageController@Pinjam','as'=>'pinjam-buku-page']);
	Route::post('/buku/pinjam/{id_buku}',['uses'=>'Siswa\SiswaController@PinjamPost','as'=>'pinjam-post-page']);
	Route::post('/buku/batal/{id_transaksi}',['uses'=>'Siswa\SiswaController@BatalPinjam','as'=>'batal-pinjam-post']);
	Route::get('/buku/detail-pinjam/{id_transaksi}/{username}',['uses'=>'Siswa\SiswaPageController@PinjamDetail','as'=>'detail-pinjam-page']);
	Route::any('/buku/wishlist/{buku}',['uses'=>'Siswa\SiswaController@Wishlist','as'=>'wishlist-post-buku']);
});

Route::get('/buku/detail/{slug}',['uses'=>'Siswa\SiswaPageController@InfoBuku','as'=>'info-buku-page']);	
Route::get('/kategori/{kategori}',['uses'=>'Siswa\SiswaPageController@InfoKategori','as'=>'info-kategori-page']);
// Route::get('/info-buku',['uses'=>'Siswa\SiswaPageController@InfoBuku','as'=>'info-buku-page']);
//----------Special Routing-----------//
// Route::post('/wishtlist/')
//----------End Special Routing--------------//

Route::group(['middleware'=>'isAuth'],function (){	
//----------Auth----------//
	// Route::post('/login/admin',['uses'=>'Admin\AdminController@admin']);
	Route::get('/login-form',['uses'=>'AuthController@FormLogin','as'=>'form-login']);
	Route::post('/login/auth',['uses'=>'AuthController@Authenticate','as'=>'form-post-login']);
	Route::get('/logout',['uses'=>'AuthController@AuthLogout','as'=>'logout']);
//-------------------------------//

//----------Route Siswa----------//
	// Route::group(['middleware'=>'hasSiswa'],function(){
	// 	Route::get('/dashboard-siswa',['uses'=>'Siswa\SiswaPageController@Dashboard','as'=>'dashboard-siswa-page']);
	// 	Route::get('/profile-siswa/{username}',['uses'=>'Siswa\SiswaPageController@ProfileSiswa','as'=>'profile-siswa-page']);
	// 	Route::get('/edit-profile-siswa/{username}',['uses'=>'Siswa\SiswaPageController@EditProfile','as'=>'edit-profile-siswa']);
	// 	Route::post('/edit/profile/siswa/{username}',['uses'=>'Siswa\SiswaController@UpdateProfile','as'=>'post-updated-profile-siswa']);
	// });
//----------End Siswa----------//

//----------Route Petugas----------//
	// Route::get('/coba','PetugasController@RegisterPetugas');
	Route::group(['middleware'=>'hasPetugas'],function(){
		Route::get('/dashboard-petugas',['uses'=>'Petugas\PetugasPageController@DashboardPetugas','as'=>'petugas-dashboard']);
		
		// UPDATE PROFILE PETUGAS //
		Route::get('/profile/{username}',['uses'=>'Petugas\PetugasPageController@ProfilePetugas','as'=>'petugas-profile-page']);
		Route::post('/update/petugas',['uses'=>'Petugas\PetugasController@UpdateProfile','as'=>'petugas-update-profile']);
		// END UPDATE PROFILE PETUGAS //

		// CRUD BUKU //
		Route::get('/petugas/data-buku',['uses'=>'BukuPageController@ShowBuku','as'=>'show-data-buku']);
		Route::get('/petugas/tambah-data-buku',['uses'=>'BukuPageController@SimpanBuku','as'=>'simpan-data-buku']);
		Route::post('/insert/petugas/data-buku',['uses'=>'BukuController@TambahBuku','as'=>'insert-data-buku']);
		Route::get('/petugas/detail-buku/{id_buku}',['uses'=>'BukuPageController@DetailBuku','as'=>'detail-data-buku']);
		Route::get('/petugas/edit-buku/{id_buku}',['uses'=>'BukuPageController@EditBuku','as'=>'edit-data-buku']);
		Route::post('/update/petugas/data-buku/{id_buku}',['uses'=>'BukuController@UpdateBuku','as'=>'insert-data-buku']);
		Route::get('/delete/petugas/data-buku/{id_buku}',['uses'=>'BukuController@DeleteBuku','as'=>'delete-data-buku']);
		// END CRUD BUKU //
		
		// CRUD TRANSAKSI //
		Route::get('/petugas/data-transaksi',['uses'=>'BukuPageController@ShowTransaksi','as'=>'show-transaksi-page']);
		Route::get('/petugas/lihat-transaksi/{id_transaksi}',['uses'=>'BukuPageController@LihatTransaksi','as'=>'detail-transaksi-page']);
		Route::get('/petugas/pinjam-buku',['uses'=>'BukuPageController@PinjamMultiForm','as'=>'form-pinjam-buku']);
		Route::get('/petugas/detail-data-peminjaman/{id_transaksi}',['uses'=>'BukuPageController@DetailPeminjaman','as'=>'detail-pinjam-page']);
		Route::get('/petugas/atur-pinjaman/{id_transaksi}',['uses'=>'BukuPageController@PinjamSingleForm','as'=>'atur-transaksi-page']);
		Route::get('/petugas/perpanjang-pinjam/{id}',['uses'=>'BukuPageController@PerpanjangPinjamPage','as'=>'perpanjang-pinjam-buku']);
		Route::post('/perpanjang/petugas/buku/{id}',['uses'=>'BukuController@PerpanjangPinjam','as'=>'perpanjang-pinjam-post']);
		Route::post('/pinjam/petugas/data-peminjaman',['uses'=>'BukuController@PinjamPostMulti','as'=>'pinjam-buku-post']);
		Route::post('/pinjam/petugas/atur/{id_transaksi}',['uses'=>'BukuController@PinjamPost','as'=>'pinjam-transaksi-post']);

		Route::get('/petugas/kembali-buku',['uses'=>'BukuPageController@KembaliForm','as'=>'kembali-multi-form']);
		Route::get('/petugas/detail-kembali-buku/{id_transaksi}',['uses'=>'BukuPageController@DetailKembali','as'=>'detail-kembali-page']);
		Route::post('/kembali/petugas/buku',['uses'=>'BukuController@KembaliBuku','as'=>'post-kembali-banyak']);

		Route::get('/delete/petugas/data-transaksi/{id}',['uses'=>'BukuController@DeleteTransaksi','as'=>'delete-data-transaksi']);
		Route::get('/delete/petugas/detail-transaksi/{id_transaksi}/{id_detail}',['uses'=>'BukuController@DeleteDetailTransaksi','as'=>'delete-detail-transaksi']);
		// END CRUD TRANSAKSI //

		// CRUD BARCODE BUKU //
		Route::get('/petugas/data-barcode',['uses'=>'BukuPageController@Barcode','as'=>'data-barcode-page']);
		Route::get('/petugas/tambah-data-barcode',['uses'=>'BukuPageController@AddFormBarcode','as'=>'form-barcode-page']);
		Route::post('/insert/petugas/data-barcode',['uses'=>'BukuController@InsertBarcode','as'=>'post-barcode-data']);
		Route::get('/petugas/edit-data-barcode/{id_barcode}',['uses'=>'BukuPageController@EditFormBarcode','as'=>'form-barcode-page']);
		Route::post('/update/petugas/data-barcode/{id_barcode}',['uses'=>'BukuController@UpdateBarcode','as'=>'post-barcode-data']);
		Route::get('/delete/petugas/data-barcode/{id_barcode}',['uses'=>'BukuController@DeleteBarcode','as'=>'delete-barcode-data']);
		// END CRUD BARCODE BUKU //
	});
//----------End Petugas--------//

//----------Route Admin----------//
	Route::group(['middleware'=>'hasAdmin'],function(){
		Route::get('/dashboard-admin',['uses'=>'Admin\AdminPageController@DashboardAdmin','as'=>'dashboard-admin']);
		
		// CRUD PETUGAS //
		Route::get('/admin/data-petugas',['uses'=>'Admin\AdminPageController@ShowPetugas','as'=>'admin-petugas-data']);
		Route::get('/admin/tambah-data-petugas',['uses'=>'Admin\AdminPageController@SimpanPetugas','as'=>'admin-simpan-petugas']);
		Route::post('/insert/admin/data-petugas',['uses'=>'Admin\AdminController@TambahPetugas','as'=>'post-data-petugas']);
		Route::get('/admin/edit-petugas/{username}',['uses'=>'Admin\AdminPageController@EditPetugas','as'=>'admin-edit-petugas']);
		Route::post('/update/admin/data-petugas/{username}',['uses'=>'Admin\AdminController@UpdateAdmin','as'=>'update-data-petugas']);
		Route::get('/delete/admin/data-petugas/{username}',['uses'=>'Admin\AdminController@DeletePetugas','as'=>'delete-data-petugas']);
		// END CRUD PETUGAS//

		// DATA SISWA //
		Route::get('/admin/data-siswa',['uses'=>'Admin\AdminPageController@ShowSiswa','as'=>'data-siswa-page']);
		Route::get('/admin/siswa/akun/nonaktif/{username}',['uses'=>'Admin\AdminController@PengaturanAkun','as'=>'siswa-nonaktif-akun']);
		Route::get('/admin/siswa/akun/aktif/{username}',['uses'=>'Admin\AdminController@PengaturanAkun','as'=>'siswa-aktif-akun']);
		Route::get('/admin/import-siswa',['uses'=>'Admin\AdminPageController@ImportSiswa','as'=>'import-siswa-page']);
		Route::get('/admin/siswa-detail/{id_siswa}',['uses'=>'Admin\AdminPageController@DetailSiswa','as'=>'detail-data-siswa']);
		// END DATA SISWA //

		// CRUD BUKU //
		Route::get('/admin/data-buku',['uses'=>'Admin\AdminPageController@ShowBuku','as'=>'show-data-buku']);
		Route::get('/admin/tambah-data-buku',['uses'=>'Admin\AdminPageController@SimpanBuku','as'=>'simpan-data-buku']);
		Route::post('/insert/admin/data-buku',['uses'=>'Admin\AdminController@TambahBuku','as'=>'insert-data-buku']);
		Route::get('/admin/import-buku',['uses'=>'Admin\AdminPageController@ImportBuku','as'=>'import-buku-page']);
		Route::post('/import/admin/data-buku',['uses'=>'Admin\AdminController@ImportPost','as'=>'import-buku-post']);
		Route::get('/admin/detail-buku/{id_buku}',['uses'=>'Admin\AdminPageController@DetailBuku','as'=>'detail-data-buku']);
		Route::get('/admin/edit-buku/{id_buku}',['uses'=>'Admin\AdminPageController@EditBuku','as'=>'edit-data-buku']);
		Route::post('/update/admin/data-buku/{id_buku}',['uses'=>'Admin\AdminController@UpdateBuku','as'=>'insert-data-buku']);
		Route::get('/delete/admin/data-buku/{id_buku}',['uses'=>'Admin\AdminController@DeleteBuku','as'=>'delete-data-buku']);
		// END CRUD BUKU //

		// CRUD KATEGORI BUKU //
		Route::get('/admin/data-kategori',['uses'=>'Admin\AdminPageController@ShowKategori','as'=>'show-data-kategori']);
		Route::get('/admin/tambah-data-kategori',['uses'=>'Admin\AdminPageController@SimpanKategori','as'=>'insert-page-kategori']);
		Route::post('/insert/admin/data-kategori',['uses'=>'Admin\AdminController@TambahKategori','as'=>'insert-data-kategori']);
		Route::get('/admin/edit-kategori/{id_kategori_buku}',['uses'=>'Admin\AdminPageController@EditKategori','as'=>'edit-data-kategori']);
		Route::post('/update/admin/data-kategori/{id_kategori_kategori}',['uses'=>'Admin\AdminController@UpdateKategori','as'=>'insert-data-kategori']);
		Route::get('/delete/admin/data-kategori/{id_kategori_kategori}',['uses'=>'Admin\AdminController@DeleteKategori','as'=>'delete-data-kategori']);

		Route::get('/admin/tambah-data-sub',['uses'=>'Admin\AdminPageController@SimpanSubKategori','as'=>'simpan-sub-form']);
		Route::get('/insert/admin/data-sub-kategori',['uses'=>'Admin\AdminController@TambahSubKategori','as'=>'tambah-sub-post']);
		Route::get('/admin/edit-data-sub/{id}',['uses'=>'Admin\AdminPageController@EditSubKategori','as'=>'edit-sub-page']);
		Route::get('/update/admin/data-sub-kategori/{id}',['uses'=>'Admin\AdminController@UpdateSubKategori','as'=>'update-sub-post']);
		Route::get('/delete/admin/data-sub-kategori/{id}',['uses'=>'Admin\AdminController@DeleteSubKategori','as'=>'delete-sub-kategori']);
		// END CRUD KATEGORI BUKU //

		// CRUD PINJAM BUKU //
		// Route::get('/admin/data-peminjaman',['uses'=>'Admin\AdminPageController@ShowPeminjaman','as'=>'page-pinjam-buku']);
		Route::get('/delete/admin/data-peminjaman/{id_transaksi}',['uses'=>'Admin\AdminController@DeleteTransaksi','as'=>'delete-transaksi-data']);
		// END CRUD PINJAM BUKU //

		// CRUD TRANSAKSI //
		Route::get('/admin/data-transaksi',['uses'=>'Admin\AdminPageController@ShowTransaksi','as'=>'show-transaksi-page']);
		Route::get('/admin/lihat-transaksi/{id_transaksi}',['uses'=>'Admin\AdminPageController@LihatTransaksi','as'=>'detail-transaksi-page']);
		Route::get('/admin/pinjam-buku',['uses'=>'Admin\AdminPageController@PinjamMultiForm','as'=>'form-pinjam-buku']);
		Route::get('/admin/detail-transaksi/{id_transaksi}',['uses'=>'Admin\AdminPageController@DetailTransaksi','as'=>'detail-pinjam-page']);
		Route::get('/admin/atur-pinjaman/{id_transaksi}',['uses'=>'Admin\AdminPageController@PinjamSingleForm','as'=>'atur-transaksi-page']);
		Route::get('/admin/perpanjang-pinjam/{id}',['uses'=>'Admin\AdminPageController@PerpanjangPinjamPage','as'=>'perpanjang-pinjam-buku']);
		Route::post('/perpanjang/admin/buku/{id}',['uses'=>'BukuController@PerpanjangPinjam','as'=>'perpanjang-pinjam-post']);
		Route::post('/pinjam/admin/data-peminjaman',['uses'=>'BukuController@PinjamPostMulti','as'=>'pinjam-buku-post']);
		Route::post('/pinjam/admin/atur/{id_transaksi}',['uses'=>'BukuController@PinjamPost','as'=>'pinjam-transaksi-post']);
		Route::get('/admin/detail-transaksi/{id_detail}',['uses'=>'Admin\AdminPageController@']);

		Route::get('/admin/kembali-buku',['uses'=>'Admin\AdminPageController@KembaliForm','as'=>'kembali-multi-form']);
		Route::get('/admin/detail-kembali-buku/{id_transaksi}',['uses'=>'Admin\AdminPageController@DetailKembali','as'=>'detail-kembali-page']);
		Route::post('/kembali/admin/buku',['uses'=>'BukuController@KembaliBuku','as'=>'post-kembali-banyak']);

		Route::get('/delete/admin/data-transaksi/{id}',['uses'=>'BukuController@DeleteTransaksi','as'=>'delete-data-transaksi']);
		Route::get('/delete/admin/detail-transaksi/{id_transaksi}/{id_detail}',['uses'=>'BukuController@DeleteDetailTransaksi','as'=>'delete-detail-transaksi']);
		// END CRUD TRANSAKSI //

		// DATA CATATAN TRANSAKSI //
		Route::get('/admin/data-catat-transaksi',['uses'=>'Admin\AdminPageController@CatatanPage','as'=>'catatan-transaksi-page']);
		// END DATA CATATAN TRANSAKSI //

		// CRUD BARCODE BUKU //
		Route::get('/admin/data-barcode',['uses'=>'Admin\AdminPageController@Barcode','as'=>'data-barcode-page']);
		Route::get('/admin/tambah-data-barcode',['uses'=>'Admin\AdminPageController@AddFormBarcode','as'=>'form-barcode-page']);
		Route::post('/insert/admin/data-barcode',['uses'=>'BukuController@InsertBarcode','as'=>'post-barcode-data']);
		Route::get('/admin/edit-data-barcode/{id_barcode}',['uses'=>'Admin\AdminPageController@EditFormBarcode','as'=>'form-barcode-page']);
		Route::post('/update/admin/data-barcode/{id_barcode}',['uses'=>'BukuController@UpdateBarcode','as'=>'post-barcode-data']);
		Route::get('/delete/admin/data-barcode/{id_barcode}',['uses'=>'BukuController@DeleteBarcode','as'=>'delete-barcode-data']);
		// END CRUD BARCODE BUKU //

		// Route::post('/kembali/admin/data-transaksi/{id_transaksi}',['uses'=>'BukuController@KembalikanBuku','as'=>'post-kembali-buku']);
	});
//----------End Admin----------//
});