<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/',['uses'=>'Siswa\SiswaPageController@Page','as'=>'index-main-page']);
Route::get('/profile/{user}',['uses'=>'Siswa\SiswaPageController@Profile','as'=>'profile-siswa-page']);
Route::get('/sunting-profile/{user}',['uses'=>'Siswa\SiswaPageController@SuntingProfile','as'=>'sunting-profile-page']);
Route::post('/update/profile/{id}',['uses'=>'Siswa\SiswaController@UpdateProfile','as'=>'update-siswa-profile']);
Route::get('/buku',['uses'=>'Siswa\SiswaPageController@Buku','as'=>'all-buku-page']);
Route::get('/kategori',['uses'=>'Siswa\SiswaPageController@InfoKategori','as'=>'info-kategori-page']);
Route::get('/info-buku',['uses'=>'Siswa\SiswaPageController@InfoBuku','as'=>'info-buku-page']);
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

		// CRUD KATEGORI BUKU //
		Route::get('/petugas/data-kategori',['uses'=>'BukuPageController@ShowKategori','as'=>'show-data-kategori']);
		Route::get('/petugas/tambah-data-kategori',['uses'=>'BukuPageController@SimpanKategori','as'=>'tambah-data-kategori']);
		Route::post('/insert/petugas/data-kategori',['uses'=>'BukuController@TambahKategori','as'=>'insert-data-kategori']);
		Route::get('/petugas/edit-kategori/{id_kategori_buku}',['uses'=>'BukuPageController@EditKategori','as'=>'edit-data-kategori']);
		Route::post('/update/petugas/data-kategori/{id_kategori_buku}',['uses'=>'BukuController@UpdateKategori','as'=>'insert-data-kategori']);
		Route::get('/delete/petugas/data-kategori/{id_kategori_buku}',['uses'=>'BukuController@DeleteKategori','as'=>'delete-data-kategori']);
		// END CRUD KATEGORI BUKU //

		// CRUD PEMINJAMAN BUKU //
		Route::get('/petugas/data-peminjaman',['uses'=>'BukuPageController@ShowPeminjaman','as'=>'page-pinjam-buku']);
		Route::get('/petugas/pinjam-buku',['uses'=>'BukuPageController@Pinjam','as'=>'form-pinjam-buku']);
		Route::post('/pinjam/petugas/data-peminjaman',['uses'=>'BukuController@PinjamBuku','as'=>'insert-pinjam-buku']);
		Route::get('/petugas/edit-data-peminjaman/{id_transaksi}',['uses'=>'BukuPageController@EditPinjam','as'=>'edit-pinjam-buku']);
		Route::post('/edit/petugas/data-peminjaman/{id_transaksi}',['uses'=>'BukuController@UpdatePinjam','as'=>'update-pinjam-buku']);
		Route::get('/delete/petugas/data-pinjam/{id_transaksi}',['uses'=>'BukuController@DeletePinjam','as'=>'delete-pinjam-buku']);
		// END CRUD PEMINJAMAN BUKU //

		// CRUD PENGEMBALIAN BUKU //
		Route::get('/petugas/data-pengembalian',['uses'=>'BukuPageController@Showpengembalian','as'=>'page-pinjam-buku']);
		Route::post('/insert/petugas/data-pengembalian',['uses'=>'BukuController@KembalikanBuku','as'=>'insert-pinjam-buku']);
		Route::get('/petugas/edit-data-pengembalian/{id_transaksi}',['uses'=>'BukuPageController@EditPengembalian','as'=>'edit-pinjam-buku']);
		Route::post('/edit/petugas/data-pengembalian/{id_transaksi}',['uses'=>'BukuController@UpdatePengembalian','as'=>'update-pinjam-buku']);
		Route::get('/delete/petugas/data-pinjam/{id_transaksi}',['uses'=>'BukuController@DeletePengembalian','as'=>'delete-pinjam-buku']);
		// END CRUD PENGEMBALIAN BUKU //
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

		// CRUD BUKU //
		Route::get('/admin/data-buku',['uses'=>'BukuPageController@ShowBuku','as'=>'show-data-buku']);
		Route::get('/admin/tambah-data-buku',['uses'=>'BukuPageController@SimpanBuku','as'=>'simpan-data-buku']);
		Route::post('/insert/admin/data-buku',['uses'=>'BukuController@TambahBuku','as'=>'insert-data-buku']);
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

		// CRUD PEMINJAMAN BUKU //
		Route::get('/admin/data-peminjaman',['uses'=>'BukuPageController@ShowPeminjaman','as'=>'page-pinjam-buku']);
		Route::get('/admin/pinjam-buku',['uses'=>'BukuPageController@Pinjam','as'=>'form-pinjam-buku']);
		Route::post('/pinjam/admin/data-peminjaman',['uses'=>'BukuController@PinjamBuku','as'=>'insert-pinjam-buku']);
		Route::get('/admin/edit-data-peminjaman/{id_transaksi}',['uses'=>'BukuPageController@EditPinjam','as'=>'edit-pinjam-buku']);
		Route::post('/edit/admin/data-peminjaman/{id_transaksi}',['uses'=>'BukuController@UpdatePinjam','as'=>'update-pinjam-buku']);
		Route::get('/delete/admin/data-pinjam/{id_transaksi}',['uses'=>'BukuController@DeletePinjam','as'=>'delete-pinjam-buku']);
		// END CRUD PEMINJAMAN BUKU //

		// CRUD PENGEMBALIAN BUKU //
		Route::get('/admin/data-pengembalian',['uses'=>'BukuPageController@Showpengembalian','as'=>'page-kembali-buku']);
		Route::get('/admin/kembali-buku/{id_transaksi}',['uses'=>'BukuPageController@Pengembalian','as'=>'kembali-pinjam-buku']);
		Route::post('/kembali/admin/data-pengembalian/{id_transaksi}',['uses'=>'BukuController@KembalikanBuku','as'=>'post-kembali-buku']);
		Route::get('/admin/detail-kembali/{id_transaksi}',['uses'=>'BukuPageController@DetailKembali','as'=>'detail-kembali-buku']);
		// END CRUD PENGEMBALIAN BUKU //
	});
//----------End Admin----------//
});