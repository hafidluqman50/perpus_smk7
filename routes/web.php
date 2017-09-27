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

Route::get('/',['uses'=>'Siswa\SiswaPageController@Page','as'=>'index-main-page']);
Route::get('/buku',['uses'=>'Siswa\SiswaPageController@Buku','as'=>'all-buku-page']);

// Ajax Request //
Route::group(['middleware'=>'AjaxRequest'],function(){
	Route::get('/siswa/{kelas}',['uses'=>'BukuPageController@GetSiswa','as'=>'get-siswa-name']);
	Route::get('/dua-minggu/{tanggal}',['uses'=>'BukuPageController@DuaMinggu','as'=>'get-dua-minggu']);
	Route::get('/siswa/buku/pinjam/{id_siswa}',['uses'=>'BukuPageController@GetBuku','as'=>'get-buku-siswa']);
	Route::get('/barcode/buku/{barcode}',['uses'=>'BukuPageController@GetBarcode','as'=>'get-barcode-buku']);
});
// End Ajax Request //

Route::group(['middleware'=>'hasSiswa'],function(){
	Route::get('/profile/{user}',['uses'=>'Siswa\SiswaPageController@Profile','as'=>'profile-siswa-page']);
	Route::get('/sunting-profile/{user}',['uses'=>'Siswa\SiswaPageController@SuntingProfile','as'=>'sunting-profile-page']);
	Route::post('/update/profile/{id}',['uses'=>'Siswa\SiswaController@UpdateProfile','as'=>'update-siswa-profile']);
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

		// Route::get('/petugas/profile',['uses'=>'Petugas\PetugasPageController@DataUser','as'=>'data-user-petugas']);
		// Route::get('/delete/petugas/{username}',['uses'=>'Petugas\PetugasController@DeleteUser','as'=>'delete-petugas-siswa']);

		// CRUD BUKU //
		Route::get('/petugas/data-buku',['uses'=>'BukuPageController@ShowBuku','as'=>'show-data-buku']);
		Route::get('/petugas/tambah-data-buku',['uses'=>'BukuPageController@SimpanBuku','as'=>'simpan-data-buku']);
		Route::post('/insert/petugas/data-buku',['uses'=>'BukuController@TambahBuku','as'=>'insert-data-buku']);
		Route::get('/petugas/detail-buku/{id_buku}',['uses'=>'BukuPageController@DetailBuku','as'=>'detail-data-buku']);
		Route::get('/petugas/edit-buku/{id_buku}',['uses'=>'BukuPageController@EditBuku','as'=>'edit-data-buku']);
		Route::post('/update/petugas/data-buku/{id_buku}',['uses'=>'BukuController@UpdateBuku','as'=>'insert-data-buku']);
		Route::get('/delete/petugas/data-buku/{id_buku}',['uses'=>'BukuController@DeleteBuku','as'=>'delete-data-buku']);
		// END CRUD BUKU //
		
		// CRUD TRANSAKSI BUKU //
		Route::get('/petugas/data-peminjaman',['uses'=>'BukuPageController@ShowPeminjaman','as'=>'page-pinjam-buku']);
		Route::get('/petugas/pinjam-buku',['uses'=>'BukuPageController@Pinjam','as'=>'form-pinjam-buku']);
		Route::post('/pinjam/petugas/data-transaksi',['uses'=>'BukuController@PinjamBuku','as'=>'insert-pinjam-buku']);
		Route::get('/petugas/edit-data-peminjaman/{id_transaksi}',['uses'=>'BukuPageController@EditPinjam','as'=>'edit-pinjam-buku']);
		Route::post('/edit/petugas/data-transaksi/{id_transaksi}',['uses'=>'BukuController@UpdatePinjam','as'=>'update-pinjam-buku']);
		Route::get('/delete/petugas/data-transaksi/{id_transaksi}',['uses'=>'BukuController@DeleteTransaksi','as'=>'delete-pinjam-buku']);

		Route::get('/petugas/data-pengembalian',['uses'=>'BukuPageController@Showpengembalian','as'=>'page-kembali-buku']);
		Route::get('/petugas/kembali-buku/{id_transaksi}',['uses'=>'BukuPageController@Pengembalian','as'=>'kembali-pinjam-buku']);
		Route::post('/kembali/petugas/data-transaksi/{id_transaksi}',['uses'=>'BukuController@KembalikanBuku','as'=>'post-kembali-buku']);
		// END CRUD TRANSAKSI BUKU //
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
		// END DATA SISWA //

		// CRUD BUKU //
		Route::get('/admin/data-buku',['uses'=>'BukuPageController@ShowBuku','as'=>'show-data-buku']);
		Route::get('/admin/tambah-data-buku',['uses'=>'BukuPageController@SimpanBuku','as'=>'simpan-data-buku']);
		Route::post('/insert/admin/data-buku',['uses'=>'BukuController@TambahBuku','as'=>'insert-data-buku']);
		Route::get('/admin/import-buku',['uses'=>'BukuPageController@ImportBuku','as'=>'import-buku-page']);
		Route::post('/import/admin/data-buku',['uses'=>'BukuController@ImportPost','as'=>'import-buku-post']);
		Route::get('/admin/detail-buku/{id_buku}',['uses'=>'BukuPageController@DetailBuku','as'=>'detail-data-buku']);
		Route::get('/admin/edit-buku/{id_buku}',['uses'=>'BukuPageController@EditBuku','as'=>'edit-data-buku']);
		Route::post('/update/admin/data-buku/{id_buku}',['uses'=>'BukuController@UpdateBuku','as'=>'insert-data-buku']);
		Route::get('/delete/admin/data-buku/{id_buku}',['uses'=>'BukuController@DeleteBuku','as'=>'delete-data-buku']);
		// END CRUD BUKU //

		// CRUD KATEGORI BUKU //
		Route::get('/admin/data-kategori',['uses'=>'BukuPageController@ShowKategori','as'=>'show-data-kategori']);
		Route::get('/admin/tambah-data-kategori',['uses'=>'BukuPageController@SimpanKategori','as'=>'insert-page-kategori']);
		Route::post('/insert/admin/data-kategori',['uses'=>'BukuController@TambahKategori','as'=>'insert-data-kategori']);
		Route::get('/admin/detail-kategori/{id_kategori_buku}',['uses'=>'BukuPageController@DetailKategori','as'=>'detail-data-kategori']);
		Route::get('/admin/edit-kategori/{id_kategori_buku}',['uses'=>'BukuPageController@EditKategori','as'=>'edit-data-kategori']);
		Route::post('/update/admin/data-kategori/{id_kategori_kategori}',['uses'=>'BukuController@UpdateKategori','as'=>'insert-data-kategori']);
		Route::get('/delete/admin/data-kategori/{id_kategori_kategori}',['uses'=>'BukuController@DeleteKategori','as'=>'delete-data-kategori']);
		// END CRUD KATEGORI BUKU //

		// CRUD PINJAM BUKU //
		Route::get('/admin/data-peminjaman',['uses'=>'BukuPageController@ShowPeminjaman','as'=>'page-pinjam-buku']);
		Route::get('/admin/pinjam-buku',['uses'=>'BukuPageController@PinjamMultiForm','as'=>'form-pinjam-buku']);
		Route::get('/admin/atur-transaksi/{id_transaksi}',['uses'=>'BukuPageController@PinjamSingleForm','as'=>'atur-transaksi-page']);
		Route::post('/pinjam/admin/data-peminjaman',['uses'=>'BukuController@PinjamPostMulti','as'=>'pinjam-buku-post']);
		Route::post('/pinjam/admin/atur/{id_transaksi}',['uses'=>'BukuController@PinjamPost','as'=>'pinjam-transaksi-post']);
		Route::get('/delete/admin/data-peminjaman/{id_transaksi}',['uses'=>'BukuController@DeleteTransaksi','as'=>'delete-transaksi-data']);
		// END CRUD PINJAM BUKU //

		// CRUD KEMBALIKAN BUKU //
		Route::get('/admin/data-pengembalian',['uses'=>'BukuPageController@ShowPengembalian','as'=>'page-kembali-buku']);
		Route::get('/admin/kembali-buku',['uses'=>'BukuPageController@PengembalianMultiForm','as'=>'kembali-multi-form']);
		Route::get('/admin/kembali-buku/{id_transaksi}',['uses'=>'BukuPageController@PengembalianSingleForm','as'=>'kembali-single-form']);
		Route::post('/kembali/admin/buku/{id_transaksi}',['uses'=>'BukuController@KembalikanBuku','as'=>'post-kembali-buku']);
		Route::post('/kembali/admin/buku',['uses'=>'BukuController@KembalikanBukuMulti','as'=>'post-kembali-banyak']);
		// END CRUD KEMBALIKAN BUKU //

		// CRUD BARCODE BUKU //
		Route::get('/admin/data-barcode',['uses'=>'BukuPageController@Barcode','as'=>'data-barcode-page']);
		Route::get('/admin/tambah-data-barcode',['uses'=>'BukuPageController@AddFormBarcode','as'=>'form-barcode-page']);
		Route::post('/insert/admin/data-barcode',['uses'=>'BukuController@InsertBarcode','as'=>'post-barcode-data']);
		Route::get('/admin/edit-data-barcode/{id_barcode}',['uses'=>'BukuPageController@EditFormBarcode','as'=>'form-barcode-page']);
		Route::post('/update/admin/data-barcode/{id_barcode}',['uses'=>'BukuController@UpdateBarcode','as'=>'post-barcode-data']);
		Route::get('/delete/admin/data-barcode/{id_barcode}',['uses'=>'BukuController@DeleteBarcode','as'=>'delete-barcode-data']);
		// END CRUD BARCODE BUKU //

		// Route::post('/kembali/admin/data-transaksi/{id_transaksi}',['uses'=>'BukuController@KembalikanBuku','as'=>'post-kembali-buku']);
	});
//----------End Admin----------//
});