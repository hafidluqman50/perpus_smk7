@extends('Pengurus.layout.layout-app',['data'=>$notif])
@section('title') Atur Transaksi @endsection
@section('content')
<div class="row">
	<div class="col-md-6 col-xs-12">
		<div class="box box-danger">
			<div class="box-header with-border">
				<h3 class="box-title">Data Siswa</h3>				
			</div>
			<div class="box-body">
				<div class="form-group">
					<label for="">Nama Siswa : </label>
					<p class="form-control">{{ $transaksi->nama_siswa }}</p>
				</div>
				<div class="form-group">
					<label for="">NISN : </label>
					<p class="form-control">{{ $transaksi->nisn }}</p>
				</div>
				<div class="form-group">
					<label for="">Kelas : </label>
					<p class="form-control">{{ $transaksi->nama_kelas }}</p>
				</div>
				<div class="form-group">
					<label for="">Nomor HP : </label>
					<p class="form-control">{{ $transaksi->nmr_hp }}</p>
				</div>
				<div class="form-group">
					<label for="">Email : </label>
					<p class="form-control">{{ $transaksi->email }}</p>
				</div>
			</div>
		</div>
	</div>
	<div class="col-md-6 col-xs-12">
		<div class="box box-danger">
			<div class="box-header with-border">
				<h3 class="box-title">Data Buku</h3>				
			</div>
			<div class="box-body">
			<div class="col-xs-6">
				<div class="form-group">
					<label for="">Judul Buku : </label>
					<p class="form-control">{{ $transaksi->judul_buku }}</p>
				</div>
				<div class="form-group">
					<label for="">Kategori : </label>
					<p class="form-control">{{ $transaksi->nama_kategori }}</p>
				</div>
				<div class="form-group">
					<label for="">Pengarang : </label>
					<p class="form-control">{{ $transaksi->pengarang }}</p>
				</div>
				<div class="form-group">
					<label for="">Singkatan Penulis : </label>
					<p class="form-control">{{ $transaksi->sn_penulis }}</p>
				</div>
				<div class="form-group">
					<label for="">Penerbit : </label>
					<p class="form-control">{{ $transaksi->penerbit }}</p>
				</div>
			</div>
			<div class="col-xs-6">
				<div class="form-group">
					<label for="">Tempat Terbit : </label>
					<p class="form-control">{{ $transaksi->tempat_terbit }}</p>
				</div>
				<div class="form-group">
					<label for="">Tahun Terbit : </label>
					<p class="form-control">{{ $transaksi->tahun_terbit }}</p>
				</div>
				<div class="form-group">
					<label for="">Foto Buku : </label>
					<img class="img-responsive" src="{{ asset('/admin-assets/foto_buku/'.$transaksi->foto_buku) }}" alt="">
				</div>
			</div>
			</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-xs-12">
		<div class="box box-danger">
			<div class="box-header">
				<h3 class="box-title">Transaksi</h3>
			</div>
			@if (Auth::user()->level==1)
			<form action="{{ url('/pinjam/petugas/atur',$transaksi->id_transaksi) }}" method="POST">
			@elseif(Auth::user()->level==2)
			<form action="{{ url('/pinjam/admin/atur',$transaksi->id_transaksi) }}" method="POST">
			@endif
			{{ csrf_field() }}
			<div class="box-body">
				<div class="form-group">
					<label for="">Tanggal Pinjam</label>
					<input type="text" name="tanggal_pinjam" class="form-control" placeholder="Tanggal Pinjam" value="{{ date('Y-m-d') }}" readonly>
				</div>
				<div class="form-group">
					<label for="">Tanggal Harus Kembalikan</label>
					<input type="text" name="tanggal_jth_tmpo" class="form-control" placeholder="Tanggal Harus Kembalikan" value="{{ $minggu }}" readonly>
				</div>	
				<div class="form-group">
					<label for="">Atur Peminjaman</label>
					<select name="status_pnjm" id="" class="form-control">
						<option value="" selected disabled>Atur Peminjaman</option>
						<option value="1">Pinjamkan Buku</option>
						<option value="NULL">Batalkan Peminjaman</option>
					</select>
				</div>
			<div class="box-footer">
				<div align="center">
					<button class="btn btn-primary">Simpan</button>
				</div>
			</div>
			</form>
			</div>	
		</div>
	</div>
</div>
@endsection